<?php
    $rootDirectory= dirname (__FILE__)."/"; 
    $urlWithoutQueryString=explode("?",$_SERVER['REQUEST_URI'])[0]; 
    $scriptWithoutExtention=explode(".php",$urlWithoutQueryString)[0]; 
    $longueurRootURI=strrpos($scriptWithoutExtention, '/'); 
    $rootURI=substr($_SERVER['REQUEST_URI'], 0, $longueurRootURI); 
    require_once($rootDirectory. '/Config/Autoload.php');
    ProjetLecteur\Config\Autoload::load_PSR_4('ProjetLecteur\\'); 
    $cont=new ProjetLecteur\Controleur\Controleur(); 
?>

