<?php
// capacidades de todos los transportes
$capacidades = 48;
// verificar que se llego a este codigo con una accion
if (isset($_GET['accion'])) {
  $con = mysqli_connect('localhost', 'carlos', 'carlos99', 'reservaciones');
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  // lista de acciones validas
  if ($_GET['accion'] == 'cargarDatosSemI') {
    if(!isset($_GET['year'])) {
      echo "Campo faltante";
    }
    else {
      mysqli_select_db($con, "reservaciones");
      $sql = "select nombrePasajero, fecha, nombreDestino from viajero where fecha BETWEEN '".$_GET['year']."-09-01' and '".(intval($_GET['year'])+1)."-02-30'";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td class=\"text-left\">" . $row['nombrePasajero'] . "</td>";
        echo "<td class=\"text-right\">" . $row['fecha'] . "</td>";
        echo "<td class=\"text-right\">" . $row['nombreDestino'] . "</td>";
        echo "</tr>";
      }
    }
  }
  else if($_GET['accion'] == 'cargarDatosSemII') {
    if(!isset($_GET['year'])) {
      echo "Campo faltante";
    }
    else {
      mysqli_select_db($con, "reservaciones");
      $sql = "select nombrePasajero, fecha, nombreDestino from viajero where fecha BETWEEN '".(intval($_GET['year'])+1)."-03-01' and '".(intval($_GET['year'])+1)."-07-31'";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td class=\"text-left\">" . $row['nombrePasajero'] . "</td>";
        echo "<td class=\"text-right\">" . $row['fecha'] . "</td>";
        echo "<td class=\"text-right\">" . $row['nombreDestino'] . "</td>";
        echo "</tr>";
      }
    }
  }
  else if ($_GET['accion'] == 'efectuarReservacion') {
    // verificar que no se esten insertando datos en blanco
    if (
      !isset($_GET['nombre']) && $_GET['nombre'] != "" || 
      !isset($_GET['ci']) && $_GET['ci'] != "" || 
      !isset($_GET['fecha']) && $_GET['fecha'] != "" ||
      !isset($_GET['facultad']) && $_GET['facultad'] || 
      !isset($_GET['asignatura']) && $_GET['asignatura'] || 
      !isset($_GET['destino']) && $_GET['destino']
    ) {
      echo 'Campo faltante';
    } else {
      // comprobar que existan capacidades para la fecha escogida
      $sql1 = "select distinct fecha, ".$capacidades."-count(*) from viajero where fecha='".$_GET['fecha']."' group by fecha";
      $resultado = mysqli_query($con, $sql1);
      $row = mysqli_fetch_array($resultado);
      // entrada de viaje detectada
      if($row && intval($row[1]) > 0 || !$row) {
        // insertando reserva en base de datos
        $sql = "INSERT INTO `viajero` (`fecha`, `nombreDestino`, `ci`, `nombrePasajero`, `facultad`, `asignatura`) VALUES ('" . $_GET['fecha'] . '\',\'' . $_GET['destino'] . '\',\'' . $_GET['ci'] . '\',\'' . $_GET['nombre'] . '\',\'' . $_GET['facultad'] . '\',\'' . $_GET['asignatura'] . '\');';
        $query = mysqli_query($con, $sql);
        // No se ejecuto el query
        if (!$query) {
          echo "Error de insercion en la base de datos.";
        }
        // Insercion realizada con exito
        else {
          // agregar nuevo viaje a la tabla viajes
          $query2 = mysqli_query($con, "INSERT INTO `viaje` (`fecha`,`estado`) VALUES ('" . $_GET['fecha'] . "', 'En progreso')");
            // manejar el error cuando ya existe este viaje registrado
            /*
              preguntar por la respuesta obtenida de ejecutar el query para verificar si no se inserto la fila de viaje o ya existia
            */  
          
          echo "<tr>";
          echo "<td class=\"text-left\">" . $_GET['nombre'] . "</td>";
          echo "<td class=\"text-right\">" . $_GET['fecha'] . "</td>";
          echo "<td class=\"text-right\">" . $_GET['destino'] . "</td>";
          echo "</tr>";
        }
      }
      else if($row && intval($row[1]) <= 0) {
        echo "Sin capacidades";
      }
    }
  } else if ($_GET['accion'] == 'cargarListaDestinos') {
    $query = mysqli_query($con, "select nombre from destino");
    if (!$query) {
      echo "Error en la actualizacion de viajes";
    } else {
      while ($row = mysqli_fetch_array($query)) {
        echo "<option>" . $row[0] . "</option>";
      }
    }
  } else if ($_GET['accion'] == 'comprobarCapacidades') {
    if(!isset($_GET['fecha'])) {
      echo 'Campo faltante';
    }
    else {
      $sql = "select distinct fecha, ".$capacidades."-count(*) from viajero where fecha='".$_GET['fecha']."' group by fecha";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);
      // entrada de viaje detectada
      if($row) {
        if(intval($row[1]) > 0) {
          echo "1";
        }
        else {
          echo "0";
        }
      }
      else {
        // no hay reservas de este viaje
        echo "1";
      }
    }
  }
  else if ($_GET['accion'] == 'listaProfesoresSemI') {
    if(!isset($_GET['year']) || !isset($_GET['search'])) {
      echo "Campo faltante";
    }
    else {
      mysqli_select_db($con, "reservaciones");
      $sql = "select nombrePasajero, fecha, nombreDestino from viajero where fecha BETWEEN '".$_GET['year']."-09-01' and '".(intval($_GET['year'])+1)."-02-30' and nombrePasajero LIKE '%".$_GET['search']."%'";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td class=\"text-left\">" . $row['nombrePasajero'] . "</td>";
        echo "<td class=\"text-right\">" . $row['fecha'] . "</td>";
        echo "<td class=\"text-right\">" . $row['nombreDestino'] . "</td>";
        echo "</tr>";
      }
    }
  }
  else if ($_GET['accion'] == 'listaProfesoresSemII') {
    if(!isset($_GET['year']) || !isset($_GET['search'])) {
      echo "Campo faltante";
    }
    else {
      mysqli_select_db($con, "reservaciones");
      $sql = "select nombrePasajero, fecha, nombreDestino from viajero where fecha BETWEEN '".(intval($_GET['year'])+1)."-03-01' and '".(intval($_GET['year'])+1)."-07-31' and nombrePasajero LIKE '%".$_GET['search']."%'";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td class=\"text-left\">" . $row['nombrePasajero'] . "</td>";
        echo "<td class=\"text-right\">" . $row['fecha'] . "</td>";
        echo "<td class=\"text-right\">" . $row['nombreDestino'] . "</td>";
        echo "</tr>";
      }
    }
  }
  else if ($_GET['accion'] == 'listaProfesoresCantidadViajes') {
    if(!isset($_GET['search'])) {
      echo "Campo faltante";
    }
    else {
      mysqli_select_db($con, "reservaciones");
      $sql = "select nombrePasajero, ci, facultad, asignatura, count(*) from viajero group by nombrePasajero having count(*)=".$_GET['search'];
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row['nombrePasajero']."</td>";
        echo "<td>".$row['ci']."</td>";
        echo "<td class=\"d-none d-md-table-cell\">".$row['facultad']."</td>";
        echo "<td>".$row['asignatura']."</td>";
        echo "</tr>";
      }
    }
  }
  else if ($_GET['accion'] == 'profesoresFacultad') {
    mysqli_select_db($con, "reservaciones");
    $sql = "select facultad, count(*) from viajero group by facultad order by count(*)";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
        echo "<td>".$row[0]."</td>";
        echo "<td class=\"text-right\">".$row[1]."</td>";
      echo "</tr>";
    }
  }
  else if ($_GET['accion'] == 'listaProfesores') {
    mysqli_select_db($con, "reservaciones");
    $sql = "select nombrePasajero, ci, facultad, asignatura from viajero group by nombrePasajero";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
        echo "<td>".$row['nombrePasajero']."</td>";
        echo "<td>".$row['ci']."</td>";
        echo "<td class=\"d-none d-md-table-cell\">".$row['facultad']."</td>";
        echo "<td>".$row['asignatura']."</td>";
      echo "</tr>";
    }
  }
  mysqli_close($con);
}
