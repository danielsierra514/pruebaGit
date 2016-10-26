<style>
  .fullHeight {
    max-height: 100%;
    height: 100%;
  }
  
  .fullHeightX {
    max-height: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
  }
  
  .noPadding {
    padding: 2px;
  }
  
  .noMargin {
    padding: 2px;
  }
  
  #mapaCliente {
    width: 100%;
    height: 100%;
  }
  
  #tiraImagenes {
    width: 100%;
    height: 0%;
    text-align: center;
    background-color: #282529;
    overflow-x: scroll;
    white-space: nowrap;
    overflow-y: hidden;
    padding-bottom: 4px;
  }
  
  #mapaCliente {
    width: 100%;
    height: 100%;
  }
  
  .marqueado8 {
    padding: 8px !important;
    background-color: #282529;
  }
  /***********tooltip**********/
  
  #marker-tooltip,
  #marker-tooltipX {
    display: none;
    position: absolute;
    width: 250px;
    height: 200px;
    z-index: 2000;
    margin-left: 20px;
    margin-top: -120px;
    font-family: arial;
    font-size: 13px;
    padding: 4px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    color: #ffffff;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=85)";
    filter: alpha(opacity=85);
    -moz-opacity: 0.85;
    -khtml-opacity: 0.85;
    opacity: 0.85;
    z-index: 50000;
    -moz-box-shadow: 0px 10px 14px -7px #282529;
    -webkit-box-shadow: 0px 10px 14px -7px #282529#8710b2;
    box-shadow: 0px 10px 14px -7px #282529;
    background-color: #282529;
  }
  
  #marker-tooltip:before {
    content: "";
    display: block;
    width: 0;
    height: 0;
    border-bottom: 12px solid transparent;
    border-right: 12px solid #282529;
    border-top: 12px solid transparent;
    border-left: 12px solid transparent;
    position: absolute;
    top: 100px;
    left: -20px;
  }
  
  #marker-tooltipX {
    margin-top: -200px;
  }
  
  #marker-tooltip p,
  #marker-tooltipX p {
    margin-top: 10px;
  }
  
  .imagenTooltip {
    margin: auto;
    width: 160px;
    max-height: 100%;
    border:4px solid white;
  }
</style>
<div class="col-md-1"></div>
<div class="col-md-10 fullHeight noPadding marqueado8">
  <div id="marker-tooltip"></div>
  <div class="form-group" id="buscadorMapa">
    <div class="input-group">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-search"></span>
      </div>
      <input class="form-control" type="text" placeholder="Busca un lugar" id="formBuscadorVal" data-toggle="tooltip" data-placement="bottom" title="Acá puedes buscar cualquier lugar en el mundo, ya sea por País, Región, Ciudad, Barrio, Dirección o lugares de interés."
        class="blue-tooltip">
    </div>
  </div>
  <div id="mapaCliente"></div>
</div>
