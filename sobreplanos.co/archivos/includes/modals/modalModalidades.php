<script>
	function readPDF(input) {
		var nombreArchivo = $("#uploadPDF").val().split('\\').pop();
		if (input.files && input.files[0]) {
			var FR = new FileReader();
			FR.onload = function(e) {
				var pdf = e.target.result
				$('#modalModalidades').modal('hide');
				$('#modalLoading').modal('show');
				$("#textoLoading").html("Subiendo pdf...");
				$.ajax({
					type: "POST",
					url: "archivos/phps/guardarArchivo.php",
					data: {
						pdf: pdf,
					}
				}).done(function(msg) {
					$("#nombreArchivoPDF").val(nombreArchivo);
					$("#rutaArchivoPDF").val(msg);
					$("#archivoPDF").html("<a href='#' onclick='verPDF(" + msg + ")'><img class='iconPDF' src='archivos/icons/pdf.png'>     " + nombreArchivo + "</a>");
					setTimeout(function() {
						$('#modalLoading').modal('hide');
						$("#textoLoading").html("");
						$('#modalModalidades').modal('show');
					}, 500);
				});
			};
			FR.readAsDataURL(input.files[0]);
		}
	}

	$(document).ready(function() {
		
		$("#cerrarModalidades").click(function(){
			$("#modalModalidades").modal("hide");
			$("#modalCrearProyecto").modal("show");			
		});		
		

		$("#regresarAgregarModalidad").click(function() {
			$("#modalModalidades").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});

		$('#aceptarAgregarModalidad').click(function() {
			if (validarModalidad() === 0) {
				agregarModalidadProyecto(crearModalidad());
				listarModalidadesProyecto();
				resetearModalidad();
				$("#modalModalidades").modal("hide");
				$("#modalCrearProyecto").modal("show");
			};
		});

		$('#guardarCambiosModalidad').click(function() {
			var key = $('#keyModoCrearProyecto').val();
			if (validarModalidad() === 0) {
				editarModalidadProyecto(crearModalidad(), key);
				listarModalidadesProyecto();
				resetearModalidad();
				$("#modalModalidades").modal("hide");
				$("#modalCrearProyecto").modal("show");
			};
		});

		$("#uploadPDF").change(function(e) {
			readPDF(this);
		});

		$("#subirPDF").click(function() {
			$('#uploadPDF').trigger('click');
		});

	});
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalModalidades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="cerrarModalidades"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="tituloModalModalidades"></h4>
			</div>
			<div class="modal-body container-fluid">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="form-group col-md-12 hidden">
							<label class="sr-only" for="keyModoCrearProyecto">Key</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Key</div>
								<input id="keyModoCrearProyecto" type="text" class="form-control numeric" placeholder="">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="areaModoCrearProyecto">Área</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Área</div>
								<input id="areaModoCrearProyecto" type="text" class="form-control numeric campoCrearModalidad" placeholder="">
								<div class="input-group-addon input-group-addon-repeq">m<sup>2</sup></div>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="banosModoCrearProyecto">Baños</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Baños</div>
								<select id="banosModoCrearProyecto" class="form-control campoCrearModalidadx">
									<option value="x" selected disabled>Seleccione</option>	
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="habitacionesModoCrearProyecto">Habitaciones</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Habit.</div>
								<select id="habitacionesModoCrearProyecto" class="form-control campoCrearModalidadx">
									<option value="x" selected disabled>Seleccione</option>	
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="parquederosModoCrearProyecto">Parqueaderos</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Parq.</div>
								<select id="parquederosModoCrearProyecto" class="form-control campoCrearModalidadx">
									<option value="x" selected disabled>Seleccione</option>					
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option> 
								</select>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="precioModoCrearProyecto">Precio</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">Precio</div>
								<input id="precioModoCrearProyecto" type="text" class="form-control numeric precio campoCrearModalidad" placeholder="">
								<div class="input-group-addon input-group-addon-repeq">$</div>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="sr-only" for="nombreArchivoPDF">PDF</label>
							<div class="input-group">
								<div class="input-group-addon input-group-addon-peq">PDF</div>
								<input type="text" id="nombreArchivoPDF" class="hide">
								<input type="text" id="rutaArchivoPDF" class="hide">
								<div id="archivoPDF" class="form-control" placeholder=""></div>
								<input type="file" id="uploadPDF" name="uploadPDF" class="hide">
								<span class="input-group-btn">
        					<button type="button" class="form-control btn btn-warning" id="subirPDF">Seleccionar</button>
			 					</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarAgregarModalidad" type="button" class="btn btn-default">Regresar</button>
				<button id="guardarCambiosModalidad" type="button" class="btn btn-primary">Guardar Cambios</button>
				<button id="aceptarAgregarModalidad" type="button" class="btn btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>