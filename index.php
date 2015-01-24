<?php
$lang = "en_EN";
if (isset($_GET['lang'])){
	$lang = $_GET['lang'];
	if($lang == "it"){
		$lang = "it_IT";
	}
}
putenv("LC_ALL=$lang");
setlocale(LC_ALL, $lang);
bindtextdomain("messages", "locale");
bind_textdomain_codeset('messages', 'UTF-8');
textdomain("messages");
?>
<html>
    <head>
      <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width">
      <link rel="canonical" href="http://www.alessiomoretto.com/progetti/gtips/<?php
	  if (isset($_GET['lang'])){
			$lang = $_GET['lang'];
			if($lang != "en"){
				print "?lang=".$lang;
			}
		}
	  ?>"/>  
	  <title><?php print _("Gtips - Create Custom Tips for Google Products"); ?></title>
	  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35570423-14', 'auto');
  ga('send', 'pageview');

</script>
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="css/ghpages-materialize.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="css/custom.css"  media="screen,projection"/>
	  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/smooth-scroll.min.js"></script>
    </head>

<body>
<div class="navbar">
  <nav>
    <div class="nav-wrapper cyan">
      <div class="container">
	  <a href="#" class="brand-logo"><?php print _("GTips"); ?> <span style="font-size:12px;"><?php print _("Beta"); ?></span></a>
      <ul id="nav-mobile" class="right side-nav">
        <li><a data-scroll href="#home"><?php print _("Home"); ?></a></li>
        <li><a data-scroll href="#newTip"><?php print _("Tips"); ?></a></li>
        <li><a data-scroll href="#support"><?php print _("Support"); ?></a></li>
		<li <?php if (isset($_GET['lang'])){if($_GET['lang'] == "it"){print "class='active'";}	}?>><a href="?lang=it"><?php print _("IT"); ?></a></li>
		<li <?php if (isset($_GET['lang'])){if($_GET['lang'] == "en"){print "class='active'";}	}?>><a href="?lang=en"><?php print _("EN"); ?></a></li>
      </ul>
	  <a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
	  </div>
    </div>
  </nav>
</div>
<section id="home">
    <div class="container">
    <div class="content">
        <h1 class="title"><?php print _("GTips"); ?></h1>
        <h2 class="subtitle"><?php print _("Create Custom Tips for Google Products"); ?></h2>
    </div>
    <br/>
       <a href="#newTip" data-scroll class="waves-effect waves-light btn-large yellow" style="color:#333333;"><i class="mdi-hardware-keyboard-arrow-right left"></i><?php print _("Create New Tip"); ?></a>
            <br>
            <br>
               <a href="#Support" data-scroll class="cyan waves-effect waves-light btn-large"><i class="mdi-action-info-outline left"></i><?php print _("Support"); ?></a>
                <br/>                
                <br/>
                <br/>
                <br/>

<!-- Inserisci questo tag nel punto in cui vuoi che sia visualizzato l'elemento pulsante +1. -->
<div class="g-plusone" data-annotation="inline" data-width="300"></div>

<!-- Inserisci questo tag dopo l'ultimo tag di pulsante +1. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'en'};
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
    </div>
</section>
<section id="newTip">
<div class="container">
	<div class="row">
		<div class="col s12">
			<h1><?php print _("New Tip"); ?></h1>
			<p><strong><?php print _("Instructions"); ?></strong><br>
			<?php print _("Include tips (maximum 75 characters for style 1 and 3, 200 for style 2)"); ?><br>
			<?php print _("Enter the url or the hashtag (you can use"); ?> <a target="_blank" href="http://goo.gl/">goo.gl</a> <?php print _("to shorten the url)"); ?><br>
			<?php print _("Choose the service"); ?><br><br>
			</p>
		</div> 
	</div> 
</div>  
  
