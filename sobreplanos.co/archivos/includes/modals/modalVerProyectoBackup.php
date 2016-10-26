<script async>
	$(document).ready(function() {

		$("#verMas").click(function() {
			$("#bloqueDescripcionProyecto").fadeOut("slow", function() {
				$("#bloqueDetalleProyecto").fadeIn("slow", function() {});
			});
		});

		$("#regresarDetalle").click(function() {
			$("#bloqueDetalleProyecto").fadeOut("slow", function() {
				$("#bloqueDescripcionProyecto").fadeIn("slow", function() {});
			});
		});

		$("#verAmpliado").click(function() {
			$("#modalVerProyecto").modal("hide");
			$("#modalAmpliado").modal("show");
		});

		$("#ver360").click(function() {
			$("#modalVerProyecto").modal("hide");
			$("#modal360").modal("show");
			setTimeout(function() {
				$("#view1").trigger("click");
			}, 500);
		});

		$("#meInteresaX").click(function() {
			$("#modalVerProyecto").modal("hide");
			$("#modalContactoCliente").modal("show");
		});

		$("#cerrarVerProyecto").click(function() {
			$("#modalVerProyecto").modal("hide");
			mapaPrincipal.setZoom(zoomPrincipal);
		})




		$("#agregarFavoritos").click(function() {
			idProyecto = $(this).parent().find("#idFavorite").html();
			agregarFavoritos(idProyecto);
			$("#modalVerProyecto").modal("hide");
			modalActual = "modalVerProyecto";
			$("#textoMensaje").html("Se agrego el Proyecto a tu lista de favoritos");
			$("#modalMensaje").modal("show");
		});

		$("#comoLlegarX").click(function() {

			$("#modalVerProyecto").modal("hide");
			$("#verMapa a").trigger('click');

			calcRoute();
		});

		$("#compartirFacebookX").click(function() {
			FB.ui({
				method: 'share',
				href: 'http://www.sobreplanos.co/principal.php?idProyecto=5',
				caption: 'An example caption',
				picture: 'http://www.sobreplanos.co/archivos/images/sobreplanosShare2.jpg'
			}, function(response) {});
		});


	});
