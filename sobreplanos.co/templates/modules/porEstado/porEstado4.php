<div class="col-md-10 noPadding fullHeight col-centered">
  <h3>Finalizados</h3>
  <div class="tiraImagenesX">
    <div class="thumbnailX row-fluid noPadding" ng-click="verProyecto(x.idProyecto)" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-6 noMargin fullHeight text-left">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-6 noMargin">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></p>
      </div>
    </div>
  </div>
  <h3>En Construcción</h3>
  <div class="tiraImagenesX">
    <div class="thumbnailX row-fluid noPadding" ng-click="verProyecto(x.idProyecto)" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-6 noMargin fullHeight text-left">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-6 noMargin">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></p>
      </div>
    </div>
  </div>
  <h3>Próximos</h3>
  <div class="tiraImagenesX">
    <div class="thumbnailX row-fluid noPadding" ng-click="verProyecto(x.idProyecto)" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
      <div class="col-xs-6 noMargin fullHeight text-left">
        <a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
      </div>
      <div class="col-xs-6 noMargin">
        <h5 class="truncate"><b>{{x.nombre}}</b></h5>
        <p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></p>
      </div>
    </div>
  </div>
</div>