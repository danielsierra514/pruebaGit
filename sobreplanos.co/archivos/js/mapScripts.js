var mapaPrincipal;
var opcionesMapaPrincipal;
var zoomPrincipal;

var panorama;
var panoramaService;
var streetView;

var mapaFavoritos;
var opcionesMapaFavoritos;

var mapaProyecto;
var opcionesMapaProyecto;

var mapaMini;
var opcionesMapaMini;

var mapaCuenta;
var opcionesMapaCuenta;

var mapaAgente;
var opcionesMapaAgente;

var mapaCliente;
var opcionesMapaCliente;

var latitudeNavegador;
var longitudeNavegador;

var latitudPrincipal = 0;
var longitudPrincipal = 0;
var latitudDestino = 0;
var longitudDestino = 0;

var latitudNavegador = 0;
var longitudNavegador = 0;




var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

function configurarMapaCliente(latitud, longitud, zoom, random) {
	opcionesMapaCliente = {
		styles: mapStyles[7],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: true,
		zoomControl: true,
		scrollwheel: false,
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

function configurarMapaFavoritos(latitud, longitud, zoom, random) {
	opcionesMapaFavoritos = {
		styles: mapStyles[random],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: true,
		zoomControl: true,
		scaleControl: false,
		streetViewControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.MEDIUM,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		panControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		},
	};
}

function configurarMapaMini(latitud, longitud, zoom, random) {
	opcionesMapaMini = {
		styles: mapStyles[random],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: false,
		zoomControl: true,
		scaleControl: false,
		scrollwheel: false,
		streetViewControl: false,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.MEDIUM,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		panControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		},
	};
}

function configurarMapaPrincipal(latitud, longitud, zoom, random) {
	opcionesMapaPrincipal = {
		styles: mapStyles[random],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: true,
		zoomControl: true,
		scaleControl: false,
		streetViewControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.MEDIUM,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		panControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		}
	};
}

function configurarMapaProyecto(latitud, longitud, zoom, random) {
	opcionesMapaProyecto = {
		styles: mapStyles[random],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		maxZoom: 17,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: true,
		zoomControl: true,
		scaleControl: false,
		streetViewControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.MEDIUM,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		panControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		},
	};
}

function configurarMapaCuenta(latitud, longitud, zoom, random) {
	opcionesMapaCuenta = {
		styles: mapStyles[random],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: true,
		zoomControl: true,
		scaleControl: true,
		streetViewControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.MEDIUM,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		panControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		}
	};
}

function configurarMapaAgente(latitud, longitud, zoom, random) {
	opcionesMapaAgente = {
		styles: mapStyles[random],
		center: new google.maps.LatLng(latitud, longitud),
		zoom: zoom,
		minZoom: 2,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		mapTypeControl: false,
		panControl: true,
		zoomControl: true,
		scaleControl: false,
		streetViewControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.MEDIUM,
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		panControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_BOTTOM
		}
	};
}


function iniciarMapaFavoritos() {
	mapaFavoritos = new google.maps.Map(document.getElementById("mapaFavoritos"), opcionesMapaFavoritos);

}

function iniciarMapaMini() {
	mapaMini = new google.maps.Map(document.getElementById("mapaMini"), opcionesMapaMini);

}

function iniciarMapaCliente() {
	mapaCliente = new google.maps.Map(document.getElementById("mapaCliente"), opcionesMapaCliente);

}

function iniciarMapaPrincipal() {
	mapaPrincipal = new google.maps.Map(document.getElementById("mapaPrincipal"), opcionesMapaPrincipal);
	directionsDisplay.setMap(mapaPrincipal);
	directionsDisplay.setOptions({
		'infoWindow': false,
		'suppressMarkers': true
	});
	directionsDisplay.setPanel(document.getElementById("comollegar"));
	directionsDisplay.setDirections({
		routes: []
	});
	var input = (document.getElementById('formBuscador'));
	var valinput = (document.getElementById('formBuscadorVal'));
	var logoEmpresa = (document.getElementById('logoEmpresa'));
	var social = (document.getElementById('social-icons'));
	mapaPrincipal.controls[google.maps.ControlPosition.TOP_RIGHT].push(social);
	mapaPrincipal.controls[google.maps.ControlPosition.TOP_RIGHT].push(logoEmpresa);
	mapaPrincipal.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
	var autocomplete = new google.maps.places.Autocomplete(valinput);
	autocomplete.bindTo('bounds', mapaPrincipal);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			return;
		}
		if (place.geometry.viewport) {
			mapaPrincipal.fitBounds(place.geometry.viewport);
		} else {
			mapaPrincipal.panTo(place.geometry.location);
			setTimeout(mapaPrincipal.setZoom(17), 1000);
		}
	});
	panoramaService = new google.maps.StreetViewService();
	panorama = new google.maps.StreetViewPanorama(document.getElementById("panorama"));
	mapaPrincipal.setStreetView(panorama);
	streetView = mapaPrincipal.getStreetView();
	google.maps.event.addListener(streetView, "position_changed", function() {
		$("#modalPanorama").modal("show");
		setTimeout(function() {
			google.maps.event.trigger(panorama, 'resize');
		}, 500);
	});
	google.maps.event.addListenerOnce(mapaPrincipal, 'idle', function() {});
}



