<script async>
  function filtrar(filtro) {

    var total = 0;

    $.each(proyectosPrincipal, function(key, marker) {

      tipoMarcador = marker.tipo;
      estadoMarcador = marker.estado;
      areaMarcador = parseInt(marker.areasDesde);
      precioMarcador = parseInt(marker.preciosDesde);
      areaMinima = parseInt(filtro.areaDesde);
      areaMaxima = parseInt(filtro.areaHasta);
      precioMinimo = parseInt(filtro.precioDesde) * 1000000;
      precioMaximo = parseInt(filtro.precioHasta) * 1000000;

      if (($.inArray(tipoMarcador, filtro.tipos) >= 0) && ($.inArray(estadoMarcador, filtro.estados) >= 0) && (areaMarcador >= areaMinima) && (areaMarcador <= areaMaxima) && (precioMarcador >= precioMinimo) && (precioMarcador <= precioMaximo)) {
        markersPrincipal[key].setVisible(true);
        total += 1;
      } else {
      markersPrincipal[key].setVisible(false);
      }
    });
    
    $("#modalFiltro").modal("hide");
    $("#textoFelicitaciones").html("Hemos Encontrado " + total + " proyectos que coinciden con tu búsqueda.");
    $("#modalFelicitaciones").modal("show");
  }

  function crearFiltro() {

    var estados = [];
    var tipos = [];
    var filtro = {
      "areaDesde": "",
      "areaHasta": "",
      "precioDesde": "",
      "precioHasta": "",
      "tipos": "",
      "estados": ""
    };

    $('.checkTipo').each(function() {
      if ($(this).is(':checked')) {
        tipos.push($(this).val());
      }
    });

    $('.checkEstado').each(function() {
      if ($(this).is(':checked')) {
        estados.push($(this).val());
      }
    });

    filtro.precioDesde = $("#precioVal1").html();
    filtro.precioHasta = $("#precioVal2").html();
    filtro.areaDesde = $("#areaVal1").html();
    filtro.areaHasta = $("#areaVal2").html();
    filtro.tipos = tipos;
    filtro.estados = estados;

    return filtro;

  }

  $(document).ready(function() {

    $("#buscarProyecto").click(function() {

      filtrar(crearFiltro());

    });

    $(".filtrosTipo label").click(function() {
      checkbox = $(this).find('input[type=checkbox]');
      if (checkbox.is(':checked')) {
        /*$(this).parent().css('background-color', '#e2ab04');*/
        $(this).parent().find(".iconOk").show();
        $(this).parent().find(".iconRemove").hide();
      } else {
        /*$(this).parent().css('background-color', '#D6D6D6');*/
        $(this).parent().find(".iconOk").hide();
        $(this).parent().find(".iconRemove").show();
      }
    });

    $("#sliderAreaDesde").slider({
      min: 0,
      max: 500,
      value: [0, 500]
    });

    $("#sliderAreaDesde").on("slide", function(slideEvt) {
      valor = slideEvt.value;
      valor = valor.toString();
      valor = valor.split(",");
      $("#areaVal1").text(valor[0]);
      $("#areaVal2").text(valor[1]);
    });

    $("#sliderPrecioDesde").slider({
      min: 0,
      max: 3000,
      value: [0, 3000]
    });

    $("#sliderPrecioDesde").on("slide", function(slideEvt) {
      valor = slideEvt.value;
      valor = valor.toString();
      valor = valor.split(",");
      $("#precioVal1").text(valor[0]);
      $("#precioVal2").text(valor[1]);
    });

  });
</script>
<style>
  .filtrosTipo li {
    padding: 2px 25px;
    background-color: #f7f7f7
  }
  
  .slider {
    width: 100% !important;
  }
  
  #areaVal1,
  #areaVal2,
  #precioVal1,
  #precioVal2 {
    font-weight: bold;
  }
  
  .slider-selection {
    background-color: #8175B5;
    background-image: none;
  }
  
  .slider-track {
    background-color: #D8D8D8;
    background-image: none;
  }
  
  .slider-handle {
    background-color: #282529;
    background-image: none;
  }
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalFiltro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Busca un Proyecto</h4>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <h5>Selecciona un tipo:</h5>
          <div class="row-fluid">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <ul class="list-group filtrosTipo">
                <li class="list-group-item">
                  <label for="tipoApartamento" class="control-label">
                  <input type="checkbox" id="tipoApartamento" name="tipoApartamento" value="1" checked="checked" class="hidden checkTipo">
                  <img src="" alt="x" height="28" class="hidden">Apartamentos<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>
                </label>
                </li>
                <li class="list-group-item">
                  <label for="tipoCasa" class="control-label">
                  <input type="checkbox" id="tipoCasa" name="tipoCasa" value="2" checked="checked" class="hidden checkTipo">
                  <img src="" alt="x" height="28" class="hidden">Casas<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>
                </label>
                </li>
                <li class="list-group-item">
                  <label for="tipoVIS" class="control-label">
                  <input type="checkbox" id="tipoVIS" name="tipoVIS" value="3" checked="checked" class="hidden checkTipo">
                  <img src="" alt="x" height="28" class="hidden">Vivienda Interés Social<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>
                </label>
                </li>
                <li class="list-group-item">
                  <label for="tipoOficina" class="control-label">
                  <input type="checkbox" id="tipoOficina" name="tipoOficina" value="4" checked="checked" class="hidden checkTipo">
                  <img src="" alt="x" height="28" class="hidden">Oficinas<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>
                </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <h5>Selecciona el Estado:</h5>
          <div class="row-fluid">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <ul class="list-group filtrosTipo">
                <li class="list-group-item">
                  <label for="tipoSinIniciar" class="control-label">
                  <input type="checkbox" id="tipoSinIniciar" name="tipoSinIniciar" value="1" checked="checked" class="hidden checkEstado">
                  <img src="" alt="x" height="28" class="hidden">Sin Iniciar<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>
                </label>
                </li>
                <li class="list-group-item">
                  <label for="tipoEnConstruccion" class="control-label">
                  <input type="checkbox" id="tipoEnConstruccion" name="tipoEnConstruccion" value="2" checked="checked" class="hidden checkEstado">
                  <img src="" alt="x" height="28" class="hidden">En construcción<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>	
                </label>
                </li>
                <li class="list-group-item">
                  <label for="tipoFinalizado" class="control-label">
                  <input type="checkbox" id="tipoFinalizado" name="tipoFinalizado" value="3" checked="checked" class="hidden checkEstado">
                  <img src="" alt="x" height="28" class="hidden">Finalizado<span class="glyphicon glyphicon-ok iconOk pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-remove iconRemove pull-right" aria-hidden="true"></span>	
                </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <h5>Áreas entre <span id="areaVal1">0</span> y <span id="areaVal2">500</span>  m<sup>2</sup></h5>
          <div class="row-fluid">
            <div class="col-md-1"></div>
            <div class="col-md-10" id="SliderArea"> 
              <input id="sliderAreaDesde" type="text">
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <h5>Precios entre <span id="precioVal1">0</span> y <span id="precioVal2">3000</span>  Millones de Pesos</h5>
          <div class="row-fluid">
            <div class="col-md-1"></div>
            <div class="col-md-10" id="SliderPrecio">
              <input id="sliderPrecioDesde" type="text">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="buscarProyecto">Buscar</button>
      </div>
    </div>
  </div>
</div>