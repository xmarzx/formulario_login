<?php
    include("php/conexion_be.php");
    session_start();

    if(!isset($_SESSION['usuario'])){      
        header("location: index.php");
        session_destroy();
        die();
        
    }
    //echo "Bienvenido " . $_SESSION['nombre_completo'] . "!";

    $consulta = "SELECT id_area, area FROM areas ORDER BY area";
	$ejecutar = mysqli_query($conn,$consulta);

    $consulta2= "SELECT distinct descripcion FROM datos";
    $ejecutar2 = mysqli_query($conn,$consulta2);

    $consulta3="SELECT * FROM datos2";
	$ejecutar3 = mysqli_query($conn,$consulta3);
	$array = array();
	if($ejecutar3){
		while ($row = mysqli_fetch_array($ejecutar3)) {
			$descripcion = utf8_encode($row['descripcion']);
			array_push($array, $descripcion); 
		}
	}

    $consulta4= "SELECT distinct marca FROM datos";
    $ejecutar4 = mysqli_query($conn,$consulta4);

    $consulta5= "SELECT distinct categoria FROM categorias";
    $ejecutar5 = mysqli_query($conn,$consulta5);


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
        <link rel="stylesheet" href="assets/css/style2.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
        <script type="text/javascript" src="assets/js/jquery-1.12.1.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="assets/js/jquery-ui.css">
	    <script type="text/javascript" src="assets/js/jquery-ui.js"></script> 
    </head>
<body>
    <div class="usuario">Usuario: <?php echo $_SESSION['nombre_completo'] ?></div>
    <main>
        <form action="php/agregar_registros_be.php"  method="post" class="formulario_agregar_registros" >
            <div class="form-group2">
                <label for="codigo">Codigo:</label>
                <div class="input-group2">     
                    <input type="text" id="inp_codigo" name="inp_codigo" placeholder="Codigo" maxlength="5" >
                </div>
            </div>
            <div class="form-group2">
                <label for="area">area:</label>
                <div class="input-group2">
                <select name="cbx_area" id="cbx_area">
                <option value="">Seleccionar Area</option>
                    <?php
                        if (mysqli_num_rows($ejecutar) > 0) {
                            while ($row = mysqli_fetch_assoc($ejecutar)) {
                                echo '<option value="' . $row['id_area'] . '">' . $row['area'] . '</option>';
                            }
                        }
                    ?>
                    
                </select>
                </div>
            </div>
            
            <div class="form-group2">
                <label for="descripcion">descripcion:</label>
                <div class="input-group2">
                    <input type="text" id="descripcion" name="descripcion">
                    <div class="descripcion_lista" id="descripcionLista"></div>
                </div>
            </div>

            <div class="form-group2">
                <label for="cbx_compartimiento">compartimiento:</label>
                <div class="input-group2">
                    <select name="cbx_compartimiento" id="cbx_compartimiento">
                    <option value="">Seleccionar Compartimiento</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="marca">Marca:</label>
                <div class="input-group">
                    <input type="checkbox" id="marca-check" name="marca-check">
                    <select id="marca_select" name="marca_select">
                    <?php
                        if (mysqli_num_rows($ejecutar4) > 0) {
                            while ($row = mysqli_fetch_assoc($ejecutar4)) {
                                echo '<option value="' . $row['id'] . '">' . $row['marca'] . '</option>';
                            }
                        }
                    ?>
                    <option value="generico">Generico</option>
                    
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <div class="input-group">
                    <input type="checkbox" id="modelo-check" name="modelo-check">
                    <input type="text" id="modelo" name="modelo" placeholder="modelo">
                </div>
            </div>

            <div class="form-group">
                <label for="serie">N° Serie:</label>
                <div class="input-group">
                    <input type="checkbox" id="serie-check" name="serie-check">
                    <input type="text" id="serie" name="serie" placeholder="serie">
                </div>
            </div>

            <div class="form-group2">
                <label for="categoria">Categoria:</label>
                <div class="input-group2">
                    <select name="cbx_categoria" id="cbx_categoria">
                    <?php
                        if (mysqli_num_rows($ejecutar5) > 0) {
                            while ($row = mysqli_fetch_assoc($ejecutar5)) {
                                echo '<option value="' . $row['id'] . '">' . $row['categoria'] . '</option>';
                            }
                        }
                    ?>
                    <?php
                        mysqli_close($conn);
                    ?>
                    </select>
                </div>
            </div>

            <div class="form-group2">
                <label for="estado">Estado:</label>
                <div class="input-group2">
                    <select id="estado_select" name="estado_select">
                        <option>Operativo</option>
                        <option>Inoperativo</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="fecha_compra">Fecha de Compra:</label>
                <div class="input-group">
                    <input type="checkbox" id="fecha_compra-check" name="fecha_compra-check">
                    <div class="fecha_compra">
                        <input type="date" id="fecha_compra" name="fecha_compra">
                    </div>
                    
                </div>
            </div>

            <div class="form-group2">
                <label for="orden_compra">Orden de Compra:</label>
                <div class="input-group2">
                <input type="text" id="orden_compra" name="orden_compra" placeholder="Orden de Compra">
                </div>
            </div>
                        
                        <!--Para que pueda funcionar tengo el metodo de JS-->
                        <!--Para que pueda funcionar puedo insertar un select debajo de un text el cual al momento que vaya 
                        escribiendo se habilite Y busque los valores-->


            <div class="botones_agregar_regitros">
            <button type="submit">Enviar</button>
            <button type="submit">Cancelar</button>

            </div>
  
            
