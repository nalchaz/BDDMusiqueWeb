 <?=\ProjetLecteur\Vue\VueHtmlUtils::enTeteHTML5("MusicShow" ,"UTF−8" , \ProjetLecteur\Config\Config::getStyleSheetsURL()["default"]) ?>

 <h1><?=$modele->getTitle() ?></h1>

 <?=\ProjetLecteur\Vue\CommentaireView::getHtmlDevelopped($modele->getData())?>
 <p>
     <a href="<?=\ProjetLecteur\Config\Config::getRootURI()?>">Revenir à l'accueil </a>
 </p>

 <?= \ProjetLecteur\Vue\VueHtmlUtils::finFichierHtml5(); ?>



