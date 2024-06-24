<?php  
include 'conexion.php'; 
 
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    

	$sql="INSERT INTO materias (clave, nombre)
			 VALUES ('$clave', '$nombre')";
	echo mysqli_query($conexion,$sql);  
?>


 