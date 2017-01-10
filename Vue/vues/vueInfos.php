
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MusicShow</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="http://localhost/ProjetLecteur/css/infos.css" rel="stylesheet"  />
    </head>
    <body>
        <div class="conteneur">
            <div id="header">
                <div id="menu"> <?php echo "<p style=\"color : white ;\">Connecté en tant que " . $_SESSION['email'] . "</p>" ?> <a href="?action=default" class='retour' >Revenir à l'accueil</a>
                    <a href= "?action=deconnexion"> Se déconnecter</a>
                </div>                <div id="header-Bottom">
                    <div id="logoBlock">
                        <h1>MusicShow</h1>

                    </div>
                </div>
            </div>
            <div id="infosCtr">
             <?php
                if (isset($verif)){ 
                    if ($verif===false) { 
                        echo "<p style=\"margin-top: 40px; color : red;font-size : 20px;\">Avis déjà ajouté</p>"; 
                    }
                }
                echo \ProjetLecteur\Vue\MusiqueView::getHTMLInfosVisitorAuth($modele->getData()); ?>
                  
                </div>
            </div>


            <footer id="footer">
                <p class="rights">Copyright : Alexandre Donné & Nahel Chazot, G5 2016</p>

            </footer>
        </div>
        <script>
            var trigger=document.getElementById("affich"); 
            var texte=document.getElementById("afficherComms"); 
            trigger.addEventListener('click',function(e) {
                if (getComputedStyle(texte).visibility === "hidden")
                    texte.style.visibility = "visible";
                else
                    texte.style.visibility = "hidden";
            })
        </script>
    </body>
</html>