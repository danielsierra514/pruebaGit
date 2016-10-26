<script>
	$(document).ready(function() {

		$("#verFavoritos").click(function() {
			if (proyectosFavoritos.length > 0) {
				$("#bloqueCompararProyecto").show();
				$("#bloqueErrorFavoritos").hide();
				listarFavoritos();
			} else {
				$("#bloqueCompararProyecto").hide();
				$("#bloqueErrorFavoritos").show();
			}
			$("#modalFavoritos").modal("show");
		});
		
	});
</script>
<style>
	#direcciones{
		display:none;
	}	
</style>
<nav id="navbarbottom" class="navbar navbar-default navbar-fixed-bottom nav-bar-bot" role="navigation">
	<div class="container-fluid">
		<div class="float-left">
		<a href="#"><div id="profilePicture" data-toggle="modal" data-target="#modalLoginFacebook"></div></a>
			<h4 id="profileFullName" class="hidden-xs"></h4>
		</div>
		
		<ul class="nav navbar-nav  navbar-nav-bot pull-right" id="nav-bottom">
			<li class="pull-right">
				<a href="#" data-toggle="modal" data-target="#modalFiltro"> <span class="glyphicon glyphicon-search"></span> <span class="hidden-xs"> Busca un Proyecto</span></a>
			</li>
			<li class="pull-right">
				<a href="#" id="verFavoritos"> <span class="glyphicon glyphicon-star"></span> <span class="hidden-xs">Mis Favoritos</span> </a>
			</li>
			<li class="pull-right" id="direcciones">
				<a href="#" data-toggle="modal" data-target="#modalComoLlegar"> <span class="glyphicon glyphicon-road"></span> <span class="hidden-xs">Cómo Llegar?</span> </a>
			</li>
		</ul>
	</div>
</nav>