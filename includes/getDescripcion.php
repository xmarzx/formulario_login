
<?php

include('../php/conexion_be.php');
$query = mysqli_real_escape_string($conn, $_POST['query']);
$sql = "SELECT DISTINCT descripcion FROM datos2 WHERE descripcion LIKE '%".$query."%' ORDER BY LENGTH(descripcion) DESC";
$resultado = mysqli_query($conn, $sql);


// Construye una lista HTML con los resultados de la búsqueda
if (mysqli_num_rows($resultado) > 0) {
    echo '<ul>';
    while ($fila = mysqli_fetch_assoc($resultado)) {
      echo '<li class="descripcionItem" value="'.$fila['descripcion'].'">'.$fila['descripcion'].'</li>';
    }
    echo '</ul>';
  } else {
    echo '<p>No se encontraron resultados</p>';
  }

// Cierra la conexión a la base de datos
mysqli_close($conn);

?>		

