function cerrarSesion() {
	$.post("archivos/phps/cerrarSesion.php").done(function(data) {
		location.reload();
	});
}

function cerrarSesionAdmin() {
	$.post("archivos/phps/cerrarSesionAdmin.php").done(function(data) {
		location.reload();
	});

}

function fromLatLngToPoint(latLng, map) {
	var topRight = map.getProjection().fromLatLngToPoint(map.getBounds().getNorthEast());
	var bottomLeft = map.getProjection().fromLatLngToPoint(map.getBounds().getSouthWest());
	var scale = Math.pow(2, map.getZoom());
	var worldPoint = map.getProjection().fromLatLngToPoint(latLng);
	return new google.maps.Point((worldPoint.x - bottomLeft.x) * scale, (worldPoint.y - topRight.y) * scale);
}

function formata(number) {
	var comma = ',',
		string = Math.max(0, number).toFixed(0),
		length = string.length,
		end = /^\d{4,}$/.test(string) ? length % 3 : 0;
	return "$ " + (end ? string.slice(0, end) + comma : '') + string.slice(end).replace(/(\d{3})(?=\d)/g, '$1' + comma);
}

function unformata(number) {
	number = number.replace(/^\$/, "");
	return parseFloat(number.replace(/,/g, ''));
}

function randomIntFromInterval(min, max) {
	//return Math.floor(Math.random() * (max - min + 1) + min);
	return 6;
}

function validarTexto(campo) {
	if ($("#" + campo).val() === "") {
		$("#" + campo).addClass("campoError");
		return 1;
	} else {
		$("#" + campo).removeClass("campoError");
		return 0;
	}
}

function validarSelect(campo) {
	if ($("#" + campo).find(":selected").val() == "x") {
		$("#" + campo).addClass("campoError");
		return 1;  
	} else { 
		$("#" + campo).removeClass("campoError");
		return 0;
	}
}

function validarArchivoImagen(objeto){
	alert(objeto[0].file.size);
	
}

function imprimirObjeto(objeto) {
	alert(JSON.stringify(objeto));
}

var modalActual = "";

var estados = ["Sin Iniciar", "En Construcciòn", "Finalizado"];
var tipos = ["Apartamento", "Casa", "VIS", "Oficina"];

function iniciarTransferencia(mensaje) {
	$('#' + modalActual).modal("hide");
	$("#textoLoading").html(mensaje);
	$('#modalLoading').modal('show');
}

function finalizarTransferencia(mensaje) {
	$('#modalLoading').modal('hide');
	$('#textoMensaje').html(mensaje.mensaje);
	$('#modalMensaje').modal("show");
}

function obtenerNombreImagen(rutaImagen) {
	if (rutaImagen) {
		rutaImagen = rutaImagen.split("/");
		rutaImagen = rutaImagen[rutaImagen.length - 1];
		rutaImagen = rutaImagen.replace(".png", "");
		return rutaImagen;
	} else {
		return ""
	}
}

var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : sParameterName[1];
		}
	}
};

function getVideoParameter(string,parameter) {
	var sPageURL = string.split("?")[1],
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] === parameter) {
			return sParameterName[1] === undefined ? true : sParameterName[1];			
		}
	}
}

$(document).ready(function() {

	$("body").tooltip({
		selector: '[data-toggle=tooltip]'
	});

	$(".verticalScrolled").mCustomScrollbar({
		axis: "y",
		scrollInertia: 0,
		scrollbarPosition: "outside"
	});

	$(".numeric").keydown(function(e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			// Allow: Ctrl+A, Command+A
			(e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
			// Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});
	$(".precio").on('keyup', function(e) {
		if (e.which != 37 && e.which != 38 && e.which != 39 && e.which != 40) {
			valor = accounting.unformat($(this).val());
			$(this).val(accounting.formatMoney(valor, '$', 0));
		}
	});

	$(".blocked").prop('disabled', true);
});

function panTox(newLat, newLng, mapa) {
  if (panPath.length > 0) {
    // We are already panning...queue this up for next move
    panQueue.push([newLat, newLng]);
  } else {
    // Lets compute the points we'll use
    panPath.push("LAZY SYNCRONIZED LOCK");  // make length non-zero - 'release' this before calling setTimeout
    var curLat = map.getCenter().lat();
    var curLng = map.getCenter().lng();
    var dLat = (newLat - curLat)/STEPS;
    var dLng = (newLng - curLng)/STEPS;

    for (var i=0; i < STEPS; i++) {
      panPath.push([curLat + dLat * i, curLng + dLng * i]);
    }
    panPath.push([newLat, newLng]);
    panPath.shift();      // LAZY SYNCRONIZED LOCK
    setTimeout(doPan(mapa), 20);
  }
}

function doPan(mapa) {
  var next = panPath.shift();
  if (next != null) {
    // Continue our current pan action
    mapa.panTo( new google.maps.LatLng(next[0], next[1]));
    setTimeout(doPan, 20 );
  } else {
    // We are finished with this pan - check if there are any queue'd up locations to pan to 
    var queued = panQueue.shift();
    if (queued != null) {
      panTo(queued[0], queued[1]);
    }
  }
}
/*function smoothZoom(map, level, cnt, mode) {

			if (mode == true) {

				if (cnt >= level) {
					return;
				} else {
					var z = google.maps.event.addListener(map, 'zoom_changed', function(event) {
						google.maps.event.removeListener(z);
						smoothZoom(map, level, cnt + 1, true);
					});
					setTimeout(function() {
						map.setZoom(cnt)
					}, 80);
				}
			} else {
				if (cnt <= level) {
					return;
				} else {
					var z = google.maps.event.addListener(map, 'zoom_changed', function(event) {
						google.maps.event.removeListener(z);
						smoothZoom(map, level, cnt - 1, false);
					});
					setTimeout(function() {
						map.setZoom(cnt)
					}, 80);
				}
			}
		}*/