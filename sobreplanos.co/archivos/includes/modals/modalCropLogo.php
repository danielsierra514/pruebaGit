<script>
	$(document).ready(function() {

		$("#regresarCropLogo").click(function() {
			$("#modalCropLogo").modal("hide");
			$("#modalCrearEmpresa").modal("show");
		});

		$('#redimLogo').click(function() {
			$('#modalCropLogo').modal('hide');
			$('#modalLoading').modal('show');
			$("#textoLoading").html("Redimensionando Logo...");
			var btn = $(this);
			var img = $('#targetLogo').attr("src");
			btn.button('loading');
			$("body").css("cursor", "progress");
			$.ajax({
				type: "POST",
				url: "archivos/phps/cropLogo.php",
				data: {
					img: img,
					initialX: initialX,
					initialY: initialY,
					lengthX: lengthX,
					lengthY: lengthY
				}
			}).done(function(msg) {
				logoEmpresaInvitacion=msg;
				$("#espacioNuevoLogo").html("<img src=archivos/logos/" + msg + ".png>");
				btn.button('reset');
				$("body").css("cursor", "default");
				setTimeout(function() {
					$('#modalLoading').modal('hide');
					$("#textoLoading").html("");
					$('#modalCrearEmpresa').modal('show');
				}, 500);
				var nombreImagen = msg.split("/")[2];
				nombreImagen = nombreImagen.replace(".png", "")
				imagenesNuevoProyecto.push(nombreImagen);

			});
		});
	});
</script>
<style>
	#cositoLogo {
		width: 568px;
	}
	
	#cositoLogo img {
		width: 100%;
	}
	
	#targetLogo{
		width: 100%;
	}
	
	#canvasLogo {
		display: none;
	}
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalCropLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Redimensiona tu Logo</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="col-md-12">
							<div id="cositoLogo">
								<img src="" id="targetLogo" alt="" />
								<canvas id="canvasLogo" style="border: 1px solid black"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="regresarCropLogo" class="btn btn-default">Regresar</button>
				<button type="button" id="redimLogo" data-loading-text="Redimensionando..." class="btn btn-primary">Redimensionar</button>
			</div>
		</div>
	</div>
</div>