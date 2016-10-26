var logueado = 0;
var idFacebook;
var idCliente;
var nombreCliente;
var emailCliente;
var telefonoCliente;


(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response) {
  if (response.status === 'connected') {
    response.authResponse.accessToken;
    logueado = 1;
    $("#loginFacebook").hide();
    $("#logoutFacebook").show();
    FB.api('/me', {
      fields: "id,about,age_range,picture,bio,birthday,context,email,first_name,gender,hometown,link,location,middle_name,name,timezone,website,work"
    }, function(response) {
      loguearFacebook(response);
      idFacebook=response.id;
      $("#nombreCliente").val(response.name);
      $("#emailCliente").val(response.email);
      $("#profileFullName").html(response.name);
      $("#profilePicture").html("<img src='https://graph.facebook.com/" + response.id + "/picture?type=large' width='46' height='46'/>");
      $("#profileFullNameX").html(response.name);
      $("#profilePictureX").html("<img src='https://graph.facebook.com/" + response.id + "/picture?type=large' width='500' height='500'/>");
			setTimeout(function(){
				$("#modalLoginFacebook").modal("hide");
			},500);
    });

  } else if (response.status === 'not_authorized') {
    logueado = 0;
    $("#loginFacebook").hide();
    $("#logoutFacebook").show();
    $("#nombreCliente").val("");
    $("#emailCliente").val("");
    $("#profileFullName").html("");
    $("#profilePicture").html("");
    $("#profileFullNameX").html("");
    $("#profilePictureX").html("");
  } else {
    $("#loginFacebook").show();
    $("#logoutFacebook").hide();
    $("#nombreCliente").val("");
    $("#emailCliente").val("");
    $("#profileFullName").html("");
    $("#profilePicture").html("");
    $("#profileFullNameX").html("");
    $("#profilePictureX").html("");
    logueado = 0;
  }
}



window.fbAsyncInit = function() {
  FB.init({
    appId: '1752586204975951',
    cookie: true, // enable cookies to allow the server to access the session
    xfbml: true, // parse social plugins on this page
    version: 'v2.5' // use graph api version 2.5
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

};

function loguearFacebook(objetoFacebook){

	$.ajax({
		type: "POST",
		url: "archivos/phps/logueoFacebook.php",
		data: {
			info: objetoFacebook
		},
		dataType: 'json'
	}).done(function(respuesta) {
		idCliente=respuesta;
    llamarFavoritos(respuesta)
	});
  
  
}