<div class="container">
	<div class="row">
	  <form id="makememe" class="col  m6 s12" enctype="multipart/form-data">
	  <h2><?php print _("Generate"); ?></h2>
	  
		<div class="row">
		  <div class="col s12" id="advanced2">
		    <p>
			<input type="checkbox" name="advanced" id="advanced"  />
			<label for="advanced"><?php print _("Advanced tips insert"); ?></label>
			</p>
		  </div>
        </div>
		
		<div id="advancedtips" style="display:none;">
		
			<div class="row">
			  <div class="input-field col m12 s12">
				<input name="tipsfirstrow" id="tipsfirstrow" type="text" maxlength="200" class="validate">
				<label for="tipsfirstrow"><?php print _("Tips first row"); ?></label>
			  </div>
			  <div class="col m6 s12">
				<label><?php print _("Font Size"); ?></label>
				  <select name="fontsizefirstrow"  id="fontsizefirstrow">
							<option value="1">1</option>
				        	<option value="2">2</option>
				        	<option value="3">3</option>
				        	<option value="4">4</option>
				        	<option value="5">5</option>
				        	<option value="6">6</option>
				        	<option value="7">7</option>
				        	<option value="8">8</option>
				        	<option value="9">9</option>
				        	<option value="10">10</option>
				        	<option value="11">11</option>
				        	<option value="12">12</option>
				        	<option value="13">13</option>
				        	<option value="14">14</option>
				        	<option value="15">15</option>
				        	<option value="16">16</option>
				        	<option value="17">17</option>
				        	<option value="18">18</option>
				        	<option value="19">19</option>
				        	<option selected="" value="20">20</option>
				        	<option value="21">21</option>
				        	<option value="22">22</option>
				        	<option value="23">23</option>
				        	<option value="24">24</option>
				        	<option value="25">25</option>
				        	<option value="26">26</option>
				        	<option value="27">27</option>
				        	<option value="28">28</option>
				        	<option value="29">29</option>
				        	<option value="30">30</option>
				  </select>
			  </div>
			  <div class="col m6 s12">
				<label><?php print _("Font Family"); ?></label>
				  <select name="fontsfamilyfirstrow"  id="fontsfamilyfirstrow">
					<option value="Roboto" selected="">Roboto</option>
					<option value="Roboto-Black">Roboto-Black</option>
					<option value="Roboto-Bold">Roboto-Bold</option>
					<option value="Roboto-Thin">Roboto-Thin</option>
				  </select>		
			  </div>
			</div>	


			<div class="row">
			  <div class="input-field col m12 s12">
				<input name="tipssecondrow" id="tipssecondrow" type="text" maxlength="200" class="validate">
				<label for="tipssecondrow"><?php print _("Tips second row"); ?></label>
			  </div>
			  <div class="col m6 s12">
				<label><?php print _("Font Size"); ?></label>
				  <select name="fontsizesecondrow"  id="fontsizesecondrow">
							<option value="1">1</option>
				        	<option value="2">2</option>
				        	<option value="3">3</option>
				        	<option value="4">4</option>
				        	<option value="5">5</option>
				        	<option value="6">6</option>
				        	<option value="7">7</option>
				        	<option value="8">8</option>
				        	<option value="9">9</option>
				        	<option value="10">10</option>
				        	<option value="11">11</option>
				        	<option value="12">12</option>
				        	<option value="13">13</option>
				        	<option value="14">14</option>
				        	<option value="15">15</option>
				        	<option value="16">16</option>
				        	<option value="17">17</option>
				        	<option value="18">18</option>
				        	<option value="19">19</option>
				        	<option selected="" value="20">20</option>
				        	<option value="21">21</option>
				        	<option value="22">22</option>
				        	<option value="23">23</option>
				        	<option value="24">24</option>
				        	<option value="25">25</option>
				        	<option value="26">26</option>
				        	<option value="27">27</option>
				        	<option value="28">28</option>
				        	<option value="29">29</option>
				        	<option value="30">30</option>
				  </select>
			  </div>
			  <div class="col m6 s12">
				<label><?php print _("Font Family"); ?></label>
				  <select name="fontsfamilysecondrow"  id="fontsfamilysecondrow">
					<option value="Roboto" selected="">Roboto</option>
					<option value="Roboto-Black">Roboto-Black</option>
					<option value="Roboto-Bold">Roboto-Bold</option>
					<option value="Roboto-Thin">Roboto-Thin</option>
				  </select>		
			  </div>
			</div>				

			
		</div>
	  
		<div class="row" id="tips">
		  <div class="input-field col m12 s12">
			<input name="text" id="tips" type="text" maxlength="200" class="validate">
			<label for="tips"><?php print _("Tips"); ?></label>
		  </div>
		</div>
		
		<div class="row">
		  <div class="input-field col m12 s12">
			<input name="subtext" type="text"  maxlength="30" class="validate">
			<label for="last_name"><?php print _("Tags/Short Url"); ?></label>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col s12" id="displaymarker2">
		    <p>
			<input type="checkbox" name="displaymarker" id="displaymarker"  />
			<label for="displaymarker"><?php print _("Display Copyright"); ?></label>
			</p>
		  </div>
        </div>
		
		<div class="row" id="markercnt" style="display:none">
		  <div class="input-field col s12">
			<input name="marker" id="marker" type="text" maxlength="200" class="validate">
			<label for="marker"><?php print _("Copyright text"); ?></label>
		  </div>
		</div>
		
        <div class="row eventschange">
		  <div class="col s12">
			<label><?php print _("Style"); ?></label>
			  <select name="style"  id="style">
				<option value="1"><?php print _("Small"); ?></option>
				<option value="2" ><?php print _("Large with Background"); ?></option>
                <option value="3" ><?php print _("Large"); ?></option>
			  </select>
		  </div>
		</div>
    <div id="style2">
		<div class="row">
		  <div class="col s12" id="background">
			<label><?php print _("Background"); ?></label>
			  <select name="background">
			    <option value="none"><?php print _("None"); ?></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			  </select>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col s12" id="grayscale2">
		    <p>
			<input type="checkbox" name="grayscale" id="grayscale"  />
			<label for="grayscale"><?php print _("Grayscale"); ?></label>
			</p>
		  </div>
        </div>
		
		<div class="row">
		  <div class="col s12">
		  <p class="range-field">
		    <label><?php print _("Contrast"); ?></label>
			<input name="contrast" type="range" min="-500" max="500" />
		  </p>
		  </div>
        </div>
		
		<div class="row">
		  <div class="col s12">
		  <p class="range-field">
		    <label><?php print _("Brightness"); ?></label>
			<input name="brightness" type="range" min="-150" max="150" />
		  </p>
		  </div>
        </div>
		
		
		
        <div class="row">
		  <div class="col s12">
          	<label for="last_name"><?php print _("File Url"); ?></label>
            <input name="fileurl" type="text"  class="validate">
          </div>
        </div>
    </div>
        
		<div class="row">
		  <div class="col s12">
			<label><?php print _("Select Product"); ?>:</label>
			  <select name="imagetype">
				<option value="" disabled selected><?php print _("Choose your option"); ?></option>
				<option value="googlenow">Google Now</option>
				<option value="googleplus">Google+</option>
				<option value="google">Search</option>
				<option value="android">Android</option>
				<option value="gmail">Gmail</option>
				<option value="hangouts">Hangouts</option>
				<option value="chrome">Chrome</option>
				<option value="maps">Maps</option>
				<option value="docs">Docs</option>
				<option value="webmaster">Webmaster</option>
				<option value="news">News</option>
				<option value="adsense">AdSense</option>
				<option value="playstore">Play Store</option>
				<option value="adwords">AdWords</option>
				<option value="youtube">YouTube</option>
				<option value="mybusiness">My Business</option>
				<option value="analytics">Analytics</option>
				<option value="drive">Drive</option>
			  </select>
		  </div>
		</div>
		<button class="yellow btn-floating btn-large waves-effect waves-light right" type="submit" name="action">
			<i style="color:#333333;" class="mdi-content-send"></i>
		</button>
	  </form>
	  
	  <div class="col s6">
		<h2><?php print _("Preview"); ?></h2>
		<div id="memeresult" class="center"></div>
	  </div>
	  
	  <br><br>
    </section>
    <section id="listTip">
        <div class="container">
	  <div class="col s12" id="tips" style="color:#ffffff">
          <br>
          <br>
		<h2><?php print _("List tips"); ?></h2>
		<div id="listtips"></div>
	  </div>
	  <br><br>
	  </div>
	          </section>
    
