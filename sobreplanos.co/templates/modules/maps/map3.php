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
  
  .tiraImagenes {
    width: 100%;
    height: 0%;
    text-align: center;
    background-color: #282529;
    overflow-x: scroll;
    white-space: nowrap;
    overflow-y: hidden;
    padding-bottom: 4px;
    width: 100%;
    height: 30%;
    padding-bottom: 10px;;
  }
  
  #mapaCliente {
    width: 100%;
    height: 70%;
  }

  .tiraImagenes .thumbnail {
     height: 120px;
    margin: 6px 3px 6px 3px!important;
    max-height: 100%;
    display: inline-block;
    background-color: white;
    overflow: hidden;
  }
  
  .tiraImagenes .thumbnail img {
    max-height: 100%;
  }
  
  #listador {
    position: absolute;
  }
  
    .marqueado8{
    padding:8px !important;
    background-color:#282529;
  }
  
</style>
<div class="col-md-1"></div>
<div class="col-md-10 fullHeight noPadding marqueado8">
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
  <div class="tiraImagenes">    
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

