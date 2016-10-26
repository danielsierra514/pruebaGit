<script async>
	$(document).delegate("#tablaCompararBody tr", "mouseenter", function() {
		var xFav = $(this).find(".xFav").html();
		var yFav = $(this).find(".yFav").html();
		var posicion = new google.maps.LatLng(xFav, yFav);
		mapaFavoritos.panTo(posicion);
		mapaFavoritos.setZoom(14);
	});

	$(document).delegate("#tablaComparar tr", "mouseleave", function() {
		$(this).removeClass("filaSeleccionada");
	});

	$(document).delegate("#tablaComparar tr", "click", function() {
		var idFav = $(this).find(".idFav").html();
		$("#modalFavoritos").modal("hide");
		verInformacionProyecto(obtenerProyecto(idFav));
	});


	$("#modalFavoritos").modal("hide");


	$(document).ready(function() {

		$('#modalFavoritos').on('shown.bs.modal', function() {
			var map = mapaFavoritos,
				center = map.getCenter();
			google.maps.event.trigger(map, 'resize');
			map.setCenter(center);
		});

		$("#guardarFavoritos").click(function() {

			if (proyectosFavoritos.length > 0) {
				if (logueado === 1) {
					subirFavoritos(crearObjetoFavoritos());
				} else {
					modalActual = "modalLoginFacebook";
					$("#modalFavoritos").modal("hide");
					$("#textoMensaje").html("Para guardar tus favoritos primero debes iniciar sesión con Facebook")
					$("#modalMensaje").modal("show");
				}

			} else {
				modalActual = "modalFavoritos";
				$("#modalFavoritos").modal("hide");
				$("#textoMensaje").html("No tienes ningún proyecto en tu lista de favoritos.")
				$("#modalMensaje").modal("show");
			}
		});

	});
</script>
<style>
	.filaSeleccionada {
		background-color: #c4c0c0;
	}
	
	#mapaFavoritos{
		margin-bottom: 20px;
	}
	
	#tablaCompararBody tr {
		cursor: pointer;
	}
	
	#bloqueCompararProyecto {
		height: auto;
		display: none;
	}
	
	#bloqueCompararProyecto thead tr th:nth-child(1) {
		width: 35%;
	}
	
	#bloqueCompararProyecto thead tr th:nth-child(2) {
		width:65%;
	}
	
	.logoEmpFavoritos {
		height: 100%;
		line-height: 160px !important;
		text-align: center
	}
	
	.imagenProyectoFavoritos {
		width: 100%;
	}
	
	.logoEmpFavoritos img {
		width: 70%;
		margin: auto
	}
	
	#tablaComparar {
		padding-right: 20px;
	}
	
	#tablaComparar ul {
		padding: 0;
		height: auto;
		min-height: auto;
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalFavoritos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">Mis Favoritos</h4>
			</div>
			<div class="modal-body container-fluid">
				<div class='row-fluid'>
					<div class="col-md-6">
						<div id="marker-tooltipX"></div>
						<div id="mapaFavoritos" class="mapa"></div>
					</div>
					<div class="col-md-6">
						<div id="tablaComparar">
							<div id="bloqueErrorFavoritos">
								<p>Aún no tienes Proyectos en tu lista de Favoritos</p>
							</div>
							<div id="bloqueCompararProyecto">
								<div class="borderedAll">
									<div class="tablaHeader borderedTop">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Proyecto</th>
													<th>Valor</th>
													<!--<th class="hidden-xs hidden-sm">Facilidades</th>-->
													<!--<th class="hidden-xs hidden-sm">Constructora</th>-->
												</tr>
											</thead>
										</table>
									</div>
									<div class="tablaBody tabla300 verticalScrolled">
										<table class="table table-bordered" id="tablaCompararBody">
											<thead>
												<tr>
													<th>Proyecto</th>
													<th>Datos</th>
													<!--<th class="hidden-xs hidden-sm">Facilidades</th>-->
													<!--<th class="hidden-xs hidden-sm">Constructora</th>-->
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="guardarFavoritos">Guardar Favoritos</button>
			</div>
		</div>
	</div>
</div>