function iniciarMapaProyecto() {
	mapaProyecto = new google.maps.Map(document.getElementById("mapaProyecto"), opcionesMapaProyecto);
	var inputProyecto = (document.getElementById('formBuscadorProyecto'));
	var valinputProyecto = (document.getElementById('formBuscadorValProyecto'));
	mapaProyecto.controls[google.maps.ControlPosition.TOP_LEFT].push(inputProyecto);
	var autocompleteProyecto = new google.maps.places.Autocomplete(valinputProyecto);
	autocompleteProyecto.bindTo('bounds', mapaProyecto);
	google.maps.event.addListener(autocompleteProyecto, 'place_changed', function() {
		var place = autocompleteProyecto.getPlace();
		if (!place.geometry) {
			return;
		}
		if (place.geometry.viewport) {
			mapaProyecto.fitBounds(place.geometry.viewport);
			setTimeout(mapaProyecto.setZoom(13), 1000);
		} else {
			mapaProyecto.panTo(place.geometry.location);
			setTimeout(mapaProyecto.setZoom(13), 1000);
		}
	});

	google.maps.event.addListener(mapaProyecto, "center_changed", function(event) {
		var c = mapaProyecto.getCenter();
		informacion(c);
	});
}

function iniciarMapaCuenta() {
	
	mapaCuenta = new google.maps.Map(document.getElementById("mapaCuenta"), opcionesMapaCuenta);
	var inputCuenta = (document.getElementById('formBuscador'));
	var valinputCuenta = (document.getElementById('formBuscadorVal'));
	var logoEmpresa = (document.getElementById('logoEmpresa'));
	mapaCuenta.controls[google.maps.ControlPosition.TOP_RIGHT].push(logoEmpresa);
	mapaCuenta.controls[google.maps.ControlPosition.TOP_LEFT].push(inputCuenta);
	var autocompleteCuenta = new google.maps.places.Autocomplete(valinputCuenta);
	autocompleteCuenta.bindTo('bounds', mapaCuenta);
	google.maps.event.addListener(autocompleteCuenta, 'place_changed', function() {
		var place = autocompleteCuenta.getPlace();
		if (!place.geometry) {
			return;
		}
		if (place.geometry.viewport) {
			mapaCuenta.fitBounds(place.geometry.viewport);
		} else {
			mapaCuenta.panTo(place.geometry.location);
			setTimeout(mapaCuenta.setZoom(17), 1000);
		}
	});

	panoramaService = new google.maps.StreetViewService();
	panorama = new google.maps.StreetViewPanorama(document.getElementById("panorama"));
	mapaCuenta.setStreetView(panorama);
	streetView = mapaCuenta.getStreetView();
	google.maps.event.addListener(streetView, "position_changed", function() {
		$("#modalPanorama").modal("show");
		setTimeout(function() {
			google.maps.event.trigger(panorama, 'resize');
		}, 500);

	});

}


