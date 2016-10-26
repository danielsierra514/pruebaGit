<script>
$(document).ready(function(){
  
  $("#aceptarSeleccionColores").click(function(){
    colorInicial=$("#colorFondoInicial").val();
    colorFinal=$("#colorFondoFinal").val();
    establecerFondo(colorInicial,colorFinal);
    $("#modalSelectorColores").modal("hide");
    $("#modalConfiguradorTemplate").modal("show");
  });
  
});
</script>
<div class="modal fade" id="modalSelectorColores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar Color</h4>
      </div>
      <div class="modal-body">
        <div class="example">
          <div class="example-title">Color Inicial</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <div id="cp2" class="input-group colorpicker-component selectorColor">
                <span class="input-group-addon"><i></i></span>
                <input type="text" value="#DC005A" class="form-control" id="colorFondoInicial" />                
              </div>
            </div>
          </div>
        </div>
        <div class="example">
          <div class="example-title">Color Final</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <div id="cp2" class="input-group colorpicker-component selectorColor">
                <span class="input-group-addon"><i></i></span>
                <input type="text" value="#DC005A" class="form-control" id="colorFondoFinal" />                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="aceptarSeleccionColores">Continuar</button>
      </div>
    </div>
  </div>
</div>