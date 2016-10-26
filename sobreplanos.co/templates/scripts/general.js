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
}

function formata(number) {
	var comma = ',',
		string = Math.max(0, number).toFixed(0),
		length = string.length,
		end = /^\d{4,}$/.test(string) ? length % 3 : 0;
	return "$ " + (end ? string.slice(0, end) + comma : '') + string.slice(end).replace(/(\d{3})(?=\d)/g, '$1' + comma);
}

function imprimirObjeto(objeto) {
	alert(JSON.stringify(objeto));
}

function fromLatLngToPoint(latLng, map) {
	var topRight = map.getProjection().fromLatLngToPoint(map.getBounds().getNorthEast());
	var bottomLeft = map.getProjection().fromLatLngToPoint(map.getBounds().getSouthWest());
	var scale = Math.pow(2, map.getZoom());
	var worldPoint = map.getProjection().fromLatLngToPoint(latLng);
	return new google.maps.Point((worldPoint.x - bottomLeft.x) * scale, (worldPoint.y - topRight.y) * scale);
}

function establecerFondo() {
	var scale = chroma.scale([getUrlParameter("colorInicial"), getUrlParameter("colorFinal")]);
	i = 0;
	$(".section").each(function() {
		esto = $(this);
		var colorInicial = scale(i / $(".section").length).hex();
		var colorFinal = scale((i + 1) / $(".section").length).hex();
		esto.css("background", "-webkit-gradient(linear, top left, bottom left, from(" + colorInicial + "), to(" + colorFinal + "))");
		esto.css("background", " -webkit-linear-gradient(" + colorInicial + ", " + colorFinal + ")");
		esto.css("background", " linear-gradient(" + colorInicial + "," + colorFinal + ")");
		i = i + 1;
	});
}