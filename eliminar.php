<?php
if(!empty($_GET)){
			include "conexion.php";
			
			$sql4 = "DELETE FROM asignaciones WHERE id=".$_GET["id"];
			$query4 = $conexion->query($sql4);
			if($query4!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='registros.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='registros.php';</script>";

			}
}
?>