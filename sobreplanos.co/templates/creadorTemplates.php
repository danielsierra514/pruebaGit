<!DOCTYPE html>
<html>
<head>
	<title>Definitivo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/colorPicker.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="scripts/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="scripts/angular.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
	<link rel='stylesheet' href='font-awesome/css/font-awesome.min.css' />
	<script src="scripts/bootstrap.js"></script>
	<script src="scripts/tiposMapa.js"></script>
	<script src="scripts/colorPicker.js"></script>
</head>
<style>
	.col-centered {
		display: inline-block;
		float: none;
		text-align: left;
		margin-right: -4px;
	}
	.row-centered {
		text-align: center;
	}
	/**********/	
	.iconOk {
		color: #94dd16;
		display: none;
		font-size: 24px;
		margin: 4px 4px
	}
	.iconDelete {
		color: #f11712;
		font-size: 18px;
		margin: 2px;

	}
	.iconCog {
		color: #463E3E;
		font-size: 18px;
		margin: 2px;

	}
</style>
	<script>
	var colorHeader;
	var colorFooter;
	var colorInicial;
	var colorFinal;
	
	</script>
<body>
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalConfiguradorTemplate">Launch</button>

	<?php 
	include 'modules/modals/modalConfiguradorTemplate.php';
  include 'modules/modals/modalConfiguradorSecciones.php';
  include 'modules/modals/modalSelectorColores.php';
  include 'modules/modals/modalSelectorColor.php';
	include 'modules/modals/modalConfiguradorMapa.php';
  ?>
	</body>

</html>