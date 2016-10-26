<script>
  $(document).ready(function() {

    var imagenes = [
      'http://streams.kolor.com/streams/afdbd237-c257-4f5e-b16c-87a0f0e60549/thumb_1920_960.jpg',
      'https://streams.kolor.com/streams/32e395a9-e9ef-4a73-a187-98d1169846bf/thumb_1920_960.jpg',
      'https://streams.kolor.com/streams/043d1ef6-6915-4c8a-8e7e-577bd3ba0f90/thumb_1920_960.jpg',
      'https://streams.kolor.com/streams/1679c044-8dd0-4349-ade9-fec14da94095/thumb_1920_960.jpg',
      'http://streams.kolor.com/streams/481b8985-41e5-42c8-be25-ce0b60f41d13/thumb_1920_960.jpg',
      'https://streams.kolor.com/streams/074eb16b-4068-4201-a31e-13de2f64789d/thumb_1920_960.jpg',
    ];

    $(".view360").click(function() {
      var numView = $(this).attr("id");
      numView = numView.replace("view", "");
      numView = parseInt(numView);
       $("#photoSphereViewer").html("");

      var altura = $("#photoSphereViewer").height();
      var PSV = new PhotoSphereViewer({
        panorama: imagenes[numView-1],
        container: 'photoSphereViewer',
        loading_img: 'http://www.sobreplanos.co/archivos/icons/loading.gif',
        time_anim:10,
        download:false,
        markers:false,
        auto_rotate:true,
        mousewheel: false,
        navbar: true,
        min_fov:200,
        max_fov:1,
        default_fov:179,
        size: {
          height: altura
        }
      });
    });
  });
</script>
<style>
  #photoSphereViewer {
    height: 400px;
    display: block;
  }
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="modal360" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button id="cerrarConfiguracion" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><img class="imgTitulo" src="archivos/icons/hh.png" width="30" height="30">   360° View</h4>
      </div>
      <div class="modal-body container-fluid">
        <div class="row-fluid">
          <div id="photoSphereViewer">
          </div>
        </div>
        <hr>
        <div class="row-fluid text-center">
          <button id="view1" type="button" class="btn btn-primary view360">1</button>
          <button id="view2" type="button" class="btn btn-primary view360">2</button>
          <button id="view3" type="button" class="btn btn-primary view360">3</button>
          <button id="view4" type="button" class="btn btn-primary view360">4</button>
          <button id="view5" type="button" class="btn btn-primary view360">5</button>
          <button id="view6" type="button" class="btn btn-primary view360">6</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Regresar</button>
      </div>
    </div>
  </div>
</div>