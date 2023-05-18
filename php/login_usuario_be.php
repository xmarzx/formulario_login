<?php
session_start();

include("conexion_be.php");
$correo = $_POST["correo_login"];
$contrasena = $_POST["contrasena_login"];
$contrasena=hash('sha512',$contrasena);
// Consulta para obtener el rol del usuario
$consulta="SELECT id_tipo_usuario FROM usuarios WHERE ((correo='$correo')  or (usuario= '$correo'))AND contrasena='$contrasena'";
$resultado = mysqli_query($conn, $consulta);
$message = '';

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $rol_usuario = $fila['id_tipo_usuario'];

    // Verificar si el usuario tiene el rol de administrador
    if ($rol_usuario == 'Administrador') {
        // El usuario tiene el rol de administrador
        $_SESSION['usuario']= $correo;
        $consulta_nombre = "SELECT nombre_completo FROM usuarios WHERE (correo='$correo')  or (usuario= '$correo') ";
        $resultado_nombre = mysqli_query($conn, $consulta_nombre);
        $fila_nombre = mysqli_fetch_assoc($resultado_nombre);
        $_SESSION['nombre_completo'] = $fila_nombre['nombre_completo'];
        header("location: ../bienvenido.php");
        exit;
    } else {
        $_SESSION['usuario']= $correo;
        $consulta_nombre = "SELECT nombre_completo FROM usuarios WHERE (correo='$correo')  or (usuario= '$correo')";
        $resultado_nombre = mysqli_query($conn, $consulta_nombre);
        $fila_nombre = mysqli_fetch_assoc($resultado_nombre);
        $_SESSION['nombre_completo'] = $fila_nombre['nombre_completo'];
        header("location: ../bienvenido.php"); 
        exit;
             
    }
} else {
    // El usuario no existe
        $message = 'Usuario o contraseña incorrectos';
        header("Location: ../index.php?message=" . urlencode($message));
    exit;
}
// Si llegamos hasta aquí, significa que el inicio de sesión fue exitoso
?>