<script>
	$(document).ready(function() {

		/*$("#verMapa a").click(function() {
			$("#listaCuenta").fadeOut("slow", function() {
				$("#mapaCuenta").fadeIn("fast");
				$("#verMapa").css('display', 'none');
				$("#verLista").css('display', 'block');
			});
			$(".navbar-toggle").trigger("click");
		});*/

		/*$("#verLista a").click(function() {
			$("#mapaCuenta").fadeOut("slow", function() {
				$("#listaCuenta").fadeIn("fast");
				$("#verLista").css('display', 'none');
				$("#verMapa").css('display', 'block');
			});
			$(".navbar-toggle").trigger("click");
		});*/
		
		$("#verConfiguracion a").click(function() {	
			$("#despuesCambiosConfiguracion").css("display","none");
			$("#regresarCambiosConfiguracion").css("difsplay","block");
			$("#cerrarConfiguracion").css("display","block");
			$("#modalConfiguracion").modal("show");
			$(".navbar-toggle").trigger("click");
		});
		
		$("#verTCCuenta a").click(function() {
			$("#modalTCCuenta").modal("show");	
			$(".navbar-toggle").trigger("click");
		});
		
		$("#verAgentes a").click(function() {
			$("#modalListaAgentes").modal("show");
			$(".navbar-toggle").trigger("click");
		});
		
		$("#verMiPagina a").click(function() {
			$("#modalConfiguradorTemplate").modal("show");
			$(".navbar-toggle").trigger("click");
		});
		
		$("#cerrarSesion a").click(function() {
			cerrarSesion();
			$(".navbar-toggle").trigger("click");
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
				<!--<li id="verMapa"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Mapa de Proyectos" class="yellow-tooltip"><span class="glyphicon glyphicon-globe pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Ver Mapa</span></a></li>
				<li id="verLista"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Lista de Proyectos" class="yellow-tooltip"><span class="glyphicon glyphicon-align-justify pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Ver Lista</span></a></li>
				<li id="verAgentes"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Agentes" class="yellow-tooltip" style="position:relative"><span class="glyphicon glyphicon-user pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Agentes</span></a></li>-->
				<li id="verConfiguracion"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Configuración" class="yellow-tooltip"><span class="glyphicon glyphicon-cog pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Configuración</span></a></li>
				<li id="verMiPagina"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Mi Página" class="yellow-tooltip"><span class="glyphicon glyphicon-cloud pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Mi Página</span></a></li>
				<li id="verTCCuenta"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Términos y Condiciones" class="yellow-tooltip"><span class="glyphicon glyphicon-list-alt pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Términos y Condiciones</span></a></li>
				<li id="cerrarSesion"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión" class="yellow-tooltip"><span class="glyphicon glyphicon-off pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Cerrar Sesión</span></a></li>
			</ul>
		</div>
	</div>
</nav>