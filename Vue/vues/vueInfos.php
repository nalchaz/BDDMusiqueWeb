
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MusicShow</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="http://localhost/ProjetLecteur/css/infos.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="conteneur">
            <div id="header">
                <div id="menu"> <?php echo "<p style=\"color : white ;\">Connecté en tant que " . $_SESSION['email'] . "</p>" ?> <a href="?action=default" class='retour' >Revenir à l'accueil</a></div>
                <div id="header-Bottom">
                    <div id="logoBlock">
                        <h1>MusicShow</h1>

                    </div>
                </div>
            </div>
            <div id="infosCtr">
            <?php 
            echo \ProjetLecteur\Vue\MusiqueView::getHtmlInfos($modele->getData()); ?>

            </div>
            
            <footer id="footer">
                <p class="rights">Copyright : Alexandre Donné & Nahel Chazot, G5 2016</p>

            </footer>
        </div>
    </body>
</html>