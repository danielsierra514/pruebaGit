<?php
$image = $_POST['img'];
$initialX = $_POST['initialX'];
$initialY = $_POST['initialY']; 
$lengthX = $_POST['lengthX'];
$lengthY = $_POST['lengthY'];

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

function saveImage($image,$initialX,$initialY,$lengthX,$lengthY){
	define('UPLOAD_DIR', '../fotos/');
	$uniq = RandomString(10,TRUE,TRUE,FALSE);
	$image = str_replace('data:image/png;base64,', '', $image);	
	$data = base64_decode($image);
	$file = UPLOAD_DIR . $uniq . '.png';
	$success = file_put_contents($file, $data);  
	list($width, $height) = getimagesize($file);
	$img_r = imagecreatefrompng($file);
	$dst_r = ImageCreateTrueColor( 500, 340 );
	imagecopyresampled($dst_r,$img_r,0,0,$initialX,$initialY,500,340,$lengthX,$lengthY);
	imagejpeg($dst_r,$file,100);
	//return $file;
	return "http://www.sobreplanos.co/archivos/fotos/".$uniq.".png";
};

echo saveImage($image,$initialX,$initialY,$lengthX,$lengthY);
?>