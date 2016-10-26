<?php

$tipos = array("Apartamento", "Casa". "Vivienda Interés Social", "Oficina");
$estados = array("Sin Iniciar", "En Construcción". "Finalizado");


function generarInvitacionAgente($idEmpresa,$idAgente){
	$result = mysql_query("SELECT * FROM empresas where idEmpresa ='$idEmpresa'");	
	$row = mysql_fetch_array($result);
	$logo=$row['logo'];
	$nombreEmpresa=$row['nombreEmpresa'];
	
	$result = mysql_query("SELECT * FROM agentes where idAgente ='$idAgente'");	
	$row = mysql_fetch_array($result);
	$nombreCompleto=$row['nombres']." ".$row['apellidos'];
		
	$mensaje=file_get_contents('mails/compilados/bienvenidoAgente.php');	
	$mensaje = str_replace('%logo%', $logo, $mensaje);
	$mensaje = str_replace('%idAgente%', md5($idAgente), $mensaje);
	$mensaje = str_replace('%nombreEmpresa%', $nombreEmpresa, $mensaje);
	$mensaje = str_replace('%nombreCompleto%', $nombreCompleto, $mensaje);
	return $mensaje;
}

function generarInvitacion($idEmpresa){
	$result = mysql_query("SELECT * FROM empresas where idEmpresa ='$idEmpresa'");	
	$row = mysql_fetch_array($result);
	$logo=$row['logo'];	
	$mensaje=file_get_contents('mails/compilados/bienvenida.php');	
	$mensaje = str_replace('%logo%', $logo, $mensaje);
	$mensaje = str_replace('%idEmpresa%', $idEmpresa, $mensaje);
	return $mensaje;
}

function cambiarContraseña($idEmpresa){
	$mensaje=file_get_contents('mails/compilados/cambiarContrasena.php');	
	$mensaje = str_replace('%idEmpresa%', $idEmpresa, $mensaje);
	return $mensaje;	
}

function notificarPublicacion($idProyecto,$idEmpresa){
	
	$tipos = array("Apartamento", "Casa", "Vivienda Interés Social", "Oficina");
	$estados = array("Sin Iniciar", "En Construcción", "Finalizado");
	
	$result = mysql_query("SELECT * FROM empresas where idEmpresa ='$idEmpresa'");	
	$row = mysql_fetch_array($result);
	$logo=$row['logo'];
	
	$result = mysql_query("SELECT * FROM proyectos where idProyecto ='$idProyecto'");	
	$row = mysql_fetch_array($result);	
	$nombre=$row['nombre'];
	$descripcion=$row['descripcion'];
	$latitud=$row['latitud'];
	$longitud=$row['longitud'];
	$pais=$row['pais'];
	$departamento=$row['departamento'];
	$ciudad=$row['ciudad'];
	$barrio=$row['barrio'];
	$precioDesde=$row['preciosDesde'];
	$areaDesde=$row['areasDesde'];
	$estrato=$row['estrato'];
	$tipo=$tipos[$row['tipoProyecto']];
	$estado=$estados[$row['estadoProyecto']];
	
	$resultx = mysql_query("SELECT * FROM imagenes WHERE idProyecto='$idProyecto'");
		$imagenes = "";
		while ($rowx = mysql_fetch_array($resultx)){
			$imagen="<div class='thumbnail'><img src='http://www.sobreplanos.co/archivos/fotos/".$rowx["ruta"].".png'></div>";
			$imagenes=$imagenes.$imagen;			
		}
	
	$resultx = mysql_query("SELECT * FROM modalidades WHERE idProyecto='$idProyecto'");		
		$modalidades = "";
		while ($rowx = mysql_fetch_array($resultx)){
			if($rowx["rutaPDF"]==""){
			$modalidad ="<tr><td>".$rowx["area"]."</td><td>".$rowx["banos"]."</td><td>".$rowx["habitaciones"]."</td><td>".$rowx["parqueaderos"]."</td><td>".$rowx["precio"]."</td><td></tr>";	
			}else{
			$modalidad ="<tr><td>".$rowx["area"]."</td><td>".$rowx["banos"]."</td><td>".$rowx["habitaciones"]."</td><td>".$rowx["parqueaderos"]."</td><td>".$rowx["precio"]."</td><td><a href='http://www.sobreplanos.co/archivos/pdfs/".$rowx["rutaPDF"].".pdf'>PDF</a></td></tr>";	
			}
			$modalidades=$modalidades.$modalidad;
		}	
	
	$mensaje=file_get_contents('mails/compilados/proyectoPublicado.php');	
	$mensaje = str_replace('%logo%', $logo, $mensaje);
	$mensaje = str_replace('%nombre%', $nombre, $mensaje);
	$mensaje = str_replace('%descripcion%', $descripcion, $mensaje);
	$mensaje = str_replace('%latitud%', $latitud, $mensaje);
	$mensaje = str_replace('%longitud%', $longitud, $mensaje);
	$mensaje = str_replace('%pais%', $pais, $mensaje);
	$mensaje = str_replace('%departamento%', $departamento, $mensaje);
	$mensaje = str_replace('%ciudad%', $ciudad, $mensaje);
	$mensaje = str_replace('%barrio%', $barrio, $mensaje);
	$mensaje = str_replace('%precioDesde%', $precioDesde, $mensaje);
	$mensaje = str_replace('%areaDesde%', $areaDesde, $mensaje);
	$mensaje = str_replace('%estrato%', $estrato, $mensaje);
	$mensaje = str_replace('%tipoProyecto%', $tipo, $mensaje);
	$mensaje = str_replace('%estadoProyecto%', $estado, $mensaje);	
	$mensaje = str_replace('%imagenes%', $imagenes, $mensaje);
	$mensaje = str_replace('%modalidades%', $modalidades, $mensaje);
	$mensaje = str_replace('%idProyecto%', $idProyecto, $mensaje);
	return $mensaje;
	
}


