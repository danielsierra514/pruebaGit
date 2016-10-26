<style>
  #listadorThumbnails {
    height: 100%;
    position: absolute;
    overflow-y: scroll;
  }
  
  .transparent {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
    filter: alpha(opacity=90);
    -moz-opacity: 0.9;
    -khtml-opacity: 0.9;
    opacity: 0.9;
  }
  
  .thunbnailA {
    position: relative;

    padding: 6px;
    background-color: #222222;
    color: #D6D6D6;
    margin-right: 10px;
    margin-bottom: 20px;
    overflow: hidden;
  }
  
  .thumbnailAImagen {
    width: 100%;
    height: 100%;
  }
  
  .thumbnailAImagen img {
    background-color: yellow;
    max-width: 100%;
    max-height: 100%;
  }
  
  .leyendaThumbnailA {
    position: absolute;
    width: 100%;
    top: 220px;
    height: 100%;
    background-color: black;
    z-index: 1000;
    font-size: 12px;
    padding: 6px;
  }
</style>
<script>
  $(document).ready(function() {

    $(document).delegate('.thunbnailA', 'mouseenter', function() {
      $(this).find(".leyendaThumbnailA").animate({
        top: '60%'
      }, 300)
    });

    $(document).delegate('.thunbnailA', 'mouseleave', function() {
      $(this).find(".leyendaThumbnailA").animate({
        top: '100%'
      }, 100)
    });

  });
</script>
<div id="listadorThumbnails">
  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 noPadding" ng-repeat="x in proyectos">
    <div class="thunbnailA">
      <div class="thumbnailAImagen">
        <a href=""><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="leyendaThumbnailA transparent">
        <h5>{{x.nombre}}</h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></p>
      </div>
    </div>
  </div>
</div>