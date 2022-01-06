<?php
// define la cantidad de capacidades para cada transporte
$capacidades = 48;
if(isset($_GET['accion'])) {
    $con = mysqli_connect('localhost','carlos','carlos99','reservaciones');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    // lista de acciones validas
    if($_GET['accion'] == 'cargarDatosListaViajes') {
        // nombres de los choferes almacenados en base de datos para mostrar en lista
        mysqli_select_db($con,"reservaciones");
        $sql1 = "select nombre from chofer";
        $res = mysqli_query($con, $sql1);
        $i = 0;
        while($r = mysqli_fetch_array($res)) {
            $opciones[$i] = $r['nombre'];
            $i++;
        }
        $opciones[$i] = "Sin Chofer";
        // fecha de viaje, capacidades
        $consulta = mysqli_query($con, "select viaje.fecha, ".$capacidades."-count(*), viaje.estado from viaje, destino, viajero where viajero.fecha=viaje.fecha and destino.nombre=viajero.nombreDestino group by viaje.fecha");
        while($row = mysqli_fetch_array($consulta)) {
            // chofer del viaje
            $consultaChofer = mysqli_query($con, "select ci from viaje where fecha='".$row[0]."'");
            $rowCi = mysqli_fetch_array($consultaChofer);
            $nombreChofer = "";
            // existe un chofer asignado para este viaje
            if($rowCi[0] != '') {
                $consultaChoferAsignado = mysqli_query($con, "select nombre from chofer where ci='".$rowCi[0]."'");
                $rowNombre = mysqli_fetch_array($consultaChoferAsignado);
                $nombreChofer = $rowNombre[0];
            }
            // retornar resultado de fila
            echo "<tr fila=\"".$row[0]."\">";
            echo "<td fila=\"".$row[0]."\">".$row[0]."</td>";
            // Obteniendo el destino mas lejano del viaje (el destino mas caro)
            

            echo "<td class=\"d-none d-md-table-cell\">";
                echo "<select fila=\"".$row[0]."\" onchange=asignarChofer(this); class=\"form-control\" name=\"select".$row[0]."\"id=\"chofer".$row[0]."\">";
                $j = 0; 
                $band = false;   
                while($j<=$i) {
                    if($opciones[$j] == $nombreChofer) {
                        echo "<option value=\"".$opciones[$j]."\" selected>".$opciones[$j]."</option>";
                        $band = true;
                    }
                    else if($i==$j && $band == false) {
                        echo "<option value=\"".$opciones[$j]."\" selected>".$opciones[$j]."</option>";
                    }
                    else {
                        echo "<option value=\"".$opciones[$j]."\">".$opciones[$j]."</option>";
                    }
                    $j++;
                }
                echo "</select>";
                echo "</td>";
                echo "<td fila=\"".$row[0]."\">".
                $row[1].
                "</td>";
                // calculando ganancias de este viaje (se le cobra al pasajero despues del primer viaje en el semestre)
                $ganancias = 0.0;
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
                    $mes = intval(substr($fecha, 5, 2));
                    $semestre = '2';
                    if($mes == 1 || $mes == 2 ||  $mes == 10 || $mes == 11 || $mes == 12) {
                        $semestre = '1';
                    }
                    else if($mes == 3 || $mes == 4 || $mes == 5 || $mes == 6 || $mes == 7) {
                        $semestre = '2';
                    }
                    // el anno siempre debe apuntar al inicio del curso y en este caso el anno de inicio de curso ya paso
                    if($mes == 1 || $mes == 2 || $mes == 3 || $mes == 4 || $mes == 5 || $mes == 6 || $mes == 7) {
                        $anno -= 1;
                    }
                    // la fecha de reservacion se efectuo en el primer semestre
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
                        $ganancias += $rowPrecio[0];
                    }
                }
                echo "<td fila=\"".$row[0]."\">$".
                $ganancias.
                "</td>";
                // estado del viaje
                $consultaEstado = mysqli_query($con, "select estado from viaje where fecha='".$row[0]."'");
                $rowEstado = mysqli_fetch_array($consultaEstado);
                $estado = $rowEstado[0];
                echo "<td><select fila=\"".$row[0]."\" onchange=asignarEstado(this); class=\"form-control\" name=\"select".$row[0]."\"id=\"estado".$row[0]."\">";
                if($estado == "En progreso") {
                    echo "<option value=\"En progreso\" selected><span class=\"badge bg-warning\">En progreso</span></option>";
                    echo "<option value=\"Cancelado\" ><span class=\"badge bg-danger\">Cancelado</span></option>";
                    echo "<option value=\"Realizado\" ><span class=\"badge bg-success\">Realizado</span></option>";
                }
                else if($estado == "Cancelado") {
                    echo "<option value=\"En progreso\"><span class=\"badge bg-warning\">En progreso</span></option>";
                    echo "<option value=\"Cancelado\" selected><span class=\"badge bg-danger\">Cancelado</span></option>";
                    echo "<option value=\"Realizado\" ><span class=\"badge bg-success\">Realizado</span></option>";
                }
                else if($estado == "Realizado") {
                    echo "<option value=\"En progreso\"><span class=\"badge bg-warning\">En progreso</span></option>";
                    echo "<option value=\"Cancelado\" ><span class=\"badge bg-danger\">Cancelado</span></option>";
                    echo "<option value=\"Realizado\" selected><span class=\"badge bg-success\">Realizado</span></option>";
                }
                echo "</select></td>";

                echo "<td>";
                    echo "<a fila=\"".$row[0]."\" onclick=listaPasajerosPorDestino(this); data-toggle=\"modal\" data-target=\"#defaultModalPrimary\" href=\"#\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-map-pin align-middle ml-2\"><path d=\"M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z\"></path><circle cx=\"12\" cy=\"10\" r=\"3\"></circle></svg></a>";
                echo "</td>";
                echo "<td>";
                echo "<a fila=\"".$row[0]."\" onclick=listaPasajeros(this); data-toggle=\"modal\" data-target=\"#defaultModalPrimary\" href=\"#\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-list align-middle mr-2\"><line x1=\"8\" y1=\"6\" x2=\"21\" y2=\"6\"></line><line x1=\"8\" y1=\"12\" x2=\"21\" y2=\"12\"></line><line x1=\"8\" y1=\"18\" x2=\"21\" y2=\"18\"></line><line x1=\"3\" y1=\"6\" x2=\"3.01\" y2=\"6\"></line><line x1=\"3\" y1=\"12\" x2=\"3.01\" y2=\"12\"></line><line x1=\"3\" y1=\"18\" x2=\"3.01\" y2=\"18\"></line></svg></a>";
                echo "</td>";
            echo "</tr>";
        }

    }
    else if($_GET['accion'] == 'cargarDatosViajesChoferes') {
        mysqli_select_db($con,"reservaciones");
        $sql="select chofer.nombre, chofer.no_licencia, viaje.fecha from chofer, viaje where chofer.ci=viaje.ci order by nombre";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
                echo "<td class=\"text-left\">".$row[0]."</td>";
                echo "<td class=\"text-left\">".$row[1]."</td>";
                echo "<td class=\"text-right\">".$row[2]."</td>";
            echo "</tr>";
        }
    }
    else if($_GET['accion'] == 'asignarChofer') {
        // Verificar entradas
        if(!isset($_GET['chofer']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            if($_GET['chofer'] != 'Sin Chofer') {
                // obteniendo ci del chofer
                $sql1 ="select ci from chofer where nombre='".$_GET['chofer']."'";
                $query1 = mysqli_query($con,$sql1);
                $ciChofer = "";
                // No se ejecuto el query
                if(!$query1) {
                    echo "Error de base de datos. No se encontro en base de datos al nuevo chofer asignado.";
                }
                else {
                    $res = mysqli_fetch_array($query1);
                    $ciChofer = $res[0];
                }
                // cambiando chofer del viaje
                $sql ="update viaje set ci='".$ciChofer."' where fecha='".$_GET['fila']."'";
                $query = mysqli_query($con,$sql);
                // No se ejecuto el query
                if(!$query) {
                    echo 'Error de insercion en la base de datos.';
                    echo $sql;
                }
                else {
                    echo "ok";
                }
            }
            else {
                // dejando viaje sin chofer
                $sql ="update viaje set ci='' where fecha='".$_GET['fila']."'";
                $query = mysqli_query($con,$sql);
                // No se ejecuto el query
                if(!$query) {
                    echo 'Error de insercion en la base de datos.';
                    echo $sql;
                }
                else {
                    echo "ok";
                }
            }
        }
    }
    else if($_GET['accion'] == 'asignarEstado') {
        // Verificar entradas
        if(!isset($_GET['estado']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql = "update viaje set estado='".$_GET['estado']."' where fecha = '".$_GET['fila']."'";
            $res = mysqli_query($con, $sql);
            if(!$res) {
                echo "Error de actualizacion.";
            }
            else {
                echo "ok";
            }
        }
    }
    else if($_GET['accion'] == "listapasajerosDestino") {
        if(!isset($_GET['fila'])) {
            echo "Campo faltante";
        }
        else {
            $sql = "select nombreDestino, nombrePasajero, ci from viajero where fecha='".$_GET['fila']."' order by fecha, nombreDestino";
            $result = mysqli_query($con, $sql);
            $provincia = "";
            echo "<div class=\"modal-header\">";
            echo "<h5 class=\"modal-title\">Rutas planificadas para el ".$_GET['fila']."</h5>";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
                echo "<span aria-hidden=\"true\">×</span>";
            echo "</button>";
            echo "</div>";
            echo '<div class="modal-body m-3">';
            echo "<ol>";
            $first = true;
            while ($row = mysqli_fetch_array($result)) {
                if($row[0] != $provincia && $first) {
                    $provincia = $row[0];
                    $first = false;
                    echo "<li>";
                    echo $row[0];
                    echo "<ul>";
                    echo "<li>".$row[1].", ".$row[2]."</li>";
                }
                else if($row[0] != $provincia && !$first){
                    $provincia = $row[0];
                    echo "</ul>";
                    echo "</li>";
                    echo "<li>";
                    echo $row[0];
                    echo "<ul>";
                    echo "<li>".$row[1].", ".$row[2]."</li>";
                }
                else {
                    echo "<li>".$row[1].", ".$row[2]."</li>";
                }
            }
            echo "</ul></li></ol>";
            echo "<div class=\"modal-footer\">";
            echo "<button disabled=\"\" type=\"button\" class=\"btn btn-primary\">Imprimir</button>";
            echo "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cerrar</button>";
            echo "</div></div>";
        }
    }
    else if($_GET['accion'] == "listapasajeros") {
        if(!isset($_GET['fila'])) {
            echo "Campo faltante";
        }
        else {
            $sql = "select nombrePasajero, ci from viajero where fecha='".$_GET['fila']."'";
            $result = mysqli_query($con, $sql);
            $provincia = "";
            echo "<div class=\"modal-header\">";
            echo "<h5 class=\"modal-title\">Lista de pasajeros del viaje planificado para el ".$_GET['fila']."</h5>";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
                echo "<span aria-hidden=\"true\">×</span>";
            echo "</button>";
            echo "</div>";
            echo '<div class="modal-body m-3">';
            echo "<ol>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<li>".$row[0].", ".$row[1]."</li>";
            }
            echo "</ul></li></ol>";
            echo "<div class=\"modal-footer\">";
            echo "<button disabled=\"\" type=\"button\" class=\"btn btn-primary\">Imprimir</button>";
            echo "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cerrar</button>";
            echo "</div></div>";
        }
    }
    else if ($_GET['accion'] == 'buscarChofer') {
        if(!isset($_GET['search'])) {
          echo "Campo faltante";
        }
        else {
          mysqli_select_db($con, "reservaciones");
          $sql = "select nombre, no_licencia, viaje.fecha from chofer, viaje where chofer.ci=viaje.ci and nombre like '%".$_GET['search']."%' order by nombre";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
                echo "<td class=\"text-left\">".$row[0]."</td>";
                echo "<td class=\"text-left\">".$row[1]."</td>";
                echo "<td class=\"text-right\">".$row[2]."</td>";
            echo "</tr>";
          }
        }
      }
    }

    mysqli_close($con);
?>