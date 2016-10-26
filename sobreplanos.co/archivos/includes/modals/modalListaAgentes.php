<style>
	#agentesEmpresa{
		margin-right:20px;
	}
	
	#agentesEmpresa thead tr th:nth-child(1) {
		width: 10%;
	}
	
	#agentesEmpresa thead tr th:nth-child(2) {
		width: 30%;
	}
	
	#agentesEmpresa thead tr th:nth-child(3) {
		width: 30%;
	}
	
	#agentesEmpresa thead tr th:nth-child(4) {
		width: 15%;
	}
	
	#agentesEmpresa thead tr th:nth-child(5) {
		width: 15%;
	}
</style>
<script>
	

	$(document).ready(function() {

		$("#agregarAgenteConfiguracion").click(function() {
			$("#modalListaAgentes").modal("hide");
			$("#regresarCambiosAgente").show();
			$("#guardarCambiosAgente").hide();
			$("#aceptarAgregarAgente").show();
			resetearCrearAgente();
			$("#textoModalAgente").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30' height='30'>   Agrega un Agente");
			$("#modalAgente").modal("show");
		});
		
		$("#regresarListaAgentes").click(function() {
			$("#modalListaAgentes").modal("hide");
			$("#aceptarAgregarAgente2").show();
			$("#aceptarAgregarAgente1").hide();
		});

	});
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalListaAgentes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Lista de Agentes <a href='#' data-toggle="tooltip" data-placement="right" title="Los Agentes son personas que puedes vincular a tu cuenta para que posteriormente puedas relacionarlos con los Proyectos para que mantengan actualizada la información y reciban notificaciones de visitas." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row-fluid">
						<div id="agentesEmpresa">
							<h5>Agentes:</h5>
							<div class="tablaHeader borderedTop">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Foto</th>
											<th>Nombre Completo</th>
											<th>Email</th>
											<th>Telefono</th>
											<th></th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tablaBody verticalScrolled">
								<table class="table table-striped" id="tablaPrincipalAgentes">
									<thead>
										<tr>
											<th>Foto</th>
											<th>Nombre Completo</th>
											<th>Email</th>
											<th>Telefono</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
							<button type="button" class="btn btn-primary pull-right" id="agregarAgenteConfiguracion">Agregar</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarListaAgentes" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>