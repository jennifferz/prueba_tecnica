<?php
include "conexion.php";

$user_id = null;
$sql4 = "SELECT
    `alumnos`.`nombre`,
    `alumnos`.`matricula`,
    `materias`.`nombre` AS `nombre_mt`,
    `materias`.`clave`,
    `alumnos`.`fecha_registro`,
    `asignaciones`.`id`
FROM
    `asignaciones`
INNER JOIN `materias`
    ON (`asignaciones`.`clave` = `materias`.`clave`)
INNER JOIN `alumnos`
    ON (`asignaciones`.`matricula` = `alumnos`.`matricula`)
    ORDER BY  `alumnos`.`fecha_registro` DESC ;";

$result4 = $conexion->query($sql4);

if ($result4->num_rows > 0) :
    $c=0; 
    $c=$c+1;
?>
<table class="table table-bordered table-hover">
    <thead>
        <th>#</th>
        <th>Matrícula</th>
        <th>Nombre Alumno</th>
        <th>Nombre Materia</th>
        <th>Clave Materia</th>
        <th style="text-align: center;">Acciones</th>
    </thead>
    <?php while ($row2 = $result4->fetch_assoc()) : ?>
        <tr>
            <td><?php  echo $c++; ?></td>
            <td><?php echo $row2["matricula"]; ?></td>
            <td><?php echo $row2["nombre"]; ?></td>
            <td><?php echo $row2["nombre_mt"]; ?></td>
            <td><?php echo $row2["clave"]; ?></td>

            <td style="text-align: center">
              <a href="#" id="del-<?php echo $row2["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
              <script>
                    $("#del-"+<?php echo $row2["id"];?>).click(function(e){
                        e.preventDefault();
                        p = confirm("¿Está seguro de esta acción?");
                        if(p){
                            $.get("eliminar.php","id="+<?php echo $row2["id"];?>,function(data){
                                loadTabla();
                            });
                        }

                    });
		    </script>
	</td>
        </tr>
    <?php endwhile; ?>
</table>
<?php else : ?>
    <p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>
