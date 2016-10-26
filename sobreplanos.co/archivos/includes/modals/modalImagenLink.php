<style>

</style>
<script>
	
	function vincularImagenesLink() {
		$(".recuadroLinkImagenes").each(function() {
				var campo = $(this);
				var link = campo.val();
				if (link !== "") {
					agregarImagenProyecto(link); 
				}
			});
		}
	$(document).ready(function() {

		$("#siguienteImagenLink").click(function() {
			$('#modalImagenLink').modal('hide');
			$('#modalCrearProyecto').modal('show');
			$("#foto-carrusel tr").append("<td><div class='cajonImagen'><img src='" + $("#rutaImagen").val() + "'></div></td>");
		});

		$("#masRecuadrosImagenes").click(function() {
			$("#contenedorRecuadrosImagenes").append("<div class='col-md-12'><div class='input-group'><textarea id='rutaImagen' class='form-control recuadroLinkImagenes' rows='2'></textarea><div class='input-group-addon input-group-addonx'><i class='cargandoImagen fa fa-spinner fa-spin fa-2x fa-fw hide'></i></div><hr></div><hr>");
		});

		$(document).on('keyup', '.recuadroLinkImagenes',function() {
			$("#errorImagenes").addClass("hide");
			validarLinksImagenes();
		});
		
		$("#vincularImagenes").click(function() {
			if ($("#erroresImagenes").val() === "0") {
						vincularImagenesLink();
						listarImagenesProyecto();
						$("#modalImagenLink").modal("hide");
						$("#modalCrearProyecto").modal("show");				
				} else {
					$("#errorImagenes").removeClass("hide");
				}
		});


	$("#regresarVincularImagenes").click(function() {
	$("#modalImagenLink").modal("hide");
	$("#modalCrearProyecto").modal("show");

	});

	});
</script>

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalImagenLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id=""><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Ingresar Link   <a href='#' data-toggle="tooltip" data-placement="right" title="Las imagenes que son vinculadas a tus proyectos por medio de links, no son reescalables y es posible que se distorsionen al mostrarse." class="blue-tooltip"><span class="glyphicon glyphicon-question-sign glyphicon-question" aria-hidden="true"></span></a></h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<p>Copia los links de las imágenes en los siguientes recuadros:</p><input id="erroresImagenes" class="hide" type="text" value="0">
				</div>
				<div class="container-fluid" id="contenedorRecuadrosImagenes">
					<div class="col-md-12">
						<div class="input-group">
							<textarea id="rutaImagen" class="form-control recuadroLinkImagenes" rows="2"></textarea>
							<div class="input-group-addon input-group-addonx"><i class="cargandoImagen fa fa-spinner fa-spin fa-2x fa-fw margin-bottom hide"></i></div>
						</div>
						<hr>
					</div>
				</div>
				<div class="container-fluid">
					<a href="#" class="pull-right" id="masRecuadrosImagenes"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				</div>
				<div class="container-fluid">
					<div class="col-md-12 hide" id="errorImagenes">
						<p>
							Verifica que los links correspondan a imágenes Válidas
						</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="regresarVincularImagenes" type="button" class="btn btn-default">Regresar</button>
				<button id="vincularImagenes" type="button" class="btn btn-primary">Vincular Imágenes</button>
			</div>
		</div>
	</div>
</div>