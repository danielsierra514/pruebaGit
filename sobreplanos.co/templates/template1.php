<?php
$idCliente=$_GET["idCliente"];
$tipoMapa=$_GET["tipoMapa"];
$tipoSlider=$_GET["tipoMapa"];
$tipoThumbnail=$_GET["tipoMapa"];
$colorMapa=$_GET["colorMapa"];
$tipoMarcador=$_GET["tipoMarcador"];
$colorInicial=$_GET["colorInicial"];
$colorFinal=$_GET["colorFinal"];
$colorHeader=$_GET["colorHeader"];
$colorFooter=$_GET["colorFooter"];
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Definitivo</title>
		<link rel="stylesheet" type="text/css" href="styles/fullPage.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
		<link rel="stylesheet" href="styles/bootstrap.min.css">
		<link rel='stylesheet' href='styles/template.css' />
		<link rel="shortcut icon" href="archivos/icons/favicon.ico">
		<link rel="shortcut icon" href="styles/navBarStyles.css">

		<script src="scripts/jquery.js"></script>
		<script type="text/javascript" src="scripts/slimscroll.min.js"></script>

		<script type="text/javascript" src="scripts/chroma.js"></script>
		<script type="text/javascript" src="https://jscolor.com/jscolor/jscolor.js"></script>
		<script type="text/javascript" src="scripts/fullPage.js"></script>
		<script type="text/javascript" src="scripts/examples.js"></script>
		<script type="text/javascript" src="scripts/angular.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
		<script src="scripts/bootstrap.js"></script>
		<script src="scripts/tiposMapa.js"></script>
		<script src="scripts/general.js"></script>
		<script src="scripts/mapeo.js"></script>
		<script src="scripts/proyectos.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function() {
				$('#fullpage').fullpage({
					anchors: ['firstPage', 'secondPage', '3rdPage'],
					normalScrollElements: '#listador, #mapaCliente',
					css3: true
				});
				
				establecerFondo();
			});
		</script>
		<script>
			var colorMapa = <?php echo $colorMapa; ?>;
			var tipoMarcador = <?php echo $tipoMarcador; ?>;
			var idCliente = <?php echo $idCliente; ?>;

			$(function() {
				iniciarCliente(function() {
					llamarProyectosCliente(function() {
						setTimeout(function() {
							google.maps.event.trigger(mapaCliente, 'resize');
							centrarCliente();
						}, 2000);
					});
				});

				setTimeout(function() {
					verProyectoX();
				}, 2000);

			});
		</script>
		<style>
			html,
			body {}
			
			.seccion {
				width: 100%;
				height: 100%;
				padding: 0;
			}
			
			.fullHeight {
				height: 100%;
				max-height: 100%;
				overflow-y: auto;
			}
			
			.fullHeightX {
				height: 100%;
				max-height: 100%;
			}
		</style>
		<style>
			.section {
				background-color: none !important;
			}
			
			#header {
				top: 0px;
				text-align: left;
				padding: 0 !important;
				height: 100px !important;
				background-color: <?php echo"#".$colorHeader;
				?>;
			}
			
			#logoEmpresa {
				height: 100%;
				text-align: left
			}
			
			#logoEmpresa img {
				height: 100%;
			}
			
			#footer {
				bottom: 0px;
				background-color: <?php echo"#".$colorFooter;
				?>;
			}
			
			#header,
			#footer {
				position: fixed;
				height: 50px;
				display: block;
				width: 100%;
				z-index: 9;
				text-align: center;
				color: #f2f2f2;
				padding: 20px 0 0 0;
			}
			
			.contenedorMapa {
				margin: auto;
				width: 90%;
				height: 70%;
			}
			
			.section0 .fp-tableCell {
				vertical-align:
			}
			
			.navbar-brand {
				padding: 2px;
			}
			
			.navbar-brand img {
				height: 100%;
			}
		</style>
	</head>

	<body ng-app="listadorProyectos" ng-controller="listador">
		<div id="header">
			<div id="logoEmpresa">
				<img src="https://www.sobreplanos.co/archivos/logos/MRFCIUEUTD.png" alt="">
			</div>
		</div>
		<div id="footer">
			<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
				<div class="container text-right">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" id="colapsar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
						<a class="navbar-brand" href="#"> <b>Powered By</b> <img src="https://www.sobreplanos.co/archivos/images/sobrePlanos.png" id="logoPrincipal"></a>
					</div>
					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
						<ul class="nav navbar-nav" id="lista">
							<li>
								<a href="#" data-toggle="modal" data-target="#modal1">.</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#modal4">.</a>
							</li>
							<li>
								<a href="#" data-toggle="modal" data-target="#modal2">.</a>
							</li>
							<li>
								<a href="" data-toggle="modal" data-target="#modal3">.</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div id="fullpage">
			<div class="section" id="section0">
				<div class="intro">
					<h1>Contenido Principal</h1>
					<p>Acá va toda la informacion de la empresa</p>
				</div>
			</div>
			<div class="section" id="section1">
				<?php require "modules/maps/map".$tipoMapa.".php"; ?>
			</div>
			<div class="section" id="section2">
				<?php require "modules/sliders/slider".$tipoSlider.".php";?>
			</div>
			<div class="section" id="section3">
				<?php require "modules/thumbnails/thumbnail".$tipoThumbnail.".php";?>
			</div>
	</body>
	</html>