
<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
    <script src="jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropdown.js/0.0.2dev/jquery.dropdown.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropdown.js/0.0.2dev/jquery.dropdown.css">

  

    <style>
        .highlighted-container {
            border: 2px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
        }
         
    </style>
    <br><br>
</head>
<body>
   
    <div class="row">
        <div class="col-8 highlighted-container mx-auto"> 
<br>


<div id="tabla"></div>
 
        <form id="frmajax3" method="POST">
              
<br> 
<div class="container">
    <div class="row">
        <div class="col-4" style="margin-left:175px;">
            Seleccionar alumno:
<br>
  <select class="form-select" name="matricula">
  <?php
                    include 'conexion.php';
                    $sql = "SELECT matricula,nombre FROM alumnos";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["matricula"] . '">' . $row["nombre"] . '</option>';
                        }
                    } else {
                        echo '<option>No se encontraron registros.</option>';
                    }

                    // Cierra la conexión
                    $conexion->close();
                    ?>
</select>
        </div>

        
        <div class="col-4" style="margin-left:57px;">
            Seleccionar materia:
            <div class="dropdown">
            
            <select class="form-select" name="clave">
  <?php
                    include 'conexion.php';
                    $sql3 = "SELECT clave, nombre FROM materias";
                    $result3 = $conexion->query($sql3);

                    if ($result3->num_rows > 0) {
                        while ($row = $result3->fetch_assoc()) {
                            echo '<option value="' . $row["clave"] . '">' . $row["nombre"] . '</option>';
                        }
                    } else {
                        echo '<option> No se encontraron registros.</option>';
                    }

                    // Cierra la conexión
                    $conexion->close();
                    ?>
</select>

             
            </div>
        </div>
    </div>
</div>
<br><br>

<div class="text-center">
    <button id="btnguardar3" name="btnguardar3" class="btn btn-primary">Guardar</button>
</div> <br>

</form>
         
        </div>
    </div>
<br><br>


    <script type="text/javascript">
    $(document).ready(function(){
        $('#btnguardar3').click(function(){
            var datos = $('#frmajax3').serialize();
            $.ajax({
                type: "POST",
                url: "asignaciones_handler.php", 
                data: datos,
                success: function(r)
                 {
                    if (r == 1) {
                        alert("Registro agregado con éxito");
                        loadTabla();
                    } else {
                        alert("Error al guardar los datos");
                    }
                }
            });
            return false;
        });  
    });
    </script>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
        function loadTabla() { 
            $('#btnguardar3').modal('hide');
            $.get("tabla.php", "", function (data) {
                $("#tabla").html(data);
            });
        }
 
        $(document).ready(function () {
            loadTabla();
        });

 </script>    


</body>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>