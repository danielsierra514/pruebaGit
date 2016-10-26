<script>
	var app = angular.module('listadorProyectos', []);

	app.controller('listador', ['$scope', '$window', function($scope, $window) {
		$scope.estados = ["Sin Iniciar", "En Construcción", "Finalizado"];
		$scope.tipos = ["Apartamento", "Casa", "Vivienda Interés Social", "Oficina"];
		$scope.generar = function(datos) {
			$scope.proyectos = datos;
		};
		$scope.verEditarProyecto = function(data) {
			verEditarProyecto(obtenerProyecto(data));
		};

	}]);

	$(document).ready(function() {

	});
</script>

<div class="container-fluid" id="listaAgente" ng-app="listadorProyectos">
	<div class="row-fluid" id="listador" ng-controller="listador">
		<p ng-show="!proyectos.length">Aún no tienes ningun proyecto asociado.</p>
		<div class="thumbnail" id="thumbnailProyecto{{x.idProyecto}}" ng-repeat="x in proyectos">
			<div class="thumbnailImg"><img ng-src="archivos/fotos/{{x.imagenes[0]}}.png" alt="..."></div>

			<a class="marcaImagen" target='_blank' href='http://{{x.urlEmpresa}}'><img ng-src='archivos/logos/{{x.logoEmpresa}}.png'></a>
			<div class="caption">
				<h4>{{x.nombre}}</h4>
				<ul class="list-unstyled">
					<li><b>{{tipos[x.tipo-1]}}</b> - <b>{{estados[x.estado-1]}}</b></li>
					<li>Desde: <b>{{x.areasDesde}} m<sup>2</sup></sup></b> a <b>{{x.preciosDesde | currency}}</b></li>
					<li>Lugar: <b>{{x.departamento}}-{{x.ciudad}}</b></li>

				</ul>
				<hr>
				<button class="btn btn-xs btn-success" type="button"><a href="" data-toggle="tooltip" data-placement="bottom" title="Visitas" class="negro"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>    <span class="badge">{{x.vistas}}</span></a></button>
				<button class="btn btn-xs btn-warning" type="button"><a href="" data-toggle="tooltip" data-placement="bottom" title="Interesados" class="negro"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>    <span class="badge">{{x.contactados}}</span></a></button>
				<button class="btn btn-primary" ng-click="verEditarProyecto(x.idProyecto)">Editar</button>
			</div>
		</div>
	</div>

</div>