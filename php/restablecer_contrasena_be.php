<?php
    session_start();
    include("conexion_be.php");
    
    $id = $_POST["id"];
    $contrasena = $_POST["contrasena"];
    $contrasena_conf = $_POST["contrasena_conf"];
    $contrasena = hash('sha512',$contrasena);
    $consulta="UPDATE usuarios SET contrasena='$contrasena' where id like $id";
    $ejecutar=mysqli_query($conn,$consulta);
 

    if(!$ejecutar){
        //echo "No se pudo actualizar";
        
    }else{

        echo '
        <script>
            window.location ="../listar_usuarios_fe.php";
        </script>
        ';      
        exit;
    }


?>