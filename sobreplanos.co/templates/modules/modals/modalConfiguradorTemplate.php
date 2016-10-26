<script>
  var zonaActual;

  function establecerFondo(colorInicial, colorFinal) {
    $("#marcoBody").css("background", "-webkit-gradient(linear, top left, bottom left, from(" + colorInicial + "), to(" + colorFinal + "))");
    $("#marcoBody").css("background", " -webkit-linear-gradient(" + colorInicial + ", " + colorFinal + ")");
    $("#marcoBody").css("background", " linear-gradient(" + colorInicial + "," + colorFinal + ")");
  }

  $(function() {
    /*$("#modalConfiguradorMapa").modal("show");*/
    /*google.maps.event.trigger(mapaCliente, "resize");*/

    $('[data-toggle="tooltip"]').tooltip();

    $("#bodyPrincipal").sortable().on("mouseover", "li", function(e) {
      e.stopPropagation();
      $("#bodyPrincipal").css("background-color", "transparent");
    }).on("mouseleave", "li", function(e) {
      e.stopPropagation();
      $("#bodyPrincipal").css("background-color", "#c1c1c1");
    }).on("click", "li", function(e) {
      e.stopPropagation();
    });

    $("#bodyPrincipal").disableSelection();

    $('.selectorColor').colorpicker();

    $("#bodyPrincipal").click(function(e) {
      e.stopPropagation();
      $("#modalConfiguradorTemplate").modal("hide");
      $("#modalConfiguradorSecciones").modal("show");
    });

    $("#marcoBody").click(function(e) {
      zonaActual = "#marcoBody";
      $("#modalConfiguradorTemplate").modal("hide");
      $("#modalSelectorColores").modal("show");
    });

    $("#headerPrincipal").click(function(e) {
      zonaActual = "#headerPrincipal";
      $("#modalConfiguradorTemplate").modal("hide");
      $("#modalSelectorColor").modal("show");
    });

    $("#footerPrincipal").click(function(e) {
      zonaActual = "#footerPrincipal";
      $("#modalConfiguradorTemplate").modal("hide");
      $("#modalSelectorColor").modal("show");
    });

    $("#bodyPrincipal").mouseover(function(e) {
      e.stopPropagation();
      $("#marcoBody").css("background-color", "white");
      $("#bodyPrincipal").css("background-color", "#c1c1c1");
    });

    $("#bodyPrincipal").mouseleave(function(e) {
      e.stopPropagation();
      $("#marcoBody").css("background-color", "#c1c1c1");
      $("#bodyPrincipal").css("background-color", "transparent");
    });

    $("#marcoBody").mouseleave(function(e) {
      e.stopPropagation();
      $("#marcoBody").css("background-color", "white");
    });

    $("#marcoBody").mouseover(function(e) {
      e.stopPropagation();
      $("#marcoBody").css("background-color", "#c1c1c1");
    });
    
    $("#aceptarConfigurarTemplate").click(function(){
      
     colorHeader=colorHeader.replace("#","");
     colorFooter=colorFooter.replace("#","");
     colorInicial=colorInicial.replace("#","");
     colorFinal=colorFinal.replace("#","");    
      
      window.open("https://www.sobreplanos.co/templates/scrolling.php?idCliente=8&tipoNosotros=3&tipoMapa=4&tipoEstado=4&tipoTipo=1&colorMapa=8&tipoMarcador=10&colorMapa=8&colorInicial="+colorInicial+"&colorFinal="+colorFinal+"&colorHeader="+colorHeader+"&colorFooter="+colorFooter+"#firstPage", "_blank");
      
      /*$(".seccion").each(function(){
        alert($(this).attr("id"));
        
      });*/
                         
    });

  });

</script>
<div class="modal fade" id="modalConfiguradorTemplate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Configuración de Template</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row-fluid row-centered">
            <div class="col-xs-12 col-centered" id="paginaPrincipal">
              <div id="headerPrincipal" data-toggle="modal" data-target="#selectorColor">
              </div>
              <div id="marcoBody" data-toggle="modal" data-target="#selectorColor">
                <ol id="bodyPrincipal" class="sortable">
                </ol>
              </div>
              <div id="footerPrincipal" data-toggle="modal" data-target="#selectorColor">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="aceptarConfigurarTemplate">Crear Página</button>
      </div>
    </div>
  </div>
</div>
