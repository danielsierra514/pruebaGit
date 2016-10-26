<script>
	var app = angular.module('listaCuenta', []);

	app.controller('listador', ['$scope', '$window', function($scope, $window) {
		$scope.estados = ["Sin Iniciar", "En Construcción", "Finalizado"];
		$scope.tipos = ["Apartamento", "Casa", "Vivienda Interés Social", "Oficina"];
		$scope.generar = function(datos) {
			$scope.proyectos = datos;
		}
		$scope.verEditarProyecto = function(idProyecto) {
			verEditarProyecto(obtenerProyecto(idProyecto));
		};
		$scope.panear = function(x, y, idProyecto) {
			var posicion = new google.maps.LatLng(x, y);
			mapaCuenta.panTo(posicion);
			mapaCuenta.setZoom(14);
			mostrarThumbnail(idProyecto);
		}
		$scope.panearX = function(x, y, idProyecto) {
			var posicion = new google.maps.LatLng(x, y);
			mapaCuenta.panTo(posicion);
			mapaCuenta.setZoom(14);
		}
		$scope.desPanear = function() {
			ocultarThumbnail();
		}

	}]);

	$(document).ready(function() {

	});
</script>

<div class="todox">
	<div class="todo" ng-app="listaCuenta" ng-controller="listador">
		<div class="form-group" id="formBuscador">
			<div class="input-group">
				<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
				<input class="form-control" type="text" placeholder="Busca un lugar" id="formBuscadorVal" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés."
					class="blue-tooltip"> </div>
		</div>
		<div class="pretty-split-pane-frame">
			<div class="split-pane fixed-left">
				<div class="split-pane-component" id="left-component">
					<div class="pretty-split-pane-component-inner" id="cxy">
						<div class="container-fluid" id="listaPrincipal">
							<div class="row-fluid" id="listador">
								<p ng-show="!proyectos.length">Aún no tienes ningun proyecto publicado.</p>
								<div class="thumbnail" id="thumbnailProyecto{{x.idProyecto}}" ng-click="verEditarProyecto(x.idProyecto)" ng-repeat="x in proyectos" ng-mouseenter="panear(x.latitud,x.longitud,x.idProyecto)" ng-mouseleave="desPanear(x.latitud,x.longitud,x.idProyecto)">
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
										<!--</ul>
										<button class="btn btn-primary" ng-click="verEditarProyecto(x.idProyecto)" role="button">Ver Más</button>-->
									</div>
								</div>
								<!--<div class="thumbnail" id="thumbnailProyecto{{x.idProyecto}}" ng-repeat="x in proyectos" ng-mouseover="panear(x.latitud,x.longitud)">
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
										<hr>
										<button class="btn btn-xs btn-success" type="button"><a href="" data-toggle="tooltip" data-placement="bottom" title="Visitas" class="negro"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>    <span class="badge">{{x.vistas}}</span></a></button>
										<button class="btn btn-xs btn-warning" type="button"><a href="" data-toggle="tooltip" data-placement="bottom" title="Interesados" class="negro"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>   <span class="badge">{{x.contactos.length}}</span></a></button>
										<button class="btn btn-primary pull-right" ng-click="verEditarProyecto(x.idProyecto)">Editar</button>
									</div>
								</div>-->
							</div>
						</div>
					</div>
				</div>
				<div class="split-pane-divider" id="my-divider"></div>
				<div class="split-pane-component" id="right-component">
					<div class="pretty-split-pane-component-inner">
						<div id="mapaCuenta" class="mapa"></div>
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