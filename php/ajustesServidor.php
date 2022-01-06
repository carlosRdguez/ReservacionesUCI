<?php
// verificar que se llego a este codigo con una accion
if(isset($_GET['accion'])) {
    $con = mysqli_connect('localhost','carlos','carlos99','reservaciones');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    // lista de acciones validas
    if($_GET['accion'] == 'cargarDatosChoferes') {
        mysqli_select_db($con,"reservaciones");
        $sql="SELECT * FROM chofer";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            echo "<tr id=\"fila".$row['ci']."\">";
                $onclick = "";
                    echo "<td>";
                        echo "<input onchange=nombreChanged(this); fila=\"".$row['ci']."\" type=\"text\" class=\"form-control\" value=\"".$row['nombre']."\">";
                    echo "</td>";
                    echo "<td>";
                        echo "<input onchange=ciChanged(this); fila=\"".$row['ci']."\" type=\"text\" class=\"form-control\" value=\"".$row['ci']."\">";
                    echo "</td>";
                    echo "<td class=\"table-action\">";
                        echo "<div class=\"input-group mb-2 mr-sm-2\">";
                            echo "<input onchange=licenciaChanged(this); fila=\"".$row['ci']."\" type=\"ztext\" class=\"form-control\"value=\"".$row['no_licencia']."\">";
                            echo "<a onclick=borrarChofer(this); fila=\"".$row['ci']."\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash align-middle ml-2\">";
                                    echo "<polyline points=\"3 6 5 6 21 6\"></polyline>";
                                    echo "<path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path>";
                                echo "</svg></a>";
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
        }
    }
    else if($_GET['accion'] == 'agregarChofer') {
        if(!isset($_GET['nombre']) || !isset($_GET['ci']) || !isset($_GET['licencia'])) {
            echo 'Campo faltante';
        }
        else {
            $sql ="INSERT INTO `chofer` (`ci`, `nombre`, `no_licencia`) VALUES ('".$_GET['ci'].'\',\''.$_GET['nombre'].'\',\''.$_GET['licencia'].'\');';
            $query = mysqli_query($con,$sql);
            // No se ejecuto el query
            if(!$query) {
                echo 'Error de insercion en la base de datos.';
                echo $sql;
            }
            // Insercion realizada con exito
            else {
                echo "<tr id=\"fila".$_GET['ci']."\">";
                    echo "<td>";
                        echo "<input onchange=nombreChanged(this); fila=\"".$_GET['ci']."\" type=\"text\" class=\"form-control\" value=\"".$_GET['nombre']."\">";
                    echo "</td>";
                    echo "<td>";
                        echo "<input onchange=ciChanged(this); fila=\"".$_GET['ci']."\" type=\"text\" class=\"form-control\" value=\"".$_GET['ci']."\">";
                    echo "</td>";
                    echo "<td class=\"table-action\">";
                        echo "<div class=\"input-group mb-2 mr-sm-2\">";
                            echo "<input onchange=licenciaChanged(this); fila=\"".$_GET['ci']."\" type=\"ztext\" class=\"form-control\"value=\"".$_GET['licencia']."\">";
                            echo "<a onclick=borrarChofer(this); fila=\"".$_GET['ci']."\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash align-middle ml-2\">";
                                    echo "<polyline points=\"3 6 5 6 21 6\"></polyline>";
                                    echo "<path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path>";
                                echo "</svg></a>";
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
            }
        }
    }
    else if($_GET['accion'] == 'modificarNombre') {
        // Verificar entradas
        if(!isset($_GET['nombre']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="UPDATE `chofer` SET `nombre`='".$_GET['nombre']."' WHERE `ci`='".$_GET['fila']."';";
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
    else if($_GET['accion'] == 'modificarCi') {
        // Verificar entradas
        if(!isset($_GET['ci']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="UPDATE `chofer` SET `ci`='".$_GET['ci']."' WHERE `ci`='".$_GET['fila']."';";
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
    else if($_GET['accion'] == 'modificarLicencia') {
        // Verificar entradas
        if(!isset($_GET['licencia']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="UPDATE `chofer` SET `no_licencia`='".$_GET['licencia']."' WHERE `ci`='".$_GET['fila']."';";
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
    else if($_GET['accion'] == 'eliminarChofer') {
        // Verificar entradas
        if(!isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="DELETE FROM `chofer` WHERE `ci`='".$_GET['fila']."';";
            $query = mysqli_query($con,$sql);
            // No se ejecuto el query
            if(!$query) {
                echo 'Error de eliminacion en la base de datos.';
                echo $sql;
            }
            else {
                echo "ok";
            }
        }
    }
    if($_GET['accion'] == 'cargarDatosTarifas') {
        mysqli_select_db($con,"reservaciones");
        $sql="SELECT * FROM `destino`";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            echo "<tr id=\"fila".$row['nombre']."\">";
                    echo "<td>";
                        echo "<input fila=\"".$row['nombre']."\" onchange=destinoChanged(this); type=\"text\" class=\"form-control\" id=\"inputUsername\" value=\"".$row['nombre']."\">";
                    echo "</td>";
                    echo "<td class=\"table-action\">";
                        echo "<div class=\"input-group mb-2 mr-sm-2\">";
                            echo "<div class=\"input-group-text\">$</div>";
                            echo "<input fila=\"".$row['nombre']."\" onchange=precioChanged(this); type=\"ztext\" class=\"form-control\" value=\"".$row['tarifa']."\">";
                            echo "<a onclick=borrarTarifa(this); fila=\"".$row['nombre']."\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash align-middle ml-2\">";
                                    echo "<polyline points=\"3 6 5 6 21 6\"></polyline>";
                                    echo "<path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path>";
                                echo "</svg></a>";
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
        }
    }
    else if($_GET['accion'] == 'agregarTarifa') {
        if(!isset($_GET['destino']) || !isset($_GET['precio'])) {
            echo 'Campo faltante';
        }
        else {
            $sql ="INSERT INTO `destino` (`nombre`, `tarifa`) VALUES ('".$_GET['destino'].'\',\''.$_GET['precio'].'\');';
            $query = mysqli_query($con,$sql);
            // No se ejecuto el query
            if(!$query) {
                echo 'Error de insercion en la base de datos.';
                echo $sql;
            }
            // Insercion realizada con exito
            else {
                echo "<tr id=\"fila".$_GET['destino']."\">";
                    echo "<td>";
                        echo "<input fila=\"".$_GET['destino']."\" onchange=destinoChanged(this); type=\"text\" class=\"form-control\" id=\"inputUsername\" value=\"".$_GET['destino']."\">";
                    echo "</td>";
                    echo "<td class=\"table-action\">";
                        echo "<div class=\"input-group mb-2 mr-sm-2\">";
                            echo "<div class=\"input-group-text\">$</div>";
                            echo "<input fila=\"".$_GET['destino']."\" onchange=precioChanged(this); type=\"ztext\" class=\"form-control\" value=\"".$_GET['precio']."\">";
                            echo "<a onclick=borrarTarifa(this); fila=\"".$_GET['destino']."\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash align-middle ml-2\">";
                                    echo "<polyline points=\"3 6 5 6 21 6\"></polyline>";
                                    echo "<path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path>";
                                echo "</svg></a>";
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
            }
        }
    }
    else if($_GET['accion'] == 'modificarDestino') {
        // Verificar entradas
        if(!isset($_GET['destino']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="UPDATE `destino` SET `nombre`='".$_GET['destino']."' WHERE `nombre`='".$_GET['fila']."';";
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
    else if($_GET['accion'] == 'modificarPrecio') {
        // Verificar entradas
        if(!isset($_GET['precio']) || !isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="UPDATE `destino` SET `tarifa`='".$_GET['precio']."' WHERE `nombre`='".$_GET['fila']."';";
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
    else if($_GET['accion'] == 'eliminarTarifa') {
        // Verificar entradas
        if(!isset($_GET['fila'])) {
            echo "Error de parametros pasados.";
        }
        else {
            $sql ="DELETE FROM `destino` WHERE `nombre`='".$_GET['fila']."';";
            $query = mysqli_query($con,$sql);
            // No se ejecuto el query
            if(!$query) {
                echo 'Error de eliminacion en la base de datos.';
                echo $sql;
            }
            else {
                echo "ok";
            }
        }
    }
    mysqli_close($con);
}
