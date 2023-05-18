<?php
    include("conexion_be.php");


    $codigo = $_POST["inp_codigo"];
    $area = $_POST["area"];
    $descripcion = $_POST["descripcion"];
    $compartimiento = $_POST["compartimiento"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $serie = $_POST["serie"];
    $categoria = $_POST["categoria"];
    $fecha_compra = $_POST["fecha_compra"];
    $orden_compra = $_POST["orden_compra"];

    $consulta = "INSERT INTO datos2 ( codigo,id_area, descripcion, compartimiento, marca, modelo, serie, categoria, fechacompra, ordencompra) 
    VALUES ('$codigo','$area', '$descripcion', '$compartimiento', '$marca', '$modelo', '$serie', '$categoria',  '$fecha_compra', '$orden_compra')";

    if(mysqli_query($conn, $consulta)){
        echo "Registro agregado correctamente";
    } else{
        echo "Error al agregar registro: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>