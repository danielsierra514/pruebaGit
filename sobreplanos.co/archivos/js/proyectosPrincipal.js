var proyectosPrincipal = [];
var markersPrincipal = [];
var markersMini = [];

var imagenes360 = [];

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
	$("#nombreProyecto2").html("");
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

function llamarProyectosPrincipal(callback) {
	borrarProyectos();
	$.post("archivos/phps/listarProyectos.php", {
		modo: 0
	}).done(function(data) {
		$.each(data, function(key, item) {
			crearObjetoProyecto(item);
		});
		angular.element('#listador').scope().generar(proyectosPrincipal);
		angular.element('#listador').scope().$apply();
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
		"fotos360": item.fotos360,
		"videos": item.videos,
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

function ocultarThumbnail() {
	$('#marker-tooltip').hide();
}

function mostrarThumbnail(idProyecto) {
	
	marker=markersPrincipal[obtenerPosicion(idProyecto)];
	var proX = obtenerProyecto(idProyecto);
	var logo = proX.logoEmpresa;
	var nombre = proX.nombre;
	var areaX = proX.areasDesde + " m<sup>2</sup>";
	var precioX = formata(proX.preciosDesde);
	var numTipo = parseInt(proX.tipo);
	var numEstado = parseInt(proX.estado);
	var tipo = tipos[numTipo - 1];
	var estado = estados[numEstado - 1];
	var contenido = "<div class='loguitoEmpresa'><img src='http://www.sobreplanos.co/archivos/logos/" + logo + ".png'></div><h5 class='float-left'>" + nombre + "</h5><p><b>Tipo: </b>" + tipo + "<br><b>Estado: </b>" + estado + "<br><b>Areas Desde: </b>" + areaX + "<br><b>Precios Desde: </b>" + precioX + "</p>";

	var point = fromLatLngToPoint(marker.getPosition(), mapaPrincipal);
	$('#marker-tooltip').removeClass().addClass("tooltip" + (numTipo - 1));
	$('#marker-tooltip').html(contenido).css({
		'left': point.x + $("#mapaPrincipal").offset().left,
		'top': point.y + 8,
		'position': 'absolute'
	}).show();

}

function ocultarThumbnailFavorito() {
	$('#marker-tooltipX').hide();
}



function verProyecto(marker, mapa) {
		google.maps.event.addListener(marker, 'mouseover', function() {
		mostrarThumbnail(marker.idProyecto);
		$("#cxy").animate({scrollTop: 0	}, 0);
		$("#cxy").animate({	scrollTop: $("#thumbnailProyecto" + marker.idProyecto).offset().top - 100	}, 300);
		$(".splitBanner").animate({	scrollLeft: 0	}, 0);
		$(".splitBanner").animate({	scrollLeft: $("#thumbnailProyectoX" + marker.idProyecto).offset().left+5 }, 300);
		$("#thumbnailProyecto" + marker.idProyecto).addClass('thumbSeleccionado');	
	});

	google.maps.event.addListener(marker, 'mouseout', function() {
		$('#marker-tooltip').hide();
		$("#thumbnailProyecto" + marker.idProyecto).removeClass('thumbSeleccionado');		
	});

	google.maps.event.addListener(marker, 'click', function() {
		aumentarVistas(marker.idProyecto);
		$('#marker-tooltip').hide();
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

function listarImagenes360(imagenes) {
	$("#botones360").html("");
	$.each(imagenes, function(key, imagen) {
		var numBoton=key+1;
		$("#botones360").append("<button id='view"+key+"' type='button' class='btn btn-primary view360'>"+ numBoton+"</button>");
	
	});
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
			$("#itemsImagenesProyecto").append("<div class='item active'><img src='" + imagen + "'></div></div>");
			$("#indicatorsAmpliadoImagenesProyecto").append("<li data-target='#caruselAmpliadoImagenesProyecto' data-slide-to='" + key + "' class='active'></li>");
			$("#itemsAmpliadoImagenesProyecto").append("<div class='item active'><img src='" + imagen + "'></div>");
		} else {
			$("#indicatorsImagenesProyecto").append("<li data-target='#caruselImagenesProyecto' data-slide-to='" + key + "'></li>");
			$("#itemsImagenesProyecto").append("<div class='item'><img src='" + imagen + "'></div>");
			$("#indicatorsAmpliadoImagenesProyecto").append("<li data-target='#caruselAmpliadoImagenesProyecto' data-slide-to='" + key + "'></li>");
			$("#itemsAmpliadoImagenesProyecto").append("<div class='item'><img src='" + imagen + "'></div>");
		}
	});
}

function listarModalidadesProyecto() {
	$("#tablaModalidades tbody").html("");
	$.each(modalidadesProyecto, function(key, modalidad) {
		if (modalidad.rutaPDF === "") {
			$("#tablaModalidades tbody").append("<tr><td>" + modalidad.area + "<span>m<sup>2</sup></span></td><td class='hidden-xs hidden-sm'>" + modalidad.banos + "</td><td class='hidden-xs hidden-sm'>" + modalidad.habitaciones + "</td><td class='hidden-xs hidden-sm'>" + modalidad.parqueaderos + "</td><td>" + formata(modalidad.precio) + "</td><td></td></tr>");
		} else {
			$("#tablaModalidades tbody").append("<tr><td>" + modalidad.area + "<span>m<sup>2</sup></span></td><td class='hidden-xs hidden-sm'>" + modalidad.banos + "</td><td class='hidden-xs hidden-sm'>" + modalidad.habitaciones + "</td><td class='hidden-xs hidden-sm'>" + modalidad.parqueaderos + "</td><td>" + formata(modalidad.precio) + "</td><td><a href='#' onclick=verPDF('" + modalidad.rutaPDF + "')><img class='iconPDF' src='archivos/icons/pdf.png'></a></td></tr>");
		}
	});
}

function listarVideosProyecto() {
	$("#video-carrusel tr").html("");
	$.each(videosProyecto, function(key, video) {		
		$("#video-carrusel tr").append("<td><div class='cajonVideo'><iframe src='https://www.youtube.com/embed/"+video+"' allowfullscreen='allowfullscreen' mozallowfullscreen='mozallowfullscreen' msallowfullscreen='msallowfullscreen' oallowfullscreen='oallowfullscreen' webkitallowfullscreen='webkitallowfullscreen'></iframe></div></td><hr>");
	});
}

function listarFacilidadesProyecto() {
	$("#facilidadesProyectox").html("");
	$.each(facilidadesProyecto, function(key, facilidad) {
		$("#facilidadesProyectox").append("<li>" + facilidad.facilidad + "</li>");
	});
}

function verInformacionProyecto(proyecto, mapa) {
	
	$('#marker-tooltip').hide();
	resetearVerProyecto();
	latitudDestino = proyecto.latitud;
	longitudDestino = proyecto.longitud;
	var centro= new google.maps.LatLng(proyecto.latitud, proyecto.longitud);
	$.each(markersMini, function(key, item) {
		item.setMap(null);
	});
	markersMini = [];
	var marker = new google.maps.Marker({
		position:centro,
		icon: "archivos/icons/marker.png",
		map: mapaMini
	});
	markersMini.push(marker);
	
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
	$("#nombreProyecto2").html(proyecto.nombre);
	$("#nombreAmpliadoProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' height='30'>  " + proyecto.nombre);
	imagenes360=proyecto.fotos360;
	$("#photoSphereViewer").html("");
	if (imagenes360.length > 0) {
		$("#photoSphereViewer").css("display","block");
    listarImagenes360(proyecto.fotos360);
	}else{		
		$("#photoSphereViewer").css("display","none");
	}	
	imagenesProyecto = proyecto.imagenes;
	listarImagenesProyecto();
	videosProyecto = proyecto.videos;
	listarVideosProyecto();
	modalidadesProyecto = proyecto.modalidades;
	listarModalidadesProyecto();
	facilidadesProyecto = proyecto.facilidades;
	listarFacilidadesProyecto();
	$("#modalVerProyecto").modal("show");
	
	setTimeout(function() {				
		google.maps.event.trigger(mapaMini, 'resize');
		mapaMini.setCenter(centro);
		$("#view0").trigger("click");
		}, 750);

}

/*************************************************************************/

var proyectosFavoritos = [];
var idFavoritos = [];
var markersFavoritos = [];

function verFavorito(marker, mapa) {	
	$('#marker-tooltipX').hide();
		google.maps.event.addListener(marker, 'mouseover', function() {

	});

	google.maps.event.addListener(marker, 'mouseout', function() {
		$('#marker-tooltipX').hide();
	});

	google.maps.event.addListener(marker, 'click', function() {
		aumentarVistas(marker.idProyecto);
		$('#marker-tooltipX').hide();
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

function crearObjetoFavoritos() {
	var favoritosFacebook = {
		idCliente: idCliente,
		favoritos: idFavoritos
	}
	return favoritosFacebook;
}

function agregarFavoritos(idProyecto) {
	var favorito = obtenerProyecto(idProyecto);
	var marker = new google.maps.Marker({
		idProyecto: favorito.idProyecto,
		position: new google.maps.LatLng(favorito.latitud, favorito.longitud),
		icon: "archivos/icons/marker.png",
		map: mapaFavoritos
	});
	proyectosFavoritos.push(favorito);
	idFavoritos.push(favorito.idProyecto);
	markersFavoritos.push(marker);
	verFavorito(marker, mapaFavoritos, "X");
}

function subirFavoritos(data) {
	modalActual = "modalFavoritos";
	iniciarTransferencia("Guardando....");
	$.ajax({
		type: "POST",
		url: "archivos/phps/guardarFavoritos.php",
		data: {
			info: data
		},
		dataType: 'json'
	}).done(function(respuesta) {
		finalizarTransferencia(respuesta);
	});

}

function llamarFavoritos(idCliente) {
	$.ajax({
		type: "POST",
		url: "archivos/phps/llamarFavoritos.php",
		data: {
			info: parseInt(idCliente)
		},
		dataType: 'json'
	}).done(function(respuesta) {
		$.each(respuesta, function(key, favorito) {
			agregarFavoritos(favorito)
		});
	});

}

function validarLinksImagenes() {

	var errores = 0;
	$(".recuadroLink").each(function() {
		if ($(this.val())) {
			$(this).error(function() {
				errores = errores + validarTexto($(this).attr('id'));
			});
		}
	});
	return errores;
}

function listarFavoritos() {
	
	$("#tablaComparar tbody").html("");
	$.each(proyectosFavoritos, function(key, favorito) {
		var favX = "";
		$.each(favorito.facilidades, function(key, facilidad) {
			favX = favX + "<li>" + facilidad.facilidad + "</li>";
		});
		var campo1 = "<img class='imagenProyectoFavoritos' src='" + favorito.imagenes[0] + "' alt='...''>";
		var campo2 = "<div class='idFav hidden'>"+favorito.idProyecto	+"</div><div class='xFav hidden'>"+favorito.latitud	+"</div><div class='yFav hidden'>"+favorito.longitud	+"</div><h4 style='margin-top:2px;margin-bottom:2px'>" + favorito.nombre + "</h4><ul class='list-unstyled'><li>Desde: " + favorito.areasDesde + "m<sup>2</sup> "+ " a " + formata(favorito.preciosDesde) + "</li><li>$/m<sup>2</sup>: " + formata(parseInt(favorito.preciosDesde) / parseInt(favorito.areasDesde)) + "</li><li>Estrato:" + favorito.estrato + "</li><li>" + tipos[favorito.tipo - 1] + " " + estados[favorito.estado - 1] + "</li></ul>";
		var campo3 = "<ul>" + favX + "</ul>";
		var campo4 = "<div class='logoEmpFavoritos'><img src='archivos/logos/" + favorito.logoEmpresa + ".png'></div>";
		$("#tablaComparar tbody").append("<tr class='filaFavorito' id='filaFavorito"+favorito.idProyecto+"'><td>" + campo1 + "</td><td>" + campo2 + "</td><!--<td class='hidden-xs hidden-sm'>" + campo3 + "</td><td class='hidden-xs hidden-sm'>" + campo4 + "</td>--></tr>");
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
		"idProyecto": $("#idFavorite").html(),
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
	modalActual = "modalContactoCliente";
	iniciarTransferencia("Contactando....");
	$.ajax({
		type: "POST",
		url: "archivos/phps/crearContacto.php",
		data: {
			info: data
		},
		dataType: 'json'
	}).done(function(respuesta) {
		modalActual = "modalVerProyecto";
		finalizarTransferencia(respuesta);
	});
}

