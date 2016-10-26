var empresas = [];

var variablesEmpresa = {
  "idEmpresa":"",
  "pais": "",
  "nombrePais": "",
  "departamento": "",
  "nombreDepartamento": "",
  "ciudad": "",
  "nombreCiudad": "",
  "direccion": "",
  "telefono": "",
  "nit": "",
  "url": "",
  "logo": "",
  "nombres": "",
  "apellidos": "",
  "email": "",
  "password": ""
};

function resetearCrearEmpresa() {
  logoEmpresaInvitacion = "";
  $("#nombreEmpresa").val("");
  $("#mailEmpresa").val("");
  $("#espacioNuevoLogo").html("");
}

function validarEmpresa() {
  var errores = 0;
  $(".campoCrearEmpresa").each(function() {
    errores = errores + validarTexto($(this).attr('id'));
  });
  return errores;
}

function preCrearEmpresa() {
  resetearCrearEmpresa();
  $("#modalCrearEmpresa").modal("show");
}

function crearEmpresa() {
  var nuevaEmpresa = {
    "idNuevaEmpresa": $("#idNuevaEmpresa").val(),
    "logoNuevaEmpresa": logoEmpresaInvitacion,
    "nombreNuevaEmpresa": $("#nombreEmpresa").val(),
    "emailNuevaEmpresa": $("#mailEmpresa").val()
  };
  return (nuevaEmpresa);
}

function subirEmpresa(data) {
  iniciarTransferencia("Creando Empresa....");
  $.ajax({
    type: "POST",
    url: "archivos/phps/crearEmpresa.php",
    data: {
      info: data
    },
    dataType: 'json'
  }).done(function(respuesta) {
    if (respuesta.tipo == "1") {
      resetearCrearEmpresa();
      llamarEmpresas();
    }
    modalActual = "";
    finalizarTransferencia(respuesta);
  });
}

function llamarEmpresas() {
  empresas = [];
  $.post("archivos/phps/llamarEmpresas.php").done(function(data) {
    $.each(data, function(key, item) {
      crearObjetoEmpresa(item);
    });

    angular.element('#listador').scope().generar(empresas);
    angular.element('#listador').scope().$apply();
  });
}

function crearObjetoEmpresa(item) {
  var empresa = {
    idEmpresa: item.idEmpresa,
    nombreEmpresa: item.nombreEmpresa,
    nit: item.nit,
    url: item.url,
    pais: item.pais,
    nombrePais: item.nombrePais,
    departamento: item.departamento,
    nombreDepartamento: item.nombreDepartamento,
    ciudad: item.ciudad,
    nombreCiudad: item.nombreCiudad,
    direccion: item.direccion,
    telefono: item.telefono,
    logo: item.logo,
    nombresPrincipal: item.nombresPrincipal,
    apellidosPrincipal: item.apellidosPrincipal,
    telefonoPrincipal: item.telefonoPrincipal,
    mail: item.mail,
    estado: item.estado
  };
  empresas.push(empresa);
}

/****************************/

function obtenerEmpresa(idEmpresa) {
  var objeto = {};
  $.each(empresas, function(key, item) {
    if (item.idEmpresa == idEmpresa) {
      objeto = item;
    }
  });
  return (objeto);
}

function verInformacionEmpresa(empresa) {
  resetearVerEmpresa();
  var paisX;
  var departamentoX;
  var ciudadX;
  empresa.nombrePais !== "" ? paisX = empresa.nombrePais + " - " : paisX = "";
  empresa.nombreDepartamento !== "" ? departamentoX = empresa.nombreDepartamento + " - " : departamentoX = "";
  ciudadX = empresa.nombreCiudad;

  $("#idEmpresa").val(empresa.idEmpresa);
  $("#ubicacionEmpresa").val(paisX + departamentoX + ciudadX);
  $("#codigosUbicacionEmpresa").val(empresa.pais + " - " + empresa.departamento + " - " + empresa.ciudad);
  $("#direccionEmpresa").val(empresa.direccion);
  $("#telefonoEmpresa").val(empresa.telefono);
  $("#nitEmpresa").val(empresa.nit);
  $("#urlEmpresa").val(empresa.url);
  $("#nombresContacto").val(empresa.nombresPrincipal);
  $("#apellidosContacto").val(empresa.apellidosPrincipal);
  $("#telefonoContacto").val(empresa.telefonoPrincipal);
  $("#mailContacto").val(empresa.mail);
  logoEmpresaEdicion = empresa.logo;
  $("#espacioNuevoLogo2").html("<img src='archivos/logos/" + logoEmpresaEdicion + ".png'>");
  $("#modalInfoEmpresa").modal("show");
}

function resetearVerEmpresa() {
  $("#ubicacionEmpresa").val("");
  $("#codigosUbicacionEmpresa").val("");
  $("#direccionEmpresa").val("");
  $("#telefonoEmpresa").val("");
  $("#nitEmpresa").val("");
  $("#urlEmpresa").val("");
  $("#nombresContacto").val("");
  $("#apellidosContacto").val("");
  $("#telefonoContacto").val("");
  $("#mailContacto").val("");
  $("#espacioNuevoLogo2").html("");
}

function crearValoresEmpresa() {  
  arregloUbicacion = $("#ubicacionEmpresa").val();
  arregloCodigosUbicacion = $("#codigosUbicacionEmpresa").val();
  arregloUbicacion = arregloUbicacion.split(" - ");
  arregloCodigosUbicacion = arregloCodigosUbicacion.split(" - ")
  variablesEmpresa.idEmpresa = $("#idEmpresa").val();
  variablesEmpresa.pais = arregloCodigosUbicacion[0];
  variablesEmpresa.nombrePais = arregloUbicacion[0];
  variablesEmpresa.departamento = arregloCodigosUbicacion[1];
  variablesEmpresa.nombreDepartamento = arregloUbicacion[1];
  variablesEmpresa.ciudad = arregloCodigosUbicacion[2];
  variablesEmpresa.nombreCiudad = arregloUbicacion[2];
  variablesEmpresa.direccion = $("#direccionEmpresa").val();
  variablesEmpresa.telefono = $("#telefonoEmpresa").val();
  variablesEmpresa.nit = $("#nitEmpresa").val();
  variablesEmpresa.url = $("#urlEmpresa").val();
  variablesEmpresa.logo = logoEmpresaEdicion;
  variablesEmpresa.nombres = $("#nombresContacto").val();
  variablesEmpresa.apellidos = $("#apellidosContacto").val();
  variablesEmpresa.telefono = $("#telefonoContacto").val();
  variablesEmpresa.email = $("#mailContacto").val();  
  return variablesEmpresa; 
}

function actualizarEmpresa(variableEmpresa){  
  modalActual="modalInfoEmpresa";
  $('#modalInfoEmpresa').modal("hide");
  $("#textoLoading").html("Guardando Cambios...");
  $('#modalLoading').modal('show');

  $.ajax({
    type: "POST",
    url: "archivos/phps/guardarValoresCuenta.php",
    data: {
      info: variableEmpresa
    },
  }).done(function(msg) {
    if (msg == 1) {      
      $("#modalLoading").modal("hide");
      $("#textoFelicitaciones").html("Felicidades. <br> Tus cambios fueron registrados con èxito.")
      $("#modalFelicitaciones").modal("show");
      llamarEmpresas();

    } else {

    }
  });
  
  
  
}