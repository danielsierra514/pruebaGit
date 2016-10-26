<style>
	#agentesSeleccion thead tr th:nth-child(1) {
		width: 15%;
	}
	
	#agentesSeleccion thead tr th:nth-child(2) {
		width: 75%;
	}
	
	#agentesSeleccion thead tr th:nth-child(3) {
		width: 10%;
	}
</style>
<script>
	$(document).ready(function() {
		$("#vincularAgentesProyecto").click(function() {
			vincularAgentesProyecto();
			$("#modalSeleccionAgentes").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});

		$("#regresarAgentesProyecto").click(function() {
			$("#modalSeleccionAgentes").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});
		$("#agregarAgenteLista").click(function() {
			$("#modalSeleccionAgentes").modal("hide");
			$("#aceptarAgregarAgente1").show();
			$("#aceptarAgregarAgente2").hide();
			$("#modalAgente").modal("show");
		});

	});
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalSeleccionAgentes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Selecciona los Agentes</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row-fluid">
						<div id="agentesSeleccion">
							<h5>Agentes:</h5>
							<div class="tablaHeader borderedTop">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Foto</th>
											<th>Nombre Completo</th>
											<th>Seleccionar</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tablaBodyX verticalScrolled">
								<table class="table table-striped" id="tablaSeleccionAgentes">
									<thead>
										<tr>
											<th>Foto</th>
											<th>Nombre Completo</th>
											<th>Seleccionar</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!--<button type="button" class="btn btn-primary pull-right" id="agregarAgenteLista">Agregar</button>-->
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarAgentesProyecto" type="button" class="btn btn-default">Regresar</button>
				<button id="vincularAgentesProyecto" type="button" class="btn btn-primary">Vincular Agentes</button>
			</div>
		</div>
	</div>
</div>