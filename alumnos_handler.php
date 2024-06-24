
<?php  
include 'conexion.php'; 
 
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $fecha_registro = $_POST['fecha_registro'];

	$sql="INSERT INTO alumnos (matricula, nombre, fecha_registro)
			 VALUES ('$matricula', '$nombre', '$fecha_registro')";
	echo mysqli_query($conexion,$sql);  
?>


