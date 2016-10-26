<?php
session_start();
if(!isset($_SESSION['admin'])){ //if login in session is not set
	header("Location: http://www.sobreplanos.co/admin");
}
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <link rel="stylesheet" href="archivos/css/bootstrap.min.css">
    <link rel="stylesheet" href="archivos/css/bootstrap-theme.min.css">
    <link rel='stylesheet' href='archivos/font-awesome/css/font-awesome.css' />
    <link rel='stylesheet' href='archivos/css/styles.css' />
    <link rel='stylesheet' href='archivos/css/navBarStyles.css' />
    <link rel='stylesheet' href='archivos/social/bootstrap-social.css' />
    <link rel="stylesheet" href="archivos/css/jquery.horizontal.scroll.css" />
    <link rel="shortcut icon" href="archivos/icons/favicon.ico">
    <link rel="stylesheet" href="archivos/css/jquery.Jcrop.css">
		<link rel="stylesheet" href="archivos/css/ajustes.css">
    <script src="archivos/js/jquery.js"></script>
    <script src="archivos/js/cropping.js"></script>
    <script src="archivos/js/angular.min.js"></script>
    <script src="archivos/js/bootstrap.min.js"></script>
    <script src="archivos/js/jquery.horizontal.scroll.js"></script>
    <script src="archivos/js/jquery.Jcrop.js"></script>
    <script src="archivos/js/general.js"></script>
    <script src="archivos/js/price.js"></script>
    <script src="archivos/js/admin.js"></script>
    <script type="text/javascript">
			$(document).ready(function() {

			llamarEmpresas();				

			});
    </script>
    <style>
			#listaEmpresas {
				height: 100%;
				width: 100%;
				position:relative;
			}
			.thumbnailImg{
				width:90%;
				height:60px;
				margin:auto;
			}
			.thumbnailImg img{
				max-height:100%;
				max-width:100%;
				
			}
    </style>
  </head>

  <body>
<?php
include 'archivos/includes/navs/headerAdmin.php';	
?>
<?php
include 'archivos/includes/content/listaEmpresasAdmin.php';	
?>
<?php
include 'archivos/includes/navs/footerAdmin.php';	
?>

<?php
include 'archivos/includes/modals/modalFelicitaciones.php';
//include 'archivos/includes/modals/modalInfoEmpresa.php';
include 'archivos/includes/modals/modalUbicacion.php';
include 'archivos/includes/modals/modalCropLogo.php';	
//include 'archivos/includes/modals/modalCropLogo2.php';	
include 'archivos/includes/modals/modalCrearEmpresa.php';
include 'archivos/includes/modals/modalLoading.php';
		include 'archivos/includes/modals/modalMensaje.php';	
?>
  </body>

  </html>