<?php
$idCliente=$_GET["idCliente"];
$tipoNosotros=$_GET["tipoNosotros"];
$tipoMapa=$_GET["tipoMapa"];
$tipoPorEstado=$_GET["tipoEstado"];
$colorInicial="4984ad";
$colorFinal="000000";
$colorHeader=$_GET["colorHeader"];
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Responsive - fullPage.js</title>
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<script type="text/javascript" src="scripts/angular.min.js"></script>
		<script type="text/javascript" src="scripts/jqueryUI.min.js"></script>
		<script type="text/javascript" src="scripts/slimscroll.min.js"></script>
		<script type="text/javascript" src="scripts/chroma.js"></script>
		<script type="text/javascript" src="scripts/fullPage.js"></script>
		<script type="text/javascript" src="scripts/general.js"></script>
		<script type="text/javascript" src="scripts/bootstrap.js"></script>
		<script type="text/javascript" src="scripts/tiposMapa.js"></script>
		<script type="text/javascript" src="scripts/mapeo.js"></script>
		<script type="text/javascript" src="scripts/proyectos.js"></script>
		<script type="text/javascript" src="scripts/template.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="styles/navBarStyles.css" />
		<link rel="stylesheet" type="text/css" href="styles/fullPage.css" />
		<link rel="stylesheet" type="text/css" href="styles/template.css" />
		<style>
			h1 {
				font-size: 5em;
				font-family: arial, helvetica;
				color: #fff;
				margin: 0;
			}
			
			.section {
				text-align: center;
				padding: 140px 50px 110px 50px !important;
				background-color: #282529;
				margin-top: -1px;
				height:auto
			}
			
			.sectionX {
				text-align: center;
				background-color: #282529;
				padding: 0 !important
			}
			
			@media (max-width: 990px) {
				.section {
					text-align: center;
					padding: 70px 20px 70px 20px !important;
				}
			}
			
			#buscadorMapa {
				margin-top: 20px;
				margin-left: 20px;
				width: 60%;
			}
			
			.subSection {
				width: 100%;
				height: 100%;
				max-height: 100%;
				/*overflow: hidden;*/
				position: relative;
			}
			
			.fp-tableCell {
				display: block;
				vertical-align: none;
				height: 100% !important;
				position: relative;
			}
			
			#footer {
				position: fixed;
				bottom: 0;
				height: 60px;
				display: block;
				width: 100%;
				z-index: 9;
				text-align: center;
				color: #f2f2f2;
				background-color: #222222;
			}
			
			.row-centered {
				text-align: center;
			}
			
			.col-centered {
				display: inline-block;
				float: none;
				text-align: left;
			}
			
			.rounded12 {
				-webkit-border-radius: 12px;
				-moz-border-radius: 12px;
				border-radius: 12px;
			}
			
			.transparent {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=95)";
				filter: alpha(opacity=95);
				-moz-opacity: 0.95;
				-khtml-opacity: 0.95;
				opacity: 0.95;
			}
			
			.carousel-control{
				width:40px;
			}
			.carousel-indicators{
				bottom:0 !important
			}
			.fullWidth{
				width:100%;
			}
			
			#buscadorMapa .input-group-addon{
				background-color: #282529;
				color:white;
			
			}
			.fp-scrollable{
				height:100%;
			}
		</style>
		<script type="text/javascript">
			var colorMapa = 9;
			var tipoMarcador = 2;
			var idCliente = 8;

			$(function() {
				iniciarCliente(function() {
					llamarProyectosCliente(function() {
						setTimeout(function() {
							google.maps.event.trigger(mapaCliente, 'resize');
							centrarCliente();
						}, 2000);
					});
				});
			});

			$(document).ready(function() {

				$('#fullpage').fullpage({
					anchors: ['firstPage', 'secondPage', '3rdPage'],
					navigation: true,
					navigationPosition: 'right',
					navigationTooltips: ['First page', 'Second page', 'Third page'],
					normalScrollElements: '#listador, .listadorThumbnails,.tab-pane',
				});

				establecerFondo();
			});
		</script>
	</head>

	<body ng-app="listadorProyectos" ng-controller="listador">
		<?php	include 'modules/navs/headerPrincipal.php';	?>
			<div id="fullpage">
				<div class="section container-fluid">
					<div class="subSection row-fluid seccionNosotros">
						<?php require "modules/nosotros/nosotros".$tipoNosotros.".php"; ?>
					</div>
				</div>
				<div class="section container-fluid">
					<div class="subSection row-fluid seccionMapa">
						<?php require "modules/maps/map".$tipoMapa.".php"; ?>
					</div>
				</div>
				<div class="section container-fluid">
					<div class="subSection row-fluid seccionPorEstado">
						<?php require "modules/porEstado/porEstado".$tipoPorEstado.".php"; ?>
					</div>
				</div>
				
				<!--<div class="section sectionX container-fluid">
					<div class="subSection row-fluid">
						<?php //require "modules/otros/360.php";?>
					</div>
				</div>-->
			</div>
			<div id="footer">
				<?php include 'modules/navs/footerPrincipal.php';?>
			</div>
		
		<?php include 'modules/modals/modalContactenos.php';?>
	</body>
	</html>