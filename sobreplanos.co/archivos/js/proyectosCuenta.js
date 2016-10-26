/*********************************************************/
var modalidadesProyecto = [];

function validarModalidad() {
	var errores = 0;
	$(".campoCrearModalidad").each(function() {
		errores = errores + validarTexto($(this).attr('id'));
	});
	$(".campoCrearModalidadx").each(function() {
		errores = errores + validarSelect($(this).attr('id'));
	});
	return errores;
}

function crearModalidad() { /*PDF*/
	var modalidad = {
		"key": $("#keyModoCrearProyecto").val(),
		"area": $("#areaModoCrearProyecto").val(),
		"banos": $("#banosModoCrearProyecto").val(),
		"habitaciones": $("#habitacionesModoCrearProyecto").val(),
		"parqueaderos": $("#parquederosModoCrearProyecto").val(),
		"precio": unformata($("#precioModoCrearProyecto").val()),
		"nombrePDF": $("#nombreArchivoPDF").val(),
		"rutaPDF": $("#rutaArchivoPDF").val()
	};
	return modalidad;
}

function agregarModalidadProyecto(modalidad) {
	modalidadesProyecto.push(modalidad);
}

function editarModalidadProyecto(modalidad, key) {
	modalidadesProyecto[key] = modalidad;
}

function listarModalidadesProyecto() {
	$("#tablaModalidades tbody").html("");
	$.each(modalidadesProyecto, function(key, modalidad) {
		if (modalidad.rutaPDF === "") {
			$("#tablaModalidades tbody").append("<tr><td>" + modalidad.area + "m<sup>2</sup></td><td>" + modalidad.banos + "</td><td>" + modalidad.habitaciones + "</td><td>" + modalidad.parqueaderos + "</td><td>" + formata(modalidad.precio) + "</td><td></td><td><a href='#' onclick=editarModalidad(" + key + ")><span class='glyphicon glyphicon-pencil pull-right' aria-hidden='true'></span></a><a href='#' onclick=eliminarModalidad(" + key + ")><span class='glyphicon glyphicon-remove pull-right' aria-hidden='true'></span></a></td></tr>");
		} else {
			$("#tablaModalidades tbody").append("<tr><td>" + modalidad.area + "m<sup>2</sup></td><td>" + modalidad.banos + "</td><td>" + modalidad.habitaciones + "</td><td>" + modalidad.parqueaderos + "</td><td>" + formata(modalidad.precio) + "</td><td><a href='#' onclick=verPDF1('" + modalidad.rutaPDF + "')><img class='iconPDF' src='archivos/icons/pdf.png'></a></td><td><a href='#' onclick=editarModalidad(" + key + ")><span class='glyphicon glyphicon-pencil pull-right' aria-hidden='true'></span></a><a href='#' onclick=eliminarModalidad(" + key + ")><span class='glyphicon glyphicon-remove pull-right' aria-hidden='true'></span></a></td></tr>");
		}

	});
}

function resetearModalidad() { /*PDF*/
	$("#keyModoCrearProyecto").val("");
	$("#areaModoCrearProyecto").val("");
	$("#banosModoCrearProyecto").val("");
	$("#habitacionesModoCrearProyecto").val("");
	$("#parquederosModoCrearProyecto").val("");
	$("#precioModoCrearProyecto").val("");
	$("#uploadPDF").val("");
	$("#nombreArchivoPDF").val("");
	$("#rutaArchivoPDF").val("");
	$("#archivoPDF").html("Opcional");
}

function eliminarModalidad(key) {
	modalidadesProyecto.splice(key, 1);
	listarModalidadesProyecto();
}

