<?php

 include ('../php/conexion_be.php');
 
 $id_area = $_POST['id_area'];
 
 $consulta = "SELECT id_compartimiento, compartimiento FROM compartimientos WHERE id_area = '$id_area' ORDER BY compartimiento";
 $ejecutar = $conn->query($consulta);
 
 if (mysqli_num_rows($ejecutar) > 0) {
	 while ($row = mysqli_fetch_assoc($ejecutar)) {
		 $html.='<option value="' . $row['id_compartimiento'] . '">' . $row['compartimiento'] . '</option>';
	 }
 }
 echo $html;
?>		





