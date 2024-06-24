 
<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
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
        <form id="frmajax2" method="POST">
                <div class="form-group">
                <label for="matricula">Clave Materia</label>
                <input class="form-control" type="text" placeholder="Clave Materia" id="clave" name="clave" required pattern="[0-9]{1,4}">
                <p id="error-clave" style="color: red;"></p>

                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" placeholder="Nombre" name="nombre" id="nombre" required>
                </div>
              
                <div class="text-center">
                    <button  id="btnguardar2" name="btnguardar2" class="btn btn-primary">Guardar</button>
                    <button type="button" id="btnClear2" class="btn btn-secondary">Limpiar</button>
                </div>
            </form>
         
        </div>
    </div>


    <script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar2').click(function(){
			var datos=$('#frmajax2').serialize();
			$.ajax({
				type:"POST",
				url:"materias_handler.php",
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
    document.getElementById('btnClear2').addEventListener('click', function() {
        document.getElementById('frmajax2').reset();
    });
</script>


<script>
    document.getElementById("clave").addEventListener("input", function () {
        const claveInput = this.value.trim();
        const claveLength = claveInput.length;

        if (claveLength > 4) {
            // Mostrar mensaje de error
            document.getElementById("error-clave").textContent = "La clave debe tener máximo 4 dígitos.";
            // Deshabilitar el botón de envío (si tienes uno)
              document.getElementById("btnguardar2").disabled = true;
        } else {
            // Limpiar mensaje de error
            document.getElementById("error-clave").textContent = "";
            // Habilitar el botón de envío (si lo deshabilitaste previamente)
            document.getElementById("btnguardar2").disabled = false;
        }
    });
</script>


</body>
</html>
 