function editarModalidad(key) { /*PDF*/
	$("#keyModoCrearProyecto").val(key);
	$("#areaModoCrearProyecto").val(modalidadesProyecto[key].area);
	$("#banosModoCrearProyecto").val(modalidadesProyecto[key].banos);
	$("#habitacionesModoCrearProyecto").val(modalidadesProyecto[key].habitaciones);
	$("#parquederosModoCrearProyecto").val(modalidadesProyecto[key].parqueaderos);
	$("#precioModoCrearProyecto").val(formata(modalidadesProyecto[key].precio));
	$("#archivoPDF").html("<a href='#' onclick=verPDF2('" + modalidadesProyecto[key].rutaPDF + "')><img class='iconPDF' src='archivos/icons/pdf.png'>     " + modalidadesProyecto[key].nombrePDF + "</a>");
	$("#nombreArchivoPDF").val(modalidadesProyecto[key].nombrePDF);
	$("#rutaArchivoPDF").val(modalidadesProyecto[key].rutaPDF);
	$("#tituloModalModalidades").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30'>   Modifica una Modalidad")
	$("#guardarCambiosModalidad").show();
	$("#aceptarAgregarModalidad").hide();
	$("#modalCrearProyecto").modal("hide");
	$("#modalModalidades").modal("show");
}

function verPDF1(archivo) {
	modalActual = "modalCrearProyecto";
	$("#modalCrearProyecto").modal("hide");
	$("#EspacioPDF").html("<iframe src='archivos/pdfs/" + archivo + ".pdf'><iframe>");
	$("#modalVerPDF").modal("show");
}

function verPDF2(archivo) {
	modalActual = "modalModalidades";
	$("#modalModalidades").modal("hide");
	$("#EspacioPDF").html("<iframe src='archivos/pdfs/" + archivo + ".pdf'><iframe>");
	$("#modalVerPDF").modal("show");
}
/************************************************************************/
var agentesProyecto = [];

function vincularAgentesProyecto() {
	agentesProyecto = [];
	$('.checkAgente').each(function() {
		if ($(this).is(':checked')) {
			var obj = {
				"idAgente": $(this).val()
			};
			agentesProyecto.push(obj);
		}
	});
	listarAgentesProyecto();
}

function desvincularAgente(key) {
	agentesProyecto.splice(key, 1);
	listarAgentesProyecto();
}

function obtenerAgente(idAgente) {
	var objeto = [];
	$.each(agentes, function(key, item) {
		if (item.idAgente == idAgente) {
			objeto = item;
		}
	});
	return objeto;
}

function listarAgentesProyecto() {
	$("#tablaAgentes tbody").html("");
	$.each(agentesProyecto, function(key, item) {
		agente = obtenerAgente(item.idAgente);
		$("#tablaAgentes tbody").append("<tr><td class='hidden'>" + agente.idAgente + "</td><td><div class='fotoPersona'><img src='archivos/personas/" + agente.foto + ".png'></div></td><td>" + agente.nombres + " " + agente.apellidos + "</td><td><a href='#' onclick=desvincularAgente(" + key + ")><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td></tr>");
	});
}

/********************************************************/

var facilidadesProyecto = [];

function vincularFacilidadesProyecto() {
	facilidadesProyecto = [];
	$('.checkFacilidad').each(function() {
		if ($(this).is(':checked')) {
			var obj = {
				"idFacilidad": $(this).val()
			};
			facilidadesProyecto.push(obj);
		}
	});
	listarFacilidadesProyecto();
}

function desvincularFacilidad(key) {
	facilidadesProyecto.splice(key, 1);
	listarFacilidadesProyecto();
}

function obtenerFacilidad(idFacilidad) {
	var objeto = [];
	$.each(facilidades, function(key, item) {
		if (item.idFacilidad == idFacilidad) {
			objeto = item;
		}
	});
	return objeto;
}

function listarFacilidadesProyecto() {
	$("#tablaFacilidades tbody").html("");
	$.each(facilidadesProyecto, function(key, item) {
		facilidad = obtenerFacilidad(item.idFacilidad);
		$("#tablaFacilidades tbody").append("<tr><td >" + facilidad.facilidad + "</td><td><a href='#' onclick=desvincularFacilidad(" + key + ")><span class='glyphicon glyphicon-remove pull-right' aria-hidden='true'></span></a></td></tr>");
	});
}

