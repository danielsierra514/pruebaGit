<style>
 
  .textoCarrusel{
    color:white;
    background-color:#282529;
    position:absolute;
    top:60%;
    height:500px;
    width:100%;
    
  }
  .carouselImagen img{
    width:100%;
    max-height:100%;
  }
  .marqueado8 {
    padding: 8px 8px 8px 8px !important;
    background-color: #282529;
  }
  .carousel{
    padding:0 !important;
  }
</style>
<div class="col-md-12 col-md-12 noPadding marqueado8">
  <div id="bannerEmpresarial" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div class="carouselImagen">
          <img ng-src="images/b1.png" alt="...">
        </div>
      </div>
      <div class="item">
        <div class="carouselImagen">
          <img ng-src="images/b2.png" alt="...">
        </div>
      </div>
      <div class="item flHeight">
        <div class="carouselImagen">
          <img ng-src="images/b3.png" alt="...">
        </div>
      </div>
      <!--<ol class="carousel-indicators">
        <li data-target="#bannerEmpresarial" data-slide-to="{$index-1}" ng-class="{active:!$index}" ng-repeat="x in proyectos"></li>
      </ol>-->
    </div>
    <a class="left carousel-control" href="#bannerEmpresarial" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#bannerEmpresarial" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>