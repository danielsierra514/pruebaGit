<style>
  #mapaCliente {
    width: 100%;
    height: 100%;
  }
  
  @media (max-width: 990px) {
    #mapaCliente {
      width: 100%;
      height: 70%;
    }
    #tiraImagenes {
      height: 30%
    }
  }
  
  .sinPadding {
    padding: 1px;
  }
  
  .thumbnail {
    height: 120px;
    margin-bottom: 2px;
  }
  
  #tiraImagenes {
    text-align: center;
    background-color: #282529;
    overflow-x: scroll;
    white-space: nowrap;
    overflow-y: hidden;
  }
  
  #tiraImagenes .thumbnailX {
    height: 100%;
    display: inline-block;
    background-color: white;
    overflow: hidden;
    margin-right: 10px;
  }
  
  #tiraImagenes .thumbnailX img {
    height: 100%;
    max-height: 100%;
    margin: 10px;
  }
</style>

<div class="col-md-8 col-md-12 sinPadding fullHeight">
  <div class="form-group" id="formBuscador">
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
    <div class="thumbnailX row-fluid" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-5 fullHeightX">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-7 fullHeightX">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b><br><button class="btn btn-sm btn-primary pull-right" ng-click="verProyecto(x.idProyecto)" role="button">Ver Más</button></p>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4 sinPadding fullHeight hidden-xs hidden-sm" id="contenidoListador">
  <div id="listador">
    <div class="thumbnail row-fluid" id="thumbnailProyecto{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-5">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-7">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b><br><button class="btn btn-sm btn-primary pull-right" ng-click="verProyecto(x.idProyecto)" role="button">Ver Más</button></p>
      </div>
    </div>
  </div>
</div>