</form>
        </main>   
         <script>
            $(document).ready(function() {
            $('#descripcion').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                $.ajax({
                    url: 'includes/getDescripcion.php',
                    method: 'POST',
                    data: {query:query},
                    success: function(data) {
                    $('#descripcionLista').fadeIn();
                    $('#descripcionLista').html('<ul>'+data+'</ul>');
                    $('#descripcionLista li').on('click', function() {
                    var value = $(this).attr('value');
                    $('#descripcion').val(value);
                    $('#descripcionLista').fadeOut();
                    });
                    }
                });
                }
            });
            });
         </script>               





        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_area").change(function () {
		            $("#cbx_area option:selected").each(function () {
			            id_area = $(this).val();
			            $.post("includes/getCompartimiento.php", { id_area: id_area }, function(data){
				        $("#cbx_compartimiento").html(data);     
			            })
			            
		            });
	            })
			});		

		</script>
            <script language="javascript">
                $(document).ready(function() {
                $("#cbx_area").change(function() {
                    if ($(this).val() == "") { // Si se selecciona "Seleccionar Area"
                        $("#inp_codigo").val(""); // Establece el campo input a vacío
                        
                    } else { // Si se selecciona otra opción
                        var id_area = $(this).val();
                        $.post("includes/getCodigo.php", { id_area: id_area }, function(data){
                            $('#inp_codigo').val(data);
                        });
                    }
                });
            });
            </script>

                
        <script>
            var marcaCheck = document.getElementById('marca-check');
            var marcaSelect = document.getElementById('marca_select');

            // Deshabilitar el select y seleccionar la opción "Generico" al cargar la página
            marcaSelect.disabled = true;
            marcaSelect.value = 'generico';

            // Agregar un listener al checkbox
            marcaCheck.addEventListener('change', function() {
            if (marcaCheck.checked) {
                // Si el checkbox está marcado, habilitar el select y limpiar el valor seleccionado
                marcaSelect.disabled = false;
                marcaSelect.selectedIndex = 0;
            } else {
                // Si el checkbox está desmarcado, deshabilitar el select y seleccionar la opción "Generico"
                marcaSelect.disabled = true;
                marcaSelect.value = 'generico';
            }
            });
        </script>

        <script>
            var checkbox = document.getElementById('modelo-check');
            var inputModelo = document.getElementById('modelo');

            // establecer valor inicial y deshabilitar input
            inputModelo.value = 'Generico';
            inputModelo.disabled = true;

            // agregar un event listener al checkbox para habilitar/deshabilitar el input
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    inputModelo.disabled = false;
                    inputModelo.value = '';
                } else {
                    inputModelo.disabled = true;
                    inputModelo.value = 'Generico';
                }
            });
        </script>

        <script>
            var seriebox = document.getElementById('serie-check');
            var inputSerie = document.getElementById('serie');

            // establecer valor inicial y deshabilitar input
            inputSerie.value = 'Generico';
            inputSerie.disabled = true;

            // agregar un event listener al seriebox para habilitar/deshabilitar el input
            seriebox.addEventListener('change', function() {
                if (this.checked) {
                    inputSerie.disabled = false;
                    inputSerie.value = '';
                } else {
                    inputSerie.disabled = true;
                    inputSerie.value = 'Generico';
                }
            });
        </script>

        <script>
        $(document).ready(function() {
        // Deshabilitar los inputs al cargar la página
        $('#fecha_compra, #orden_compra').prop('disabled', true);

        // Detectar cambios en el checkbox
        $('#fecha_compra-check').change(function() {
            if ($(this).is(':checked')) {
            // Habilitar los inputs si el checkbox está marcado
            $('#fecha_compra, #orden_compra').prop('disabled', false);
            } else {
            // Deshabilitar los inputs si el checkbox no está marcado
            $('#fecha_compra, #orden_compra').prop('disabled', true);
            // Establecer el valor del input date en blanco
            $('#fecha_compra').val('');
            }
        });
        });
</script>

        

</body>
</html>