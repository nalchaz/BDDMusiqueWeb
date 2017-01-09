


<? \ProjetLecteur\Vue\VueHtmlUtils::enTeteHTML5("Erreur", "utf-8", \ProjetLecteur\Config\Config::getStyleSheetsURL()['saisie']);?> 
<a href="?action=default" class='retour' >Revenir à l'accueil</a>    
<h1>Une erreur s'est produite</h1> 

<?php

foreach ($modele->getError() as $error){ 
    echo "<h2>".$error ."<h2>" ; 
}

echo \ProjetLecteur\Vue\VueHtmlUtils::finFichierHTML5(); 
?>