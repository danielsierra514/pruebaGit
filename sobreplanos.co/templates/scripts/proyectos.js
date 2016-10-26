var estados = ["Sin Iniciar", "En Construcciòn", "Finalizado"];
var tipos = ["Apartamento", "Casa", "VIS", "Oficina"];
var proyectosCliente = [];
var markersCliente = [];

var app = angular.module('listadorProyectos', []);

app.controller('listador', ['$scope', '$window', function($scope, $window) {
	$scope.estados = ["Sin Iniciar", "En Construcción", "Finalizado"];
	$scope.tipos = ["Apartamento", "Casa", "VIS", "Oficina"];
	$scope.generar = function(datos) {
		$scope.proyectos = datos;
	}
	$scope.verProyecto = function(idProyecto) {
		verInformacionProyecto(obtenerProyecto(idProyecto));
	}
	$scope.panear = function(x, y) {
		var posicion = new google.maps.LatLng(x, y);
		mapaCliente.panTo(posicion);
	}
}]);


function obtenerProyecto(idProyecto) {
	var objeto = {};
	$.each(proyectosCliente, function(key, item) {
		if (item.idProyecto == idProyecto) {
			objeto = item;
		}
	});
	return (objeto);
}

function obtenerPosicion(idProyecto) {
	var posicion = 0;
	$.each(proyectosCliente, function(key, item) {
		if (item.idProyecto == idProyecto) {
			posicion = key;
		}
	});
	return (posicion);
}

function borrarProyectos() {
	$.each(markersCliente, function(key, item) {
		item.setMap(null);
	});
	proyectosCliente = [];
	markersCliente = [];
}

function llamarProyectosCliente(callback) {
	borrarProyectos();
	$.post("../archivos/phps/listarProyectos.php?idCliente=" + idCliente, {
		modo: 0
	}).done(function(data) {
		$.each(data, function(key, item) {
			crearObjetoProyecto(item);

		});
		angular.element('body').scope().generar(proyectosCliente);
		angular.element('body').scope().$apply();
	});
	callback();
}


function crearObjetoProyecto(item) {

	var proyecto = {
		"idProyecto": item.idProyecto,
		"latitud": item.latitud,
		"longitud": item.longitud,
		"idConstructora": item.idConstructora,
		"nombre": item.nombre,
		"pais": item.pais,
		"departamento": item.departamento,
		"ciudad": item.ciudad,
		"barrio": item.barrio,
		"urlProyecto": item.urlProyecto,
		"tipo": item.tipo,
		"estrato": item.estrato,
		"estado": item.estado,
		"areasDesde": item.areasDesde,
		"preciosDesde": item.preciosDesde,
		"descripcion": item.descripcion,
		"imagenes": item.imagenes,
		"modalidades": item.modalidades,
		"agentes": item.agentes,
		"facilidades": item.facilidades,
		"nombreEmpresa": item.nombreEmpresa,
		"urlEmpresa": item.urlEmpresa,
		"logoEmpresa": item.logoEmpresa
	};

	var marker = new google.maps.Marker({
		idProyecto: proyecto.idProyecto,
		position: new google.maps.LatLng(proyecto.latitud, proyecto.longitud),
		icon: {
			url: "markers/" + tipoMarcador + ".png",
			scaledSize: new google.maps.Size(50, 50),
		},
		map: mapaCliente
	});

	proyectosCliente.push(proyecto);
	markersCliente.push(marker);
	verProyecto(marker, mapaCliente, "");
}

function verProyectoX() {
	var idProyecto = getUrlParameter('idProyecto');
	if (idProyecto > 0) {
		posicion = obtenerPosicion(idProyecto);
		google.maps.event.trigger(markersPrincipal[posicion], 'click');
	}
}

function verProyecto(marker, mapa, x) {

	 $('#marker-tooltip' + x).hide();

	google.maps.event.addListener(marker, 'mouseover', function() {

		var idX = marker.idProyecto;
		var proX = obtenerProyecto(idX);
		var logo = proX.logoEmpresa;
		var nombre = proX.nombre;
		var areaX = proX.areasDesde + " m<sup>2</sup>";
		var precioX = formata(proX.preciosDesde);
		var numTipo = parseInt(proX.tipo);
		var numEstado = parseInt(proX.estado);
		var tipo = tipos[numTipo - 1];
		var imagen =  proX.imagenes[0];
		var estado = estados[numEstado - 1];
		var contenido = "<div class='container-fluid'><div class='row-fluid'><div class='col-sm-12'><h5 class='float-left'>" + nombre + "</h5></div><div class='col-sm-12'><img class='imagenTooltip' src='"+imagen+"'></div><div class='col-sm-12'><p>"+ tipo + "/" + estado + "<br>Desde: <b>" + areaX + "</b> a <b>" + precioX + "</b></p></div></div></div>";

		var point = fromLatLngToPoint(marker.getPosition(), mapa);
		$('#marker-tooltip' + x).html(contenido).css({
		  'left': point.x ,
		  'top': point.y ,
		  'position': 'absolute'
		}).show();
		$("#thumbnailProyecto" + idX).prependTo("#listador");
		$("#listador").animate({
			scrollTop: 0
		}, 0);
		$("#thumbnailProyectoX" + idX).prependTo("#tiraImagenes");
		$("#tiraImagenes").animate({
			scrollLeft: 0
		}, 0);

	});

	google.maps.event.addListener(marker, 'mouseout', function() {
		$('#marker-tooltip' + x).hide();
	});

	google.maps.event.addListener(marker, 'click', function() {
		$('#marker-tooltip' + x).hide();
		zoomPrincipal = mapaPrincipal.getZoom();
		marker.setAnimation(google.maps.Animation.BOUNCE);
		mapa.panTo(marker.getPosition());
		mapa.setZoom(16);
		setTimeout(function() {
			marker.setAnimation(null);
			$("#modalFavoritos").modal("hide");
			verInformacionProyecto(obtenerProyecto(marker.idProyecto));
		}, 750);
	});
}