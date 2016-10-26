<script>
	
	var logoEmpresaEdicion;
	
	$(document).ready(function() {

		$("#guardarCambiosEmpresa").click(function(){			
				actualizarEmpresa(crearValoresEmpresa());
		});
		

		$('#configurarAgentes').click(function() {
			$('#modalConfiguracion').modal("hide");
			$('#regresarAgentesProyecto').show();
			$('#vincularAgentesProyecto').hide();
			$('#modalListaAgentes').modal("show");
		});

		$("#uploadLogo2").change(function() {
			$('#modalInfoEmpresa').modal('hide');
			$('#modalCropLogo2').modal('show');
			readLogo2(this);
		});

		$("#subirLogo2").click(function() {
			$('#uploadLogo2').trigger('click');
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
		padding: 14px 11px !important;
		font-size: 12px !important
	}
	
	#espacioNuevoLogo2 {
		overflow: hidden;
		margin-bottom: 20px;
		height: 146px;
		line-height: 146px;
		background-color: #efefef;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		text-align: center;
		
	}
	
	#espacioNuevoLogo2 img {
		margin:auto;
		max-height: 80%;
		max-width:80%;
		margin:6px;
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalInfoEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button id="cerrarConfiguracion" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Información de la Empresa</h4>
			</div>
			<div class="modal-body container-fluid">
				<div class="row-fluid">
					<div class="col-md-6">
						<div class="container-fluid">
							<div class="row-fluid">
								<div id="configuradorLogoEmpresa">
									<h5>Logo:</h5>
									<div id="file">
										<input type="file" id="uploadLogo2" class="hide">
									</div>
									<div class="form-group col-md-12">
										<div id="espacioNuevoLogo2">
										</div>
										<button type="button" class="btn btn-success pull-right" id="subirLogo2">Cambiar</button>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="container-fluid">
							<div class="row-fluid">
								<div id="datosEmpresa">
									<h5>Informaciòn de la Empresa:</h5>
									<div class="form-group col-md-12 hidden">
										<label class="sr-only" for="idEmpresa">Id</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Id</div>
											<input id="idEmpresa" type="text" class="form-control" placeholder="">
										</div>
									</div>
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
										<label class="sr-only" for="ubicacionEmpresa">Ubicaciòn</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Ubicaciòn</div>
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
										<label class="sr-only" for="direccionEmpresa">Direcciòn</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Direcciòn</div>
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
									<div class="form-group col-md-12">
										<label class="sr-only" for="mailContacto">Mail</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Mail</div>
											<input id="mailContacto" type="text" class="form-control campoConfiguracion" placeholder="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<!--<div class="container-fluid hide">
							<div class="row-fluid">
								<div id="datosContacto">
									<h5>Agentes:<button type="button" class="btn btn-primary pull-right" id="configurarAgentes">Configurar</button></h5>
								</div>
							</div>
						</div>
						<hr>-->
					</div>
				</div>
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-default" id="regresarCambiosConfiguracion" data-dismiss="modal">Regresar</button>
				<button type="button" class="btn btn-primary" id="guardarCambiosEmpresa">Guardar Cambios</button>
			</div>
		</div>
	</div>
</div>