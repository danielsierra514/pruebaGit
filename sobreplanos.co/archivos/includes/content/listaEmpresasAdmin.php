<script>
	var app = angular.module('listadorEmpresas', []);

	app.controller('listador', ['$scope', '$window', function($scope, $window) {
    $scope.estados = ["Creada", "Activada", "Bloqueada"];
    $scope.colores = ["label-warning", "label-success", "label-danger"];
		$scope.generar = function(datos) {
			$scope.empresas = datos;
		}
		$scope.verEmpresa=function(idEmpresa) {
			verInformacionEmpresa(obtenerEmpresa(idEmpresa));
		}		
	}]);

	$(document).ready(function() {

	});
</script>
<style>
	#subListaEmpresas {
		margin: 40px;
		height: 80%;
		overflow: hidden;
		position: relative
	}
	
	.thumbnail {
		margin: 20px;
		background-color: #D6D6D6;
		position: relative;
    margin-bottom:25px;
	}
	
	.marcaImagen {
		top: 12px;
		right: 12px;
		width: 120px;
		height: 40px;
		position: absolute;
	}
	
	.marcaImagen img {
		position: absolute;
	}
	
	.thumbnail li {
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	
	.thumbnailImg {
		text-align:center;
		margin: 8px 8px 0 8px;
	}
	
	.thumbnailImg img {
margin:auto
	}
</style>
<div class="container-fluid" id="listaEmpresas" ng-app="listadorEmpresas">
	<div id="subListaEmpresas" class="verticalScrolled">
		<div class="row-fluid" id="listador" ng-controller="listador">
			<div class="col-sm-6 col-md-3" ng-repeat="x in empresas">
				<div class="thumbnail">
					<div class="thumbnailImg"><img ng-src="archivos/logos/{{x.logo}}.png" alt="..."></div>

					<a class="marcaImagen" target='_blank' ng-href='http://{{x.urlEmpresa}}'><img ng-src='archivos/logos/{{x.logoEmpresa}}.png'></a>
					<div class="caption">
						<h4>{{x.nombreEmpresa}}</h4>						
						<hr>            
						<button class="btn btn-primary" ng-click="verEmpresa(x.idEmpresa)" role="button">Ver Más</button>
            <span class="label pull-right" ng-class="colores[x.estado]">{{estados[x.estado]}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>