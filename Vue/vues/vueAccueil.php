
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MusicShow</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/ProjetLecteur/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="conteneur">
  <div id="header">
      <div id="menu"><a href="?action=register">S'enregistrer</a> <a href= "?action=auth"> Se connecter</a> </div>
    <div id="header-Bottom">
      <div id="logoBlock">
        <h1>MusicShow</h1>
        
      </div>

  </div>
  </div>
    <div id="centerCol">
      
      <div id="playListTop">
        <h3>MUSICS</h3>
        
      </div>      
    <?php
        $nbmusiques=0; 
        $class; 
        $modele= \ProjetLecteur\Modele\ModelCollectionMusique::getModelAdresseAll(); 
        echo "<table id=\"playListBody\">"; 
        echo "<thead class=\"head\">"; 
        echo  "<th class=\"left\">PLAY</th>"; 
        echo  "<th class=\"centr\">TRACK</th>"; 
        echo  "<th class=\"right\">COVER</th>";
        echo  "<th class=\"periode\">Mise en ligne</th>"; 
        echo  "<th class=\"average\">AVIS POSITIFS</th>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($modele->getData() as $musique) {
            $nbmusiques++; 
            if ($nbmusiques%2==0){ 
                $class="playListDark"; 
            }
            else { 
                $class="playListLight"; 
            }
            echo "<tr class=".$class.">"; 
            
            echo  \ProjetLecteur\Vue\MusiqueView::getHTMLMusiqueRow($musique); 
            echo "</tr>"; 
            
        }
        echo "</tbody>";
        echo "</table>";
        ?>
        
      </div>
  
         <footer id="footer">
            <p class="rights">Copyright : Alexandre Donné & Nahel Chazot, G5 2016</p>
            
        </footer>
  
</div>
      

</body>
</html>