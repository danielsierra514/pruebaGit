<script async>
	
	$(document).ready(function() {

		

	});
</script>
<style>
	#panorama{
		height:400px;
		display:block;
	}

</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalPanorama" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button id="cerrarConfiguracion" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Street View</h4>
			</div>
			<div class="modal-body container-fluid">
        <div id="panorama">
        </div>
				
			</div>
			<div class="modal-footer">
				
				<button  type="button" data-dismiss="modal" class="btn btn-default">Regresar</button>
			</div>
		</div>
	</div>
</div>