function notificarPersona($idProyecto, $nombreCompleto){
	
	$tipos = array("Apartamento", "Casa", "Vivienda Interés Social", "Oficina");
	$estados = array("Sin Iniciar", "En Construcción", "Finalizado");
	
	$result = mysql_query("SELECT * FROM proyectos where idProyecto ='$idProyecto'");	
	$row = mysql_fetch_array($result);	
	$nombre=$row['nombre'];
	$descripcion=$row['descripcion'];
	$latitud=$row['latitud'];
	$longitud=$row['longitud'];
	$pais=$row['pais'];
	$departamento=$row['departamento'];
	$ciudad=$row['ciudad'];
	$barrio=$row['barrio'];
	$precioDesde=$row['preciosDesde'];
	$areaDesde=$row['areasDesde'];
	$estrato=$row['estrato'];
	$tipo=$tipos[$row['tipoProyecto']];
	$estado=$estados[$row['estadoProyecto']];
	$idEmpresa=$row["idEmpresa"];
	
	$resultx = mysql_query("SELECT * FROM imagenes WHERE idProyecto='$idProyecto'");
		$imagenes = "";
		while ($rowx = mysql_fetch_array($resultx)){
			$imagen="<div class='thumbnail'><img src='http://www.sobreplanos.co/archivos/fotos/".$rowx["ruta"].".png'></div>";
			$imagenes=$imagenes.$imagen;			
		}
	
	$resultx = mysql_query("SELECT * FROM modalidades WHERE idProyecto='$idProyecto'");		
		$modalidades = "";
		while ($rowx = mysql_fetch_array($resultx)){
			if($rowx["rutaPDF"]==""){
			$modalidad ="<tr><td>".$rowx["area"]."</td><td>".$rowx["banos"]."</td><td>".$rowx["habitaciones"]."</td><td>".$rowx["parqueaderos"]."</td><td>".$rowx["precio"]."</td><td></tr>";	
			}else{
			$modalidad ="<tr><td>".$rowx["area"]."</td><td>".$rowx["banos"]."</td><td>".$rowx["habitaciones"]."</td><td>".$rowx["parqueaderos"]."</td><td>".$rowx["precio"]."</td><td><a href='http://www.sobreplanos.co/archivos/pdfs/".$rowx["rutaPDF"].".pdf'>PDF</a></td></tr>";	
			}
			$modalidades=$modalidades.$modalidad;
		}
	
	$result = mysql_query("SELECT * FROM empresas where idEmpresa ='$idEmpresa'");	
	$row = mysql_fetch_array($result);
	$logo=$row['logo'];
	
	$mensaje=file_get_contents('mails/compilados/contactoPersona.php');
	$mensaje = str_replace('%nombrePersona%', $nombreCompleto, $mensaje);
	$mensaje = str_replace('%logo%', $logo, $mensaje);
	$mensaje = str_replace('%nombre%', $nombre, $mensaje);
	$mensaje = str_replace('%descripcion%', $descripcion, $mensaje);
	$mensaje = str_replace('%latitud%', $latitud, $mensaje);
	$mensaje = str_replace('%longitud%', $longitud, $mensaje);
	$mensaje = str_replace('%pais%', $pais, $mensaje);
	$mensaje = str_replace('%departamento%', $departamento, $mensaje);
	$mensaje = str_replace('%ciudad%', $ciudad, $mensaje);
	$mensaje = str_replace('%barrio%', $barrio, $mensaje);
	$mensaje = str_replace('%precioDesde%', $precioDesde, $mensaje);
	$mensaje = str_replace('%areaDesde%', $areaDesde, $mensaje);
	$mensaje = str_replace('%estrato%', $estrato, $mensaje);
	$mensaje = str_replace('%tipoProyecto%', $tipo, $mensaje);
	$mensaje = str_replace('%estadoProyecto%', $estado, $mensaje);	
	$mensaje = str_replace('%imagenes%', $imagenes, $mensaje);
	$mensaje = str_replace('%modalidades%', $modalidades, $mensaje);
	$mensaje = str_replace('%idProyecto%', $idProyecto, $mensaje);
	return $mensaje;
	
	
}

