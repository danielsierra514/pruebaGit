<script async>
  $(document).ready(function() {

    $("#resetearContrasena").click(function() {
      $('#successEmail').hide();
      $('#dangerEmail').hide();
      email = $("#emailRetrieve").val();
      if (email != '') {
        $.ajax({
          url: "archivos/phps/olvideContrasena.php",
          type: "POST",
          data: {
            email: email
          }
        }).done(function(respuesta) {
          if (respuesta == 1) {
            $('#successEmail').html("Te hemos enviado un vínculo de restablecimiento de contraseña a tu correo.");
            $('#successEmail').show();
          }
         if (respuesta == 2) {
            $('#dangerEmail').html("Lo sentimos pero no encontramos una cuenta con esa información.");
            $('#dangerEmail').show();
          }
          if (respuesta == 3) {
            $('#dangerEmail').html("Lo sentimos pero en este momento no podemos conectarnos con el servidor. Intenta de nuevo más tarde.");
            $('#dangerEmail').show();
          }
        });
      }else{
         $('#dangerEmail').html("Por favor diligencia la información requerida");
         $('#dangerEmail').show();
      }
    });

  });
</script>
<style>
  #successEmail {
    background-image: none;
    background: #e4deef;
    background: -moz-linear-gradient(top, #e4deef 0%, #bfafea 100%);
    background: -webkit-linear-gradient(top, #e4deef 0%, #bfafea 100%);
    background: linear-gradient(to bottom, #e4deef 0%, #bfafea 100%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#e4deef', endColorstr='#bfafea', GradientType=0);
    border: 1px solid #BFAFEA;
    color: #555555;
  }
  
  #dangerEmail {
    background-image: none;
    background: #f2f2f2;
    background: -moz-linear-gradient(top, #f2f2f2 0%, #d3d3d3 100%);
    background: -webkit-linear-gradient(top, #f2f2f2 0%, #d3d3d3 100%);
    background: linear-gradient(to bottom, #f2f2f2 0%, #d3d3d3 100%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#d3d3d3', GradientType=0);
    border: 1px solid #D3D3D3;
    color: #555555
  }
  
  #successEmail,
  #dangerEmail {
    display: none;
  }
</style>
<div class="modal fade" id="modalOlvideContrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title " id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Reiniciar Contraseña</h4>
      </div>
      <div class="modal-body">
        <p>
          Por favor ingresa tu Correo Electrónico y te enviarémos un link para que reinicies tu constraseña.
        </p>
        <div class="form-group">
          <div class="input-group col-lg-12">
            <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
            <input class="form-control" type="email" placeholder="Email" id="emailRetrieve" name="emailRetrieve" autocomplete="on">
          </div>
        </div>
        <div class="alert alert-success" role="alert" id="successEmail"></div>
        <div class="alert alert-danger" role="alert" id="dangerEmail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="resetearContrasena">Enviar</button>
      </div>
    </div>
  </div>
</div>