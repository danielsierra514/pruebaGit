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
  
  #mapaCliente {
    width: 100%;
    height: 100%;
  }
  
  #tiraImagenes {
    width: 100%;
    height: 0%;
    text-align: center;
    background-color: #282529;
    overflow-x: scroll;
    white-space: nowrap;
    overflow-y: hidden;
    padding-bottom: 4px;
  }
  
  @media (max-width: 990px) {
    #mapaCliente {
      width: 100%;
      height: 70%;
    }
    #tiraImagenes {
      width: 100%;
      height: 30%;
    }
  }
  
  .thumbnail {
    height: 120px;
    margin: 0px 0px 6px 0px!important;
  }
  
  #tiraImagenes .thumbnail {
    max-height: 100%;
    display: inline-block;
    background-color: white;
    overflow: hidden;
  }
  
  #tiraImagenes .thumbnail img {
    max-height: 100%;
  }
  
  #listador {
    position: absolute;
  }
  
  .marqueado8L {
    padding: 8px 4px 8px 8px !important;
    background-color: #282529;
  }
  
  .marqueado8R {
    padding: 8px 8px 8px 4px !important;
    background-color: #282529;
  }
  
  #sobreListador {
    width: 100%;
    height: 100%;
    position: relative;
    overflow-y: scroll;
    overflow-x: hidden;
  }
  
  #tiraImagenes .thumbnail {
    margin: 4px 4px 4px 0px !important;
  }
</style>
<div class="col-md-1"></div>
<div class="col-md-6 col-md-12 fullHeight noPadding marqueado8L">
  <div class="form-group" id="buscadorMapa">
    <div class="input-group">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-search"></span>
      </div>
      <input class="form-control" type="text" placeholder="Busca un lugar" id="formBuscadorVal" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés."
        class="blue-tooltip">
    </div>
  </div>
  <div id="mapaCliente"></div>
  <div id="tiraImagenes" class="hidden-md hidden-lg">
   <div class="thumbnail row-fluid noPadding" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-5 noMargin fullHeight">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-7 noMargin">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b><br></p>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4 hidden-xs hidden-sm noPadding marqueado8R fullHeight">
  <div id="sobreListador">
    <div id="listador">
      <div class="thumbnailX row-fluid noPadding maxWidth" ng-click="verProyecto(x.idProyecto)" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
        <div class="col-xs-6 noMargin">
          <h5 class="truncate"><b>{{x.nombre}}</b></h5>
          <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></p>
        </div>
        <div class="col-xs-6 noMargin fullHeight text-left">
          <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
        </div>
      </div>
    </div>
  </div>
</div>
