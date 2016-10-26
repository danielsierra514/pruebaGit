var proyectosPrincipal = [];
var markersPrincipal = [];

function obtenerProyecto(idProyecto) {
	var objeto = {};
	$.each(proyectosPrincipal, function(key, item) {
		if (item.idProyecto == idProyecto) {
			objeto = item;
		}
	});
	return (objeto);
}

function obtenerPosicion(idProyecto) {
	var posicion = 0;
	$.each(proyectosPrincipal, function(key, item) {
		if (item.idProyecto == idProyecto) {
			posicion = key;
		}
	});
	return (posicion);
}

function resetearVerProyecto() {
	$("#idFavorite").html("");
	$("#estratProyecto b").html("");
	$("#areaProyecto b").html("");
	$("#urlProyecto b").html("");
	$("#tipoProyecto b").html("");
	$("#precioProyecto b").html("");
	$("#departamentoProyecto b").html("");
	$("#ciudadProyecto b").html("");
	$("#barrioProyecto b").html("");
	$("#descripcionProyecto").html("");
	$("#estadoProyecto b").html("");
	$("#nombreProyecto").html("");
	$("#indicatorsImagenesProyecto").html("");
	$("#itemsImagenesProyecto").html("");
	$("#tablaModalidades tbody").html("");
	$("#tablaFacilidades tbody").html("");
	$("#tablaAgentesProyecto tbody").html("");
	$("#indicatorsAmpliadoImagenesProyecto").html("");
	$("#itemsAmpliadoImagenesProyecto").html("");
}

function borrarProyectos() {
	$.each(markersPrincipal, function(key, item) {
		item.setMap(null);
	});
	proyectosPrincipal = [];
	markersPrincipal = [];
}

function llamarProyectosPrincipal() {
	borrarProyectos();
	$.post("archivos/phps/listarProyectosAlemania.php", {
		modo: 0
	}).done(function(data) {
		$.each(data, function(key, item) {
			crearObjetoProyecto(item);
		});
		angular.element('#listador').scope().generar(proyectosPrincipal);
		angular.element('#listador').scope().$apply();
	});
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
		icon: "archivos/icons/marker.png",
		map: mapaPrincipal
	});
	proyectosPrincipal.push(proyecto);
	markersPrincipal.push(marker);
	verProyecto(marker, mapaPrincipal, "");
}

function verProyectoX() {
	var idProyecto = getUrlParameter('idProyecto');
	if (idProyecto > 0) {
		posicion = obtenerPosicion(idProyecto);
		google.maps.event.trigger(markersPrincipal[posicion], 'click');
	}
}

