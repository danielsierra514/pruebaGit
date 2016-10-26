<script>
	$(document).ready(function() {
		
		$("#siguienteCrearContraseña").click(function(){			
			if(validarValoresAcceso()===0){				
				subirVariableAcceso(crearVariableAcceso());				
			}			
		});
		
	});
</script>
<style>

</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalCrearContrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button id="cerrarCrearContrasena" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title " id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Crea tu Contraseña</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="form-group col-md-12">
						<label class="sr-only" for="email">Email</label>
						<div class="input-group">
							<div class="input-group-addon input-group-addon-peq">Email</div>
							<input id="email" type="text" class="form-control campoCambioContrasena" placeholder="">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="sr-only" for="password1">Contraseña</label>
						<div class="input-group">
							<div class="input-group-addon input-group-addon-peq">Contraseña</div>
							<input id="password1" type="password" class="form-control campoCambioContrasena" placeholder="Contraseña Nueva">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="sr-only" for="password2">Contraseña</label>
						<div class="input-group">
							<div class="input-group-addon input-group-addon-peq">Contraseña</div>
							<input id="password2" type="password" class="form-control campoCambioContrasena" placeholder="Verificar Contraseña">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="siguienteCrearContraseña">Siguiente</button>
			</div>
		</div>
	</div>
</div>