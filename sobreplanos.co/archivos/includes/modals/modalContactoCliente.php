<script>
  
 
  $(document).ready(function() {

    $("#regresarContactoCliente").click(function() {
      $("#modalContactoCliente").modal("hide");
      $("#modalVerProyecto").modal("show");
    });

    $("#solicitarInformacionCliente").click(function() {
      modalActual = "modalVerProyecto";   
      if (validarFormularioContacto() === 0) {
				subirContacto(crearNuevoContacto());
      }
    });

  });
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalContactoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Contactarme</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <p>Para obtener más información sobre este Proyecto, por favor diligencia el siguiente formulario.<br>Gracias!!!.</p>
          <div class="row-fluid">
            <div class="form-group col-md-12">
              <label class="sr-only" for="nombreCliente">Nombre</label>
              <div class="input-group">
                <div class="input-group-addon input-group-addon-peq">Nombre</div>
                <input id="nombreCliente" type="text" class="form-control campoContactoCliente" placeholder="">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="sr-only" for="emailCliente">Email</label>
              <div class="input-group">
                <div class="input-group-addon input-group-addon-peq">Email</div>
                <input id="emailCliente" type="text" class="form-control campoContactoCliente" placeholder="">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="sr-only" for="telefonoCliente">Teléfono</label>
              <div class="input-group">
                <div class="input-group-addon input-group-addon-peq">Teléfono</div>
                <input id="telefonoCliente" type="text" class="form-control campoContactoCliente" placeholder="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="regresarContactoCliente" type="button" class="btn btn-default">Regresar</button>
        <button id="solicitarInformacionCliente" type="button" class="btn btn-primary">Solicitar Información</button>
      </div>
    </div>
  </div>
</div>