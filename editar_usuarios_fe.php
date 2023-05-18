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
        <link rel="stylesheet" href="assets/css/style.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
</head>
<body>
<div class="usuario">Usuario: <?php echo $_SESSION['nombre_completo']; ?>!</div>;
<?php
    
    $id= $_GET["id"];
    $id_tipo_usuario = $_GET["id_tipo_usuario"];
    $nombre_completo = $_GET["nombre_completo"];
    $correo = $_GET["correo"];
    $usuario = $_GET["usuario"];

?>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    
                </div>
                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Register-->
                    <form action="php/editar_usuarios_be.php"  method="post" class="formulario__register">
                        <h2>Editar datos del usuario</h2>
                        <input type="text" placeholder="id" name="id" value="<?=$id?>" style="display:none" required>
                        <input type="text" placeholder="tipo_usuario" name="id_tipo_usuario" style="display:none" value="<?=$id_tipo_usuario?>" required >
                        <input type="text" placeholder="Nombre completo" name="nombre_completo" value ="<?=$nombre_completo?>" required>
                        <input type="text" placeholder="Correo Electronico" name="correo" value="<?=$correo?>"  required>
                        <input type="text" placeholder="Usuario" name="usuario" value="<?=$usuario?>" required>
                         
                            <div class="botonRegistrar">
                                <button>Modificar</button> 
                                       
                            </div>  
                            <a class="botonRegresar" onclick="history.go(-1)">Regresar</a> 
                                         
                    </form>
                  
                </div>
            </div>

        </main>

</body>
</html>