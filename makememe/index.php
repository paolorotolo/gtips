<?php
	header('Content-type: image/png');
	$originalImage = "google.png";
	$text = "Google+ per la tua azienza proviamo\n con un testo molto ma molto lungo";
	$subtext = "#googleplustips";
	$sizeimgw = "497";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("im is null");
	}
	
	
	$size = 20; 
	$angle = 0;
	$y = 320;
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = "Arial.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $text);
	$x = ceil(($sizeimgw - $tb[2]) / 2);
	imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $text);
	
	$size = 20; 
	$angle = 0;
	$x = 75; 
	$y = 420;
	$color = imagecolorallocate($im, 200, 200, 200);
	$fontfile = "Arial.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $subtext);
	$x = ceil(($sizeimgw - $tb[2]) / 2);
	imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $subtext);
	
	
	$outputImage = "group_icon_1.png";
	imagepng($im, $outputImage, 0);
	imagedestroy($im);
?>