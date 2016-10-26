<script>
  $(document).ready(function() {
    $("#regresarAmpliado").click(function() {
      $("#modalAmpliado").modal("hide");
      $("#modalVerProyecto").modal("show");
    })

  });
</script>
<style>
  
  #itemsAmpliadoImagenesProyecto img {
    width: 100%;
  }
  

	
	#indicatorsAmpliadoImagenesProyecto li {
		border: 3px solid #D6D6D6;
		background-color: #8175B5;
	}
	
	#indicatorsAmpliadoImagenesProyecto li.active {
		background-color: #8175B5;
		border-color: #8175B5;
	}
	
	#indicatorsAmpliadoImagenesProyecto li {
		width: 17px !important;
		height: 17px !important;
	}
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalAmpliado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="nombreAmpliadoProyecto"></h4>
      </div>
      <div class="modal-body">

        <div class="contenedorAmpliadoImagenesProyecto">
          <div id="caruselAmpliadoImagenesProyecto" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" id="indicatorsAmpliadoImagenesProyecto">

            </ol>
            <div class="carousel-inner" role="listbox" id="itemsAmpliadoImagenesProyecto">


            </div>
            <a class="left carousel-control" href="#caruselAmpliadoImagenesProyecto" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#caruselAmpliadoImagenesProyecto" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="regresarAmpliado" data-dismiss="modal">Regresar</button>
      </div>
    </div>
  </div>
</div>