<div class="col-md-10 col-centered noPadding fullHeight">
  <div id="carruselTipo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h3>Apartamentos</h3>
        <div class="listadorThumbnails">
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
      <div class="item">
        <h3>Casas</h3>
        <div class="listadorThumbnails">
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
      <div class="item">
        <h3>Oficinas</h3>
        <div class="listadorThumbnails">
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
      <div class="item">
        <h3>VIS</h3>
        <div class="listadorThumbnails">
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 noPadding" ng-repeat="x in proyectos">
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
    <ol class="carousel-indicators">
      <li data-target="#carruselTipo" data-slide-to="0" class="active"></li>
      <li data-target="#carruselTipo" data-slide-to="1" class=""></li>
      <li data-target="#carruselTipo" data-slide-to="2" class=""></li>
      <li data-target="#carruselTipo" data-slide-to="3" class=""></li>
    </ol>
    <a class="left carousel-control" href="#carruselTipo" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carruselTipo" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>