<style>
	#foto-carrusel,
	#video-carrusel {
		overflow: hidden;
		margin-bottom: 20px;
		height: 157px;
		background-color: #dfdced;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
	}
	
	#foto-carrusel img,
	#video-carrusel iframe {
		height: 157px;
		padding: 4px;
	}
	
	#atributosProyecto .form-control {
		height: 28px;
		padding: 2px 11px !important;
		font-size: 12px !important
	}
	
	#foto-carrusel .mCSB_dragger_bar,
	#foto-carrusel .mCSB_draggerRail,
	#video-carrusel .mCSB_dragger_bar,
	#video-carrusel .mCSB_draggerRail {
		min-height: 8px !important;
		max-height: 8px !important;
		height: 8px !important;
		margin-top: 1px !important;
	}
	
	#centerMarker {
		position: absolute;
		background-image: url('archivos/icons/marker.png');
		top: 50%;
		left: 50%;
		z-index: 1;
		margin-left: -30px;
		margin-top: -23px;
		height: 47px;
		width: 40px;
		cursor: pointer;
	}
	
	.cajonImagen, .cajonVideo {
		position: relative;
		/*width: 128px;
		height: 90px;*/
	}
	
	.delete {
		z-index: 10000;
		height: 30px !important;
		position: absolute;
		right: 0;
	}
	
	#modalidadesProyecto,
	#agentesProyecto,
	#facilidadesProyecto,
	#imagenesProyecto,
	#videosProyecto {
		height: 250px;
		margin-right: 20px;
	}
	
	#modalidadesProyecto thead tr th:nth-child(1) {
		width: 10%;
	}
	
	#modalidadesProyecto thead tr th:nth-child(2) {
		width: 10%;
	}
	
	#modalidadesProyecto thead tr th:nth-child(3) {
		width: 10%;
	}
	
	#modalidadesProyecto thead tr th:nth-child(4) {
		width: 10%;
	}
	
	#modalidadesProyecto thead tr th:nth-child(5) {
		width: 35%;
	}
	
	#modalidadesProyecto thead tr th:nth-child(6) {
		width: 10%;
	}
	
	#modalidadesProyecto thead tr th:nth-child(7) {
		width: 15%;
	}
	
	#agentesProyecto thead tr th:nth-child(1) {
		width: 20%;
	}
	
	#agentesProyecto thead tr th:nth-child(2) {
		width: 65%;
	}
	
	#agentesProyecto thead tr th:nth-child(3) {
		width: 15%;
	}
	
	#facilidadesProyecto thead tr th:nth-child(1) {
		width: 90%;
	}
	
	#facilidadesProyecto thead tr th:nth-child(2) {
		width: 10%;
	}
	
	#imagenLocalizador {
		width: 100%;
		height: 240px;
		text-align: center;
		cursor: hand;
		cursor: pointer;
	}
	
	#imgLocalizador {
		height: 100%;
		max-width:100%;
	}
	
	#imgLocalizador:hover {
		border: 3px solid #8175B5;
	}
</style>
<script>
	$(document).ready(function() {

		$("#crearNuevoProyecto").click(function() {
			modalActual = "modalCrearProyecto";
			if (validarProyecto() === 0) {
				subirProyecto(crearNuevoProyecto());
			} else {
				$("#modalCrearProyecto").modal("hide");
				$("#textoMensaje").html("Por favor revisa los campos resaltados en rojo.")
				$("#modalMensaje").modal("show");
			};
		});

		$("#guardarCambiosProyecto").click(function() {
			modalActual = "modalCrearProyecto";
			if (validarProyecto() === 0) {
				subirProyecto(crearNuevoProyecto());
			} else {
				$("#modalCrearProyecto").modal("hide");
				$("#textoMensaje").html("Por favor revisa los campos resaltados en rojo.")
				$("#modalMensaje").modal("show");
			};
		});

		$("#foto-carrusel,#video-carrusel").mCustomScrollbar({
			live: "on",
			setLeft: 0,
			axis: "x",
			scrollInertia: 0,
			scrollbarPosition: "outside"
		});

		$('#agregarModalidad').click(function() {
			$('#modalCrearProyecto').modal("hide");
			resetearModalidad();
			$("#tituloModalModalidades").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30' height='30'>   Agrega una Modalidad")
			$("#guardarCambiosModalidad").hide();
			$("#aceptarAgregarModalidad").show();
			$('#modalModalidades').modal("show");
		});

		$('#agregarFacilidad').click(function() {
			$('#modalCrearProyecto').modal("hide");
			$('#modalSeleccionFacilidades').modal("show");
		});

		$('#agregarAgenteProyecto').click(function() {
			$('#modalCrearProyecto').modal("hide");
			$("#vincularAgentesProyecto").show();
			$('#modalSeleccionAgentes').modal("show");
		});

		$("#uploadFoto").change(function() {
			$('#modalCrearProyecto').modal('hide');
			$('#modalCropFoto').modal('show');
			//if(validarArchivoImagen()){
			readFoto(this);
			//}
		});

		$("#subirFoto").click(function() {
			$('#uploadFoto').trigger('click');
		});

		$("#subirFotoLink").click(function() {
			$('#modalCrearProyecto').modal('hide');
			$('#modalImagenLink').modal('show');
		});
		
		$("#subirVideoLink").click(function() {
			$('#modalCrearProyecto').modal('hide');
			$('#modalVideoLink').modal('show');
		});

		$("#imgLocalizador").click(function() {
			$('#modalCrearProyecto').modal('hide');
			$('#modalLocalizarProyecto').modal('show');
			setTimeout(function() {
				center = mapaCuenta.getCenter();
				zoom = mapaCuenta.getZoom();
				google.maps.event.trigger(mapaProyecto, 'resize');
				mapaProyecto.setCenter(center);
				mapaProyecto.setZoom(zoom);
			}, 500);
		});
	});
