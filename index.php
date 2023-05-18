<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("location: bienvenido.php");
    exit();
}

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
     <main>

            <div class="contenedor__todo">
                <div class="caja__trasera"></div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_usuario_be.php" method="post" class="formulario__login" id="form_login">
                        <h3>Bienvenido a ******** SAC</h3>
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Ingresar correo o Usuario" name="correo_login" id="usuario" required>
                        <input type="password" placeholder="Contraseña" name="contrasena_login" id="contrasena"required>
                        <div class="botonEntrar">
                            <button>Entrar</button>
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
