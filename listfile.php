<?php
function elencafiles($dirname,$arrayext){
	$arrayfiles=Array();
	if(file_exists($dirname)){
		$handle = opendir($dirname);
		while (false !== ($file = readdir($handle))) { 
			if(is_file($dirname.$file)){
				$ext = strtolower(substr($file, strrpos($file, "."), strlen($file)-strrpos($file, ".")));
				if(in_array($ext,$arrayext)){
					array_push($arrayfiles,$file);
				}
			}
		}
		$handle = closedir($handle);
	}
	sort($arrayfiles);
	return $arrayfiles;
}

$array_extimg=array('.jpg','.jpeg','.gif','.png');
$arrayfile=array();
$arrayfile=elencafiles("makememe/selectedimg/",$array_extimg);

for($i=0;$i<count($arrayfile);$i++){
 echo "<a href='makememe/selectedimg/".$arrayfile[$i]."'>".$arrayfile[$i]."</a>";
}

?>