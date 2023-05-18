<?php
    
    include("conexion_be.php");

    $tipo_usuario="Usuario";
    $nombre_completo = $_POST["nombre_completo"];
    $correo = $_POST["correo"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $contrasena = hash('sha512',$contrasena);
    $message = '';

    $query= "INSERT INTO usuarios(id_tipo_usuario,nombre_completo,correo,usuario,contrasena) 
             VALUES('$tipo_usuario','$nombre_completo','$correo','$usuario','$contrasena')";

    $consulta= "SELECT * FROM usuarios WHERE correo='$correo'";
    $verificar_correo = mysqli_query($conn,$consulta);

    if(mysqli_num_rows($verificar_correo)>0){
        $message = 'Este correo ya esta registrado';
        header("Location: ../crear_usuarios_fe.php?message=" . urlencode($message));
        exit();
        mysqli_close($conn);
    }

    $consulta2= "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $verificar_usuario = mysqli_query($conn,$consulta2);

    if(mysqli_num_rows($verificar_usuario)>0){
        $message = 'Este usuario ya esta registrado';
        header("Location: ../crear_usuarios_fe.php?message=" . urlencode($message));
        exit();
        mysqli_close($conn);
    }


    $ejecutar = mysqli_query($conn,$query);

    if($ejecutar)
    {
        $message = 'Usuario creado exitosamente';
        header("Location: ../crear_usuarios_fe.php?message=" . urlencode($message));
    }else{

        $message = 'Intentelo nuevamente';
        header("Location: ../crear_usuarios_fe.php?message=" . urlencode($message));
    }
    mysqli_close($conn);

?>