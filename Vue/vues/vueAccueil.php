
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
    Lecteur - Home
</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lecteur is a complete suite of products to power internet radio stations into the future. Whether you are an existing station and want to upgrade to the SHOUTcast Streaming Service, or download the latest version of our software to run on your own servers, SHOUTcast lets you transmit your audio to listeners around the world.">
    <meta property="og:site_name" content="Lecteur">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Broadcast and Monetize Your Station with SHOUTcast">
    <meta property="og:image" content="image.jpg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:description" content="Lecteur is a complete suite of products to power internet radio stations into the future. Whether you are an existing station and want to upgrade to the SHOUTcast Streaming Service, or download the latest version of our software to run on your own servers, SHOUTcast lets you transmit your audio to listeners around the world.">
    <link rel="icon" src=".ico">
    <link rel="shortcut icon" src="http://localhost/ProjetLecteur/css/musique.ico">
    <link rel="stylesheet" href="http://localhost/ProjetLecteur/css/template_files/normalize.css">
    <link rel="stylesheet" href="http://localhost/ProjetLecteur/css/template_files/screen.css">
    <link rel="stylesheet" href="http://localhost/ProjetLecteur/css/template_files/meanmenu.css">
    <link rel="stylesheet" href="http://localhost/ProjetLecteur/css/template_files/bxslider.css">
    <script src="http://localhost/ProjetLecteur/Vucss/template_files/analytics.js.téléchargement"></script><script async="" src="http://localhost/ProjetLecteur/css/template_files/fbevents.js.téléchargement"></script><script src="../template_files/jquery-1.10.2.min.js.téléchargement"></script>
    <link href="http://localhost/ProjetLecteur/css/template_files/font-awesome.min.css" rel="stylesheet">

    <link href="http://localhost/ProjetLecteur/css/template_files/css" rel="stylesheet" type="text/css">
    <script src="http://localhost/ProjetLecteur/css/template_files/modernizr-2.8.3.min.js.téléchargement"></script>
    <link href="http://localhost/ProjetLecteur/css/template_files/style.2016.css" rel="stylesheet">
</head>
<body>
    <header>
        <a id="logo" href="vueAccueil.php" rel="internal"><img src="http://localhost/ProjetLecteur/css/template_files/logo.png" alt="Shoutcast" width="120" height="32"></a>
        
<nav id="topMenu" style="display: block;">
    <ul>
        
        <li class="">
            <a href="vueAccueil.php" rel="internal">Musique</a>
        </li>
        <li class="">
            <a href="Info.html" rel="internal">Info</a>
        </li>
    </ul>
</nav>
        <div id="header-right">
    <form  name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8" >
                <div class="form-group">
                    <div class="col-md-8"><input name="username" placeholder="Admin" class="form-control" type="text" id="UserUsername"/></div>
                </div> 

                <div class="form-group">
                    <div class="col-md-8"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="UserPassword"/></div>
                </div> 

                <div class="form-group">
                    <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Connexion"/></div>
                </div>

    </form>
        </div>


    </header>
    <main>
       <!-- <form id="search-form" onsubmit="">
            <input id="search-focus" type="search" name="query" placeholder="Rechercher une musique, artiste ou genre...">
                <button type="submit">Rechercher</button>
                <div id="dropbar">
                    <a href="rechercheAvancé.html" rel="internal">Recherche avancé</a>
                </div>
        </form> 
       -->
        <section id="hero">
            <h1>Le bon lecteur</h1>

        </section>

        <section id="music">

        


        <div id="playlist">
            <h2><label id="parent-genre">Musiques</label> <label id="genre-sep" style="display:none;">/</label> <span id="subgenre"></span></h2>
            
<table id="station-list" class="data-table" style="">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th class="stations">Titre</i></th>
            <th class="genre">Période de mise en ligne</i></th>
            <th class="type">Moyenne</i></th>
        </tr>
    </thead>
</table>
<div id="no-result" style="display:none;">
    <h2>0 resultat(s)</h2>
        <strong>Pas de resultat pour votre recherche ! Vous pouvez essayer avec la <a href="AdvancedSearch.html" rel="internal">recherche avancé</a>.</strong>

</div>
<div id="searching-result" style="display:none;">
    <h2>Recherche ...</h2>
</div>


<div id="search-failure" style="display:none;">
    <h2>Donnez au moin un critère</h2>
</div>
        </div>
    </section>

    </main>

	<footer style="margin-bottom: 0px;">
		<div class="wrapper">
			<div>
				<span><a href="TermsOfService.html" rel="internal">Terms of service</a> | <a href="LicenseAgreement.html" rel="internal">License Agreement</a></span>
				<span>© 2015 <em><a href="vueAccueil.php" rel="internal">Lecteur</a></em></span>
			</div>
			<div>&nbsp;</div>
		</div>
	</footer>

    <div id="jplayer" class="jp-jplayer" style="width: 0px; height: 0px;"><img id="jp_poster_0" style="width: 0px; height: 0px; display: none;"><audio id="jp_audio_0" preload="none" src="http://209.73.138.21/;?icy=http"></audio></div>
    <div id="player" role="application" aria-label="media player" style="">
        <div class="p-controls">
            <button id="player-play-btn" class="p-play p-stop" role="button" tabindex="0" onclick="return togglePlay();">play</button>
            <button class="p-vol" role="button" tabindex="0">Volume</button>
        </div>

        <div class="p-volume-bar ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
        <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 37%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="vueAccueil.php" style="left: 37%;"></a></div>
        <div class="p-details">
            
            <div id="nowplaying-song" class="p-title" aria-label="title">Titre de la musique</div>
        </div>
    </div>

    </div>



</body></html>