	<!DOCTYPE html>
	<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../archivos/css/bootstrap.min.css">
		<link rel="stylesheet" href="../archivos/css/bootstrap-theme.min.css">
		<link rel="shortcut icon" href="../archivos/icons/favicon.ico">
		<link rel="Stylesheet" type="text/css" href="../archivos/css/dark.css"></link>
		<link rel="Stylesheet" type="text/css" href="../archivos/css/styles.css"></link>
		<script src="../archivos/js/jquery.js"></script>
		<script src="../archivos/js/bootstrap.min.js"></script>
<style>
	#successLogin {
		background-image: none;
		background: #e4deef;
		background: -moz-linear-gradient(top, #e4deef 0%, #bfafea 100%);
		background: -webkit-linear-gradient(top, #e4deef 0%, #bfafea 100%);
		background: linear-gradient(to bottom, #e4deef 0%, #bfafea 100%);
		filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#e4deef', endColorstr='#bfafea', GradientType=0);
		border: 1px solid #BFAFEA;
		color:#555555;
	}
	#dangerLogin{
		background-image:none;
		background: #f2f2f2;
		background: -moz-linear-gradient(top,  #f2f2f2 0%, #d3d3d3 100%);
		background: -webkit-linear-gradient(top,  #f2f2f2 0%,#d3d3d3 100%);
		background: linear-gradient(to bottom,  #f2f2f2 0%,#d3d3d3 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#d3d3d3',GradientType=0 );
			border: 1px solid #D3D3D3;
		color:#555555
	}
	
	#successLogin,#dangerLogin {
		display: none;
	}
</style>
		<script>
			$(document).ready(function() {

				$("#loginAdmin").click(function() {
					$('#successPass').hide();
					$('#dangerLogin').hide();
					var pass = $("#pass").val();
          var user = $("#user").val();
							$.ajax({
								url: "../archivos/phps/loginAdmin.php",
								type: "POST",
								data: {
									pass: pass,
									user: user
								}
							}).done(function(respuesta) {
								if (respuesta == 1) {
									$('#successLogin').html("Ingresando");
									$('#successLogin').show();
									setTimeout(
										window.location.replace("http://www.sobreplanos.co/admin.php"),
										3000
									);
								}
								if (respuesta == 2) {
									$('#dangerLogin').html("Las Credenciales no son válidas");
									$('#dangerLogin').show();
								}
							});
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
        <br>
    <br>
    <br>
		<div class="container-fluid">
			<div class="row-fluid">
				<a href="http://www.sobreplanos.co"><img id="imagenPrincipal" src="../archivos/images/sobrePlanos.png" class="center-block"></a>
			</div>
		</div>
    <br>
    <br>
    <br>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="center-block col-md-4" style="float: none">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
						<input class="form-control" type="text" placeholder="Usuario" id="user">
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input class="form-control" type="password" placeholder="Password" id="pass">
					</div>
					<br><br>
					<div class="alert alert-success" role="alert" id="successLogin"></div>
				<div class="alert alert-danger" role="alert" id="dangerLogin"></div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container-fluid">
			<div class="row-fluid text-center">
				<button type="button" class="btn btn-primary btn-lg" id="loginAdmin">Ingresar</button>
			</div>
		</div>
	</body>
	</html>