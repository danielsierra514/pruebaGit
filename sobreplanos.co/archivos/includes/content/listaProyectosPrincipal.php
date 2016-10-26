<script>
	var app = angular.module('listadorProyectos', []);
	app.controller('listador', ['$scope', '$window', function($scope, $window) {
		$scope.estados = ["Sin Iniciar", "En Construcción", "Finalizado"];
		$scope.tipos = ["Apartamento", "Casa", "Vivienda Interés Social", "Oficina"];
		$scope.generar = function(datos) {
			$scope.proyectos = datos;
		}
		$scope.verProyecto = function(idProyecto) {
			verInformacionProyecto(obtenerProyecto(idProyecto));
		}
		$scope.panear = function(x, y, idProyecto) {
			var posicion = new google.maps.LatLng(x, y);
			mapaPrincipal.panTo(posicion);
			mapaPrincipal.setZoom(14);
			mostrarThumbnail(idProyecto);
		}
		$scope.panearX = function(x, y, idProyecto) {
			var posicion = new google.maps.LatLng(x, y);
			mapaPrincipal.panTo(posicion);
			mapaPrincipal.setZoom(14);
		}
		$scope.desPanear = function() {
			ocultarThumbnail();
		}
	}]);

	$(document).ready(function() {


	});
</script>
<div class="todox">
	<div class="todo" ng-app="listadorProyectos" ng-controller="listador">
		<div class="form-group" id="formBuscador">
			<div class="input-group">
				<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
				<input class="form-control" type="text" placeholder="Busca un lugar" id="formBuscadorVal" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés."
					class="blue-tooltip"> </div>
		</div>
		<div id="social-icons">
			<a href='https://www.facebook.com/sobrePlanos.co/' target="_blank" class="btn btn-social-icon btn-facebook pull-left"><i class="fa fa-facebook"></i></a>
			<a href='https://twitter.com/sobreplanos2016' target="_blank" class="btn btn-social-icon btn-twitter pull-left"><i class="fa fa-twitter"></i></a>
		</div>
		<div class="pretty-split-pane-frame">
			<div class="split-pane fixed-left">
				<div class="split-pane-component" id="left-component">
					<div class="pretty-split-pane-component-inner" id="cxy">
						<div class="container-fluid" id="listaPrincipal">
							<div class="row-fluid" id="listador">
								<div class="thumbnail" id="thumbnailProyecto{{x.idProyecto}}" ng-click="verProyecto(x.idProyecto)" ng-repeat="x in proyectos" ng-mouseenter="panear(x.latitud,x.longitud,x.idProyecto)" ng-mouseleave="desPanear(x.latitud,x.longitud,x.idProyecto)">
									<div class="thumbnailImg"><img ng-src="{{x.imagenes[0]}}" alt="..."></div>
									<a class="marcaImagen" target='_blank' ng-href='http://{{x.urlEmpresa}}'><img ng-src='archivos/logos/{{x.logoEmpresa}}.png'></a>
									<div class="caption">
										<p class="hide">{{x.idProyecto}}</p>
										<h4 class="titPro">{{x.nombre}}</h4>
										<ul class="list-unstyled">
											<li><b>{{tipos[x.tipo-1]}}</b> - <b>{{estados[x.estado-1]}}</b></li>
											<li>Desde: <b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></li>
											<li>Lugar: <b>{{x.departamento}}-{{x.ciudad}}</b></li>
											<li class="liLatitud hide">{{x.latitud}}</li>
											<li class="liLongitud hide">{{x.longitud}}</li>
										</ul>
										<!--<hr>
										<button class="btn btn-primary" ng-click="verProyecto(x.idProyecto)" role="button">Ver Más</button>-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="split-pane-divider" id="my-divider"></div>
				<div class="split-pane-component" id="right-component">
					<div class="pretty-split-pane-component-inner">
						<div id="mapaPrincipal" class="mapa"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="splitBanner">
			<div class="splitBannerItem row-fluid" id="thumbnailProyectoX{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panearX(x.latitud,x.longitud,x.idProyecto)">
				<div class="col-xs-5">
					<a href="#" ng-click="verProyecto(x.idProyecto)"><img ng-src="{{x.imagenes[0]}}" alt="..."></a>
				</div>
				<div class="col-xs-7">
					<h5><b>{{x.nombre}}</b></h5>
					<p>{{tipos[x.tipo-1]}} / {{estados[x.estado-1]}} <br><b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b><br><button class="btn btn-sm btn-primary pull-right" ng-click="verProyecto(x.idProyecto)" role="button">Ver Más</button></p>
				</div>
			</div>
		</div>
	</div>
</div>