<?php
$contenido = $_POST['archivo'];

function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE){
	$source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
	if($length>0){
		$rstr = "";
		$source = str_split($source,1);
		for($i=1; $i<=$length; $i++){
			mt_srand((double)microtime() * 1000000);
			$num = mt_rand(1,count($source));
			$rstr .= $source[$num-1];
		}
	}
	return $rstr;
};

function savePDF($contenido){
	define('UPLOAD_DIR', '../pdfs/');
	$contenido = str_replace('data:application/pdf;base64,', '', $contenido);	
	$contenido = base64_decode($contenido);  
	$uniq = RandomString(10,TRUE,TRUE,FALSE);
	$file = UPLOAD_DIR . $uniq . '.pdf';
	$success = file_put_contents($file, $contenido);
  return $uniq;
};

echo savePDF($contenido);
?>