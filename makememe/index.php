<?php
	$originalImage = "sourceimg/".$_POST['imagetype'].".png";
	$text = $_POST['text'];
	$subtext  = $_POST['subtext'];
	$marker = "Top Contributor e Astri Nascenti Google Italia";
	$sizeimgw = "497";
	$sizeimgh = "497";
	$filename = "img/".$_POST['imagetype'].time()."_".rand(0,100).".png";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("im is null");
	}
	
	
	$size = 20; 
	$angle = 0;
	$y = 320;
	$y2 = 360;
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = "font/Roboto-Black.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $text);
	if($tb[2]>$sizeimgw-40){//se troppo grande suddivido in 2 righe
		$textel = wordwrap($text, 39, "<br>");
		$textel = explode("<br>",$textel);
		$tb = imagettfbbox($size, $angle, $fontfile, $textel[0]);//capto larghezza
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
	$color = imagecolorallocate($im, 230, 230, 230);
	$fontfile = "font/Roboto.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $subtext);
	$x = ceil(($sizeimgw - $tb[2]) / 2);
	imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $subtext);
	
	
	$size = 10; 
	$angle = 0;
	$x = 5; 
	$y = $sizeimgh-10;
	$color = imagecolorallocate($im, 230, 230, 230);
	$fontfile = "font/Roboto.ttf";
	imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $marker);
	
	
	$outputImage = $filename;
	imagepng($im, $outputImage, 0);
	imagedestroy($im);
	print '<a href="makememe/'.$filename.'" target="_blank"><img src="makememe/'.$filename.'" alt="" /></a>';
?>