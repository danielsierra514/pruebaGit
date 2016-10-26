<link rel="stylesheet" href="scripts/photoSphereViewer/photoSphereViewer.min.css">
<script src="scripts/photoSphereViewer/three.min.js"></script>
<script src="scripts/photoSphereViewer/D.min.js"></script>
<script src="scripts/photoSphereViewer/doT.min.js"></script>
<script src="scripts/photoSphereViewer/uevent.min.js"></script>
<script src="scripts/photoSphereViewer/CanvasRenderer.min.js"></script>
<script src="scripts/photoSphereViewer/Projector.min.js"></script>
<script src="scripts/photoSphereViewer/photoSphereViewer.min.js"></script>
<script type="text/javascript">
  var PSV;
  var imagenes = [
    'https://www.sobreplanos.co/archivos/360/1.jpg',
    'https://www.sobreplanos.co/archivos/360/2.jpg',
    'https://www.sobreplanos.co/archivos/360/3b.jpg',
    'https://www.sobreplanos.co/archivos/360/4.jpg',
    'https://www.sobreplanos.co/archivos/360/5.jpg',
    'https://www.sobreplanos.co/archivos/360/6.jpg',
    'https://www.sobreplanos.co/archivos/360/7.jpg'
  ];

  $(document).ready(function() {

    var random = Math.floor(Math.random() * 8) + 0;
    var altura = $("#fondo").height();
    PSV = new PhotoSphereViewer({
      panorama: imagenes[3],
      container: 'fondo',
      loading_img: 'images/loading.gif',
      time_anim: 1,
      anim_speed: '1rpm',
      download: false,
      markers: false,
      auto_rotate: true,
      mousewheel: false,
      navbar: true,
      min_fov: 3000,
      default_fov: 3000,
      size: {
        height: altura
      }
    });

  });
</script>
<style>
  #fondo {
    width: 100%;
    height: 100%;
  }
</style>
<div id="fondo"></div>