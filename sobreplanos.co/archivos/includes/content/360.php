<script>
	$(document).delegate(".view360", "click", function() {
		var numView = $(this).attr("id");
		numView = numView.replace("view", "");
		numView = parseInt(numView);
		$("#photoSphereViewer").html("");
		var PSV = new PhotoSphereViewer({
			panorama: 'https://www.sobreplanos.co/archivos/fotos360/' + imagenes360[numView] + '.jpg',
			container: 'photoSphereViewer',
			loading_img: 'https://www.sobreplanos.co/archivos/icons/loading.gif',
			time_anim: 10,
			download: false,
			markers: false,
			auto_rotate: true,
			mousewheel: false,
			fisheye: true,
			navbar: true,
			min_fov: 200,
			max_fov: 1,
			default_fov: 179,
			navbar: [
				'autorotate',
				'zoom',
				'fullscreen',
				'gyroscope'
			]
		});
	});
</script>
<style>
	#photoSphereViewer {
		height: 400px;
		display: block;
	}
	
	@media (max-width: 600px) {
		#photoSphereViewer {
			height: 240px;
			display: block;
		}
	}
	
	.logo360 {
		position: absolute;
		top: 0;
		right: 0;
	}
	
	.view360 {
		margin: 0 4px 0 4px;
	}
</style>
<div class="row-fluid">
	<div class="contenedorLogo logo360">
	</div>
	<div class="" id="photoSphereViewer">
	</div>
</div>
<hr>
<div class="row-fluid text-center" id="botones360">

</div>