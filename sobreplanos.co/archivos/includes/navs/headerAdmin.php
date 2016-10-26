<script>
	$(document).ready(function() {

	$("#cerrarSesion a").click(function() {
			cerrarSesionAdmin();			
		});

	});
</script>
<nav id="navbartop" class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
				<span class="icon-bar"></span>
      </button>
			<a class="navbar-brand" href="http://www.sobreplanos.co" target="_blank"><img src="archivos/images/sobrePlanos.png" id="logoPrincipal"></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav pull-right">
				<li id="verMapa"> <a href="#"><span class="glyphicon glyphicon-globe pull-left menuCollapse"></span><span class="visible-sm visible-xs">Ver Mapa</span></a></li>
				<li id="verLista"> <a href="#"><span class="glyphicon glyphicon-align-justify pull-left menuCollapse"></span><span class="visible-sm visible-xs">Ver Lista</span></a></li>		
				<li id="cerrarSesion"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión" class="yellow-tooltip"><span class="glyphicon glyphicon-off pull-left menuCollapse"></span><span class="visible-sm visible-xs">Cerrar Sesión</span></a></li>
			</ul>
		</div>
	</div>
</nav>