<?php
$files = glob('img/*'); // get all file names
	foreach($files as $file){ // iterate files
	  if(is_file($file))
		$getdate = explode("_",$file);
		if($getdate[1]<=time()-"600"){//cancello solo file vecchi di 10 minuti
			unlink($file); // delete file
		}
		
	}

$text = $_POST['text'];
$subtext  = $_POST['subtext'];
if(@$_POST['displaymarker']=="on"){
	$marker = $_POST['marker'];
}else{
	$marker = "";
}
	
if($_POST["style"]=="1"){
	$originalImage = "sourceimg/".$_POST['imagetype'].".png";	
	$sizeimgw = "504";
	$sizeimgh = "503";
	$filename = "img/".$_POST['imagetype']."_".time()."_".rand(0,100).".png";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("Please select Product");
	}
	
	
	$size = 20; 
	$fontfile = "font/Roboto-Black.ttf";
	$angle = 0;
	$y = 300;
	$y2 = 380;
	$color = imagecolorallocate($im, 255, 255, 255);
	
	if(@$_POST['advanced']=="on"){
		$size = $_POST['fontsizefirstrow']; 
		$fontfile = "font/".$_POST['fontsfamilyfirstrow'].".ttf";
		$text = $_POST['tipsfirstrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $text);
		
		$size = $_POST['fontsizesecondrow']; 
		$fontfile = "font/".$_POST['fontsfamilysecondrow'].".ttf";
		$text = $_POST['tipssecondrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y2 , $color , $fontfile , $text);
	}else{	
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
	
	
	
	$originalImage = "sourceimg/".$_POST['imagetype']."2.png";
	$sizeimgw = "1000";
	$sizeimgh = "500";
	$filename = "img/".$_POST['imagetype']."_".time()."_".rand(0,100).".png";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("Please select Product");
	}
	
	if ($_POST['fileurl']!=""){
		$logoimg = imagecreatefrompng($_POST['fileurl']);//creo immagine logo da mettere sopra
		if (@$_POST['grayscale']=="on"){
			imagefilter($logoimg, IMG_FILTER_GRAYSCALE);
		}
		if ($_POST['brightness']!=""){
			imagefilter($logoimg, IMG_FILTER_BRIGHTNESS, $_POST['brightness']);
		}
		if ($_POST['contrast']!=""){
			imagefilter($logoimg, IMG_FILTER_CONTRAST, $_POST['contrast']);
		}
		imagecopy($im, $logoimg, 0,0,0,0, $sizeimgw, $sizeimgh);
	}elseif($_POST['background']!="none"){
		$logoimg = imagecreatefromjpeg("background/bg".$_POST['background'].".jpg");//creo immagine logo da mettere sopra
		if (@$_POST['grayscale']=="on"){
			imagefilter($logoimg, IMG_FILTER_GRAYSCALE);
		}
		if ($_POST['brightness']!=""){
			imagefilter($logoimg, IMG_FILTER_BRIGHTNESS, $_POST['brightness']);
		}
		if ($_POST['contrast']!=""){
			imagefilter($logoimg, IMG_FILTER_CONTRAST, $_POST['contrast']);
		}
		imagecopy($im, $logoimg, 0,0,0,0, $sizeimgw, $sizeimgh);
	}
	
	
	$originalImage = imagecreatefrompng($originalImage);//creo immagine logo da mettere sopra
	imagecopy($im, $originalImage, 0,0,0,0, $sizeimgw, $sizeimgh);
	
	
	$size = 25; 
	$angle = 0;
	$y = 280;
	$y2 = 320;
	$y3 = 360;
	$y4 = 400;
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = "font/Roboto-Black.ttf";
	
	if(@$_POST['advanced']=="on"){
		$size = $_POST['fontsizefirstrow']; 
		$fontfile = "font/".$_POST['fontsfamilyfirstrow'].".ttf";
		$text = $_POST['tipsfirstrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $text);
		
		$size = $_POST['fontsizesecondrow']; 
		$fontfile = "font/".$_POST['fontsfamilysecondrow'].".ttf";
		$text = $_POST['tipssecondrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y2 , $color , $fontfile , $text);
		
		$size = $_POST['fontsizethirdrow']; 
		$fontfile = "font/".$_POST['fontsfamilythirdrow'].".ttf";
		$text = $_POST['tipsthirdrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y3 , $color , $fontfile , $text);
		
		$size = $_POST['fontsizefourthrow']; 
		$fontfile = "font/".$_POST['fontsfamilyfourthrow'].".ttf";
		$text = $_POST['tipsfourthrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y4 , $color , $fontfile , $text);
	}else{
	
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		if($tb[2]>$sizeimgw-40){//se troppo grande suddivido in 2 righe
			$textel = wordwrap($text, 50, "<br>");
			$textel = explode("<br>",$textel);
			
			$tb = imagettfbbox($size, $angle, $fontfile, $textel[0]);//capto larghezza
			$x = ceil(($sizeimgw - $tb[2]) / 2);
			imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $textel[0]);
			
			$tb = imagettfbbox($size, $angle, $fontfile, $textel[1]);
			$x = ceil(($sizeimgw - $tb[2]) / 2);
			imagettftext($im,  $size , $angle , $x , $y2 , $color , $fontfile , $textel[1]);
			
			$tb = imagettfbbox($size, $angle, $fontfile, @$textel[2]);
			$x = ceil(($sizeimgw - $tb[2]) / 2);
			imagettftext($im,  $size , $angle , $x , $y3 , $color , $fontfile , @$textel[2]);
			
			$tb = imagettfbbox($size, $angle, $fontfile, @$textel[3]);
			$x = ceil(($sizeimgw - $tb[2]) / 2);
			imagettftext($im,  $size , $angle , $x , $y4 , $color , $fontfile , @$textel[3]);
		}else{
			$tb = imagettfbbox($size, $angle, $fontfile, $text);
			$x = ceil(($sizeimgw - $tb[2]) / 2);
			imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $text);
		}
	}
	
	$size = 20; 
	$angle = 0;
	$x = 75; 
	$y = 450;
	$color = imagecolorallocate($im, 230, 230, 230);
	$fontfile = "font/Roboto-Black.ttf";
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
    
} elseif ($_POST["style"]=="3"){
	$originalImage = "sourceimg/".$_POST['imagetype']."3.png";	
	$sizeimgw = "1000";
	$sizeimgh = "500";
	$filename = "img/".$_POST['imagetype']."_".time()."_".rand(0,100)."3.png";
	$im = imagecreatefrompng($originalImage);
	if(!$im) {
		die("Please select Product");
	}
	
	
	$size = 20; 
	$angle = 0;
	$y = 300;
	$y2 = 360;
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = "font/Roboto-Black.ttf";
	$tb = imagettfbbox($size, $angle, $fontfile, $text);
	
	if(@$_POST['advanced']=="on"){
		$size = $_POST['fontsizefirstrow']; 
		$fontfile = "font/".$_POST['fontsfamilyfirstrow'].".ttf";
		$text = $_POST['tipsfirstrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y , $color , $fontfile , $text);
		
		$size = $_POST['fontsizesecondrow']; 
		$fontfile = "font/".$_POST['fontsfamilysecondrow'].".ttf";
		$text = $_POST['tipssecondrow'];
		$tb = imagettfbbox($size, $angle, $fontfile, $text);
		$x = ceil(($sizeimgw - $tb[2]) / 2);
		imagettftext($im,  $size , $angle , $x , $y2 , $color , $fontfile , $text);
	}else{	
	
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
	}
	
	$size = 20; 
	$angle = 0;
	$x = 75; 
	$y = 450;
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

}
	
?>