var configuracion;

var foto = "";
var logo = "";

var variablesConfiguracion = {
  "nombres": "",
  "apellidos": "",
  "email": "",
  "telefono": "",
  "password": "",
  "foto": ""
};


function validarValoresAgente() {
  var errores = 0;
  $(".campoConfiguracionAgente").each(function() {
    if ($(this).val() === "") {
      $(this).addClass("campoError");
      errores = errores + 1;
    } else {
      $(this).removeClass("campoError");
    }
  });

  cont1 = $("#pass1ConfiguracionAgente").val();
  cont2 = $("#pass2ConfiguracionAgente").val();

  if ((cont1 != cont2) || (cont1 === "")) {
    errores = errores + 1;
    $("#pass1ConfiguracionAgente").addClass("campoError");
    $("#pass2ConfiguracionAgente").addClass("campoError");
  } else {
    $("#pass1ConfiguracionAgente").removeClass("campoError");
    $("#pass2ConfiguracionAgente").removeClass("campoError");
  }
  return errores;
}


function crearValoresAgente() {

  variablesConfiguracion.foto = foto;
  variablesConfiguracion.nombres = $("#nombresConfiguracionAgente").val();
  variablesConfiguracion.apellidos = $("#apellidosConfiguracionAgente").val();
  variablesConfiguracion.email = $("#emailConfiguracionAgente").val();
  variablesConfiguracion.telefono = $("#telefonoConfiguracionAgente").val();  
  variablesConfiguracion.password = $("#pass1ConfiguracionAgente").val();
 
  $('#modalConfiguracion').modal("hide");
  $("#textoLoading").html("Guardando Cambios...");
  $('#modalLoading').modal('show');

  $.ajax({
    type: "POST",
    url: "archivos/phps/guardarValoresAgente.php",
    data: {
      info: variablesConfiguracion
    },
  }).done(function(msg) {
    if (msg == 1) {

      $("#modalLoading").modal("hide");
      $("#textoFelicitaciones").html("Felicidades. <br> Tus cambios fueron registrados con èxito.")
      $("#modalFelicitaciones").modal("show");
      listarConfiguracion();

    } else {

    }
  });
}

function listarConfiguracion() {

  $.post("archivos/phps/listarValoresAgente.php").done(function(data) {
    logo = data.logo;
    foto = data.foto;
    $("#nombresConfiguracionAgente").val(data.nombres);
    $("#apellidosConfiguracionAgente").val(data.apellidos);
    $("#emailConfiguracionAgente").val(data.email);
    $("#telefonoConfiguracionAgente").val(data.telefono);
     $("#logoEmpresaX").html("<img src='archivos/logos/" + logo + ".png'>");
    $("#fotoGrandePersonaX").html("<img src='archivos/personas/" + foto + ".png'>");
    $("#fotoFlotanteEmpresa").html("<img src='archivos/personas/" + foto + ".png'>");

  });

}