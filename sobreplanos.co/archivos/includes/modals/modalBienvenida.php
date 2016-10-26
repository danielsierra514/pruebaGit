<script>
  $(document).ready(function() {
    
    $("#completarRegistro").click(function(){
      $("#modalBienvenida").modal("hide");
      $("#modalCrearContrasena").modal("show");
      $("#cerrarCrearContrasena").hide(); 
    })

  });
</script>

</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalBienvenida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   Bienvenido!!</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <p>
            Bienvenido a sobreplanos.co<br> Por ser la primera vez que utilizas tu cuenta, te invitamos a completar la información de registro.<br>Gracias!!!
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="completarRegistro" data-dismiss="modal">Completar mi Registro</button>
      </div>
    </div>
  </div>
</div>