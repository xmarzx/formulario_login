<?php
    include("php/conexion_be.php");
    session_start();

    if(!isset($_SESSION['usuario'])){      
        header("location: index.php");
        session_destroy();
        die();
        
    }
    //echo "Bienvenido " . $_SESSION['nombre_completo'] . "!";
    $consulta= "Select row_number() over(order by Datos.id Asc)as 'N°' ,Datos.codigo ,descripcion ,categoria ,area,compartimiento, Usuarios.nombre_completo ,date_format(FechaBaja.fechaBaja,'%d-%m-%Y') as 'Fecha de Baja' From Datos 
    Inner Join FechaBaja On Datos.id=FechaBaja.id_datos Inner Join Usuarios on FechaBaja.id_usuario=Usuarios.id_usuario";


    $ejecutar = mysqli_query($conn,$consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <link rel="stylesheet" href="assets/css/style2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

</head>
<body>
<div class="loader"></div>
<div class="usuario">Usuario: <?php echo $_SESSION['nombre_completo']; ?></div>
<?php require 'partials/header.php' ?>

<main>



    <form action="php/buscar_registro.php" method="post" class="formulario_listar">
        <div class="listado">
            <h2>Listado Completo de Registros dados de Baja</h2>
        </div>
        <div class="enlaces">
            <a href="crear_usuarios_fe.php">Agregar</a>
            <a href="bienvenido.php">Regresar</a>
        </div>
 
    </form>
    <div class="row-table">
        <table class="table-table-striped"id="tablax">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Codigo</th>  
                    <th>Descripción</th>  
                    <th>Categoria</th>  
                    <th>Area</th>  
                    <th>Compartimiento</th>  
                    <th>Nombres</th>  
                    <th>Fecha de Baja</th>                      
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php 


		while($mostrar=mysqli_fetch_array($ejecutar)){
		 ?>

		<tr>
			<td><?php echo $mostrar['N°'] ?></td>
            <td><?php echo $mostrar['codigo'] ?></td>
			<td><?php echo $mostrar['descripcion'] ?></td>
			<td><?php echo $mostrar['categoria'] ?></td>
			<td><?php echo $mostrar['area'] ?></td>
            <td><?php echo $mostrar['compartimiento'] ?></td>
            <td><?php echo $mostrar['nombre_completo'] ?></td>
            <td><?php echo $mostrar['Fecha de Baja'] ?></td>
            
            <td>
                <a href="editar_usuarios_fe.php? 
                codigo=<?php echo $mostrar['codigo']?>&   
                descripcion=<?php echo $mostrar['descripcion']?>&    
                categoria=<?php echo $mostrar['categoria']?>&
                area=<?php echo $mostrar['area']?>&
                compartimiento=<?php echo $mostrar['compartimiento']?>&
                nombre_completo=<?php echo $mostrar['nombre_completo']?>&     
                Fecha de Baja=<?php echo $mostrar['Fecha de Baja']?>           
                ">Editar</a>
            </td>
            <td>
            <a href="#" onclick="eliminar(<?php echo $mostrar['codigo'] ?>)">Eliminar</a>
            <script>
                function eliminar(id) {
                    if (confirm("¿Estás seguro de eliminar este registro?")) {
                    window.location = "php/eliminar_usuarios_be.php?id=" + id;
                }
            }
</script>
            </td>
			
		</tr>
	<?php 
	}
	 ?>

            </tbody>
        </table>
        </main>
    </div>
    <!-- Pantalla de Carga -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
        $(".loader").fadeOut("slow");
        });
    </script>


    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 400,
                lengthMenu: [ [25, 50, -1], [25, 50, "All"] ],
            });
        });
    </script>
</body>
</html>