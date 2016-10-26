<?php
require("archivos/phps/config.php");
$idEmpresa=$_GET["idEmpresa"];
$result = mysql_query("SELECT * FROM empresas WHERE md5(idEmpresa)= '$idEmpresa'");
$row = mysql_fetch_array($result);
$logo=$row["logo"];
mysql_close($conexion);
?>
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
<style>
	#successPass {
		background-image: none;
		background: #e4deef;
		background: -moz-linear-gradient(top, #e4deef 0%, #bfafea 100%);
		background: -webkit-linear-gradient(top, #e4deef 0%, #bfafea 100%);
		background: linear-gradient(to bottom, #e4deef 0%, #bfafea 100%);
		filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#e4deef', endColorstr='#bfafea', GradientType=0);
		border: 1px solid #BFAFEA;
		color:#555555;
	}
	#dangerPass{
		background-image:none;
		background: #f2f2f2;
		background: -moz-linear-gradient(top,  #f2f2f2 0%, #d3d3d3 100%);
		background: -webkit-linear-gradient(top,  #f2f2f2 0%,#d3d3d3 100%);
		background: linear-gradient(to bottom,  #f2f2f2 0%,#d3d3d3 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#d3d3d3',GradientType=0 );
			border: 1px solid #D3D3D3;
		color:#555555
	}
	
	#successPass,#dangerPass {
		display: none;
	}
</style>
		<script>
			var getUrlParameter = function getUrlParameter(sParam) {
				var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					sURLVariables = sPageURL.split('&'),
					sParameterName,
					i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');

					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : sParameterName[1];
					}
				}
			};

			$(document).ready(function() {

				$("#cambiarContrasena").click(function() {
					$('#successPass').hide();
					$('#dangerPass').hide();
					var idEmpresa = getUrlParameter('idEmpresa');
					var pass1 = $("#pass1").val();
					var pass2 = $("#pass2").val();

					if ((pass1 != '') && (pass2 != '')) {
						if (pass1 === pass2) {
							$.ajax({
								url: "archivos/phps/cambiarContrasena.php",
								type: "POST",
								data: {
									password: pass1,
									idEmpresa: idEmpresa
								}
							}).done(function(respuesta) {
								if (respuesta == 1) {
									$('#successPass').html("Felicidades. <br> Tu contraseña ha sido Cambiada con éxito. <br> Ingresando a tu Cuenta...");
									$('#successPass').show();
									setTimeout(
										window.location.replace("http://www.sobreplanos.co"),
										3000
									);
								}
								if (respuesta == 2) {
									$('#dangerPass').html("Lo sentimos pero en este momento no podemos conectarnos con el servidor. Intenta de nuevomàs tarde.");
									$('#dangerPass').show();
								}
							});


						} else {
							$('#dangerPass').html("Las Contraseñas no Coinciden.");
							$('#dangerPass').show();
						}
					} else {
						$('#dangerPass').html("Por favor diligenciar los campos.");
						$('#dangerPass').show();
					}
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
		</style>
	</head>

	<body>

		<!--<div class="container-fluid">
			<div class="row-fluid">
				<img id="imagenPrincipal" src="archivos/images/sobrePlanos.png" class="pull-right">
			</div>
		</div>-->
		<div class="container-fluid">
			<div class="row-fluid text-center">
				<img id="imagenEmpresa" src="archivos/logos/<?php echo $logo?>.png">
			</div>
		</div>
		<br><br>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="center-block col-md-4" style="float: none">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input class="form-control" type="password" placeholder="Contraseña Nueva" id="pass1">
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input class="form-control" type="password" placeholder="Verificar Constraseña" id="pass2">
					</div>
					<br><br>
					<div class="alert alert-success" role="alert" id="successPass"></div>
				<div class="alert alert-danger" role="alert" id="dangerPass"></div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container-fluid">
			<div class="row-fluid text-center">
				<button type="button" class="btn btn-primary btn-lg" id="cambiarContrasena">Cambiar Contraseña</button>
			</div>
		</div>
	</body>

	</html>