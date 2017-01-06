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
                <div id="menu"> <?php echo "<p style=\"color : white ;\">Connecté en tant que " . $_SESSION['email'] . "</p>" ?> <a href="?action=default" class='retour' >Revenir à l'accueil</a></div>
                <div id="header-Bottom">
                    <div id="logoBlock">
                        <h1>MusicShow</h1>

                    </div>
                </div>
            </div>
            <div id="infosCtr">
             <?php  
                if ($verif===false) { 
                    echo "<p style=\"margin-top: 40px; color : red;font-size : 20px;\">Avis déjà ajouté</p>"; 
                }
                echo \ProjetLecteur\Vue\MusiqueView::getHtmlInfos($modele->getData()); ?>
                <div id="comment"  >
                    <p id="ajoutComment"  >Ajouter un commentaire (200 caractères maximum)</p>
                    <form action="?action=ajoutComment" method="post" id="formulaire">
                        <?= \ProjetLecteur\Vue\FormManager::addHiddenInput("idCommentaire", "idCommentaire", uniqid()); ?>
                        <?= \ProjetLecteur\Vue\FormManager::addHiddenInput("heureInsertion", "heureInsertion", null);  ?>
                        <?= \ProjetLecteur\Vue\FormManager::addHiddenInput("dateInsertion", "dateInsertion", null); ?> <!--pour que l'index 'dateInsertion' existe -->
                        <?= \ProjetLecteur\Vue\FormManager::addHiddenInput("idMusique", "idMusique", $modele->getData()->idMusique); ?>
                        <?= \ProjetLecteur\Vue\FormManager::addHiddenInput("login", "login", $_SESSION['email']); ?>
                        <?= \ProjetLecteur\Vue\FormManager::addTextArea("", "texte", "textarea", 8, 50, null); ?>
                        <button type="submit" >Ajouter</button>                    
                    </form>
                </div>
                <p id="affich">Cliquez pour afficher les commentaires</p>
                <div class="afficherComms" id="afficherComms">
                    
                    <?php 
                        foreach ($modele->getCommentaires() as $com){ 
                            echo "<div class=\"unCom\">"; 
                            echo "<a class=\"deleteCom\" href=\"?action=deleteCom&idCommentaire=".$com->idCommentaire."\">Supprimer ce commentaire</a>";
                            echo "<p class=\"logincom\">".$com->login." le ".$com->dateInsertion." à ".$com->heureInsertion." : </p>"; 
                            
                            echo "<p class=\"textcom\">".$com->texte."</p>"; 
                            echo "</div><br/>"; 
                            
                        }
                    ?>    
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

