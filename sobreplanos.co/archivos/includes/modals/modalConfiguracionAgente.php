<script>
	$(document).ready(function() {

		/*$("#aceptarAgregarAgente").click(function() {
			modalActual = "modalAgente";
			if (validarAgente() === 0) {
				subirAgente(crearAgente());
			};
		});

		$("#guardarCambiosAgente").click(function() {
			modalActual = "modalAgente";
			if (validarAgente() == 0) {
				actualizarAgente(crearAgente());
			};
		});

		$("#regresarCambiosAgente").click(function() {
			$("#modalAgente").modal("hide");
			$("#modalListaAgentes").modal("show");
		});*/

		$("#despuesCambiosAgente, #guardarCambiosAgente").click(function(){			
			if(validarValoresAgente() == 0) {
				crearValoresAgente();
			}else{
				modalActual="modalConfiguracion";
				$("#modalConfiguracion").modal("hide");
				$("#textoMensaje").html("Debes por lo menos ingresar la Contraseña de Acceso Principal.");
				$("#modalMensaje").modal("show");
			}
		});
		
		$("#uploadPersona").change(function() {
			$('#modalConfiguracion').modal('hide');
			$('#modalCropPersona').modal('show');
			readPersona(this);
		});

		$("#subirPersona").click(function() {
			$('#uploadPersona').trigger('click');
		});

	});
</script>
<style>
	#fotoGrandePersonaX {
		margin: auto;
		width: 180px;
		height: 180px;
		-webkit-border-radius: 180px;
		-moz-border-radius: 180px;
		border-radius: 180px;
		background-color: #DFDCED;
		overflow: hidden;
		border: 4px solid #8175B6
	}
	
	#fotoGrandePersonaX img {
		width: 100%;
		height: 100%;
		background-image: url("archivos/personas/person.jpg");
		background-size: 180px 180px;
		background-repeat: no-repeat;
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalConfiguracion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button id="cerrarConfiguracion" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/gear.png" width="30" height="30">   Configuración</h4>
			</div>
			<div class="modal-body container-fluid">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="form-group col-md-12">
							<div id="fotoGrandePersonaX"><img></div>
							<div id="file">
								<input type="file" id="uploadPersona" class="hide">
							</div>
							<button id="subirPersona" type="button" class="btn btn-primary pull-right">Cambiar</button>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="nombresConfiguracionAgente">Nombres</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Nombres</div>
								<input id="nombresConfiguracionAgente" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="apellidosConfiguracionAgente">Apellidos</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Apellidos</div>
								<input id="apellidosConfiguracionAgente" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="telefonoConfiguracionAgente">Teléfono</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Teléfono</div>
								<input id="telefonoConfiguracionAgente" type="text" class="form-control " placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="emailConfiguracionAgente">Email</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Email<span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span></div>
								<input id="emailConfiguracionAgente" type="text" class="form-control campoConfiguracionAgente" placeholder="">
							</div>
						</div>						
						<div class="form-group col-md-12">
							<label class="sr-only" for="pass1ConfiguracionAgente">Contraseña</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Contraseña<span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span></div>
								<input id="pass1ConfiguracionAgente" type="password" class="form-control campoConfiguracionAgente" placeholder="Contraseña">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="pass2ConfiguracionAgente">Contraseña</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Contraseña<span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span></div>
								<input id="pass2ConfiguracionAgente" type="password" class="form-control campoConfiguracionAgente" placeholder="Verificar Contraseña">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="despuesCambiosAgente" type="button" class="btn btn-danger">En Otro Momento</button>
				<button id="guardarCambiosAgente" type="button" class="btn btn-primary">Guardar Cambios</button>
			</div>
		</div>
	</div>
</div>