function iniciarMapaAgente() {
	mapaAgente = new google.maps.Map(document.getElementById("mapaAgente"), opcionesMapaAgente);
	directionsDisplay.setMap(mapaAgente);
	directionsDisplay.setOptions({
		'infoWindow': false,
		'suppressMarkers': true
	});
	directionsDisplay.setPanel(document.getElementById("comollegar"));
	directionsDisplay.setDirections({
		routes: []
	});
	var input = (document.getElementById('formBuscador'));
	var valinput = (document.getElementById('formBuscadorVal'));
	var logoEmpresaX = (document.getElementById('logoEmpresaX'));
	var fotoFlotanteEmpresa = (document.getElementById('fotoFlotanteEmpresa'));
	mapaAgente.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(logoEmpresaX);
	mapaAgente.controls[google.maps.ControlPosition.TOP_RIGHT].push(fotoFlotanteEmpresa);
	mapaAgente.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
	var autocomplete = new google.maps.places.Autocomplete(valinput);
	autocomplete.bindTo('bounds', mapaAgente);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			return;
		}
		if (place.geometry.viewport) {
			mapaAgente.fitBounds(place.geometry.viewport);
		} else {
			mapaAgente.panTo(place.geometry.location);
			setTimeout(mapaAgente.setZoom(17), 1000);
		}
	});
	panoramaService = new google.maps.StreetViewService();
	panorama = new google.maps.StreetViewPanorama(document.getElementById("panorama"));
	mapaAgente.setStreetView(panorama);
	streetView = mapaAgente.getStreetView();
	google.maps.event.addListener(streetView, "position_changed", function() {
		$("#modalPanorama").modal("show");
	});
	google.maps.event.addListenerOnce(mapaAgente, 'idle', function() {});
}



function obtenerUbicacionNavegador(mapa) {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(location) {
			latitudeNavegador = location.coords.latitude;
			longitudeNavegador = location.coords.longitude;
			posicionarNavegador(latitudeNavegador, longitudeNavegador,mapa);
		}, function() {
			$.getJSON('https://freegeoip.net/json/').done(function(location) {
				latitudeNavegador = location.latitude;
				longitudeNavegador = location.longitude;
				posicionarNavegador(latitudeNavegador, longitudeNavegador,mapa);
			});
		}, {
			enableHighAccuracy: true,
			timeout: 1000,
			maximumAge: 1000
		});
	} else {
		$.getJSON('https://freegeoip.net/json/').done(function(location) {
			latitudeNavegador = location.latitude;
			longitudeNavegador = location.longitude;
			posicionarNavegador(latitudeNavegador, longitudeNavegador,mapa);
		});
	}
}

function posicionarNavegador(latitude, longitude,mapa) {
	var yo = new google.maps.Marker({
		position: new google.maps.LatLng(latitude, longitude),
		icon: "archivos/icons/me.png",
		map: mapa,
		draggable: true
	});
	google.maps.event.addListener(yo,'dragend', function() {

        latitudeNavegador = yo.position.lat();
        longitudeNavegador = yo.position.lng();
		calcRoute();
    });	
}


function iniciarPrincipal(callback) {
	var random = 6;
	configurarMapaPrincipal(4.641274, -74.104843, 6, random);
	configurarMapaFavoritos(4.641274, -74.104843, 6, random);
	configurarMapaMini(4.641274, -74.104843, 14, random);
	iniciarMapaPrincipal();
	iniciarMapaFavoritos();
	iniciarMapaMini();
	callback();
}

function centrarPrincipal() {
	var latitudTarget = getUrlParameter("latitud");
	var longitudTarget = getUrlParameter("longitud");
	var idBusqueda = getUrlParameter("idProyecto");
	if (idBusqueda > 0) {
		posicion = obtenerPosicion(idBusqueda);
		google.maps.event.trigger(markersPrincipal[posicion], 'click');
	} else if ((latitudTarget) && (longitudTarget)) {
		mapaPrincipal.setCenter(new google.maps.LatLng(latitudTarget, longitudTarget));
		mapaFavoritos.setCenter(new google.maps.LatLng(latitudTarget, longitudTarget));
		mapaPrincipal.setZoom(12);
	} else {
		mapaPrincipal.setCenter(new google.maps.LatLng(latitudeNavegador, longitudeNavegador));
		mapaFavoritos.setCenter(new google.maps.LatLng(latitudeNavegador, longitudeNavegador));
		mapaPrincipal.setZoom(15);
	}
}

/*PRINCIPAL*/
function success(pos) {
	$("#comoLlegar").css('display', 'block');
	var crd = pos.coords;
	latitudPrincipal = crd.latitude;
	longitudPrincipal = crd.longitude;
	alert("latitudPrincipal");
	mapaPrincipal.setCenter(new google.maps.LatLng(latitudPrincipal, longitudPrincipal));
	mapaFavoritos.setCenter(new google.maps.LatLng(latitudPrincipal, longitudPrincipal));
	mapaPrincipal.setZoom(14);
	var yo = new google.maps.Marker({
		position: new google.maps.LatLng(latitudPrincipal, longitudPrincipal),
		icon: "archivos/icons/me.png",
		map: mapaPrincipal
	});
}

