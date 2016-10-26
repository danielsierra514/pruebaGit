<script>
	$(document).ready(function() {

	
	});
</script>
<style>
	#navbartop{
		position:fixed;
		background-color:  <?php echo "#".$colorHeader ."!important"?>;;
	}
	
</style>
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
			<a class="navbar-brand" href="https://www.sobreplanos.co" target="_blank"><img src="https://www.sobreplanos.co/archivos/logos/MRFCIUEUTD.png" id="logoPrincipal"></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul id="menu" class="nav navbar-nav pull-right">
				<!--<li id="verMapa"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Ver Mapa" class="yellow-tooltip"><span class="glyphicon glyphicon-globe pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Ver Mapa</span></a></li>
				<li id="verLista"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Ver Lista" class="yellow-tooltip"><span class="glyphicon glyphicon-align-justify pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Ver Lista</span></a></li>-->
				<!--<li id="verLogin"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Log in" class="yellow-tooltip"><span class="glyphicon glyphicon-user pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Login</span></a></li>
				<li id="verTCPrincipal"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Términos y Condiciones" class="yellow-tooltip"><span class="glyphicon glyphicon-list-alt pull-left menuCollapse"></span><span class="visible-sm visible-xs hidden-md">Términos y Condiciones</span></a></li>-->
				<li data-menuanchor="firstPage"><a href="#firstPage">First slide</a></li>
				<li data-menuanchor="secondPage"><a href="#secondPage">Second slide</a></li>
				<li data-menuanchor="3rdPage"><a href="#3rdPage">Third slide</a></li>
				<li data-menuanchor="4rdPage"><a href="#4rdPage">Fourth slide</a></li>
			</ul>
		</div>
	</div>
</nav>