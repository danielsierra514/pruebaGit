<script>
  $(document).ready(function() {
    $("#aceptarMensaje").click(function(){
      $("#modalMensaje").modal("hide");
      if(modalActual==""){
        
      }else{
        $('#'+ modalActual).modal("show");
      }       
    });
  });
</script>

</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Mensaje</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <p id="textoMensaje">
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="aceptarMensaje">Cerrar</button>
      </div>
    </div>
  </div>
</div>