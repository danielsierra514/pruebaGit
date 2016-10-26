function listarPaises() {
  $.post("archivos/phps/listarPaises.php").done(function(data) {
    $.each(data, function(key, propiedad) {
      $("#paisEmpresa").append("<option value='" + propiedad.idPais + "'>" + propiedad.pais + "</option>");
    });
  });
}

function listarDepartamentos(idPais) {
  $("#departamentoEmpresa").html("<option value='x' selected disabled>Seleccione</option>");
  $.post("archivos/phps/listarDepartamentos.php", {
    info: idPais
  }).done(function(data) {
    $.each(data, function(key, propiedad) {
      $("#departamentoEmpresa").append("<option value='" + propiedad.idDepartamento + "'>" + propiedad.departamento + "</option>");
    });
  });
}

function listarCiudades(idDepartamento) {
  $("#ciudadEmpresa").html("<option value='x' selected disabled>Seleccione</option>");
  $.post("archivos/phps/listarCiudades.php", {
    info: idDepartamento
  }).done(function(data) {
    $.each(data, function(key, propiedad) {
      $("#ciudadEmpresa").append("<option value='" + propiedad.idCiudad + "'>" + propiedad.ciudad + "</option>");
    });
  });
}