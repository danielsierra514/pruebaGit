<script>
	
		$(document).ready(function() {
		
		$("#aceptarAgregarAgente").click(function() {
			modalActual="modalAgente";
			if(validarAgente()===0){
    		subirAgente(crearAgente());
			};
		});
			
			$("#guardarCambiosAgente").click(function() {
				modalActual="modalAgente";
			if(validarAgente()==0){
    		actualizarAgente(crearAgente());
			};
		});
			
		$("#regresarCambiosAgente").click(function() {
			$("#modalAgente").modal("hide");
			$("#modalListaAgentes").modal("show");
		});
		
		$("#uploadPersona").change(function() {
			$('#modalAgente').modal('hide');
			$('#modalCropPersona').modal('show');
			readPersona(this);
		});
		
		$("#subirPersona").click(function() {
			$('#uploadPersona').trigger('click');
		});
	});
</script>
<style>
	#fotoGrandePersona {
		margin: auto;
		width: 180px;
		height: 180px;
		-webkit-border-radius: 180px;
		-moz-border-radius: 180px;
		border-radius: 180px;
		background-color: #DFDCED;
		overflow: hidden;
		border:4px solid #8175B6
	}
	
	#fotoGrandePersona img{
		width:100%;
		height:100%;
		background-image: url("archivos/personas/person.jpg");
		background-size: 180px 180px;
		background-repeat: no-repeat;
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalAgente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="textoModalAgente"></h4>
			</div>
			<div class="modal-body container-fluid">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="form-group col-md-12">
							<div id="fotoGrandePersona"><img></div>
							<div id="file">
								<input type="file" id="uploadPersona" class="hide">
							</div>
							<button id="subirPersona" type="button" class="btn btn-success pull-right">Cambiar</button>
						</div>
						<div class="form-group col-md-12 hidden">
							<label class="sr-only" for="idNuevoAgente">idAgente</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">idAgente</div>
								<input id="idNuevoAgente" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="nombresNuevoAgente">Nombres</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Nombres</div>
								<input id="nombresNuevoAgente" type="text" class="form-control" placeholder="">
							</div>							 
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="apellidosNuevoAgente">Apellidos</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Apellidos</div>
								<input id="apellidosNuevoAgente" type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="emailNuevoAgente">Email</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Email<span class="glyphicon glyphicon-asterisk glyphicon-required" aria-hidden="true"></span></div>
								<input id="emailNuevoAgente" type="text" class="form-control campoCrearAgente" placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="telefonoNuevoAgente">Teléfono</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Teléfono</div>
								<input id="telefonoNuevoAgente" type="text" class="form-control" placeholder="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarCambiosAgente" type="button" class="btn btn-default">Regresar</button>
				<button id="guardarCambiosAgente" type="button" class="btn btn-primary">Guardar Cambios</button>
				<button id="aceptarAgregarAgente" type="button" class="btn btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>