/********************************************************/
var imagenesProyecto = [];

function agregarImagenProyecto(imagen) {
	imagenesProyecto.push(imagen);
}

function eliminarImagenProyecto(key) {
	imagenesProyecto.splice(key, 1);
	listarImagenesProyecto();
}

function listarImagenesProyecto() {
	$("#foto-carrusel tr").html("");
	$.each(imagenesProyecto, function(key, imagen) {
		$("#foto-carrusel tr").append("<td><div class='cajonImagen'><a href='#' onclick=eliminarImagenProyecto('" + key + "')><img class='delete' src='archivos/icons/delete.png'></a><img src='" + imagen + "'></div></td><hr>");
	});
}

function validarLinksImagenes() {

	$(".recuadroLinkImagenes").removeClass("campoError");
	var img;
	$("#erroresImagenes").val("0");
	$(".recuadroLinkImagenes").each(function() {
		img = null;
		var campo = $(this);
		var link = campo.val();
		if (link !== "") {
			campo.parent().find(".cargandoImagen").removeClass("hide");
			img = new Image();
			img.onload = function() {
				campo.removeClass("campoError");
				campo.parent().find(".cargandoImagen").addClass("hide");
			};
			img.onerror = function() {
				campo.addClass("campoError");
				campo.parent().find(".cargandoImagen").addClass("hide");
				errores = parseInt($("#erroresImagenes").val());
				errores = errores + 1;
				$("#erroresImagenes").val(errores);
			};
			img.src = link;
		}
	});

}
/********************************************************/

/********************************************************/
var videosProyecto = [];

function agregarVideoProyecto(video) {
	videosProyecto.push(video);
}

function eliminarVideoProyecto(key) {
	videosProyecto.splice(key, 1);
	listarVideosProyecto();
}

function listarVideosProyecto() {
	$("#video-carrusel tr").html("");
	$.each(videosProyecto, function(key, video) {
		$("#video-carrusel tr").append("<td><div class='cajonVideo'><a href='#' onclick=eliminarVideoProyecto('" + key + "')><img class='delete' src='archivos/icons/delete.png'></a><iframe src='https://www.youtube.com/embed/"+video+"' allowfullscreen='allowfullscreen' mozallowfullscreen='mozallowfullscreen' msallowfullscreen='msallowfullscreen' oallowfullscreen='oallowfullscreen' webkitallowfullscreen='webkitallowfullscreen'></iframe></div></td><hr>");
	});
}

function validarLinksVideos() {

	$(".recuadroLinkVideos").removeClass("campoError");
	var img;
	$("#erroresVideos").val("0");
	$(".recuadroLinkVideos").each(function() {
		img = null;
		var campo = $(this);
		var link = getVideoParameter(campo.val(), "v");
		if (link !== "") {
			link="http://img.youtube.com/vi/"+link+"/0.jpg";
			campo.parent().find(".cargandoVideo").removeClass("hide");
			img = new Image();
			img.onload = function() {
				campo.removeClass("campoError");
				campo.parent().find(".cargandoVideo").addClass("hide");
			};
			img.onerror = function() {
				campo.addClass("campoError");
				campo.parent().find(".cargandoVideo").addClass("hide");
				errores = parseInt($("#erroresVideos").val());
				errores = errores + 1;
				$("#erroresVideos").val(errores);
			};
			img.src = link;
		}
	});
}

/*************************************************************/
var proyectosCuenta = [];
var markersCuenta = [];

function obtenerProyecto(idProyecto) {
	var objeto = {};
	$.each(proyectosCuenta, function(key, item) {

		if (item.idProyecto == idProyecto) {
			objeto = item;
		}
	});
	return (objeto);
}

