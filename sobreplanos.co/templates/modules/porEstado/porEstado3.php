<style>

  .acordion .panel-primary {
    background-color: transparent !important;
    border: 3px solid white !important;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
  }
  
  .acordion .panel-heading {
    background-color: transparent !important;
    border: 0;
    margin: -3px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    color: white !important;
    text-decoration: none !important;
  }
  
  .acordion .panel-heading:hover {
    background-color: white !important;
    color: black !important;
  }
</style>
<div class="col-md-10 noPadding fullHeight fullWidth col-centered">
  <div class="panel-group fullHeight acordion" id="accordionEstados" role="tablist" aria-multiselectable="true">
    <div class="panel panel-primary">
      <a role="button" data-toggle="collapse" data-parent="#accordionEstados" href="#acordionEstados1" aria-expanded="true" aria-controls="collapseOne">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
          Finalizados 
           </h4>
        </div>
      </a>
      <div id="acordionEstados1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="tiraImagenesX">
            <div class="thumbnailX row-fluid noPadding" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
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
      </div>
    </div>
    <div class="panel panel-primary">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionEstados" href="#acordionEstados2" aria-expanded="false" aria-controls="collapseTwo">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
          En Construcción
          </h4>
        </div>
      </a>
      <div id="acordionEstados2" class="panel-collapse collapse  in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <div class="tiraImagenesX">
            <div class="thumbnailX row-fluid noPadding" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
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
      </div>
    </div>
    <div class="panel panel-primary">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionEstados" href="#acordionEstados3" aria-expanded="false" aria-controls="collapseThree">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
          Próximos
          </h4>
        </div>
      </a>
      <div id="acordionEstados3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <div class="tiraImagenesX">
            <div class="thumbnailX row-fluid noPadding" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
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
      </div>
    </div>
  </div>
</div>