<section id="Support">
    <div class="container">
	   <div class="col s12" id="support">
           <br>
           <br>
           <br>
		<h2><?php print _("Support"); ?></h2>
		<div class="row">
		
        <!-- Cards -->
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/googleplus.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google+ <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google + <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/forum-di-discussione-google-plus"><?php print _("Forum"); ?></a><br>
			  <a href="https://plus.google.com/communities/105920358461504177624"><?php print _("Community"); ?></a><br>
			  <a href="https://plus.google.com"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
	
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/chrome.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google Chrome <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google Chrome <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/chrome-it"><?php print _("Forum"); ?></a><br>
			  <a href="https://www.google.it/chrome/browser/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/adsense.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google AdSense <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google AdSense <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/adsense-it"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.com/adsense"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/adwords.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google AdWords <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google AdWords <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://www.it.adwords-community.com/"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.it/adwords/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/analytics.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google Analytics <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google Analytics <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://www.it.adwords-community.com/t5/Misura-i-risultati/bd-p/Misura"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.it/intl/it/analytics/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/android.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Android <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Android <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://support.google.com/android/?hl=it"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.android.com/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/drive.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google Drive <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google Drive <i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://support.google.com/drive/#topic=14940"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.it/drive/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/gmail.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Gmail <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Gmail<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/gmail-it"><?php print _("Forum"); ?></a><br>
			  <a href="http://mail.google.com"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/google.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Search <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Search<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/websearch-it"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.com"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/hangouts.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Hangouts <i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Hangouts<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/hangouts-it"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.com/+/learnmore/hangouts/?hl=it"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/maps.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google Maps<i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google Maps<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/maps-it"><?php print _("Forum"); ?></a><br>
			  <a href="https://maps.google.it/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/mybusiness.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">My Business<i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">My Business<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://support.google.com/business/?hl=it#topic=4539639"><?php print _("Forum"); ?></a><br>
			  <a href="https://www.google.it/business/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/news.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google News<i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google News<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/news-it"><?php print _("Forum"); ?></a><br>
			  <a href="http://news.google.it/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/playstore.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Google Play<i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google Play<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://play.google.com/store"><?php print _("Forum"); ?></a><br>
			  <a href="https://play.google.com/store"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/webmaster.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">Webmaster<i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">Google for Webmaster<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://productforums.google.com/forum/#!forum/webmaster-it"><?php print _("Forum"); ?></a><br>
			  <a href="http://www.google.it/intl/it/webmasters/"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
		<div class="col m3">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
			  <img class="activator" src="./makememe/sourceimg/youtube.png">
			</div>
			<div class="card-content">
			  <span class="card-title activator grey-text text-darken-4">YouTube<i class="mdi-navigation-more-vert right"></i></span>
			</div>
			<div class="card-reveal col m12">
			  <span class="card-title grey-text text-darken-4">YouTube<i class="mdi-navigation-close right"></i></span>
			  <p><a href="https://www.youtube.com/yt/creators/it/support.html"><?php print _("Forum"); ?></a><br>
			  <a href="https://www.youtube.com/?hl=it&gl=IT"><?php print _("Site"); ?></a></p>
			</div>
        </div>
		</div>
           </div>
	  </div>
	  <br><br>
	</div>
