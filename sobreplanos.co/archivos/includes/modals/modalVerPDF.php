<script async>
  $(document).ready(function() {
    
    $("#regresarVerPDF").click(function() {
      $("#modalVerPDF").modal("hide");
      $("#"+modalActual).modal("show");
    });

  });
</script>
<style>
  #EspacioPDF {
    width: 100%;
  }
  
  #EspacioPDF iframe {
    width: 100%;
    height: 400px;
  }
</style>
<div class="modal fade toppest" data-keyboard="false" data-backdrop="static" id="modalVerPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="tituloModalPDF"><img class="" src="archivos/icons/pdf.png" height="30"></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="col-md-12">
              <div id="EspacioPDF">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="regresarVerPDF" class="btn btn-default">Regresar</button>
      </div>
    </div>
  </div>
</div>