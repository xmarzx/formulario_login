<?php
    include("php/conexion_be.php");
    session_start();

    if(!isset($_SESSION['usuario'])){      
        header("location: index.php");
        session_destroy();
        die();
        
    }
    //echo "Bienvenido " . $_SESSION['nombre_completo'] . "!";
    $consulta= "SELECT row_number() over(order by FichaMantenimiento.id Asc)as 'N°',id,nFicha ,trabajoMant 
    ,tipoMant ,TRUNCATE(costoGenerado,2) as 'costoGenerado'  ,responsable,area,fechaRealizacion 
    ,fechaRecepcion ,date_format(horaRealizacion,'%H:%i:%s')as 'horaRealizacion' ,date_format(horaRecepcion,'%H:%i:%s')as 'horaRecepcion' ,nombre ,descripcion,serie
    ,modelo ,diagnostico,descripcionTrabajo,observaciones ,imagen FROM FichaMantenimiento
    ORDER BY FichaMantenimiento.nFicha";


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
                    <th>ID</th>  
                    <th>N° Ficha</th>  
                    <th>Trabajo Mantenimiento</th>  
                    <th>Tipo de Mantenimiento</th>  
                    <th>Costo Generado</th>  
                    <th>Responsable</th>  
                    <th>Area</th>  
                    <th>Fecha de Realizacion</th>  
                    <th>Fecha de Recepcion</th>  
                    <th>Hora de Realizacion</th>  
                    <th>Hora de Recepcion</th>  
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Serie</th>
                    <th>Modelo</th>
                    <th style="display:none">Diagnostico</th>
                    <th style="display:none">Descripcion de Trabajo</th>
                    <th style="display:none">Observaciones</th>
                    <th style="display:none">Imagen</th>
                    <th></th>
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
            <td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nFicha'] ?></td>
			<td><?php echo $mostrar['trabajoMant'] ?></td>
            <td><?php echo $mostrar['tipoMant'] ?></td>
			<td><?php echo $mostrar['costoGenerado'] ?></td>
            <td><?php echo $mostrar['responsable'] ?></td>
            <td><?php echo $mostrar['area'] ?></td>
            <td><?php echo $mostrar['fechaRealizacion'] ?></td>
            <td><?php echo $mostrar['fechaRecepcion'] ?></td>
            <td><?php echo $mostrar['horaRealizacion'] ?></td>
            <td><?php echo $mostrar['horaRecepcion'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><?php echo $mostrar['serie'] ?></td>
            <td><?php echo $mostrar['modelo'] ?></td>
            <td><img src="data:image/png;base64,<?php echo $mostrar['imagen'] ?>" style="max-width: 100px; max-height: 100px;"></td>
            <td style="display:none"><?php echo $mostrar['diagnostico'] ?></td>
            <td style="display:none"><?php echo $mostrar['descripcionTrabajo'] ?></td>
            <td style="display:none"><?php echo $mostrar['observaciones'] ?></td>

           

            
            <td>
            <a href="mostrar_imagen.php?
            id=<?php echo $mostrar['id'] ?>>&
            imagen=<?php echo $mostrar['imagen']?>
            ">Ver imagen</a>
            </td>


            <td>
                <a href="mostrar_ficha_mantenimiento_fe.php? 
                id=<?php echo $mostrar['id']?>&   
                nFicha=<?php echo $mostrar['nFicha']?>&    
                trabajoMant=<?php echo $mostrar['trabajoMant']?>&
                tipoMant=<?php echo $mostrar['tipoMant']?>&
                costoGenerado=<?php echo $mostrar['costoGenerado']?>&
                responsable=<?php echo $mostrar['responsable']?>&
                area=<?php echo $mostrar['area']?>&     
                fechaRealizacion=<?php echo $mostrar['fechaRealizacion']?>&
                fechaRecepcion=<?php echo $mostrar['fechaRecepcion']?>&
                horaRealizacion=<?php echo $mostrar['horaRealizacion']?>&
                horaRecepcion=<?php echo $mostrar['horaRecepcion']?>&
                nombre=<?php echo $mostrar['nombre']?>&
                descripcion=<?php echo $mostrar['descripcion']?>&
                serie=<?php echo $mostrar['serie']?>&
                modelo=<?php echo $mostrar['modelo']?>&
                diagnostico=<?php echo $mostrar['diagnostico']?>&
                descripcionTrabajo=<?php echo $mostrar['descripcionTrabajo']?>&
                observaciones=<?php echo $mostrar['observaciones']?>&
                imagen=<?php echo $mostrar['imagen']?>
                ">Editar</a>
            </td>
            <td>
            <a href="#" onclick="eliminar(<?php echo $mostrar['id'] ?>)">Eliminar</a>
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