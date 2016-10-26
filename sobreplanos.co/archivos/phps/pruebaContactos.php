<?php

/*
///////////////juntar imagenes//////////////////
function merge($filename_x, $filename_y, $filename_result) {
$estampa = imagecreatefrompng($filename_y);
$im = imagecreatefromjpeg($filename_x);
$margen_dcho = 10;
$margen_inf = 10;
$sx = imagesx($estampa);
$sy = imagesy($estampa);
imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
}

$filename_x ="../fotos/AKRVBBSYXS.png";
$filename_y ="../images/sobrePlanosPeq.png";
$filename_result="../fotosMarca/ADXFGCBQZY.png";
merge( $filename_x, $filename_y, $filename_result)*/

require("config.php");
 
if ($conexion){	
	
$result = mysql_query("SELECT * FROM imagenes"); 
	while ($row = mysql_fetch_array($result)){
		$idImagen=$row["idImagen"];
		$ruta=$row["ruta"];
		$nuevaRuta="http://www.sobreplanos.co/archivos/fotos/". $row["ruta"] .".png";
		
		mysql_query("UPDATE imagenes SET ruta='$nuevaRuta' WHERE idImagen='$idImagen'");
	
}
	
}
	
	
	
	
	
	
/*	
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,1,190)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,4,190)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,8,190)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,11,190)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,2,191)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,4,191)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,6,191)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,1,192)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,2,192)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,3,192)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,4,192)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,11,193)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,12,193)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,13,195)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,14,195)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,15,195)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,6,196)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,7,196)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,8,196)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,9,196)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,19,196)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,1,197)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,5,197)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,10,197)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,3,198)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,4,198)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,5,198)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,6,198)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,7,198)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,8,198)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,4,199)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,5,199)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,7,199)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,9,199)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,11,199)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,15,200)");
$result = mysql_query("INSERT INTO facilidadesProyectos(idRelacion, idFacilidad,idProyecto) VALUES (default,14,200)");
*/
	
/*$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Campo Del Golf')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Cancha de Squash')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Cancha de Tenis')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Cancha de Voleibol')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Gimnasio')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Jacuzzi')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Oficina de Negocios')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Parqueadero Visitantes')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Piscina')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Sala de Internet')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Salon Comunal')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Salon de Juegos')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Sauna')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Turco')");
$result = mysql_query("INSERT INTO facilidades(idFacilidad, facilidad) VALUES (default,'Zona de BBQ')");*/

	/*$result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Daniel','Sierra Rincòn','danielsierra34@gmail.com','3115131750','0')");
  $result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Nombres Contacto 1','Nombres Contacto 1','emailContacto1@gmail.com','111111111111','1')");
   $result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Nombres Contacto 2','Nombres Contacto 2','emailContacto2@gmail.com','222222222222','1')");
   $result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Nombres Contacto 3','Nombres Contacto 3','emailContacto3@gmail.com','333333333333','1')");
 $result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Nombres Contacto 4','Nombres Contacto 4','emailContacto4@gmail.com','44444444444','1')");
   $result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Nombres Contacto 5','Nombres Contacto 5','emailContacto5@gmail.com','55555555555','1')");
   $result = mysql_query("INSERT INTO contactos(idFacilidad, facilidad, foto, nombres, apellidos, email, telefono, tipo)
VALUES
(default,1,'xxxxx.png','Nombres Contacto 6','Nombres Contacto 6','emailContacto6@gmail.com','66666666666','1')");
*/
	
	/*}*/
?>