<?php
$files = glob('img/*'); // get all file names
	foreach($files as $file){ // iterate files
	  if(is_file($file))
		$getdate = explode("_",$file);
		if($getdate[1]<=time()-"600"){//cancello solo file vecchi di 10 minuti
			unlink($file); // delete file
		}
		
	}

if($_POST["style"]=="1"){
	$originalImage = "sourceimg/".$_POST['imagetype'].".png";
	$text = $_POST['text'];
	$subtext  = $_POST['subtext'];
	$marker = "Top Contributor e Astri Nascenti Google Italia";
	$sizeimgw = "504";
	$sizeimgh = "503";
	$filename = "img/".$_POST['imagetype']."_".time()."_".rand(0,100).".png";
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
	print '<a href="makememe/'.$filename.'" target="_blank"><img class="responsive-img" src="makememe/'.$filename.'" alt="" /></a><br><br>
	<a class="blue waves-effect waves-light btn-large" href="makememe/'.$filename.'" target="_blank"><i class="mdi-file-file-download left"></i> Download</a>';

} elseif($_POST["style"]=="2"){
	
	
	
	$originalImage = "sourceimg/googlenow2.png";
	$text = $_POST['text'];
	$marker = "Top Contributor e Astri Nascenti Google Italia";
	$sizeimgw = "900";
	$sizeimgh = "470";
	$filename = "img/".$_POST['imagetype']."_".time()."_".rand(0,100).".png";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("im is null");
	}
	
	$logoimg = imagecreatefrompng($_POST['fileurl']);//creo immagine logo da mettere sopra
	
	imagecopy($im, $logoimg, 0,0,0,0, $sizeimgw, $sizeimgh);
	
	$originalImage = imagecreatefrompng($originalImage);//creo immagine logo da mettere sopra
	imagecopy($im, $originalImage, 0,0,0,0, $sizeimgw, $sizeimgh);
	
	
	$size = 25; 
	$angle = 0;
	$y = 120;
	$y2 = 160;
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = "font/Roboto-Thin.ttf";
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
	print '<a href="makememe/'.$filename.'" target="_blank"><img class="responsive-img" src="makememe/'.$filename.'" alt="" /></a><br><br>
	<a class="blue waves-effect waves-light btn-large" href="makememe/'.$filename.'" target="_blank"><i class="mdi-file-file-download left"></i> Download</a>';
}
	
?>