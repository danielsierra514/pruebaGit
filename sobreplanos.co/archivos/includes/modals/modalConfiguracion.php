<script>
	
	$(document).ready(function() {

		$("#despuesCambiosConfiguracion").click(function(){			
			$("#modalConfiguracion").modal("hide");
		});
		
		$("#guardarCambiosConfiguracion").click(function(){
			subirVariableConfiguracion(crearVariableConfiguracion());			
		});		

		/*$('#configurarAgentes').click(function() {
			$('#modalConfiguracion').modal("hide");
			$('#regresarAgentesProyecto').show();
			$('#vincularAgentesProyecto').hide();
			$('#modalListaAgentes').modal("show");
		});

		$('#configurarAcceso').click(function() {
			$('#modalConfiguracion').modal("hide");
			$('#modalAccesoPrincipal').modal("show");
		});*/


		$("#uploadLogo").change(function() {
			$('#modalConfiguracion').modal('hide');
			$('#modalCropLogo').modal('show');
			readLogo(this);
		});

		$("#subirLogo").click(function() {
			$('#uploadLogo').trigger('click');
		});

		$("#seleccionarUbicacion").click(function() {
			$('#modalConfiguracion').modal('hide');
			$('#modalUbicacion').modal('show');
		});

	});
</script>
<style>
	#datosEmpresa .form-control,
	#datosContacto .form-control {
		height: 28px;
		padding: 13px 11px !important;
		font-size: 12px !important
	}
	
	#espacioNuevoLogo {
		overflow: hidden;
		margin-bottom: 20px;
		height: 146px;
		background-color: #efefef;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		text-align: center;
		position:relative;
	}
	
	#espacioNuevoLogo img {
		height: 60%;
		position: absolute;  
    top: 0;  
    bottom: 0;  
    left: 0;  
    right: 0;  
    margin: auto; 
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalConfiguracion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button id="cerrarConfiguracion" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/gear.png" width="30" height="30">   Configuración</h4>
			</div>
			<div class="modal-body container-fluid">
				<div class="row-fluid">
					<div class="col-md-6">
						<div class="container-fluid">
							<div class="row-fluid">
								<div id="configuradorLogoEmpresa">
									<h5>Logo:</h5>
									<div id="file">
										<input type="file" id="uploadLogo" class="hide">
									</div>
									<div class="form-group col-md-12">
										<div id="espacioNuevoLogo">
										</div>
										<button type="button" class="btn btn-success pull-right" id="subirLogo">Cambiar</button>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="container-fluid">
							<div class="row-fluid">
								<div id="datosEmpresa">
									<h5>Información de la Empresa:</h5>
									<div class="form-group col-md-12">
										<label class="sr-only" for="urlEmpresa">Url</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Url</div>
											<input id="urlEmpresa" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="nitEmpresa">Nit</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Nit</div>
											<input id="nitEmpresa" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="ubicacionEmpresa">Ubicación</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Ubicación</div>
											<input id="codigosUbicacionEmpresa" type="text" class="form-control hide" placeholder="">
											<input disabled id="ubicacionEmpresa" type="text" class="form-control" placeholder="">
											<span class="input-group-addon input-group-addon-repeq">
												<a href='#' id="seleccionarUbicacion" data-toggle="tooltip" data-placement="bottom" title="Seleccionar Ubicación" class="red-tooltip">
													<span class="glyphicon glyphicon-screenshot"></span>
												</a>
			 								</span> 
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="direccionEmpresa">Dirección</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Dirección</div>
											<input id="direccionEmpresa" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="telefonoEmpresa">Teléfono</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Teléfono</div>
											<input id="telefonoEmpresa" type="text" class="form-control" placeholder="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="container-fluid">
							<div class="row-fluid">
								<div id="datosContacto">
									<h5>Acceso Principal:   <span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span></h5>
									<div class="form-group col-md-12">
										<label class="sr-only" for="nombresContacto">Nombres</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Nombres</div>
											<input id="nombresContacto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="apellidosContacto">Apellidos</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Apellidos</div>
											<input id="apellidosContacto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="telefonoContacto">Teléfono</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Teléfono</div>
											<input id="telefonoContacto" type="text" class="form-control" placeholder="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-success" id="despuesCambiosConfiguracion">Después</button>
				<button type="button" class="btn btn-default" id="cerrarCambiosConfiguracion" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="guardarCambiosConfiguracion">Guardar</button>
			</div>
		</div>
	</div>
</div>