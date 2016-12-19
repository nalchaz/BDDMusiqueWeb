

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MusicShow</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/ProjetLecteur/css/stylesAdmin.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="header">
      <div id="menu" > </div>
    <div id="header-Bottom">
      <div id="logoBlock">
        <h1>MusicShow</h1>
        
      </div>
      <?php echo " <p class=\"identifiant\">Connecté en tant que ".$_SESSION['email']."</p>"
            . "<p class=\"role\">Role : " .$_SESSION['role'] ."</p>" ?>
  </div>
  </div>
    <div id="centerCol">
      
      <div id="playListTop">
        <h3>MUSICS</h3>
        
        <form  method="post" action="?action=saisie" class="ajout"><input type="submit" value="AjouterMusique" name="create" /></form>
      </div>      
        <?php
        $modele= \ProjetLecteur\Modele\ModelCollectionMusique::getModelAdresseAll(); 
        echo "<table id=\"playListBody\">"; 
        echo "<thead class=\"head\">"; 
        echo "<th class=\"pouvoirAdmin\">ADMIN POWER</th>"; 
        echo  "<th class=\"left\">PLAY</th>"; 
        echo  "<th class=\"centr\">TRACK</th>"; 
        echo  "<th class=\"right\">COVER</th>";
        echo  "<th class=\"periode\">Mise en ligne</th>"; 
        echo  "<th class=\"average\">AVERAGE</th>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($modele->getData() as $musique) {
            echo "<tr>"; 
            echo "<td><a href=\"?action=delete&idMusique=" . $musique->idMusique . "\">X      </a><a class=\"modif\" href=\"?action=delete&idMusique=" . $musique->idMusique . "\">      Modifier</a></td>";
            echo  \ProjetLecteur\Vue\MusiqueView::getHTMLMusiqueDevelopped($musique); 
            echo "</tr>"; 
        }
        ?>
      </tbody> 
      </table>
        
      </div>
  
        
  
 
      <div id="footer">
          <div class="rights">Copyright © <p>Alexandre Donné Nahel Chazot</p>
  
  </div>
</div>
</body>
</html>