function obtenerPosicion(idProyecto) {
	var posicion = 0;
	$.each(proyectosCuenta, function(key, item) {
		if (item.idProyecto == idProyecto) {
			posicion = key;
		}
	});
	return (posicion);
}

function resetearCrearProyecto() { /*PDF*/
	$("#imgLocalizador").attr("src", "archivos/images/noMap.png");
	$("#tituloCrearProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30'>  Edita el Proyecto");
	$('#maxFotoCarrusel').html("<div id='foto-carrusel'><table><tbody><tr></tr></tbody></table></div></div>");
	$("#idCrearProyecto").val("");
	$("#nombreCrearProyecto").val("");
	$("#latitudCrearProyecto").val("");
	$("#longitudCrearProyecto").val("");
	$("#paisCrearProyecto").val("");
	$("#departamentoCrearProyecto").val("");
	$("#ciudadCrearProyecto").val("");
	$("#barrioCrearProyecto").val("");
	$("#areaDesdeCrearProyecto").val("");
	$("#precioDesdeCrearProyecto").val("");
	$("#estratoCrearProyecto").val("x");
	$("#tipoCrearProyecto").val("x");
	$("#urlCrearProyecto").val("");
	$("#descripcionCrearProyecto").val("");
	$("#tablaFacilidades tbody").html("");
	$("#tablaModalidades tbody").html("");
	$("#tablaAgentes tbody").html("");
	$("#areaModoCrearProyecto").val("");
	$("#banosModoCrearProyecto").val("");
	$("#estadoCrearProyecto").val("x");
	$("#habitacionesModoCrearProyecto").val("");
	$("#parquederosModoCrearProyecto").val("");
	$("#precioModoCrearProyecto").val("");
	facilidadesProyecto = [];
	imagenesProyecto = [];
	videosProyecto = [];
	modalidadesProyecto = [];
	agentesProyecto = [];
}

function borrarProyectos() {
	$.each(markersCuenta, function(key, item) {
		item.setMap(null);
	});
	proyectosCuenta = [];
	markersCuenta = [];
}

function llamarProyectosCuenta(callback) {
	borrarProyectos();
	$.post("archivos/phps/listarProyectos.php", {
		modo: 1
	}).done(function(data) {
		$.each(data, function(key, item) {
			crearObjetoProyecto(item);
		});
		angular.element('#listador').scope().generar(proyectosCuenta);
		angular.element('#listador').scope().$apply();
	});
	callback();
}

function crearObjetoProyecto(item) { /*PDF*/
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
		"videos": item.videos,
		"facilidades": item.facilidades,
		"modalidades": item.modalidades,
		"agentes": item.agentes,
		"vistas": item.vistas,
		"contactados": item.contactados,
		"nombreEmpresa": item.nombreEmpresa,
		"urlEmpresa": item.urlEmpresa,
		"logoEmpresa": item.logoEmpresa,
		"contactos": item.contactos
	};

	var marker = new google.maps.Marker({
		idProyecto: proyecto.idProyecto,
		position: new google.maps.LatLng(proyecto.latitud, proyecto.longitud),
		icon: "archivos/icons/marker.png",
		map: mapaCuenta
	});
	proyectosCuenta.push(proyecto);
	markersCuenta.push(marker);
	editarProyecto(marker, mapaCuenta);
}

function ocultarThumbnail() {
	$('#marker-tooltip').hide();
}

function mostrarThumbnail(idProyecto) {
	
	marker=markersCuenta[obtenerPosicion(idProyecto)];
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
	
	var point = fromLatLngToPoint(marker.getPosition(), mapaCuenta);
	$('#marker-tooltip').removeClass().addClass("tooltip" + (numTipo - 1));
	$('#marker-tooltip').html(contenido).css({
		'left': point.x + $("#mapaCuenta").offset().left,
		'top': point.y + 8,
		'position': 'absolute'
	}).show();

}

