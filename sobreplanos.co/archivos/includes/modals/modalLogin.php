<script async>
	$(document).ready(function() {

		$("#olvideContrasena").click(function(){
			$("#modalLogin").modal("hide");
			$("#modalOlvideContrasena").modal("show");
		});
		

		$("#loguearEmpresa").click(function() {
			$('#successLogin').hide();
			$('#dangerLogin').hide();
			password = $("#password").val();
			email = $("#email").val();

			if ((password != '') && (email != '')) {
				$.ajax({
					url: "archivos/phps/loginEmpresa.php",
					type: "POST",
					data: {
						email: email,
						password: password
					}
				}).done(function(respuesta) {
					if (respuesta == "empresa") {
						$('#successLogin').html("Ingresando.");
						$('#successLogin').show();
						setTimeout(
							window.location.replace("http://www.sobreplanos.co/cuenta.php"),
							3000
						);
					}
					if (respuesta == "agente") {
						$('#successLogin').html("Ingresando.");
						$('#successLogin').show();
						setTimeout(
							window.location.replace("http://www.sobreplanos.co/agente.php"),
							3000
						);
					}
					if (respuesta == "ninguno") {
						$('#dangerLogin').html("Lo sentimos pero no encontramos una cuenta con esa información.");
						$('#dangerLogin').show();
					}
					if (respuesta == "problema") {
						$('#dangerLogin').html("Lo sentimos pero en este momento no podemos conectarnos con el servidor. Intenta de nuevo más tarde.");
						$('#dangerLogin').show();
					}
				});
			} else {
				$('#dangerLogin').html("Debes llenar los campos.");
				$('#dangerLogin').show();
			}
		});

	});
</script>
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
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title " id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Ingresa a tu cuenta</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="input-group col-lg-12">
						<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
						<input class="form-control" type="email" placeholder="Email" id="email" name="emailLogin" autocomplete="on">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group col-lg-12">
						<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
						<input class="form-control" type="password" placeholder="Password" id="password" name="passwordLogin" autocomplete="on">
					</div>
				</div>
				<div class="alert alert-success" role="alert" id="successLogin"></div>
				<div class="alert alert-danger" role="alert" id="dangerLogin"></div>
				<button type="button" id="olvideContrasena" class="btn btn-link center-block">Olvide mi contraseña.</button>
				<br><br>
				<!--<div class="panel-collapse collapse" id="retrievepass">
					Para reestablecer tu contraseña, ingresa tu correo electrónico y te enviaremos un vínculo de reestablecimiento.<br>Gracias!!!
					<br><br>
					<div class="form-group">
						<div class="input-group col-lg-12">
							<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
							<input class="form-control" type="email" placeholder="Email" id="email-logueo-empresa">
						</div>
					</div>
					<button type="button" class="btn btn-primary center-block" id="reestablecerContrasena">Reestablecer mi Contraseña</button>
				</div>-->
				<p>Recuerda que este login es únicamente para las empresas que ya tienen una cuenta con nosotros.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="loguearEmpresa">Log in</button>
			</div>
		</div>
	</div>
</div>