<script>
  $(document).ready(function() {
		
		$("#regresarLocalizar").click(function(){
			$("#modalLocalizarProyecto").modal("hide");
			$("#modalCrearProyecto").modal("show");
		});

		$("#aceptarLocalizar").click(function(){
				$("#modalLocalizarProyecto").modal("hide");
				$("#modalCrearProyecto").modal("show");
			
			var urlLocalizar="http://maps.googleapis.com/maps/api/staticmap?autoscale=false&size=600x300&maptype=roadmap&zoom=13&format=png&visual_refresh=true&markers=icon:http://www.sobreplanos.co/archivos/icons/marker.png%7Cshadow:true%7C"+$("#latitudCrearProyecto").val()+","+$("#longitudCrearProyecto").val();
				$("#imgLocalizador").attr("src",urlLocalizar);
		}); 
		
  });
</script>
<style>

  
  
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalLocalizarProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button id="cerrarConfiguracion" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Localiza tu Proyecto</h4>
      </div>
      <div class="modal-body container-fluid">
        <div class="row-fluid">
          <div id="mapaProyecto" class="mapa"></div>
							<div id="centerMarker"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="regresarLocalizar" type="button" data-dismiss="modal" class="btn btn-default">Regresar</button>
        <button id="aceptarLocalizar" type="button" data-dismiss="modal" class="btn btn-primary">Localizar</button>
      </div>
    </div>
  </div>
</div>