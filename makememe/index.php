<?php
	//header('Content-type: image/png');
	$originalImage = "google.png";
	$text = "bene, funziona anche con i testi più lunghi, limitare a 72 caretteri direi";
	$subtext = "#googleplustips";
	$marker = "www.alessiomoretto.com";
	$sizeimgw = "497";
	$filename = time().".png";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("im is null");
	}
	
	
	$size = 20; 
	$angle = 0;
	$y = 320;
	$y2 = 360;
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = "Roboto.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $text);
	if($tb[2]>$sizeimgw-40){//se troppo grande suddivido
		$textel = wordwrap($text, 39, "<br>");
		$textel = explode("<br>",$textel);
		$tb = imagettfbbox($size, $angle, $fontfile, $textel[0]);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $textel[0]);
		$tb = imagettfbbox($size, $angle, $fontfile, $textel[1]);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y2 , $color , $fontfile , $textel[1]);
	}else{
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $text);
	}
	
	$size = 20; 
	$angle = 0;
	$x = 75; 
	$y = 420;
	$color = imagecolorallocate($im, 200, 200, 200);
	$fontfile = "Roboto.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $subtext);
	$x = ceil(($sizeimgw - $tb[2]) / 2);
	imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $subtext);
	
	
	$size = 10; 
	$angle = 0;
	$x = 5; 
	$y = $sizeimgw-10;
	$color = imagecolorallocate($im, 200, 200, 200);
	$fontfile = "Roboto.ttf";
	imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $marker);
	
	
	$outputImage = $filename;
	imagepng($im, $outputImage, 0);
	imagedestroy($im);
	print '<img src="'.$filename.'" alt="" />';
?>