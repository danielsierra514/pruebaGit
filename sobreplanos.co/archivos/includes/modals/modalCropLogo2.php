<script>
	$(document).ready(function() {

		$("#regresarCropLogo2").click(function() {
			$("#modalCropLogo2").modal("hide");
			$("#modalInfoEmpresa").modal("show");
		});

		$('#redimLogo2').click(function() {
			$('#modalCropLogo2').modal('hide');
			$('#modalLoading').modal('show');
			$("#textoLoading").html("Redimensionando Logo...");
			var btn = $(this);
			var img = $('#targetLogo2').attr("src");
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
				logoEmpresaEdicion=msg;
				$("#espacioNuevoLogo2").html("<img src=archivos/logos/" + msg + ".png>");
				btn.button('reset');
				$("body").css("cursor", "default");
				setTimeout(function() {
					$('#modalLoading').modal('hide');
					$("#textoLoading").html("");
					$('#modalInfoEmpresa').modal('show');
				}, 500);
				var nombreImagen = msg.split("/")[2];
				nombreImagen = nombreImagen.replace(".png", "");

			});
		});
	});
</script>
<style>
	#cositoLogo2 {
		width: 568px;
	}
	
	#cositoLogo2 img {
		width: 100%;
	}
	
	#targetLogo2{
		width: 100%;
	}
	
	#canvasLogo2 {
		display: none;
	}
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalCropLogo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
							<div id="cositoLogo2">
								<img src="" id="targetLogo2" alt="" />
								<canvas id="canvasLogo2" style="border: 1px solid black"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="regresarCropLogo2" class="btn btn-default">Regresar</button>
				<button type="button" id="redimLogo2" data-loading-text="Redimensionando..." class="btn btn-primary">Redimensionar</button>
			</div>
		</div>
	</div>
</div>