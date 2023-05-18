<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("location: index.php");
    exit();
}

//echo "Bienvenido " . $_SESSION['nombre_completo'] . "!";

// Resto del código de la página
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style2.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>		
</head>
<body>
<div class="usuario">Usuario: <?php echo $_SESSION['nombre_completo']; ?>!</div>
    <?php require 'partials/header.php' ?>
    
    
    <!--<a href="listar_usuarios_fe.php">Crear nuevo Usuario</a>
    <a href="php/cerrar_sesion_be.php">Cerrar Sesión</a>-->
</body>
</html>