<style>
	#facilidadesSeleccion thead tr th:nth-child(1) {
		width: 90%;
	}
	
	#facilidadesSeleccion thead tr th:nth-child(2) {
		width: 10%;
	}
</style>
<script>
	$(document).ready(function() {
		
		$("#cerrarFacilidades").click(function(){
			$("#modalSeleccionFacilidades").modal("hide");
			$("#modalCrearProyecto").modal("show");			
		});		
		
		$("#vincularFacilidades").click(function() {
			vincularFacilidadesProyecto();
			$("#modalSeleccionFacilidades").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});

		$("#regresarFacilidadesProyecto").click(function() {
			$("#modalSeleccionFacilidades").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});

		$("#agregarNuevaFacilidad").click(function() {
			nuevaFacilidad=$("#nombreFacilidad").val();
			if ($("#nombreFacilidad").val()) {
				modalActual="modalSeleccionFacilidades";
				iniciarTransferencia("Cargando Información....");
				$.ajax({
					type: "POST",
					url: "archivos/phps/crearFacilidad.php",
					data: {
						info: nuevaFacilidad
					},
					dataType: 'json'
				}).done(function(respuesta) {
						$("#nombreFacilidad").val("");
						llamarFacilidades();
						finalizarTransferencia(respuesta);
				});
		};
	});
	});
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalSeleccionFacilidades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close"  id="cerrarFacilidades"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Selecciona las Facilidades</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row-fluid">
						<div id="facilidadesSeleccion">
							<h5>Facilidades:</h5>
							<div class="tablaHeader borderedTop">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Nombre Completo</th>
											<th>Seleccionar</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tablaBody tabla390 verticalScrolled">
								<table class="table table-striped" id="tablaSeleccionFacilidades">
									<thead>
										<tr>
											<th>Nombre Completo</th>
											<th>Seleccionar</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-warning">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Agregar Nueva
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<div class="form-group col-md-12">
											<label class="sr-only" for="nombreFacilidad">Nombre</label>
											<div class="input-group">
												<div class="input-group-addon input-group-addon-peq">Nombre</div>
												<input id="nombreFacilidad" type="text" class="form-control" placeholder="">
											</div>
										</div>
										<button id="agregarNuevaFacilidad" type="button" class="btn btn-warning pull-right">Agregar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarFacilidadesProyecto" type="button" class="btn btn-default">Regresar</button>
				<button id="vincularFacilidades" type="button" class="btn btn-primary">Vincular Facilidades</button>
			</div>
		</div>
	</div>
</div>