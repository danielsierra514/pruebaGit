<script>
  $(document).ready(function() {
    
    $(".seccionT").click(function() {
      
      radio = $(this).find('input[type=radio]');
      if (radio.is(':checked')) {
        $(this).closest(".row-fluid").find(".iconOk").hide();
        $(this).parent().find(".iconOk").show();
      } else {
        $(this).parent().find(".iconOk").hide();
      }
      
    });

    $("#aceptarConfigurarSecciones").click(function() {
      
      $("#bodyPrincipal").html("");
      $("input:radio:checked").each(function() {
        claseElemento = $(this).parent().attr("tipo");
        nombreElemento = $(this).attr("name");
        $("#bodyPrincipal").append("<li class='seccion " + claseElemento + " ui-state-defaultx' id='" + nombreElemento + "' data-toggle='tooltip' data-placement='right' title='Nuestra Empresa'><span class='ui-icon ui-icon-arrowthick-2-n-s pull-left'></span><span class='glyphicon glyphicon-remove iconDelete pull-right' aria-hidden='true'></span><span class='glyphicon glyphicon-cog iconCog pull-right' aria-hidden='true'></span></li>");
      });

      $("#modalConfiguradorSecciones").modal("hide");
      $("#modalConfiguradorTemplate").modal("show");
      
    });
  });
</script>
<style>
  .seccionT {
    background-color: white;
    height: 100px;
    width: 100%;
    border: 2px solid #e5e5e5;
    margin-bottom: 4px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    background-position: center;
    background-repeat: no-repeat;
    -webkit-background-size: 80% 80%;
    background-size: 80% 80%;
    cursor: pointer;
    cursor: hand
  }
  
  .seccionT:hover {
    border-color: #073763;
  }
  
  #paginaPrincipal {
    border: 2px solid #e5e5e5;
    padding: 0;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    cursor: pointer;
    cursor: hand;
  }
  
  #marcoBody {
    padding: 20px 40px 20px 40px;
  }
  
  #bodyPrincipal {
    background-color: white;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 2px #e5e5e5 solid;
    text-align: center;
    padding: 15px 0 0 0;
    margin: 0;
    list-style: none;
    min-height: 200px;
  }
  
  #headerPrincipal {
    height: 80px;
    background-color: #e5e5e5;
    text-align: center;
    cursor: pointer;
    cursor: hand;
    -webkit-border-top-left-radius: 6px;
    -webkit-border-top-right-radius: 6px;
    -moz-border-radius-topleft: 6px;
    -moz-border-radius-topright: 6px;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
  }
  
  #headerPrincipal:hover {
    background-color: #073763;
  }
  
  .seccion {
    background-color: white;
    height: 160px;
    border: 2px solid #e5e5e5;
    margin: 0px 30px 15px 30px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    background-position: center;
    background-repeat: no-repeat;
    -webkit-background-size: 80% 80%;
    background-size: 80% 80%;
    cursor: pointer;
    cursor: hand;
    position:relative;
  }
  
  .seccion:hover {
    border-color: #073763;
  }
  
  .seccion div {
    width: 100%;
    height: 100%;
  }
  
  #footerPrincipal {
    height: 30px;
    background-color: #e5e5e5;
    text-align: center;
    cursor: pointer;
    cursor: hand;
    -webkit-border-bottom-left-radius: 6px;
    -webkit-border-bottom-right-radius: 6px;
    -moz-border-radius-bottomleft: 6px;
    -moz-border-radius-bottomright: 6px;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
  }
  
  #footerPrincipal:hover {
    background-color: #073763;
  }
  
  .mapa1 {
    background-image: url("templates/images/mapaBN1.jpg");
  }
  
  .mapa2 {
    background-image: url("templates/images/mapaBN2.jpg");
  }
  
  .mapa3 {
    background-image: url("templates/images/mapaBN3.jpg");
  }
  
  .mapa4 {
    background-image: url("templates/images/mapaBN4.jpg");
  }
  /**********/
  
  .nosotros1 {
    background-image: url("templates/images/nosotrosBN1.jpg");
  }
  
  .nosotros2 {
    background-image: url("templates/images/nosotrosBN2.jpg");
  }
  
  .nosotros3 {
    background-image: url("templates/images/nosotrosBN3.jpg");
  }
  /*********/
  
  .porEstado1 {
    background-image: url("templates/images/porEstadoBN1.jpg");
  }
  
  .porEstado2 {
    background-image: url("templates/images/porEstadoBN3.jpg");
  }
  
  .porEstado3 {
    background-image: url("templates/images/porEstadoBN2.jpg");
  }
  
  .porEstado4 {
    background-image: url("templates/images/porCiudadBN2.jpg");
  }
  /*********/
  
  .porTipo1 {
    background-image: url("templates/images/porTipoBN1.jpg");
  }
  
  .porTipo2 {
    background-image: url("templates/images/porTipoBN3.jpg");
  }
  
  .porTipo3 {
    background-image: url("templates/images/porTipoBN2.jpg");
  }
  
  .porTipo4 {
    background-image: url("templates/images/porCiudadBN2.jpg");
  }
  /*********/
  
  .porCiudad1 {
    background-image: url("templates/images/porCiudadBN1.jpg");
  }
  
  .porCiudad2 {
    background-image: url("templates/images/porCiudadBN2.jpg");
  }
   .porCiudad3 {
    background-image: url("templates/images/porEstadoBN2.jpg");
  }
