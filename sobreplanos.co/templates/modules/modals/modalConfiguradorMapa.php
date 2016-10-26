<style>
  .filtrosTipo li {
    padding: 2px;
    background-color: #f7f7f7
  }
  
  .filtrosTipo label {
    width: 100%;
    text-align: center;
    cursor: pointer;
    cursor: hand;
  }
  
  .filtrosTipo li:hover {
    background-color: #F5F5F5;
  }
  
  #mapaCliente {
    height: 300px;
  }
</style>
<script>
  $(function() {
    $("#selectorEstiloMapa").append("<option selected disabled>Seleccione un estilo</option>");
    $.each(mapStyles, function(index, item) {
      $("#selectorEstiloMapa").append("<option value=" + index + ">" + index + "</option>");
    })
  });

  var mapaCliente;
  var opcionesMapaCliente;

  opcionesMapaCliente = {
    center: new google.maps.LatLng(4.6426, -74, 0957),
    zoom: 6,
    minZoom: 2,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: true,
    mapTypeControl: false,
    panControl: true,
    zoomControl: true,
    scrollwheel: true,
    scaleControl: false,
    streetViewControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.MEDIUM,
      position: google.maps.ControlPosition.RIGHT_TOP
    },
    panControlOptions: {
      style: google.maps.ZoomControlStyle.LARGE,
      position: google.maps.ControlPosition.LEFT_TOP
    },
  };

  $(document).delegate(".filtrosTipo label", "click", function() {
    $(".checkEstado").parent().parent().css('background-color', '#F5F5F5');
    radio = $(this).find('input[type=radio]');
    if (radio.is(':checked')) {
      $(this).parent().css('background-color', '#7F74B2');
    }
  });

  $(document).ready(function() {

    mapaCliente = new google.maps.Map(document.getElementById("mapaCliente"), opcionesMapaCliente);

    $("#selectorEstiloMapa").change(function() {
      mapaCliente.setOptions({
        styles: mapStyles[$("#selectorEstiloMapa").val()]
      });
    });

    for (i = 1; i <= 34; i++) {
      $("#listaIconos").append("<li class='list-group-item col-xs-1'><label for='icono" + i + "' class='control-label'><input id='icono" + i + "' type='radio' name='icono' value='" + i + "' class='hidden checkEstado'><img src='markers/" + i + ".png' alt='x' height='32' class=''></label></li>");
    }


  });
</script>
<div class="modal fade" id="modalConfiguradorMapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Configuración del Mapa</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="col-md-6">
              <div id="mapaCliente"></div>
            </div>
            <div class="col-md-6">
              <div class="example">
                <div class="example-title">Estilo</div>
                <div class="example-content well">
                  <div class="example-content-widget">
                    <select class="form-control" id="selectorEstiloMapa"></select>
                  </div>
                </div>
              </div>
              <div class="example">
                <div class="example-title">Icono</div>
                <div class="example-content ">
                  <ul id="listaIconos" class="list-group filtrosTipo">

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="aceptarConfigurarMapa">Configurar</button>
      </div>
    </div>
  </div>
</div>
