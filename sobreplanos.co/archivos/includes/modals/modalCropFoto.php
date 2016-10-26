<script>
	$(document).ready(function() {

		$("#regresarCropImagenes").click(function() {
			$("#modalCropFoto").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});

		$('#redimFoto').click(function() {
			$('#modalCropFoto').modal('hide');
			$('#modalLoading').modal('show');
			$("#textoLoading").html("Redimensionando Foto...");
			var btn = $(this);
			var img = $('#targetFoto').attr("src");
			btn.button('loading');
			$("body").css("cursor", "progress");
			$.ajax({
				type: "POST",
				url: "archivos/phps/cropFoto.php",  
				data: {
					img: img,
					initialX: initialX,
					initialY: initialY,
					lengthX: lengthX,
					lengthY: lengthY
				}
			}).done(function(msg) {
				var nombreImagen = msg;
				agregarImagenProyecto(nombreImagen); 
				listarImagenesProyecto();
				btn.button('reset');
				$("body").css("cursor", "default");
				setTimeout(function() {
					$('#modalLoading').modal('hide');
					$("#textoLoading").html("");
					$('#modalCrearProyecto').modal('show');
					altura=$('#modalCrearProyecto').height();
					$('#modalCrearProyecto').animate({ scrollTop: altura}, 'slow');
				}, 500);
				
			});
		});
	});
</script>
<style>
	#cositoFoto {
		width: 568px;
	}
	
	#cositoFoto img {
		width: 100%;
	}
	
	#targetFoto {
		width: 100%;
	}
	
	#canvasFoto {
		display: none;
	}
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalCropFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Redimensiona tu imagen</h4>
			</div>
			<div class="modal-body container-fluid">
					<div class="row-fluid">
						<div class="col-md-12">
							<div id="cositoFoto">
								<img src="" id="targetFoto" alt="" />
								<canvas id="canvasFoto" style="border: 1px solid black"></canvas>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="regresarCropImagenes" class="btn btn-default">Regresar</button>
				<button type="button" id="redimFoto" data-loading-text="Redimensionando..." class="btn btn-primary">Redimensionar</button>
			</div>
		</div>
	</div>
</div>