function editarProyecto(marker, mapa) {
	google.maps.event.addListener(marker, 'mouseover', function() {
		var idX = marker.idProyecto;
		var proX = obtenerProyecto(idX);
		var nombre = proX.nombre;
		var logo = proX.logoEmpresa;
		var areaX = proX.areasDesde + " m<sup>2</sup>";
		var precioX = formata(proX.preciosDesde);
		var numTipo = parseInt(proX.tipo);
		var numEstado = parseInt(proX.estado);
		var tipo = tipos[numTipo - 1];
		var estado = estados[numEstado - 1];
		var contenido = "<div class='loguitoEmpresa'><img src='http://www.sobreplanos.co/archivos/logos/" + logo + ".png'></div><h5 class='float-left'>" + nombre + "</h5><p><b>Tipo: </b>" + tipo + "<br><b>Estado: </b>" + estado + "<br><b>Areas Desde: </b>" + areaX + "<br><b>Precios Desde: </b>" + precioX + "</p>";
		$("#thumbnailProyecto" + marker.idProyecto).addClass('thumbSeleccionado');
		var point = fromLatLngToPoint(marker.getPosition(), mapa);
		$('#marker-tooltip').removeClass().addClass("tooltip" + (numTipo - 1));
		$('#marker-tooltip').html(contenido).css({
			'left': point.x + $("#mapaCuenta").offset().left,
			'top': point.y + 8,
			'position': 'absolute'
		}).show();

		$("#thumbnailProyecto" + idX).prependTo("#listador");
		$("#thumbnailProyectoX" + idX).prependTo(".splitBanner");
		$("#cxy").animate({
			scrollTop: 0
		}, 0);
		$(".splitBanner").animate({
			scrollLeft: 0
		}, 0);
	});

	google.maps.event.addListener(marker, 'mouseout', function() {
		$('#marker-tooltip').hide();
		$("#thumbnailProyecto" + marker.idProyecto).removeClass('thumbSeleccionado');
	});
	google.maps.event.addListener(marker, 'click', function() {
			$('#marker-tooltip').hide();
		marker.setAnimation(google.maps.Animation.BOUNCE);
		mapa.panTo(marker.getPosition());
		mapa.setZoom(16);
		setTimeout(function() {
			marker.setAnimation(null);
			verEditarProyecto(obtenerProyecto(marker.idProyecto));
		}, 750);
	});
}

function verEditarProyecto(proyecto) { /*PDF*/
	$("#idCrearProyecto").val(proyecto.idProyecto);
	$("#nombreCrearProyecto").val(proyecto.nombre);
	$("#latitudCrearProyecto").val(proyecto.latitud);
	$("#longitudCrearProyecto").val(proyecto.longitud);
	$("#paisCrearProyecto").val(proyecto.pais);
	$("#departamentoCrearProyecto").val(proyecto.departamento);
	$("#ciudadCrearProyecto").val(proyecto.ciudad);
	$("#barrioCrearProyecto").val(proyecto.barrio);
	$("#areaDesdeCrearProyecto").val(proyecto.areasDesde);
	$("#precioDesdeCrearProyecto").val(formata(proyecto.preciosDesde));
	$("#estratoCrearProyecto").val(proyecto.estrato);
	$("#tipoCrearProyecto").val(proyecto.tipo);
	$("#descripcionCrearProyecto").val(proyecto.descripcion);
	$("#tituloCrearProyecto").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30'>  Edita el Proyecto");
	$("#tituloModalPDF").html("<img class='imgTitulo' src='archivos/icons/pdf.png' width='30'>  " + proyecto.nombre + "");
	$("#urlCrearProyecto").val(proyecto.urlProyecto);
	$("#estadoCrearProyecto").val(proyecto.estado);
	facilidadesProyecto = proyecto.facilidades;
	listarFacilidadesProyecto();
	agentesProyecto = proyecto.agentes;
	listarAgentesProyecto();
	imagenesProyecto = proyecto.imagenes;
	listarImagenesProyecto();
	videosProyecto = proyecto.videos;
	listarVideosProyecto();
	modalidadesProyecto = proyecto.modalidades;
	listarModalidadesProyecto();
	center = new google.maps.LatLng(proyecto.latitud, proyecto.longitud);
	zoom = 16;

	$("#guardarCambiosProyecto").show();
	$("#verPublicable").show();
	$("#crearNuevoProyecto").hide();
	$("#modalCrearProyecto").modal('show');
	setTimeout(function() {
		google.maps.event.trigger(mapaProyecto, 'resize');
		mapaProyecto.setCenter(center);
		mapaProyecto.setZoom(zoom);
	}, 500);
}


