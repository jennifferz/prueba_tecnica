<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
  <script src="jquery-3.2.1.min.js"></script>

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
        <div class="col-4 highlighted-container mx-auto"> 
            <br>
        <form id="frmajax" method="POST">
                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input class="form-control" type="text" placeholder="Matrícula"id="matricula" name="matricula" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" placeholder="Nombre" name="nombre" id="nombre" required>
                </div>
                <div class="form-group">
                    <label for="fechaRegistro">Fecha de registro</label>
                    <input type="date" class="form-control fecha" id="fechaRegistro" name="fecha_registro" 
                    id="fecha_registro" required style="width:70%;">
                </div>
                <div class="text-center">
                    <button  id="btnguardar" name="btnguardar" class="btn btn-primary">Guardar</button>
                    <button type="button" id="btnClear" class="btn btn-secondary">Limpiar</button>
                </div>
            </form>
         
        </div>
    </div>


    <script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(){
			var datos=$('#frmajax').serialize();
			$.ajax({
				type:"POST",
				url:"alumnos_handler.php",
				data:datos,
				success:function(r){
					if(r==1){
						alert("Registro agregado con exito");
					}else{
						alert("Error al guardar los datos");
					}
				}
			});

			return false;
 
		});
	});
</script>


<script>
    document.getElementById('btnClear').addEventListener('click', function() {
        document.getElementById('frmajax').reset();
    });
</script>


</body>
</html>

  