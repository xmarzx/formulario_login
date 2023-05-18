<?php

include ('../php/conexion_be.php');
$id_area = $_POST['id_area'];

// Obtener el último código


$consulta = "SELECT id_codigo, codigo FROM codigos WHERE id_area = '$id_area'";
$ejecutar = mysqli_query($conn, $consulta);

if (mysqli_num_rows($ejecutar) > 0) {
    $row = mysqli_fetch_assoc($ejecutar);
    $codigo = $row['codigo'];
} else { 
    $codigo = "00";
}

// Incrementar el último código en 1

// Agregar "001" a la derecha del valor
$codigo_con_ceros = $codigo . "001";

echo $codigo_con_ceros;

?>		