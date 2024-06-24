<?php  
include 'conexion.php'; 
 
$matricula = $_POST['matricula'];
$clave = $_POST['clave'];

	$sql="INSERT INTO asignaciones (matricula ,clave)
			 VALUES ( '$matricula','$clave')";
	echo mysqli_query($conexion,$sql);  
?>


 