<script>
  $(document).ready(function() {
    
  $("#cerrarError").click(function(){ 	
		$('#modalError').modal("hide");
    $('#modalCrearProyecto').modal("show");
     });
  });
</script>
<style>
  #listaErrores li {
    text-transform: capitalize;
  }
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Error</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-12">
            <p id="parrafoError"></p>
          </div>
          <div class="col-md-12">
            <ul id="listaErrores"></ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="cerrarError">Regresar</button>
      </div>
    </div>
  </div>
</div>