<style>
  .fullHeight {
    max-height: 100%;
    height: 100%;
  }
  
  .fullHeightX {
    max-height: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
  }
  
  .noPadding {
    padding: 2px;
  }
  
  .noMargin {
    padding: 2px;
  }
  
  @media (max-width: 990px) {

    
    
  }
  
  .thumbnail {
    height: 120px;
    margin: 2px;
  }
  
  #listador,#carousel1 {
    position: absolute;
  }
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
  .carousel{
    padding:4px;
    background-color: #282529;
  }
</style>
<div class="col-md-1"></div>
<div class="col-md-4 hidden-xs hidden-sm fullHeightX noPadding">
  <div id="listador">
    <div class="thumbnail row-fluid noPadding" id="thumbnailProyecto{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-5 noMargin">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-7 noMargin">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b><br><button class="btn btn-sm btn-primary pull-right" ng-click="verProyecto(x.idProyecto)" role="button">Ver Más</button></p>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 col-md-12 fullHeight noPadding">
  <div id="carousel1" class="carousel slide fullHeight" data-ride="carousel">
    <div class="carousel-inner fullHeight" role="listbox">
      <div class="item fullHeight" ng-class="{active:!$index}" ng-repeat="x in proyectos">
        <div class="carouselImagen fullHeight">
          <img ng-src="{{x.imagenes[0]}}" alt="...">
          <div class="textoCarrusel transparent">
            <h2>{{x.nombre}}</h2>
            <p>{{x.descripcion}}</p>
          </div>
        </div>
      </div>
      <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="{$index-1}" ng-class="{active:!$index}" ng-repeat="x in proyectos"></li>
      </ol>
    </div>
    <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>