<script>
  $(document).ready(function() {

    $("#aceptarSeleccionColor").click(function() {
      color = $("#colorUnico").val();
      $(zonaActual).css("background-color", color);
      $(zonaActual).hover("background-color", "#e5e5e5");
      $("#modalSelectorColor").modal("hide");
    });

  });
</script>
<div class="modal fade" id="modalContactenos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contáctanos</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-md-12 control-label">Nombre Completo</label>
                <div class="col-md-12 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="last_name" placeholder="Nombre Completo" class="form-control" type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label">Email</label>
                <div class="col-md-12 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="last_name" placeholder="Email" class="form-control" type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label">Teléfono</label>
                <div class="col-md-12 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="last_name" placeholder="Teléfono" class="form-control" type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label">Descripción</label>
                <div class="col-md-12 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <textarea class="form-control" name="comment" placeholder="Description" rows="2"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="aceptarSeleccionColor">Enviar</button>
      </div>
    </div>
  </div>
</div>