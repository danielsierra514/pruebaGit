<script>
  function crearUbicacion() {
    
    var codPais = $("#paisEmpresa").val();
    var codDepartamento = $("#departamentoEmpresa").val();
    var codCiudad = $("#ciudadEmpresa").val();
    var nombrePais = $("#paisEmpresa option:selected").text();
    var nombreDepartamento = $("#departamentoEmpresa option:selected").text();
    var nombreCiudad = $("#ciudadEmpresa option:selected").text();
    $("#ubicacionEmpresa").val(nombrePais + " - " + nombreDepartamento + " - " + nombreCiudad);
    $("#codigosUbicacionEmpresa").val(codPais + "|" + codDepartamento + "|" + codCiudad);
    $("#modalConfiguracion").modal("show");
    $("#modalUbicacion").modal("hide");
  }

  function validarUbicacion() {
		var errores = 0;

		$(".campoUbicacion").each(function() {
			if ($(this).find(":selected").val() == "x") {
				$(this).addClass("campoError");
				errores = errores + 1;
			} else {
				$(this).removeClass("campoError");
			};
		});
		if (errores === 0) {
			crearUbicacion();
		}

  }

  $(document).ready(function() {

    $('#paisEmpresa').on('change', function() {
      listarDepartamentos($(this).val());
    });

    $('#departamentoEmpresa').on('change', function() {
      listarCiudades($(this).val());
    });

    $("#regresarSeleccionarUbicacion").click(function() {
      $("#modalUbicacion").modal("hide");
      $("#modalConfiguracion").modal("show");
    });

    $("#aceptarSeleccionarUbicacion").click(function() {
      validarUbicacion();
    });

  });
</script>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalUbicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Selecciona una Ubicación</h4>
      </div>
      <div class="modal-body container-fluid">
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="form-group col-md-12">
              <label class="sr-only" for="paisEmpresa">País</label>
              <div class="input-group">
                <div class="input-group-addon input-group-addon-peq">País</div>
                <select class="form-control campoUbicacion" id="paisEmpresa">
												<option value="x" selected disabled>Seleccione</option>					
											</select>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="sr-only" for="departamentoEmpresa">Departamento</label>
              <div class="input-group">
                <div class="input-group-addon input-group-addon-peq">Departamento</div>
                <select class="form-control campoUbicacion" id="departamentoEmpresa"></select>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="sr-only" for="ciudadEmpresa">Ciudad</label>
              <div class="input-group">
                <div class="input-group-addon input-group-addon-peq">Ciudad</div>
                <select class="form-control campoUbicacion" id="ciudadEmpresa"></select>
              </div>
            </div>







          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="regresarSeleccionarUbicacion" type="button" class="btn btn-default">Regresar</button>
        <button id="aceptarSeleccionarUbicacion" type="button" class="btn btn-success">Agregar</button>
      </div>
    </div>
  </div>
</div>