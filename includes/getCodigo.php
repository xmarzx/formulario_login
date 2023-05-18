<?php

include ('../php/conexion_be.php');
$id_area = $_POST['id_area'];

// Obtener el último código
$consulta = "SELECT MAX(codigo) As max_codigo FROM datos2 WHERE id_area = '$id_area'";
$ejecutar = mysqli_query($conn, $consulta);

$consulta2 = "SELECT id_codigo, codigo FROM codigos WHERE id_area = '$id_area'";
$ejecutar2 = mysqli_query($conn, $consulta2);


    $row = mysqli_fetch_assoc($ejecutar);
    $max_codigo = $row['max_codigo'];
if (NULL !== $max_codigo) {
    $max_codigo = ++$max_codigo;
    echo $max_codigo;
} else {
    $row2 = mysqli_fetch_assoc($ejecutar2);
    $max_codigo = $row2['codigo'];
    $max_codigo = $max_codigo . "001";
    echo $max_codigo;
}


// Incrementar el último código en 1





mysqli_close($conn);
?>		











