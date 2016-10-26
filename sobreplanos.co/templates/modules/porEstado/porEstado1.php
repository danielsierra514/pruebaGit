
<div class="col-md-10 noPadding fullHeight fullWidth col-centered">
  <div class="panel with-nav-tabs panel-primary fullHeight">
    <div class="panel-heading fullWidth">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1Estado" data-toggle="tab">Finalizados</a></li>
        <li><a href="#tab2Estado" data-toggle="tab">En Construcción</a></li>
        <li><a href="#tab3Estado" data-toggle="tab">Próximos</a></li>
      </ul>
    </div>
    <div class="panel-body tab-content">
      <div class="tab-pane fade in active" id="tab1Estado">
        <div class="listadorThumbnails">
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
      </div>
      <div class="tab-pane fade" id="tab2Estado">
        <div class="listadorThumbnails">
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
      </div>
      <div class="tab-pane fade" id="tab3Estado">
        <div class="listadorThumbnails">
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
      </div>
    </div>
  </div>
</div>