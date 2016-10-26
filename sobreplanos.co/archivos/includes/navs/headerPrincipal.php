<script>
	$(document).ready(function() {
		/*("#verMapa a").click(function() {
			$("#listaPrincipal").fadeOut("slow", function() {
				$("#mapaPrincipal").fadeIn("fast");
				$("#verMapa").css('display', 'none');
				$("#verLista").css('display', 'block');
			});
			$(".navbar-toggle").trigger("click");
		});*/

		/*$("#verLista a").click(function() {
			$("#mapaPrincipal").fadeOut("slow", function() {
				$("#listaPrincipal").fadeIn("fast");
				$("#verLista").css('display', 'none');
				$("#verMapa").css('display', 'block');
			});
			$(".navbar-toggle").trigger("click");
		});*/

		$("#verLogin a").click(function() {
			$("#modalLogin").modal("show");
			$(".navbar-toggle").trigger("click");
		});

		$("#verTCPrincipal a").click(function() {
			$("#modalTCPrincipal").modal("show");
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
				<!--<li id="verMapa"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Ver Mapa" class="yellow-tooltip"><span class="glyphicon glyphicon-globe pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Ver Mapa</span></a></li>
				<li id="verLista"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Ver Lista" class="yellow-tooltip"><span class="glyphicon glyphicon-align-justify pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Ver Lista</span></a></li>-->
				<li id="verLogin"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Log in" class="yellow-tooltip"><span class="glyphicon glyphicon-user pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Login</span></a></li>
				<li id="verTCPrincipal"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Términos y Condiciones" class="yellow-tooltip"><span class="glyphicon glyphicon-list-alt pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Términos y Condiciones</span></a></li>

			</ul>
		</div>
	</div>
</nav>