function error(err) {
	alert("error");
	$.getJSON('https://freegeoip.net/json/')
		.done(function(location) {
			imprimirObjeto(location);
		});
}



function iniciarCliente() {
	var random = 6;
	configurarMapaCliente(4.641274, -74.104843, 6, random);
	iniciarMapaCliente();

}

/*CUENTA*/
function successProyecto(pos) {
	var crd = pos.coords;
	mapaProyecto.setCenter(new google.maps.LatLng(crd.latitude, crd.longitude));
	mapaCuenta.setCenter(new google.maps.LatLng(crd.latitude, crd.longitude));
}

function errorProyecto(err) {

}
 
function iniciarCuenta(callback) {
	
	var random = 6;
	configurarMapaProyecto(4.641274, -74.104843, 6, random);
	configurarMapaCuenta(4.641274, -74.104843, 6, random);
	iniciarMapaProyecto();
	iniciarMapaCuenta();
	
	callback();
	
}

function centrarCuenta(random) {
		mapaCuenta.setCenter(new google.maps.LatLng(latitudeNavegador, longitudeNavegador));
		mapaProyecto.setCenter(new google.maps.LatLng(latitudeNavegador, longitudeNavegador));
		mapaCuenta.setZoom(15);
}


/****AGENTE****/

function successAgente(pos) {
	var crd = pos.coords;
	mapaProyecto.setCenter(new google.maps.LatLng(crd.latitude, crd.longitude));
	mapaAgente.setCenter(new google.maps.LatLng(crd.latitude, crd.longitude));
}

function errorAgente(err) {

}

function iniciarAgente() {
	var random = 6;
	configurarMapaProyecto(4.641274, -74.104843, 6, random);
	configurarMapaAgente(4.641274, -74.104843, 6, random);
	iniciarMapaProyecto();
	iniciarMapaAgente();

}

function centrarAgente(random) {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(successAgente, errorAgente, options);
	} else {

	}
}

function centrarAgenteX() {
	var cent;
	var lato;
	var longo;
	$.get("http://ipinfo.io", function(response) {
		cent = response.loc;
		cent = cent.split(",")
		lato = parseFloat(cent[0]);
		longo = parseFloat(cent[1]);
		$("#comoLlegar").css('display', 'block');
		latitudPrincipal = lato;
		longitudPrincipal = longo;
		mapaAgente.setCenter(new google.maps.LatLng(latitudPrincipal, longitudPrincipal));
		mapaProyecto.setCenter(new google.maps.LatLng(latitudPrincipal, longitudPrincipal));
		mapaAgente.setZoom(12);
		var yo = new google.maps.Marker({
			position: new google.maps.LatLng(latitudPrincipal, longitudPrincipal),
			icon: "archivos/icons/me.png",
			map: mapaAgente
		});
	}, "jsonp");
}


function informacion(latlng) {
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({
		'latLng': latlng
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var country;
			var departamento;
			var ciudad;
			var localidad;
			var otro;

			for (i = 0; i < results[0].address_components.length; i = i + 1) {
				for (j = 0; j < results[0].address_components[i].types.length; j = j + 1) {
					if (results[0].address_components[i].types[j] == "country") {
						country = results[0].address_components[i].long_name;
					}
					if (results[0].address_components[i].types[j] == "administrative_area_level_1") {
						departamento = results[0].address_components[i].long_name;
					}
					if (results[0].address_components[i].types[j] == "locality") {
						ciudad = results[0].address_components[i].long_name;
					}
					if (results[0].address_components[i].types[j] == "sublocality") {
						localidad = results[0].address_components[i].long_name;
					}
					if (results[0].address_components[i].types[j] == "neighborhood") {
						otro = results[0].address_components[i].long_name;
					}
				}
			}
			$('#paisCrearProyecto').val(country);
			$('#departamentoCrearProyecto').val(departamento);
			$('#ciudadCrearProyecto').val(ciudad);
			$('#localidadCrearProyecto').val(localidad);
			$('#barrioCrearProyecto').val(otro);
			$('#latitudCrearProyecto').val(latlng.lat());
			$('#longitudCrearProyecto').val(latlng.lng());
		}
	});
}

function calcRoute() {
	var request = {
		origin: new google.maps.LatLng(latitudeNavegador, longitudeNavegador),
		destination: new google.maps.LatLng(latitudDestino, longitudDestino),
		travelMode: "DRIVING"
	};
	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
		}
	});
	$("#direcciones").css("display","block");
}