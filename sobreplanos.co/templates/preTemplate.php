<!DOCTYPE html>
<html>

<head>
  <title>Definitivo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link rel="stylesheet" href="styles/colorPicker.css">
  <script src="scripts/jquery.js"></script>
  <script src="scripts/angular.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkSDaIBvRz67aMFYCl4a5KKO0GnwaY6m0&v=3.exp&libraries=places"></script>
  <script src="scripts/bootstrap.js"></script>
  <script src="scripts/tiposMapa.js"></script>
  <script src="scripts/colorPicker.js"></script>
</head>
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
    height: 500px;
  }
</style>
<script>
  $(function() {
    $("#selectorEstiloMapa").append("<option selected disabled>Seleccione un estilo</option>");
    $.each(mapStyles, function(index, item) {
      $("#selectorEstiloMapa").append("<option value=" + index + ">" + index + "</option>");
    })
  });

  $(function() {
    $('.selectorColor').colorpicker();
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
      $("#listaIconos").append("<li class='list-group-item col-xs-3'><label for='icono" + i + "' class='control-label'><input id='icono" + i + "' type='radio' name='icono' value='" + i + "' class='hidden checkEstado'><img src='markers/" + i + ".png' alt='x' height='32' class=''></label></li>");
    }
    
    $("#generarPlantilla").click(function(){
      var colorFondoInicial= $("#colorFondoInicial").val().replace("#","");;
      var colorFondoFinal= $("#colorFondoFinal").val().replace("#","");;
      var colorHeader= $("#colorHeader").val().replace("#","");
      var colorFooter= $("#colorFooter").val().replace("#","");;
      var estiloMapa=$("#selectorEstiloMapa").val();  
      var tipoIcono=$('input[name=icono]:checked').val();
      var tipoMapa=$('#selectorTemplate').val();

      //alert(colorFondoInicial+"  "+colorFondoFinal+"  "+colorHeader+"  "+colorFooter+"  "+estiloMapa+"  "+tipoIcono+"  "+tipoMapa);
      window.open("https://www.sobreplanos.co/templates/template1.php?idCliente=8&tipoMapa="+tipoMapa+"&colorMapa="+estiloMapa+"&tipoMarcador="+tipoIcono+"&colorMapa="+estiloMapa+"&colorInicial="+colorFondoInicial+"&colorFinal="+colorFondoFinal+"&colorHeader="+colorHeader+"&colorFooter="+colorFooter, "_blank"); 
    });
  });
</script>

<body>
  <div class="jumbotron">
    <h1>Generador de Plantillas</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Ver Plantillas</a></p>
  </div>
  <div class="container">
    <h2>Template</h2>
    <hr>
    <div class="row-fluid">
      <div class="col-md-6">
        <div class="example">
          <div class="example-title">Tipo</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <select class="form-control" id="selectorTemplate">
                <option value="1"
                        alert(colorFondoInicial+"  "+colorFondoFinal+"  "+colorHeader+"  "+colorFooter+"  "+estiloMapa+"  "+tipoIcono);>Template Dano</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h2>Fondo</h2>
    <hr>
    <div class="row-fluid">
      <div class="col-md-6">
        <div class="example">
          <div class="example-title">Color Inicial</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <div id="cp2" class="input-group colorpicker-component selectorColor">
                <input type="text" value="#7A4B94" class="form-control" id="colorFondoInicial"/>
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="example">
          <div class="example-title">Color Final</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <div id="cp2" class="input-group colorpicker-component selectorColor">
                <input type="text" value="#DC005A" class="form-control" id="colorFondoFinal" />
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h2>Banners</h2>
    <hr>
    <div class="row-fluid">
      <div class="col-md-6">
        <div class="example">
          <div class="example-title">Superior</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <div id="cp2" class="input-group colorpicker-component selectorColor">
                <input type="text" value="#333333" class="form-control" id="colorHeader"/>
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="example">
          <div class="example-title">Inferior</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <div id="cp2" class="input-group colorpicker-component selectorColor">
                <input type="text" value="#333333" class="form-control" id="colorFooter" />
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h2>Mapa</h2>
    <hr>
    <div class="row-fluid">
      <div class="col-md-6">
        <div id="mapaCliente"></div>
      </div>
      <div class="col-md-6">
        <div class="example">
          <div class="example-title">Estilo</div>
          <div class="example-content well">
            <div class="example-content-widget">
              <select class="form-control" id="selectorEstiloMapa">
              </select>
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
  <hr>
  <div class="container">
    <div class="row-fluid">
      <button type="button" class="btn btn-lg btn-block btn-primary center-block" id="generarPlantilla">Generar Plantilla</button>      
    </div>
  </div>
  <hr>
</body>
</html>