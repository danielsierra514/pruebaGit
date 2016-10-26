<?php
$idCliente=$_GET["idCliente"];
$tipoNosotros=$_GET["tipoNosotros"];
$tipoMapa=$_GET["tipoMapa"];
$tipoPorEstado=$_GET["tipoEstado"];
$tipoPorTipo=$_GET["tipoTipo"];
$colorInicial="4984ad";
$colorFinal="000000";
$colorHeader=$_GET["colorHeader"];
$colorFooter=$_GET["colorFooter"];
?>
	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
					anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage'],
					scrollOverflow: true,
					 verticalCentered: true,
					 paddingTop: '120px',
        paddingBottom: '120px',
					
				});

				establecerFondo();
			});
		</script>
	</head>
<style>
		#footer {
				position: fixed;
				bottom: 0;
				height: 60px;
				display: block;
				width: 100%;
				z-index: 9;
				text-align: center;
				color: #f2f2f2;
				background-color: <?php echo "#".$colorFooter?>;
			}
		.row-centered {
				text-align: center;
			}
			
			.col-centered {
				display: inline-block;
				float: none;
				text-align: left;
			}
	.seccionNosotros{ 
		height:auto ;
	}
	.fp-slides{
		margin-top: 40px;;
	}
	.fp-tableCell{
		height:auto !important;
		margin-top: 100px;
	}
	.seccionMapa{
		height:350px;
	}
	.carousel-control{
		width:60px;
	}
	h3{
		color:white
	}
		</style>
	<body ng-app="listadorProyectos" ng-controller="listador">
		<?php	include 'modules/navs/headerPrincipal.php';	?>
			<div id="fullpage">
				<div class="section" id="section0">
					<div class="intro">
						<div class="container-fluid seccionNosotros">
							<div class="row-fluid row-centered" >
							<?php require "modules/nosotros/nosotros".$tipoNosotros.".php"; ?>
								</div>
						</div>
					</div>
				</div>
				<div class="section" id="section1">
					<div class="intro">
						<div class="container-fluid seccionMapa">
							<div class="row-fluid row-centered fullHeight" >
							<?php require "modules/maps/map".$tipoMapa.".php"; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="section" id="section2">
					<div class="intro">
						<div class="container-fluid seccionPorEstado">
							<div class="row-fluid row-centered fullHeight" >
							<?php require "modules/porEstado/porEstado".$tipoPorEstado.".php"; ?>
								</div>
						</div>
					</div>
				</div>
				<div class="section" id="section3">
					<div class="intro">
						<div class="container-fluid seccionPorTipo">
							<div class="row-fluid row-centered fullHeight" >
							<?php require "modules/porTipo/porTipo".$tipoPorTipo.".php"; ?>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div id="footer">
				<?php include 'modules/navs/footerPrincipal.php';?>
			</div>
			<?php include 'modules/modals/modalContactenos.php';?>
	</body>

	</html>