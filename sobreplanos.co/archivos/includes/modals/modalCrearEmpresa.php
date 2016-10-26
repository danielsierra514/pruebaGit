<script>
	var logoEmpresaInvitacion;
  
  $(document).ready(function() {
    $("#subirLogo").click(function() {
			$('#uploadLogo').trigger('click');
		});
    
    $("#uploadLogo").change(function() {
			$('#modalCrearEmpresa').modal('hide');
			$('#modalCropLogo').modal('show');
			readLogo(this);
		});
    
    $("#aceptarCrearEmpresa").click(function(){
			modalActual="modalCrearEmpresa";
			if(validarEmpresa()===0){
    		subirEmpresa(crearEmpresa());
			};     
    });
		
  });
</script>
<style>
#espacioNuevoLogo {
		overflow: hidden;
		margin-bottom: 20px;
		height: 146px;
		line-height: 146px;
		background-color: #efefef;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		text-align: center;
	}
	
	#espacioNuevoLogo img {
		height: 60%;
		margin: auto;
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalCrearEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Invita una Empresa</h4>
      </div>
      <div class="modal-body container-fluid">
        <div class="container-fluid">
          <div class="row-fluid">
            <div id="configuradorLogoEmpresa">
              <h5>Logo:</h5>
              <div id="file">
                <input type="file" id="uploadLogo" class="hide">
              </div>
              <div class="form-group col-md-12">
                <div id="espacioNuevoLogo">

                </div>
                <button type="button" class="btn btn-primary pull-right" id="subirLogo">Cambiar</button>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="container-fluid">
          <div class="row-fluid">
            <div id="datosEmpresa">
              <h5>Información de la Empresa:</h5>
              <div class="form-group col-md-12">
                <label class="sr-only" for="urlEmpresa">Nombre</label>
                <div class="input-group">
                  <div class="input-group-addon input-group-addon-peq">Nombre</div>
                  <input id="nombreEmpresa" type="text" class="form-control campoCrearEmpresa" placeholder="">
                </div>
              </div>
              <div class="form-group col-md-12">
                <label class="sr-only" for="nitEmpresa">Mail</label>
                <div class="input-group">
                  <div class="input-group-addon input-group-addon-peq">Mail</div>
                  <input id="mailEmpresa" type="text" class="form-control campoCrearEmpresa" placeholder="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="aceptarCrearEmpresa">Invitar</button>
      </div>
    </div>
  </div>
</div>