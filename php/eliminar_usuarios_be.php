<?php
    session_start();
    include("conexion_be.php");
   
    if(isset($_GET['id'])){
        $id = $_GET["id"];
        $consulta="DELETE FROM usuarios WHERE id_usuario = $id";
        $ejecutar=mysqli_query($conn,$consulta);
        if(!$ejecutar){
            $message = 'No se pudo eliminar';
            header("Location: ../index.php?message=" . urlencode($message));
        }else{
            echo '
            <script>
                window.location ="../listar_usuarios_fe.php";
            </script>
            ';
            exit; 
        }
    }
?>
