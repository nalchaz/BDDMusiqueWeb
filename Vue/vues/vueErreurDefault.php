<?php

echo \ProjetLecteur\Vue\VueHtmlUtils::enTeteHTML5("Erreur", "utf-8", \ProjetLecteur\Config\Config::getStyleSheetsURL()['default']);
echo "<h1>Une erreur s'est produite</h1>" ; 
echo $e->getMessage(); 

echo \ProjetLecteur\Vue\VueHtmlUtils::finFichierHTML5(); 
