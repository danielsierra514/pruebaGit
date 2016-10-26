var configuracion;

var logo = "";
/******************LISTAR CONFIGURACION*************************/

function listarConfiguracion() {
  $.post("archivos/phps/listarValoresCuenta.php").done(function(data) {
    var paisX;
    var departamentoX;
    var ciudadX;
    data.nombrePais !== "" ? paisX = data.nombrePais + " - " : paisX = "";
    data.nombreDepartamento !== "" ? departamentoX = data.nombreDepartamento + " - " : departamentoX = "";
    ciudadX = data.nombreCiudad;

    $("#ubicacionEmpresa").val(paisX + departamentoX + ciudadX);
    $("#codigosUbicacionEmpresa").val(data.pais + " - " + data.departamento + " - " + data.ciudad);
    $("#direccionEmpresa").val(data.direccion);
    $("#telefonoEmpresa").val(data.telefono);
    $("#nitEmpresa").val(data.nit);
    $("#urlEmpresa").val(data.url);
    $("#nombresContacto").val(data.nombresPrincipal);
    $("#apellidosContacto").val(data.apellidosPrincipal);
    $("#telefonoContacto").val(data.telefonoPrincipal);
    $("#email").val(data.emailPrincipal);
    logo = data.logo;
    $("#espacioNuevoLogo").html("<img src='archivos/logos/" + logo + ".png'>");
    $("#logoEmpresa").html("<img src='archivos/logos/" + logo + ".png'>");

  });

}
/******************ACCESO PRINCIPAL**********************/

function validarValoresAcceso() {
  var errores = 0;
  $(".campoCambioContrasena").each(function() {
    if ($(this).val() === "") {
      $(this).addClass("campoError");
      errores = errores + 1;
    } else {
      $(this).removeClass("campoError");
    }
  });

  cont1 = $("#password1").val();
  cont2 = $("#password2").val();

  if ((cont1 != cont2) || (cont1 === "")) {
    errores = errores + 1;
    $("#password1").addClass("campoError");
    $("#password2").addClass("campoError");
  } else {
    $("#password1").removeClass("campoError");
    $("#password2").removeClass("campoError");
  }
  return errores;
}

function crearVariableAcceso(){
  var variableAcceso={
    "email":$("#email").val(),
    "password":$("#password1").val()    
  }
  return variableAcceso;  
}

function subirVariableAcceso(objeto) {
  $('#modalCrearContrasena').modal("hide");
  $("#textoLoading").html("Guardando Cambios...");
  $('#modalLoading').modal('show');
  $.ajax({
    type: "POST",
    url: "archivos/phps/guardarValoresAcceso.php",
    data: {
      info: objeto
    },
  }).done(function(msg) {
    $("#cerrarConfiguracion").hide();    
    $("#cerrarCambiosConfiguracion").hide();
    $("#despuesCambiosConfiguracion").show();    
    $("#guardarCambiosConfiguracion").show();
    $("#modalLoading").modal("hide");
    $("#modalConfiguracion").modal("show");
  });
}

/*****************CONFIGURACION****************/

/*function validarValoresConfiguracion() {
  var errores = 0;
  $(".campoConfiguracion").each(function() {
    if ($(this).val() === "") {
      $(this).addClass("campoError");
      errores = errores + 1;
    } else {
      $(this).removeClass("campoError");
    }
  });
  return errores;
}*/

function crearVariableConfiguracion() {
  arregloUbicacion = $("#ubicacionEmpresa").val();
  arregloCodigosUbicacion = $("#codigosUbicacionEmpresa").val();
  arregloUbicacion = arregloUbicacion.split(" - ");
  arregloCodigosUbicacion = arregloCodigosUbicacion.split("|");

  var variableConfiguracion = {
    "logo": logo,
    "url": $("#urlEmpresa").val(),
    "nit": $("#nitEmpresa").val(),
    "pais": arregloCodigosUbicacion[0],
    "nombrePais": arregloUbicacion[0],
    "departamento": arregloCodigosUbicacion[1],
    "nombreDepartamento": arregloUbicacion[1],
    "ciudad": arregloCodigosUbicacion[2],
    "nombreCiudad": arregloUbicacion[2],
    "direccion": $("#direccionEmpresa").val(),
    "telefono": $("#telefonoEmpresa").val(),
    "nombres": $("#nombresContacto").val(),
    "apellidos": $("#apellidosContacto").val(),
    "telefonoContacto": $("#telefonoContacto").val(),
  }
  return variableConfiguracion;
}

function subirVariableConfiguracion(objeto) {
  $('#modalConfiguracion').modal("hide");
  $("#textoLoading").html("Guardando Cambios...");
  $('#modalLoading').modal('show');
  $.ajax({
    type: "POST",
    url: "archivos/phps/guardarValoresCuenta.php",
    data: {
      info: objeto
    },
  }).done(function(msg) {
    $("#modalLoading").modal("hide");
    $("#textoFelicitaciones").html("Felicidades. <br> Tus cambios fueron registrados con èxito.")
    $("#modalFelicitaciones").modal("show");
    listarConfiguracion();
  });
}