</style>
<div class="modal fade" id="modalConfiguradorSecciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Configuración de Secciones</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row-fluid">
            <h5>Nosotros:</h5>
            <div class="col-sm-6">
              <label for="checkNosotros1" class="control-label seccionT nosotros1" tipo="nosotros1">
                  <input type="radio" id="checkNosotros1" name="tipoNosotros" value="1" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkNosotros2" class="control-label seccionT nosotros2" tipo="nosotros2">
                  <input type="radio" id="checkNosotros2" name="tipoNosotros" value="2" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkNosotros3" class="control-label seccionT nosotros3" tipo="nosotros3">
                  <input type="radio" id="checkNosotros3" name="tipoNosotros" value="3" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>

          </div>
        </div>
        <div class="container-fluid">
          <div class="row-fluid">
            <h5>Mapa:</h5>
            <div class="col-sm-6">
              <label for="checkMapa1" class="control-label seccionT mapa1" tipo="mapa1">
                  <input type="radio" id="checkMapa1" name="tipoMapa" value="1" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkMapa2" class="control-label seccionT mapa2" tipo="mapa2">
                  <input type="radio" id="checkMapa2" name="tipoMapa" value="2" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkMapa3" class="control-label seccionT mapa3" tipo="mapa3">
                  <input type="radio" id="checkMapa3" name="tipoMapa" value="3" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkMapa4" class="control-label seccionT mapa4" tipo="mapa4">
                  <input type="radio" id="checkMapa4" name="tipoMapa" value="4" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row-fluid">
            <h5>Proyectos por Estado:</h5>
            <div class="col-sm-6">
              <label for="checkPorEstado1" class="control-label seccionT porEstado1" tipo="porEstado1">
                  <input type="radio" id="checkPorEstado1" name="tipoEstado" value="1" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorEstado2" class="control-label seccionT porEstado2" tipo="porEstado2">
                  <input type="radio" id="checkPorEstado2" name="tipoEstado" value="2" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorEstado3" class="control-label seccionT porEstado3" tipo="porEstado3">
                  <input type="radio" id="checkPorEstado3" name="tipoEstado" value="3" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorEstado4" class="control-label seccionT porEstado4" tipo="porEstado4">
                  <input type="radio" id="checkPorEstado4" name="tipoEstado" value="4" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row-fluid">
            <h5>Proyectos por Tipo:</h5>
            <div class="col-sm-6">
              <label for="checkPorTipo1" class="control-label seccionT porTipo1" tipo="porTipo1">
                  <input type="radio" id="checkPorTipo1" name="tipoTipo" value="1" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorTipo2" class="control-label seccionT porTipo2" tipo="porTipo2">
                  <input type="radio" id="checkPorTipo2" name="tipoTipo" value="2" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorTipo3" class="control-label seccionT porTipo3" tipo="porTipo3">
                  <input type="radio" id="checkPorTipo3" name="tipoTipo" value="3" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorTipo4" class="control-label seccionT porTipo4" tipo="porTipo4">
                  <input type="radio" id="checkPorTipo4" name="tipoTipo" value="4" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row-fluid">
            <h5>Proyectos por Ciudad:</h5>
            <div class="col-sm-6">
              <label for="checkPorCiudad1" class="control-label seccionT porCiudad1" tipo="porCiudad1">
                  <input type="radio" id="checkPorCiudad1" name="tipoCiudad" value="1" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
            <div class="col-sm-6">
              <label for="checkPorCiudad2" class="control-label seccionT porCiudad2" tipo="porCiudad2">
                  <input type="radio" id="checkPorCiudad2" name="tipoCiudad" value="2" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
             <div class="col-sm-6">
              <label for="checkPorCiudad3" class="control-label seccionT porCiudad3" tipo="porCiudad3">
                  <input type="radio" id="checkPorCiudad3" name="tipoCiudad" value="3" class="hidden checkTipo">
                  <span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span>
                </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="aceptarConfigurarSecciones">Configurar</button>
      </div>
    </div>
  </div>
</div>