</div>
    </div>
    <footer class="cyan">
		<div class="container" >
            <div class="row">
            <div class="col s12 white-text">
			<?php print _("Made with <3 in Italy"); ?>
            </div>
          </div>
		  </div>
          <div class="footer-copyright">
            <div class="container">
            <?php print _("Google and Google logo are trademarks of Google Inc. All rights reserved."); ?>
            <a class="grey-text text-lighten-4 right" target="_blank" href="http://www.alessiomoretto.com"><?php print _("Developed by:"); ?> alessiomoretto.com</a>
            </div>
          </div>
            <script>
                smoothScroll.init();
            </script>
        </footer>
    </section>


<script>
 $(document).ready(function(){

	$('select').not('.disabled').material_select();//attiva select
	$(".button-collapse").sideNav();//collapse menu mobile
	$('.collapsible').collapsible();//collapse elementi
	$('.materialboxed').materialbox();//lightbox
	
	$("#makememe").submit(function() {//invio form
    var url = "makememe/index.php";
	
	$("#memeresult").html(' <div class="progress"><div class="indeterminate"></div></div>');
	
    $.ajax({
           type: "POST",
           url: url,
           data: $("#makememe").serialize(),
           success: function(data)
           {
               $("#memeresult").html(data);//mostro risultato
           }
         });
    return false;
	});
	
	
	var url = "makememe/listfile.php";
    $.ajax({
           type: "POST",
           url: url,
           data: "",//$("#makememe").serialize(),
           success: function(data)
           {
               $("#listtips").html(data);//mostro risultato
			   $('ul.tabs').tabs();//attivo tabs
			   $('.materialboxed').materialbox();//lightbox
           }
         });
	
});
</script> 
</body>
</html>