</script>
<style>
	.contenedorLogo {
		width: 240px;
		height: 80px;
		margin: auto;
		margin-bottom: 20px;
	}
	
	.contenedorLogo img {
		max-width: 100%;
		max-height: 100%;
	}
	/*CARRUSEL*/
	
	#contenedorImagenesProyecto {
		padding: 10px 20px 20px 20px;
		height: 340px !important;
		margin-right: 40px;
		margin-left: 40px;
		-webkit-border-radius: 5px !important;
		-moz-border-radius: 5px !important;
		border-radius: 5px !important;
	}
	
	#contenedorCarrusel {
		width: 100%;
		height: 300px;
	}
	
	#caruselImagenesProyecto {
		width: 100%;
		height: 270px;
		margin-bottom: 30px;
	}
	
	#itemsImagenesProyecto {
		height: 100%;
	}
	
	#indicatorsImagenesProyecto {
		bottom: -40px;
	}
	
	#indicatorsImagenesProyecto li {
		border: 3px solid #D6D6D6;
		background-color: #8175B5;
	}
	
	#indicatorsImagenesProyecto li.active {
		background-color: #8175B5;
		border-color: #8175B5;
	}
	
	#indicatorsImagenesProyecto li {
		width: 17px !important;
		height: 17px !important;
	}
	
	#caruselImagenesProyecto .item {
		height: 270px;
		text-align: center;
	}
	
	#caruselImagenesProyecto img {
		height: 100%;
		margin: auto;
	}
	
	#caruselImagenesProyecto .carousel-control {
		background-image: none;
		color: black
	}
	
	.carousel-control {
		width: 8%;
	}
	/*datos*/
	
	#bloqueDescripcionProyecto {
		height: 150px;
		padding: 0px 30px 0px 0px;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	
	#bloqueDatosProyecto {
		height: 150px;
		padding: 0px 10px 0px 10px;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	
	#bloqueDetalleProyecto {
		height: 150px;
		margin-top: 30px;
		margin-bottom: 30px;
		margin-right: 20px;
	}
	
	.subBloque {
		border: 1px solid #282529;
	}
	
	#descripcionProyecto,
	#caruselDatosProyecto {
		margin-top: 20px;
	}
	
	#bloqueDetalleProyecto thead tr th:nth-child(1) {
		width: 15%;
	}
	
	#bloqueDetalleProyecto thead tr th:nth-child(2) {
		width: 15%;
	}
	
	#bloqueDetalleProyecto thead tr th:nth-child(3) {
		width: 18%;
	}
	
	#bloqueDetalleProyecto thead tr th:nth-child(4) {
		width: 18%;
	}
	
	#bloqueDetalleProyecto thead tr th:nth-child(5) {
		width: 25%;
	}
	
	#bloqueDetalleProyecto thead tr th:nth-child(6) {
		width: 9%;
	}
	
	#bloqueDetalleProyecto td,
	#bloqueDetalleProyecto th {
		text-align: center
	}
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modalVerProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="cerrarVerProyecto"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="nombreProyecto">   </h4>
			</div>
			<div class="modal-body container-fluid">
				<div class='row-fluid'>
					<div class="col-md-12 hidden-md hidden-lg">
						<div class="contenedorLogo">

						</div>
					</div>
					<div class="col-md-7">
						<div class="container-fluid">
							<div class="row-fluid">
								<div id="caruselImagenesProyecto" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner" role="listbox" id="itemsImagenesProyecto">
									</div>
									<a class="left carousel-control" href="#caruselImagenesProyecto" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#caruselImagenesProyecto" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
									<ol class="carousel-indicators" id="indicatorsImagenesProyecto">
									</ol>
								</div>
							</div>
							<div class="row-fluid">
								<button type="button" class="hidden-xs hidden-sm btn btn-link pull-right" id="verAmpliado">Ampliar</button>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="container-fluid">
							<div class="contenedorLogo hidden-xs hidden-sm">

							</div>
							<div id="bloqueDescripcionProyecto">
								<div class="tablaBody tabla140 verticalScrolled">
									<p id="descripcionProyecto"></p>
									<ul id="facilidadesProyectox"></ul>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row-fluid">
								<a class="btn btn-social btn-facebook" id="compartirFacebook">
									<i class="fa fa-facebook"></i> Share
								</a>
								<a class="btn btn-social btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-twitter']);">
									<i class="fa fa-twitter"></i> Tweet
								</a>
								<a class="btn btn-social-icon">
									<img id="agregarFavoritos" src='archivos/icons/favorite.png'>
									<div id="idFavorite" class="hidden"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body container-fluid">
				<div class="row-fluid">
					<div class="col-md-7">
						<hr>
						<div id="bloqueDetalleProyecto">
							<div class="borderedAll">
								<div class="tablaHeader borderedTop">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Área</th>
												<th class="hidden-xs hidden-sm">Baños</th>
												<th class="hidden-xs hidden-sm">Habitaciones</th>
												<th class="hidden-xs hidden-sm">Parqueaderos</th>
												<th>Precio</th>
												<th>PDF</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="tablaBody tabla140 verticalScrolled">
									<table class="table table-striped" id="tablaModalidades">
										<thead>
											<tr>
												<th>Área</th>
												<th class="hidden-xs hidden-sm">Baños</th>
												<th class="hidden-xs hidden-sm">Habitaciones</th>
												<th class="hidden-xs hidden-sm">Parqueaderos.</th>
												<th>Precio</th>
												<th>PDF</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<hr>
						<div id="bloqueDatosProyecto">
							<ul class="list-unstyled">
								<li>Tipo: <span id="tipoProyecto"><b></b></span></li>
								<li>Estado: <span id="estadoProyecto"><b></b></span></li>
								<li>Desde: <span id="areaProyecto"><b></b>m<sup>2</sup> a <span id="precioProyecto"><b></b></span></li>
								<li>Estrato: <span id="estratProyecto"><b></b></span></li>
								<li class="hidden">Url: <span id="urlProyecto"><b></b></span></li>
								<hr>
								<li>Departamento: <span id=departamentoProyecto><b></b></span></li>
								<li>Ciudad: <span id="ciudadProyecto"><b></b></span></li>
								<li>Barrio: <span id="barrioProyecto"><b></b></span></li>
								<li class="hidden">Dirección: <span id="direccionProyecto"><b></b></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-body container-fluid">
				hola
				<?php
				include '../includes/content/360.php';				
				?>
			</div>
			<div class="modal-footer">
				<button id="comoLlegarX" type="button" class="btn btn-success pull-left">Como llegar?</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
				<button id="meInteresaX" type="button" class="btn btn-primary">Me Interesa!!!</button>
			</div>
		</div>
	</div>
</div>