function verProyecto(marker, mapa, x) {

	google.maps.event.addListener(marker, 'mouseover', function() {
		var idX = marker.idProyecto;
		//aumentarVistas(idX);
		var proX = obtenerProyecto(idX);
		var logo = proX.logoEmpresa;
		var nombre = proX.nombre;
		var areaX = proX.areasDesde + " m<sup>2</sup>";
		var precioX = formata(proX.preciosDesde);
		var numTipo = parseInt(proX.tipo);
		var numEstado = parseInt(proX.estado);
		var tipo = tipos[numTipo - 1];
		var estado = estados[numEstado - 1];
		var contenido = "<div class='loguitoEmpresa'><img src='http://www.sobreplanos.co/archivos/logos/" + logo + ".png'></div><h5 class='float-left'>" + nombre + "</h5><p><b>Tipo: </b>" + tipo + "<br><b>Estado: </b>" + estado + "<br><b>Areas Desde: </b>" + areaX + "<br><b>Precios Desde: </b>" + precioX + "</p>";

		var point = fromLatLngToPoint(marker.getPosition(), mapa);
		$('#marker-tooltip' + x).removeClass().addClass("tooltip" + (numTipo - 1));
		$('#marker-tooltip' + x).html(contenido).css({
			'left': point.x,
			'top': point.y,
			'position': 'absolute'
		}).show();
	});

	google.maps.event.addListener(marker, 'mouseout', function() {
		$('#marker-tooltip' + x).hide();
	});

	google.maps.event.addListener(marker, 'click', function() {
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

function verPDF(archivo) {
	modalActual = "modalVerProyecto";
	$("#modalVerProyecto").modal("hide");
	$("#EspacioPDF").html("<iframe src='archivos/pdfs/" + archivo + ".pdf'><iframe>");
	$("#modalVerPDF").modal("show");
}


function listarImagenesProyecto() {
	$("#indicatorsImagenesProyecto").html("");
	$("#itemsImagenesProyecto").html("");
	$("#indicatorsAmpliadoImagenesProyecto").html("");
	$("#itemsAmpliadoImagenesProyecto").html("");
	$("#caruselImagenesProyecto").carousel("pause").removeData();
	$("#caruselImagenesProyecto").carousel(0);
	$("#caruselAmpliadoImagenesProyecto").carousel("pause").removeData();
	$("#caruselAmpliadoImagenesProyecto").carousel(0);
	$.each(imagenesProyecto, function(key, imagen) {
		if (key === 0) {
			$("#indicatorsImagenesProyecto").append("<li data-target='#caruselImagenesProyecto' data-slide-to='" + key + "' class='active'></li>");
			$("#itemsImagenesProyecto").append("<div class='item active'><img src='archivos/fotos/" + imagen + ".png'></div></div>");
			$("#indicatorsAmpliadoImagenesProyecto").append("<li data-target='#caruselAmpliadoImagenesProyecto' data-slide-to='" + key + "' class='active'></li>");
			$("#itemsAmpliadoImagenesProyecto").append("<div class='item active'><img src='archivos/fotos/" + imagen + ".png'></div>");
		} else {
			$("#indicatorsImagenesProyecto").append("<li data-target='#caruselImagenesProyecto' data-slide-to='" + key + "'></li>");
			$("#itemsImagenesProyecto").append("<div class='item'><img src='archivos/fotos/" + imagen + ".png'></div>");
			$("#indicatorsAmpliadoImagenesProyecto").append("<li data-target='#caruselAmpliadoImagenesProyecto' data-slide-to='" + key + "'></li>");
			$("#itemsAmpliadoImagenesProyecto").append("<div class='item'><img src='archivos/fotos/" + imagen + ".png'></div>");
		}
	});
}

function listarModalidadesProyecto() {
	$("#tablaModalidades tbody").html("");
	$.each(modalidadesProyecto, function(key, modalidad) {
		if (modalidad.rutaPDF === "") {
			$("#tablaModalidades tbody").append("<tr><td>" + modalidad.area + "<span>m<sup>2</sup></span></td><td>" + modalidad.banos + "</td><td>" + modalidad.habitaciones + "</td><td>" + modalidad.parqueaderos + "</td><td>" + formata(modalidad.precio) + "</td><td></td></tr>");
		} else {
			$("#tablaModalidades tbody").append("<tr><td>" + modalidad.area + "<span>m<sup>2</sup></span></td><td>" + modalidad.banos + "</td><td>" + modalidad.habitaciones + "</td><td>" + modalidad.parqueaderos + "</td><td>" + formata(modalidad.precio) + "</td><td><a href='#' onclick=verPDF('" + modalidad.rutaPDF + "')><img class='iconPDF' src='archivos/icons/pdf.png'></a></td></tr>");
		}
	});
}

function verInformacionProyecto(proyecto, mapa) {
	resetearVerProyecto();
	latitudDestino=proyecto.latitud;
	longitudDestino=proyecto.longitud;
	$("#idFavorite").html(proyecto.idProyecto);
	$("#estratProyecto b").html(proyecto.estrato);
	$("#areaProyecto b").html(proyecto.areasDesde);
	$(".contenedorLogo").html("<img class='center-block' target='_blank' href='http://" + proyecto.urlEmpresa + "' src='archivos/logos/" + proyecto.logoEmpresa + ".png'>");
	$("#urlProyecto b").html(proyecto.urlProyecto);
	$("#tipoProyecto b").html(tipos[proyecto.tipo - 1]);
	$("#precioProyecto b").html(formata(proyecto.preciosDesde));
	$("#estadoProyecto b").html(estados[proyecto.estado - 1]);
	$("#departamentoProyecto b").html(proyecto.departamento);
	$("#ciudadProyecto b").html(proyecto.ciudad);
	$("#barrioProyecto b").html(proyecto.barrio);
	$("#descripcionProyecto").html(proyecto.descripcion);
	$("#tituloModalPDF").html("<img class='imgTitulo' src='archivos/icons/pdf.png' height='30'>  " + proyecto.nombre);
	$("#nombreProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' height='30'>  " + proyecto.nombre);
	$("#nombreAmpliadoProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' height='30'>  " + proyecto.nombre);
	imagenesProyecto = proyecto.imagenes;
	listarImagenesProyecto();
	modalidadesProyecto = proyecto.modalidades;
	listarModalidadesProyecto();
	$("#modalVerProyecto").modal("show");
}

/*************************************************************************/

var proyectosFavoritos = [];
var markersFavoritos = [];


function agregarFavoritos(idProyecto) {

	var favorito = obtenerProyecto(idProyecto);
	var marker = new google.maps.Marker({
		idProyecto: favorito.idProyecto,
		position: new google.maps.LatLng(favorito.latitud, favorito.longitud),
		icon: "archivos/icons/marker.png",
		map: mapaFavoritos
	});
	proyectosFavoritos.push(favorito);
	markersFavoritos.push(marker);
	verProyecto(marker, mapaFavoritos, "X");
	modalActual = "";
	$("#modalVerProyecto").modal("hide");
	$("#textoMensaje").html("Este Proyecto se ha agregado a la lista de favoritos.")
	$("#modalMensaje").modal("show");
}

function subirFavoritos(xxxxxxxxxxxx) {

	
}

function llamarFavoritos(xxxxxxxxxxxx) {

	
}

function listarFavoritos() {
	$("#tablaComparar tbody").html("");
	$.each(proyectosFavoritos, function(key, favorito) {
		var favX = "";
		$.each(favorito.facilidades, function(key, facilidad) {
			favX = favX + "<li>" + facilidad.facilidad + "</li>";
		});
		var campo1 = "<img class='imagenProyectoFavoritos' src='archivos/fotos/" + favorito.imagenes[0] + ".png' alt='...''>";
		var campo2 = "<h4>" + favorito.nombre + "</h4><ul class='list-unstyled'><li>P Desde: " + formata(favorito.preciosDesde) + "</li><li>A Desde: " + favorito.areasDesde + "m<sup>2</sup></li><li>$/m<sup>2</sup>: " + formata(parseInt(favorito.preciosDesde) / parseInt(favorito.areasDesde)) + "</li><li>Estrato:" + favorito.estrato + "</li><li>Tipo:" + tipos[favorito.tipo - 1] + "</li><li>Estado:" + estados[favorito.estado - 1] + "</li></ul>";
		var campo3 = "<ul>" + favX + "</ul>";
		var campo4 = "<div class='logoEmpFavoritos'><img src='archivos/logos/" + favorito.logoEmpresa + ".png'></div>";
		$("#tablaComparar tbody").append("<tr><td>" + campo1 + "</td><td>" + campo2 + "</td><td>" + campo3 + "</td><td>" + campo4 + "</td></tr>");
	});
}

function aumentarVistas(idProyecto) {
	$.post("archivos/phps/acumularVistas.php", {
		idProyecto: idProyecto
	}).done(function(data) {

	});
}

/***************************************************/

function crearNuevoContacto() { /*PDF*/
	var contacto = {
		"idProyecto":$("#idFavorite").html(),
		"nombre": $("#nombreCliente").val(),
		"email": $("#emailCliente").val(),
		"telefono": $("#telefonoCliente").val()
	};
	return contacto;
}

 function validarFormularioContacto() {
    var errores = 0;
    $(".campoContactoCliente").each(function() {
      errores = errores + validarTexto($(this).attr('id'));
    });
    return errores;
  }

function subirContacto(data) {
	/*iniciarTransferencia("Contactando....");
	$.ajax({
		type: "POST",
		url: "archivos/phps/crearContacto.php",
		data: {
			info: data
		},
		dataType: 'json'
	}).done(function(respuesta) {
		imprimirObjeto(respuesta);
		finalizarTransferencia(respuesta);
	});*/
}