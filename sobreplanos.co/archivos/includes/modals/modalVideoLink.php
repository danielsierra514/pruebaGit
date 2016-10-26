<style>

</style>
<script>
	
	function vincularVideosLink() {
		$(".recuadroLinkVideos").each(function() {
			var campo = $(this);			
			var link = getVideoParameter(campo.val(),"v");
			if (link !== "") {
				agregarVideoProyecto(link);
			}
		});
	}
	
	$(document).ready(function() {

		$("#siguienteVideoLink").click(function() {
			$('#modalVideoLink').modal('hide');
			$('#modalCrearProyecto').modal('show');
			$("#video-carrusel tr").append("<td><div class='cajonVideo'><img src='" + $("#rutaVideo").val() + "'></div></td>");
		});

		$("#masRecuadrosVideos").click(function() {
			$("#contenedorRecuadrosVideos").append("<div class='col-md-12'><div class='input-group'><textarea id='rutaVideo' class='form-control recuadroLinkVideos' rows='2'></textarea><div class='input-group-addon input-group-addonx'><i class='cargandoVideo fa fa-spinner fa-spin fa-2x fa-fw hide'></i></div><hr></div><hr>");
		});

		$(document).on('keyup', '.recuadroLinkVideos', function() {
			$("#errorVideos").addClass("hide");
			validarLinksVideos();
		});

		$("#vincularVideos").click(function() {
			if ($("#erroresVideos").val() === "0") {
				vincularVideosLink();
				listarVideosProyecto();
				$("#modalVideoLink").modal("hide");
				$("#modalCrearProyecto").modal("show");
			} else {
				$("#errorVideos").removeClass("hide");
			}
		});


		$("#regresarVincularVideos").click(function() {
			$("#modalVideoLink").modal("hide");
			$("#modalCrearProyecto").modal("show");

		});

	});
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalVideoLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id=""><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Ingresar Link   <a href='#' data-toggle="tooltip" data-placement="right" title="Todos los videos que quieras vincular a tu proyecto, deben estar previamente subidos a Youtube." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<p>Copia los links de los videos en <b>YouTube</b> en los siguientes recuadros:</p><input id="erroresVideos" class="hide" type="text" value="0">
				</div>
				<div class="container-fluid" id="contenedorRecuadrosVideos">
					<div class="col-md-12">
						<div class="input-group">
							<textarea id="rutaVideo" class="form-control recuadroLinkVideos" rows="2"></textarea>
							<div class="input-group-addon input-group-addonx"><i class="cargandoVideo fa fa-spinner fa-spin fa-2x fa-fw margin-bottom hide"></i></div>
						</div>
						<hr>
					</div>
				</div>
				<div class="container-fluid">
					<a href="#" class="pull-right" id="masRecuadrosVideos"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				</div>
				<div class="container-fluid">
					<div class="col-md-12 hide" id="errorVideos">
						<p>
							Verifica que los links correspondan a imágenes Válidas
						</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarVincularVideos" type="button" class="btn btn-default">Regresar</button>
				<button id="vincularVideos" type="button" class="btn btn-primary">Vincular Videos</button>
			</div>
		</div>
	</div>
</div>