function notificarAgente($idProyecto, $idContacto){
	
	$tipos = array("Apartamento", "Casa", "Vivienda Interés Social", "Oficina");
	$estados = array("Sin Iniciar", "En Construcción", "Finalizado");
	
	$resultx = mysql_query("SELECT * FROM contactos WHERE idContacto='$idContacto'");
	$rowx = mysql_fetch_array($resultx);
	$nombreContacto=$rowx["nombreContacto"];
	$emailContacto=$rowx["emailContacto"];
	$telefonoContacto=$rowx["telefonoContacto"];
	
	
	
	$result = mysql_query("SELECT * FROM proyectos where idProyecto ='$idProyecto'");	
	$row = mysql_fetch_array($result);	
	$nombre=$row['nombre'];
	$descripcion=$row['descripcion'];
	$latitud=$row['latitud'];
	$longitud=$row['longitud'];
	$pais=$row['pais'];
	$departamento=$row['departamento'];
	$ciudad=$row['ciudad'];
	$barrio=$row['barrio'];
	$precioDesde=$row['preciosDesde'];
	$areaDesde=$row['areasDesde'];
	$estrato=$row['estrato'];
	$tipo=$tipos[$row['tipoProyecto']];
	$estado=$estados[$row['estadoProyecto']];
	$idEmpresa=$row["idEmpresa"];
	
	$resultx = mysql_query("SELECT * FROM imagenes WHERE idProyecto='$idProyecto'");
		$imagenes = "";
		while ($rowx = mysql_fetch_array($resultx)){
			$imagen="<div class='thumbnail'><img src='http://www.sobreplanos.co/archivos/fotos/".$rowx["ruta"].".png'></div>";
			$imagenes=$imagenes.$imagen;			
		}
	
	$resultx = mysql_query("SELECT * FROM modalidades WHERE idProyecto='$idProyecto'");		
		$modalidades = "";
		while ($rowx = mysql_fetch_array($resultx)){
			if($rowx["rutaPDF"]==""){
			$modalidad ="<tr><td>".$rowx["area"]."</td><td>".$rowx["banos"]."</td><td>".$rowx["habitaciones"]."</td><td>".$rowx["parqueaderos"]."</td><td>".$rowx["precio"]."</td><td></tr>";	
			}else{
			$modalidad ="<tr><td>".$rowx["area"]."</td><td>".$rowx["banos"]."</td><td>".$rowx["habitaciones"]."</td><td>".$rowx["parqueaderos"]."</td><td>".$rowx["precio"]."</td><td><a href='http://www.sobreplanos.co/archivos/pdfs/".$rowx["rutaPDF"].".pdf'>PDF</a></td></tr>";	
			}
			$modalidades=$modalidades.$modalidad;
		}
	
	$result = mysql_query("SELECT * FROM empresas where idEmpresa ='$idEmpresa'");	
	$row = mysql_fetch_array($result);
	$logo=$row['logo'];
	
	$mensaje=file_get_contents('mails/compilados/contactoAgente.php');
	$mensaje = str_replace('%nombreContacto%', $nombreContacto, $mensaje);
	$mensaje = str_replace('%emailContacto%', $emailContacto, $mensaje);
	$mensaje = str_replace('%telefonoContacto%', $telefonoContacto, $mensaje);	
	$mensaje = str_replace('%logo%', $logo, $mensaje);
	$mensaje = str_replace('%nombre%', $nombre, $mensaje);
	$mensaje = str_replace('%descripcion%', $descripcion, $mensaje);
	$mensaje = str_replace('%latitud%', $latitud, $mensaje);
	$mensaje = str_replace('%longitud%', $longitud, $mensaje);
	$mensaje = str_replace('%pais%', $pais, $mensaje);
	$mensaje = str_replace('%departamento%', $departamento, $mensaje);
	$mensaje = str_replace('%ciudad%', $ciudad, $mensaje);
	$mensaje = str_replace('%barrio%', $barrio, $mensaje);
	$mensaje = str_replace('%precioDesde%', $precioDesde, $mensaje);
	$mensaje = str_replace('%areaDesde%', $areaDesde, $mensaje);
	$mensaje = str_replace('%estrato%', $estrato, $mensaje);
	$mensaje = str_replace('%tipoProyecto%', $tipo, $mensaje);
	$mensaje = str_replace('%estadoProyecto%', $estado, $mensaje);	
	$mensaje = str_replace('%imagenes%', $imagenes, $mensaje);
	$mensaje = str_replace('%modalidades%', $modalidades, $mensaje);
	$mensaje = str_replace('%idProyecto%', $idProyecto, $mensaje);
	return $mensaje;
	
	
}

