<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<script language="Javascript" type="text/javascript" src="archivos/js/jquery.lwtCountdown-1.0.js"></script>
	<script language="Javascript" type="text/javascript" src="archivos/js/misc.js"></script>
	<script>
		jQuery(document).ready(function() {
			$('#countdown_dashboard').countDown({
				targetDate: {
					'day': 1,
					'month': 6,
					'year': 2016,
					'hour': 00,
					'min': 0,
					'sec': 0
				}
			});
		});
	</script>
	<style>
		#contenedorConteo {
			padding-top: 120px;
		}		
		
		@media(max-width:700px) {
			#imagenPrincipal {
				height:120px;
			}
		}
		@media(max-width:600px) {
			#imagenPrincipal {
				height:60px;
			}
		}	
		
	</style>
</head>
<body>
	<div class="container-fluid" id="contenedorConteo">
		<div class="row-fluid text-center">
			<img id="imagenPrincipal" src="archivos/images/sobrePlanos.png">
		</div>
		<div class="row-fluid">
			<div class="col-md-12">
				<!--<h1>Gran Inauguraciòn</h1>-->
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-3"></div>
			<div id="countdown_dashboard" class="col-md-6">
				<h3>Faltan:</h3>
				<div class="dash weeks_dash">
					<span class="dash_title">Semanas</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>
				<div class="dash days_dash">
					<span class="dash_title">Dias</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>
				<div class="dash hours_dash">
					<span class="dash_title">Horas</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>
				<div class="dash minutes_dash">
					<span class="dash_title">Minutos</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>
				<div class="dash seconds_dash">
					<span class="dash_title">Segundos</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid text-center">
			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalLogin">Ingresar</button>
		</div>
	</div>
</body>
<?php
	include 'archivos/includes/modals/modalLogin.php';
include 'archivos/includes/modals/modalLoading.php';
include 'archivos/includes/modals/modalOlvideContrasena.php';
?>
</html>