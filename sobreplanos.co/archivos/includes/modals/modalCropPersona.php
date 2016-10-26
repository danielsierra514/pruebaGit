<script>
	$(document).ready(function() {

		$("#regresarCropPersona").click(function() {
			$("#modalCropPersona").modal("hide");
			$("#modalAgente").modal("show");
		});

		$('#redimPersona').click(function() {
			$('#modalCropPersona').modal('hide');
			$('#modalLoading').modal('show');
			$("#textoLoading").html("Redimensionando Foto...");
			var btn = $(this);
			var img = $('#targetPersona').attr("src");
			btn.button('loading');
			$("body").css("cursor", "progress");
			$.ajax({
				type: "POST",
				url: "archivos/phps/cropPersona.php",
				data: {
					img: img,
					initialX: initialX,
					initialY: initialY,
					lengthX: lengthX,
					lengthY: lengthY
				}
			}).done(function(msg) {
				$("#fotoGrandePersona").html("<img src=archivos/personas/" + msg + ".png></div>");
				btn.button('reset');
				$("body").css("cursor", "default");
				setTimeout(function() {
					$('#modalLoading').modal('hide');
					$("#textoLoading").html("");
					$('#modalAgente').modal('show');
				}, 500);
				var nombreImagen = msg.split("/")[2];
				nombreImagen = nombreImagen.replace(".png", "")
				/*imagenesNuevoProyecto.push(nombreImagen);*/

			});
		});
	});
</script>
<style>
	#cositoPersona {
		width: 568px;
	}
	
	#cositoPersona img {
		width: 100%;
	}
	
	#targetPersona {
		width: 100%;
	}
	
	#canvasPersona {
		display: none;
	}
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalCropPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Redimensiona tu imagen</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="col-md-12">
							<div id="cositoPersona">
								<img src="" id="targetPersona" alt="" />
								<canvas id="canvasPersona" style="border: 1px solid black"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="regresarCropPersona" class="btn btn-default">Regresar</button>
				<button type="button" id="redimPersona" data-loading-text="Redimensionando..." class="btn btn-primary">Redimensionar</button>
			</div>
		</div>
	</div>
</div>