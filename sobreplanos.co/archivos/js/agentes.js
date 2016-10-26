var agentes = [];

function resetearCrearAgente() {
  $("#idNuevoAgente").val("");
  $("#fotoGrandePersona").html("");
  $(".campoCrearAgente").each(function() {
    $(this).val("");
  });
}

function listarAgentes(agentes) {
  $("#tablaPrincipalAgentes tbody").html("");
  $("#tablaSeleccionAgentes tbody").html("");
  $.each(agentes, function(key, agente) {
    $("#tablaPrincipalAgentes tbody").append("<tr><td><div class='fotoPersona'><img src='archivos/personas/" + agente.foto + ".png'></div></td><td>" + agente.nombres + " " + agente.apellidos + "</td><td>" + agente.email + "</td><td>" + agente.telefono + "</td><td><a href='#' onclick='verAgente(" + agente.idAgente + ")'><span class='glyphicon glyphicon-pencil pull-right' aria-hidden='true'></span></a></td></tr>");
    $("#tablaSeleccionAgentes tbody").append("<tr><td><div class='fotoPersona'><img src='archivos/personas/" + agente.foto + ".png'></div></td><td>" + agente.nombres + " " + agente.apellidos + "</td><td class='text-center'><input type='checkbox' class='checkAgente' value='" + agente.idAgente + "'/></td></tr>");
  });
}

function llamarAgentes() {
  agentes = [];
  $.post("archivos/phps/llamarAgentes.php").done(function(data) {
    $.each(data, function() {
      var agente = {
        idAgente: this.idAgente,
        foto: this.foto,
        nombres: this.nombres,
        apellidos: this.apellidos,
        email: this.email,
        telefono: this.telefono,
        tipo: this.tipo
      };
      agentes.push(agente);
    });
  }).done(function() {
    listarAgentes(agentes);
  });
}

function verAgente(codAgente) {
  $.each(agentes, function(key, agente) {
    if (agente.idAgente == codAgente) {
      $("#fotoGrandePersona").html("<img src='archivos/personas/" + agente.foto + ".png'>");
      $("#textoModalAgente").html("<img class='imgTitulo' src='archivos/icons/hh.png' width='30' height='30'>   Modifica un Agente");
      $("#idNuevoAgente").val(agente.idAgente);
      $("#nombresNuevoAgente").val(agente.nombres);
      $("#apellidosNuevoAgente").val(agente.apellidos);
      $("#emailNuevoAgente").val(agente.email);
      $("#telefonoNuevoAgente").val(agente.telefono);
      $("#modalListaAgentes").modal("hide");
      $("#regresarCambiosAgente").show();
      $("#guardarCambiosAgente").show();
      $("#aceptarAgregarAgente").hide();
      $("#modalAgente").modal("show");
    }
  });
}

function validarAgente() {
  var errores = 0;
  $(".campoCrearAgente").each(function() {
    errores=errores+validarTexto($(this).attr('id'));
  });
  return errores;
}

function crearAgente() {
  var nuevoAgente = {
    "idNuevoAgente": $("#idNuevoAgente").val(),
    "fotoNuevoAgente": obtenerNombreImagen($("#fotoGrandePersona img").attr('src')),
    "nombresNuevoAgente": $("#nombresNuevoAgente").val(),
    "apellidosNuevoAgente": $("#apellidosNuevoAgente").val(),
    "emailNuevoAgente": $("#emailNuevoAgente").val(),
    "telefonoNuevoAgente": $("#telefonoNuevoAgente").val()
  };
  return (nuevoAgente);
}

function subirAgente(data) {
  iniciarTransferencia("Creando Agente....");
  $.ajax({
    type: "POST",
    url: "archivos/phps/crearAgente.php",
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
}

function actualizarAgente(data) {
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
}

	