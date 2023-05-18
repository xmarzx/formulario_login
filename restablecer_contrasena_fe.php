<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("location: index.php");
    exit();
}


$id= $_GET['id_usuario'];
$usuario= $_GET['usuario'];
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
        <link rel="stylesheet" href="assets/css/style.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
</head>
<body>

<div class="usuario">Usuario: <?php echo $_SESSION['nombre_completo']; ?>!</div>   
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">            
                    </div>
                    <!--Formulario de Login y registro-->
                    <div class="contenedor__login-register">
                    <!--Register-->
                        <form name="restablecer_contrasena" action="php/restablecer_contrasena_be.php"  method="post" class="formulario__register">
                            <h2>Editar contraseña del usuario <?php echo $usuario?></h2>          
                            <input type="text" placeholder="id" name="id" value="<?=$id?>" style="display:none" required>
                            <input type="password" placeholder="Ingresar Nueva contraseña" id="contrasena" name="contrasena"  required>
                            <input type="password" placeholder="Confirmar contraseña"  id="contrasena_conf" name="contrasena_conf" required>
                            <div class="botonRegistrar">
                                <button type="submit">Modificar</button>                     
                            </div>  
                            <a class="botonRegresar" onclick="history.go(-1) ">Regresar</a>            
                            <span class="mensaje"> Las contraseñas no coinciden</span> 
                    </form>       
                </div>
                
            </div>
        </main>
        
        <script src="assets/js/script2.js"></script>
        



</body>
</html>