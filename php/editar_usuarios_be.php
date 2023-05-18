<?php
    session_start();
    include("conexion_be.php");
   
    $id = $_POST["id"];
    $id_tipo_usuario = $_POST["id_tipo_usuario"];
    $nombre_completo = $_POST["nombre_completo"];
    $correo = $_POST["correo"];
    $usuario = $_POST["usuario"]; 
    $consulta="UPDATE usuarios SET id_tipo_usuario='$id_tipo_usuario',nombre_completo='$nombre_completo',correo='$correo',usuario='$usuario' where id like $id";
    $ejecutar=mysqli_query($conn,$consulta);
    if(!$ejecutar){
        $message = 'No se pudo actualizar';
        header("Location: ../index.php?message=" . urlencode($message));
    }else{
        echo '
        <script>
            window.location ="../listar_usuarios_fe.php";
        </script>
        ';
        exit;
    }


?>