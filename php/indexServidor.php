<?php
$capacidades = 48;
// retorna las ganancias del mes y anno indicado
function getGananciasMes($con, $mes, $anno) {
    $gananciasDelMes = 0.0;
    $consulta = mysqli_query($con, "select viaje.fecha, 48-count(*) from viaje, destino, viajero where viajero.fecha=viaje.fecha and destino.nombre=viajero.nombreDestino and YEAR(viaje.fecha)=".$anno." and MONTH(viaje.fecha)=".$mes." group by viaje.fecha");
    while($row = mysqli_fetch_array($consulta)) {
    // lista de pasajeros del viaje
        $sqlViajeros = "select viajero.fecha, viajero.ci, viajero.nombreDestino from viajero where fecha='".$row[0]."'";
        $resultadoViajeros = mysqli_query($con, $sqlViajeros);
        while($rowViajeros = mysqli_fetch_array($resultadoViajeros)) {
            // determinar si el pasajero ya viajo en el semestre
            $fecha = $rowViajeros[0];
            $ciViajero = $rowViajeros[1];
            $destino = $rowViajeros[2];
            //echo "<br>fecha, destino";
            //echo $fecha;
            //echo $destino;
            // determinar semestre del viaje
            $anno = substr($fecha, 0, 4);
            $mesS = intval(substr($fecha, 6, 2));
            $semestre = '2';
            if($mesS == 1 || $mesS == 2 ||  $mesS == 10 || $mesS == 11 || $mesS == 12) {
                $semestre = '1';
            }
            else if($mesS == 3 || $mesS == 4 || $mesS == 5 || $mesS == 6 || $mesS == 7) {
                $semestre = '2';
            }
            // el anno siempre debe apuntar al inicio del curso y en este caso el anno de inicio de curso ya paso
            if($mes == 1 || $mes == 2 || $mes == 3 || $mes == 4 || $mes == 5 || $mes == 6 || $mes == 7) {
                $anno -= 1;
            }
            // la fecha del viaje del pasajero es en el primer semestre
            if($semestre == '1') {
                $sqlCantidad = "select count(*) from viajero where ci='".$ciViajero."' and fecha between '".$anno."-09-01' and '".(intval($anno)+1)."-02-30' and fecha < '".$fecha."'";
            }
            // la fecha del viaje se realizo en el segundo semestre
            else {
                $sqlCantidad = "select count(*) from viajero where ci='".$ciViajero."' and fecha between '".(intval($anno)+1)."-03-01' and '".(intval($anno)+1)."-07-31' and fecha < '".$fecha."'";
            }
            // determinar la cantidad de viajes en el semestre
            $resultadoCantidad = mysqli_query($con, $sqlCantidad);
            $rowCantidad = mysqli_fetch_array($resultadoCantidad);
            // ya realizo viajes en el semestre (se debe cobrar)
            //echo "c=".$rowCantidad[0];
            if($rowCantidad[0] >= 1) {
                $sqlPrecio = "select tarifa from destino where nombre='".$destino."'";
                $resultadoPrecio = mysqli_query($con, $sqlPrecio);
                $rowPrecio = mysqli_fetch_array($resultadoPrecio);
                $gananciasDelMes += $rowPrecio[0];
            }
        }
    }
    return $gananciasDelMes;
}
// verificar que se llego a este codigo con una accion
if(isset($_GET['accion'])) {
    $con = mysqli_connect('localhost','carlos','carlos99','reservaciones');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    else {
        // lista de acciones validas
        if($_GET['accion'] == 'cargarIndicadoresMensuales') {
            if(!isset($_GET['fecha'])) {
                echo "Campo faltante";
            }
            else {
                $mes = substr($_GET['fecha'], 5, 2);
                $anno = substr($_GET['fecha'], 0, 4);
                $mesAnterior = '';
                $AnnoAnterior = '';
                if($mes == '01') {
                    $mesAnterior = 12;
                    $AnnoAnterior = intval($anno)-1;
                }
                else {
                    $mesAnterior = intval($mes)-1;
                    $AnnoAnterior = $anno;
                }
                // obtener viajes realizados en el mes
                $sql = "select count(*) from viaje where MONTH(fecha)=".$mes." and YEAR(fecha)=".$anno;
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $viajesRealizados = $row[0]; // viajes totales
                // obtener por ciento
                $sql = "select count(*) from viaje where MONTH(fecha)=".$mesAnterior." and YEAR(fecha)=".$AnnoAnterior;
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $viajesRealizadosPorCiento = (100*intval($viajesRealizados));   
                if(intval($row[0]) != 0 && intval($viajesRealizados) != 0){
                    $viajesRealizadosPorCiento/=intval($row[0]);
                    $viajesRealizadosPorCiento-=100;   
                    $viajesRealizadosPorCiento = round($viajesRealizadosPorCiento, 2);
                }
                else {
                    $viajesRealizadosPorCiento = "Sin informacion";
                }
                // obtener ganancias
                $gananciasDelMes = getGananciasMes($con, $mes, $anno);
                // ganancias del mes anterior
                $gananciasDelMesAnterior = getGananciasMes($con, $mesAnterior, $AnnoAnterior);
                // obtener porciento
                $gananciasPorciento = (100*intval($gananciasDelMes));
                if($gananciasDelMesAnterior!=0 && $gananciasDelMes!=0){
                    $gananciasPorciento/=$gananciasDelMesAnterior;
                    $gananciasPorciento-=100;
                    $gananciasPorciento = round($gananciasPorciento, 2);
                }
                else {
                    $gananciasPorciento = "Sin informacion";
                }
                // obtener viajeros
                $sql = "select count(distinct ci) from viajero where MONTH(fecha)=".$mes." and YEAR(fecha)=".$anno;
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $viajeros = $row[0]; // viajes totales
                // obtener por ciento
                $sql = "select count(distinct nombrePasajero) from viajero where MONTH(fecha)=".$mesAnterior." and YEAR(fecha)=".$AnnoAnterior;
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $viajerosPorCiento = (100*intval($viajeros));
                if(intval($row[0]) != 0 && intval($viajeros) != 0){
                    $viajerosPorCiento/=intval($row[0]);
                    $viajerosPorCiento -= 100;
                    $viajerosPorCiento = round($viajerosPorCiento, 2);
                }
                else {
                    $viajerosPorCiento = "Sin informacion";
                }
                // obtener reservaciones
                $sql = "select count(*) from viajero where MONTH(fecha)=".$mes." and YEAR(fecha)=".$anno;
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $reservaciones = $row[0]; // viajes totales
                // obtener por ciento
                $sql = "select count(*) from viajero where MONTH(fecha)=".$mesAnterior." and YEAR(fecha)=".$AnnoAnterior;
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $reservacionesPorciento = (100*intval($reservaciones));
                if(intval($row[0]) != 0 && intval($reservaciones) != 0){
                    $reservacionesPorciento/=intval($row[0]);
                    $reservacionesPorciento-=100;
                    $reservacionesPorciento = round($reservacionesPorciento, 2);
                }
                else {
                    $reservacionesPorciento = "Sin informacion";
                }
                // retornar respuesta
                echo $viajesRealizados."*".$viajesRealizadosPorCiento."*".$gananciasDelMes."*".$gananciasPorciento."*".$viajeros."*".$viajerosPorCiento."*".$reservaciones."*".$reservacionesPorciento;
            }
            
        }
        else if($_GET['accion'] == 'cargarTablaVentasMes') {
            if(!isset($_GET['fecha'])) {
                echo "Campo faltante";
            }
            else {
                $anno = substr($_GET['fecha'], 0, 4);
                $gananciasAnno = [];
                $len = 0;
                for($mesIter = 1; $mesIter <= 12; $mesIter++) {
                    $mesSql = "";
                    if($mesIter < 10) {
                        $mesSql = "0".$mesIter;
                    }
                    else {
                        $mesSql = "".$mesIter;
                    }
                    $gananciasDelMes = 0.0;
                    // obtener viajes del mes
                    $consulta = mysqli_query($con, "select viaje.fecha, ".$capacidades."-count(*) from viaje, destino, viajero where viajero.fecha=viaje.fecha and destino.nombre=viajero.nombreDestino and YEAR(viaje.fecha)=".$anno." and MONTH(viaje.fecha)=".$mesSql." group by viaje.fecha");
                    // iterar por los viajes del mes
                    $hay_viajes = false;
                    while($row = mysqli_fetch_array($consulta)) {
                        $hay_viajes = true;
                        // lista de pasajeros del viaje
                        $sqlViajeros = "select viajero.fecha, viajero.ci, viajero.nombreDestino from viajero where fecha='".$row[0]."'";
                        $resultadoViajeros = mysqli_query($con, $sqlViajeros);
                        while($rowViajeros = mysqli_fetch_array($resultadoViajeros)) {
                            // determinar si el pasajero ya viajo en el semestre
                            $fecha = $rowViajeros[0];
                            $ciViajero = $rowViajeros[1];
                            $destino = $rowViajeros[2];
                            //echo "<br>fecha, destino";
                            //echo $fecha;
                            //echo $destino;
                            // determinar semestre del viaje
                            $anno = substr($fecha, 0, 4);
                            $mesS = intval(substr($fecha, 5, 2));
                            $semestre = '2';
                            if($mesS == 1 || $mesS == 2 ||  $mesS == 10 || $mesS == 11 || $mesS == 12) {
                                $semestre = '1';
                            }
                            else if($mesS == 3 || $mesS == 4 || $mesS == 5 || $mesS == 6 || $mesS == 7) {
                                $semestre = '2';
                            }
                            // el anno siempre debe apuntar al inicio del curso y en este caso el anno de inicio de curso ya paso
                            if($mesS == 1 || $mesS == 2 || $mesS == 3 || $mesS == 4 || $mesS == 5 || $mesS == 6 || $mesS == 7) {
                                $anno -= 1;
                            }
                            if($mesS == 10 || $mesS == 11 || $mesS == 12) {
                                $anno += 1;
                            }
                            // la fecha del viaje del pasajero es en el primer semestre
                            if($semestre == '1') {
                                $sqlCantidad = "select count(*) from viajero where ci='".$ciViajero."' and fecha between '".$anno."-09-01' and '".(intval($anno)+1)."-02-29' and fecha < '".$fecha."'";
                            }
                            // la fecha del viaje se realizo en el segundo semestre
                            else {
                                $sqlCantidad = "select count(*) from viajero where ci='".$ciViajero."' and fecha between '".(intval($anno)+1)."-03-01' and '".(intval($anno)+1)."-07-31' and fecha < '".$fecha."'";
                            }
                            // determinar la cantidad de viajes en el semestre
                            $resultadoCantidad = mysqli_query($con, $sqlCantidad);
                            $rowCantidad = mysqli_fetch_array($resultadoCantidad);
                            // ya realizo viajes en el semestre (se debe cobrar)
                            //echo "c=".$rowCantidad[0];
                            if($rowCantidad[0] >= 1) {
                                $sqlPrecio = "select tarifa from destino where nombre='".$destino."'";
                                $resultadoPrecio = mysqli_query($con, $sqlPrecio);
                                $rowPrecio = mysqli_fetch_array($resultadoPrecio);
                                $gananciasDelMes += $rowPrecio[0];
                            }
                        }
                    }
                    array_push($gananciasAnno, $gananciasDelMes);
                    $len++;
                }
            }
            for($i = 0; $i < $len-1; $i+=1) {
                echo $gananciasAnno[$i]."*";
            }
            echo $gananciasAnno[$len-1];


        }
        else if($_GET['accion'] == 'cargarTablaUltimosViajes') {
            if(!isset($_GET['fecha'])) {
                echo "Campo faltante";
            }
            else {
                // obtener viajes del mes
                $mes = substr($_GET['fecha'], 5, 2);
                $anno = substr($_GET['fecha'], 0, 4);
                $mesAnterior = '';
                $AnnoAnterior = '';
                if($mes == '01') {
                    $mesAnterior = 12;
                    $AnnoAnterior = intval($AnnoAnterior)-1;
                }
                else {
                    $mesAnterior = intval($mes)-1;
                    $AnnoAnterior = $anno;
                }
                $sql = "select fecha, ci, estado from viaje where MONTH(fecha)='".$mes."' and YEAR(fecha)='".$anno."'";
                $result = mysqli_query($con, $sql);
                $nombreChofer = "Sin Chofer";
                while ($row = mysqli_fetch_array($result)) {
                    $sqlNombreChofer = "select nombre from chofer where ci='".$row['ci']."'";
                    $resultNombre = mysqli_query($con, $sqlNombreChofer);
                    if($rowNombre = mysqli_fetch_array($resultNombre)) {
                        $nombreChofer = $rowNombre[0];
                    }
                    echo "<tr><td class=\"d-none d-xl-table-cell\">".$row['fecha']."</td>";
                    if($row['estado'] == "Realizado") {
                        echo "<td><span class=\"badge bg-success\">".$row['estado']."</span></td>";
                    }
                    else if($row['estado'] == "Cancelado") {
                        echo "<td><span class=\"badge bg-danger\">".$row['estado']."</span></td>";
                    }
                    else if($row['estado'] == "En progreso") {
                        echo "<td><span class=\"badge bg-warning\">".$row['estado']."</span></td>";
                    }
                    echo "<td class=\"d-none d-md-table-cell\">".$nombreChofer."</td></tr>";
                }
            }
        }
    }
    mysqli_close($con);
}