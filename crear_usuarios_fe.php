<?php
    include("php/conexion_be.php");
    //$contrasena = hash('sha512',$contrasena);
    
   
    session_start();

    if(!isset($_SESSION['usuario'])){      
        header("location: index.php");
        session_destroy();
        die();
        
    }
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
<div class="usuario">Usuario: <?php echo $_SESSION['nombre_completo']; ?>!</div>;
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    
                </div>
                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Register-->
                    <form action="php/crear_usuarios_be.php"  method="post" class="formulario__register">
                        <h2>Ingresar datos del usuario</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre_completo" required>
                        <input type="text" placeholder="Correo Electronico" name="correo" required>
                        <input type="text" placeholder="Usuario" name="usuario" required>
                        <input type="password" placeholder="Contraseña" name="contrasena" required>   
                            <div class="botonRegistrar">
                                <button>Registrar</button>  
                                <button onclick="history.go(-1)" >Cancelar</button>
                            </div>       
                            <?php if(isset($_GET['message'])): ?>
                                <p class="mensaje2"><?php echo $_GET['message']; ?></p>
                            <?php endif; ?>               
                    </form>
                </div>
            </div>

        </main>

</body>
</html>