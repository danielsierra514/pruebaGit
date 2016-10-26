<style>
 
</style>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="item" ng-class="{active:!$index}" ng-repeat="x in proyectos">
      <div class="carouselImagen">
        <img ng-src="{{x.imagenes[0]}}" alt="...">
        <div class="textoCarrusel">
          <h2>{{x.nombre}}</h2>
          <p>{{x.descripcion}}</p>
        </div>
      </div>
    </div>
    <!--<div class="container-fluid">
        <div class="row-fluid">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="{$index-1}" ng-class="{active:!$index}" ng-repeat="x in proyectos"></li>
          </ol>
        </div>
      </div>-->
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>