function enviarCorreo($destino,$asunto,$contenido){

	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->Host       = "mail.sobreplanos.co";
	$mail->SMTPAuth   = true;    
	$mail->FromName   = "www.sobrePlanos.co";
	$mail->From   = "info@sobreplanos.co";  
	$mail->Host  = "mail.sobreplanos.co";
	$mail->Username   = "info@sobreplanos.co";
	$mail->Sender   = "info@sobreplanos.co";
	$mail->Password   = "Benedicto16";   
	$mail->Subject    = $asunto;
	$mail->AltBody    = "Para ver el mensaje, utilice un visor de HTML de correo electrónico compatible!!!";
	$mail->MsgHTML($contenido);
	$mail->AddAddress($destino);  
	$mail->CharSet = 'UTF-8';    
	$mail->Send();
	
}

function enviarCorreoX($destino,$copias,$asunto,$contenido){

	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->Host       = "mail.sobreplanos.co";
	$mail->SMTPAuth   = true;    
	$mail->FromName   = "www.sobrePlanos.co";
	$mail->From   = "info@sobreplanos.co";  
	$mail->Host  = "mail.sobreplanos.co";
	$mail->Username   = "info@sobreplanos.co";
	$mail->Sender   = "info@sobreplanos.co";
	$mail->Password   = "Benedicto16";   
	$mail->Subject    = $asunto;
	$mail->AltBody    = "Para ver el mensaje, utilice un visor de HTML de correo electrónico compatible!!!";
	$mail->MsgHTML($contenido);
	$mail->AddAddress($destino);  
	foreach($copias as $x){
   $mail->AddCC($x);
	}
	$mail->CharSet = 'UTF-8';    
	$mail->Send();
	
}

?>