function crearNuevoProyecto() { /*PDF*/
	var proyecto = {
		"idProyecto": $("#idCrearProyecto").val(),
		"nombre": $("#nombreCrearProyecto").val(),
		"latitud": $("#latitudCrearProyecto").val(),
		"longitud": $("#longitudCrearProyecto").val(),
		"pais": $("#paisCrearProyecto").val(),
		"departamento": $("#departamentoCrearProyecto").val(),
		"ciudad": $("#ciudadCrearProyecto").val(),
		"barrio": $("#barrioCrearProyecto").val(),
		"areasDesde": $("#areaDesdeCrearProyecto").val(),
		"preciosDesde": unformata($("#precioDesdeCrearProyecto").val()),
		"estrato": $("#estratoCrearProyecto").val(),
		"tipo": $("#tipoCrearProyecto").val(),
		"descripcion": $("#descripcionCrearProyecto").val(),
		"urlProyecto": $("#urlCrearProyecto").val(),
		"estado": $("#estadoCrearProyecto").val(),
		"imagenes": imagenesProyecto,
		"videos": videosProyecto,
		"modalidades": modalidadesProyecto,
		"facilidades": facilidadesProyecto,
		"agentes": agentesProyecto
	};
	return proyecto;
}

function subirProyecto(data) {
	iniciarTransferencia("Creando Proyecto....");
	$.ajax({
		type: "POST",
		url: "archivos/phps/crearProyecto.php",
		data: {
			info: data
		},
		dataType: 'json'
	}).done(function(respuesta) {
		if (respuesta.tipo == "1") {
			llamarProyectosCuenta(function() {
				resetearCrearProyecto();
				modalActual = "";
				finalizarTransferencia(respuesta);
			});

		} else {
			modalActual = "modalCrearProyecto";
		}
		finalizarTransferencia(respuesta);
	});
}

function validarProyecto() {
	var errores = 0;
	$(".campoCrearProyecto").each(function() {
		errores = errores + validarTexto($(this).attr('id'));
	});
	$(".campoCrearProyectox").each(function() {
		errores = errores + validarSelect($(this).attr('id'));
	});
	if (imagenesProyecto.length === 0) {
		$("#foto-carrusel").addClass("campoError");
		errores = errores + 1;
	} else {
		$("#foto-carrusel").removeClass("campoError");
	}
	if (modalidadesProyecto.length === 0) {
		$("#tablaModalidades").parent().parent().addClass("campoError");
		errores = errores + 1;
	} else {
		$("#tablaModalidades").parent().parent().removeClass("campoError");
	}
	/*if (agentesProyecto.length === 0) {
		$("#tablaAgentes").parent().parent().addClass("campoError");
		errores = errores + 1;
	} else {
		$("#tablaAgentes").parent().parent().removeClass("campoError");
	}*/
	if ($('#paisCrearProyecto').val() + $('#departamentoCrearProyecto').val() + $('#ciudadCrearProyecto').val() === "") {
		errores = errores + 1
		$("#mapaProyecto").css('border', '3px solid #f2b0ba ');
	} else {
		$("#mapaProyecto").css('border', '0px ');
	}
	return errores;
}
/************************************************************/