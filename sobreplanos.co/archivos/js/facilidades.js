var facilidades = [];

function resetearFacilidad() {
  $("#nombreNuevaFacilidad").val("");
}

function listarFacilidades(facilidades) {
  $("#tablaSeleccionFacilidades tbody").html("");
  $.each(facilidades, function(key, facilidad) {  
    $("#tablaSeleccionFacilidades tbody").append("<tr><td>" + facilidad.facilidad + "</td><td class='text-center'><input type='checkbox' class='checkFacilidad' value='" + facilidad.idFacilidad + "'/></td></tr>");
  });
}

function llamarFacilidades() {
  facilidades = [];
  $.post("archivos/phps/llamarFacilidades.php").done(function(data) {
    $.each(data, function() {
      var facilidad = {
        idFacilidad: this.idFacilidad,
        facilidad: this.facilidad
      };
      facilidades.push(facilidad);
    });
  }).done(function() {
    listarFacilidades(facilidades);
  });
}

function validarFacilidad() {
  var errores = 0;
    errores=errores+validarTexto($("#nombreNuevaFacilidad").val());
  return errores;
}

function crearFacilidad() {
  var facilidad = $("#nombreNuevaFacilidad").val();
  return (facilidad);
}

function subirFacilidad(data) {
  iniciarTransferencia("Creando Facilidad....");
  $.ajax({
    type: "POST",
    url: "archivos/phps/crearFacilidad.php",
    data: {
      info: data
    },
    dataType: 'json'
  }).done(function(respuesta) {
    if (respuesta.tipo == "1") {
      resetearFacilidad();
      llamarFacilidades();
      modalActual = "modalSeleccionFacilidades";
    } else {
      modalActual = "modalSeleccionFacilidades";
    }
    finalizarTransferencia(respuesta);
  });
}

/*function actualizarAgente(data) {
  iniciarTransferencia("Actualizando Agente....");
  $.ajax({
    type: "POST",
    url: "archivos/phps/actualizarAgente.php",
    data: {
      info: data
    },
    dataType: 'json'
  }).done(function(respuesta) {
    if (respuesta.tipo == "1") {
      resetearCrearAgente();
      llamarAgentes();
      modalActual = "modalListaAgentes";
    } else {
      modalActual = "modalAgente";
    }
    finalizarTransferencia(respuesta);
  });
}*/

	