</script>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalCrearProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="tituloCrearProyecto"></h4>
			</div>
			<div class="modal-body container-fluid">
				<div class="form-group" id="formBuscadorProyecto">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-search"></span>
						</div>
						<input class="form-control" type="email" placeholder="Busca un lugar" id="formBuscadorValProyecto" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés."
							class="blue-tooltip">
					</div>
				</div>
				<div id="file">
					<input type="file" id="uploadFoto" class="hide" accept="image/*">
				</div>
				<div class="container-fluid">
					<div class='row-fluid'>
						<div class="col-md-12">
							<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Localización:   <a href='#' data-toggle="tooltip" data-placement="right" title="Centra el mapa en el lugar donde se encuentra tu proyecto. Puedes usar el asistente de búsqueda o navegar libremente en el mapa utilizando tu mouse." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
							<div id="imagenLocalizador">
								<img id="imgLocalizador" src="archivos/images/noMap.png">
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="container-fluid">
					<div class='row-fluid'>
						<div class="col-md-6">
							<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Nombre:   <a href='#' data-toggle="tooltip" data-placement="right" title="Escribe acá el Nombre de tu Proyecto" class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
							<textarea id="nombreCrearProyecto" class="form-control campoCrearProyecto" rows="1"></textarea>
							<div id="descripcionProyecto">
								<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Descripción:   <a href='#' data-toggle="tooltip" data-placement="right" title="Escribe acá una breve descripción de tu Proyecto." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<textarea id="descripcionCrearProyecto" class="form-control campoCrearProyecto" rows="4"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div id="atributosProyecto">
								<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Datos:   <a href='#' data-toggle="tooltip" data-placement="right" title="Diligencia los datos principales del proyecto." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<div class="row-fluid">
									<div class="form-group col-md-6 hide">
										<label class="sr-only" for="idCrearProyecto">idProyecto</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">idProyecto</div>
											<input id="idCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-6 hide">
										<label class="sr-only" for="latitudCrearProyecto">Latitud</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Latitud</div>
											<input id="latitudCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-6 hide">
										<label class="sr-only" for="longitudCrearProyecto">Longitud</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Longitud</div>
											<input id="longitudCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12 hide">
										<label class="sr-only" for="paisCrearProyecto">Pais</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Pais</div>
											<input id="paisCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12 hide">
										<label class="sr-only" for="departamentoCrearProyecto">Departamento</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Departamento</div>
											<input id="departamentoCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12 hide">
										<label class="sr-only" for="ciudadCrearProyecto">Ciudad</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Ciudad</div>
											<input id="ciudadCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12 hide">
										<label class="sr-only" for="localidadCrearProyecto">Localidad</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Localidad</div>
											<input id="localidadCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12 hide">
										<label class="sr-only" for="barrioCrearProyecto">Barrio</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Barrio</div>
											<input id="barrioCrearProyecto" type="text" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="precioDesdeCrearProyecto">P.  Desde</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">P. Desde</div>
											<input id="precioDesdeCrearProyecto" type="text" class="form-control campoCrearProyecto numeric precio" placeholder="">
											<div class="input-group-addon input-group-addon-repeq">$</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="sr-only" for="areaDesdeCrearProyecto">A. Desde</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">A. Desde</div>
											<input id="areaDesdeCrearProyecto" type="text" class="form-control campoCrearProyecto numeric" placeholder="">
											<div class="input-group-addon input-group-addon-repeq">m<sup>2</sup></div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="sr-only" for="estratoCrearProyecto">Estrato</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Estrato</div>
											<select class="form-control campoCrearProyectox" id="estratoCrearProyecto">
															<option value="x" selected disabled>Seleccione</option>			
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
														</select>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="sr-only" for="tipoCrearProyecto">Tipo</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Tipo</div>
											<select class="form-control campoCrearProyectox" id="tipoCrearProyecto">
															<option value="x" selected disabled>Seleccione</option>					
															<option value="1">Apartamento</option>
															<option value="2">Casa</option>
															<option value="3">VIS</option>
															<option value="4">Oficina</option>
														</select>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="sr-only" for="estadoCrearProyecto">Estado</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Estado</div>
											<select class="form-control campoCrearProyectox" id="estadoCrearProyecto">
															<option value="x" selected disabled>Seleccione</option>					
															<option value="1">Sin Iniciar</option>
															<option value="2">En Construcción</option>
															<option value="3">Finalizado</option>
														</select>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="sr-only" for="urlCrearProyecto">Url</label>
										<div class="input-group">
											<div class="input-group-addon input-group-addon-peq">Url</div>
											<input id="urlCrearProyecto" type="text" class="form-control" placeholder="Opcional">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="container-fluid">
					<div class='row-fluid'>
						<div class="col-md-6">
							<div id="facilidadesProyecto">
								<h5>Facilidades:   <a href='#' data-toggle="tooltip" data-placement="right" title="Incluye todas las características adicionales de tu proyecto." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<div class="tablaHeader borderedTop">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Opciones</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="tablaBody tabla140 verticalScrolled">
									<table class="table table-striped" id="tablaFacilidades">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Opciones</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
								<button type="button" class="btn btn-success pull-right" id="agregarFacilidad">Agregar</button>
							</div>
						</div>
						<div class="col-md-6">
							<div id="modalidadesProyecto">
								<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Modalidades:   <a href='#' data-toggle="tooltip" data-placement="right" title="Incluye todos los tipos o versiones de inmuebles que existan en tu proyecto." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<div class="tablaHeader borderedTop">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Àrea</th>
												<th>Baños</th>
												<th>Habit.</th>
												<th>Parq.</th>
												<th>Precio</th>
												<th>PDF</th>
												<th>Opciones</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="tablaBody tabla140 verticalScrolled">
									<table class="table table-striped" id="tablaModalidades">
										<thead>
											<tr>
												<th>Àrea</th>
												<th>Baños</th>
												<th>Habit.</th>
												<th>Parq.</th>
												<th>Precio</th>
												<th>PDF</th>
												<th>Opciones</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
								<button type="button" class="btn btn-success pull-right" id="agregarModalidad">Agregar</button>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="container-fluid">
					<div class='row-fluid'>
						<div class="col-md-12">
							<div id="imagenesProyecto">
								<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Imagenes:   <a href='#' data-toggle="tooltip" data-placement="right" title="Puedes agregar un máximo de 20 imagenes por proyecto." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<div id='foto-carrusel'>
									<table>
										<tbody>
											<tr></tr>
										</tbody>
									</table>
								</div>
								<div class="pull-right">
									<button type="button" class="btn btn-success pull-rdightdight" id="subirFotoLink">Desde Link</button>
									<button type="button" class="btn btn-success pull-righdt" id="subirFoto">Desde Archivo</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="container-fluid">
					<div class='row-fluid'>
						<div class="col-md-12">
							<div id="videosProyecto">
								<h5><span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span>Videos:   <a href='#' data-toggle="tooltip" data-placement="right" title="Puedes agregar un máximo de 20 videos por proyecto." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<div id='video-carrusel'>
									<table>
										<tbody>
											<tr></tr>
										</tbody>
									</table>
								</div>
								<div class="pull-right">
									<button type="button" class="btn btn-success pull-rdightdight" id="subirVideoLink">Desde Link</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!--<button id="verPublicableProyecto" type="button" class="btn btn-success">Ver Publicable</button>-->
				<button id="guardarCambiosProyecto" type="button" class="btn btn-primary">Guardar Cambios</button>
				<button id="crearNuevoProyecto" type="button" class="btn btn-primary">Crear Proyecto</button>
			</div>
		</div>
	</div>
</div>


<!--<div class="col-md-6 hide">
							<div id="AgentesProyecto">
								<h5>Agentes:   <a href='#' data-toggle="tooltip" data-placement="right" title="Vincula al proyecto a las personas de tu empresa que quieres que se hagan cargo de mantener actualizada su información y recibir las notificaciones de visitas y personas interesadas." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h5>
								<div class="tablaHeader borderedTop">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Foto</th>
												<th>Nombre Completo</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="tablaBody tabla140 verticalScrolled">
									<table class="table table-striped" id="tablaAgentes">
										<thead>
											<tr>
												<th>Foto</th>
												<th>Nombre Completo</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
								<button type="button" class="btn btn-success pull-right" id="agregarAgenteProyecto">Agregar</button>
							</div>
						</div>-->