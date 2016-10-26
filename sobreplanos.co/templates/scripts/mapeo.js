
var mapaCliente;
var opcionesMapaCliente;

var panorama;
var panoramaService;
var streetView;

var latitudPrincipal = 0;
var longitudPrincipal = 0;
var latitudDestino = 0;
var longitudDestino = 0;

/*var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();*/

function configurarMapaCliente(latitud, longitud, zoom, random) {
  opcionesMapaCliente = {
    styles: mapStyles[colorMapa],
    center: new google.maps.LatLng(latitud, longitud),
    zoom: zoom,
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
}

function iniciarMapaCliente() {
  mapaCliente = new google.maps.Map(document.getElementById("mapaCliente"), opcionesMapaCliente);
  /*directionsDisplay.setMap(mapaCliente);
  directionsDisplay.setOptions({
    'infoWindow': false,
    'suppressMarkers': true
  });*/

  /*directionsDisplay.setPanel(document.getElementById("comollegar"));
  directionsDisplay.setDirections({
    routes: []
  });*/

  var input = (document.getElementById('buscadorMapa'));
  var valinput = (document.getElementById('formBuscadorVal'));

  mapaCliente.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  var autocomplete = new google.maps.places.Autocomplete(valinput);
  autocomplete.bindTo('bounds', mapaCliente);
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }
    if (place.geometry.viewport) {
      mapaCliente.fitBounds(place.geometry.viewport);
    } else {
      mapaCliente.panTo(place.geometry.location);
      setTimeout(mapaCliente.setZoom(17), 1000);
    }
  });

  /*panoramaService = new google.maps.StreetViewService();
  panorama = new google.maps.StreetViewPanorama(document.getElementById("panorama"));
  mapaCliente.setStreetView(panorama);
  streetView = mapaCliente.getStreetView();
  google.maps.event.addListener(streetView, "position_changed", function() {
    $("#modalPanorama").modal("show");
    setTimeout(function() {
      google.maps.event.trigger(panorama, 'resize');
    }, 500);

  });*/
  google.maps.event.addListenerOnce(mapaCliente, 'idle', function() {});
}


var options = {
  enableHighAccuracy: true,
  timeout: 1000,
  maximumAge: 1000
};

function mostrarCosas() {
  $("#formBuscador").css('display', 'block');
}


function success(pos) {
  $("#comoLlegar").css('display', 'block');
  var crd = pos.coords;
  latitudPrincipal = crd.latitude;
  longitudPrincipal = crd.longitude;
  mapaCliente.setCenter(new google.maps.LatLng(latitudPrincipal, longitudPrincipal));
  mapaCliente.setZoom(14);
  var yo = new google.maps.Marker({
    position: new google.maps.LatLng(latitudPrincipal, longitudPrincipal),
    icon: "../archivos/icons/me.png",
    map: mapaCliente
  });
}

function error(err) {

}

function iniciarCliente(callback) {
  var random = 6;
  configurarMapaCliente(4.641274, -74.104843, 6, random);
  iniciarMapaCliente();
  callback();
}

function centrarCliente(random) {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error, options);
  } else {

  }
}

function centrarClienteX() {
  var cent;
  var lato;
  var longo;
  $.get("http://ipinfo.io", function(response) {
    cent = response.loc;
    cent = cent.split(",")
    lato = parseFloat(cent[0]);
    longo = parseFloat(cent[1]);
    /*$("#comoLlegar").css('display', 'block');*/
    latitudPrincipal = lato;
    longitudPrincipal = longo;
    mapaCliente.setCenter(new google.maps.LatLng(latitudPrincipal, longitudPrincipal));
    mapaCliente.setZoom(14);
    var yo = new google.maps.Marker({
      position: new google.maps.LatLng(latitudPrincipal, longitudPrincipal),
      icon: "../archivos/icons/me.png",
      map: mapaCliente,
      draggable: true
    });
    google.maps.event.addListener(yo, 'drag', function() {
      latitudPrincipal = yo.position.lat();
      longitudPrincipal = yo.position.lng();
    });
  }, "jsonp");
}

/*function calcRoute() {
  var request = {
    origin: new google.maps.LatLng(latitudPrincipal, longitudPrincipal),
    destination: new google.maps.LatLng(latitudDestino, longitudDestino),
    travelMode: "DRIVING"
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
  $("#direcciones").css("display", "block");
}*/





