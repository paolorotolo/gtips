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
$arrayfile=elencafiles("selectedimg/",$array_extimg);

print '<ul class="tabs">
        <li class="tab col s3"><a href="#adsense">Adsense</a></li>
        <li class="tab col s3"><a href="#adwords">Adwords</a></li>
        <li class="tab col s3"><a href="#analytics">Analytics</a></li>
		<li class="tab col s3"><a href="#android">Android</a></li>
		<li class="tab col s3"><a href="#chrome">Chrome</a></li>
		<li class="tab col s3"><a href="#drive">Drive</a></li>
		<li class="tab col s3"><a href="#gmail">Gmail</a></li>
		<li class="tab col s3"><a href="#google">Search</a></li>
		<li class="tab col s3"><a class="active" href="#googleplus">Google+</a></li>
		<li class="tab col s3"><a href="#hangouts">Hangouts</a></li>
		<li class="tab col s3"><a href="#maps">Maps</a></li>
		<li class="tab col s3"><a href="#mybusiness">My Business</a></li>
		<li class="tab col s3"><a href="#news">News</a></li>
		<li class="tab col s3"><a href="#playstore">Play Store</a></li>
		<li class="tab col s3"><a href="#webmaster">Webmaster</a></li>
		<li class="tab col s3"><a href="#youtube">You Tube</a></li>	
      </ul>';
$listaserv = array("adsense","adwords","analytics","android","chrome","drive","gmail","google","googleplus","hangouts","maps","mybusiness","news","playstore","webmaster","youtube");

for($z=0;$z<count($listaserv);$z++){
	print "<div id='".$listaserv[$z]."'>";	  
	for($i=0;$i<count($arrayfile);$i++){
		$nomefile = explode("_",$arrayfile[$i]);
		if($nomefile[0]==$listaserv[$z]){
			print "<div class='col s3 center'>
			<img class='responsive-img materialboxed' src='makememe/selectedimg/".$arrayfile[$i]."' />
			<div><br>
			<a class='indigo waves-effect waves-light btn-large' href='makememe/selectedimg/".$arrayfile[$i]."' target='_blank'><i class='mdi-file-file-download left'></i> Download</a><br><br>
			</div>
			</div>";
		}
	}
	print "</div>";
}
?>