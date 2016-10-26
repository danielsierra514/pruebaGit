	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="archivos/css/bootstrap.min.css">
		<link rel="stylesheet" href="archivos/css/bootstrap-theme.min.css">
		<link rel="shortcut icon" href="archivos/icons/favicon.ico">
		<link rel="Stylesheet" type="text/css" href="archivos/css/dark.css"></link>
		<link rel="Stylesheet" type="text/css" href="archivos/css/styles.css"></link>
		<script src="archivos/js/jquery.js"></script>
		<script src="archivos/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function() {
        
        $("#aPrincipal").click(function(){
          document.location.href="http://www.sobreplanos.co";          
        });

			});
		</script>
		<style>
			#contenedor {
				padding-top: 120px;
			}
			
			#imagenPrincipal {
				height: 80px;
			}
			
			@media(max-width:700px) {
				#imagenPrincipal {
					height: 80px;
				}
			}
			
			@media(max-width:600px) {
				#imagenPrincipal {
					height: 40px;
				}
			}
			
			#imagenPrincipal img {
				max-width: 100%;
				max-height: 100%;
			}
      .parrafoError{
        font-size:28px;
        color:#dbd9d9;
      }
		</style>
	</head>

	<body>
    <br>
    <br>
    <br>
		<div class="container-fluid">
			<div class="row-fluid">
				<img id="imagenPrincipal" src="archivos/images/sobrePlanos.png" class="center-block">
			</div>
		</div>
    <br>
    <br>
    <br>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="center-block col-md-6" style="float: none">
					<p class="parrafoError">
            Lo sentimos Pero la página que buscas no existe.
          </p>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container-fluid">
			<div class="row-fluid text-center">
				<button type="button" class="btn btn-primary btn-lg" id="aPrincipal">Regresar</button>
			</div>
		</div>
	</body>
	</html>