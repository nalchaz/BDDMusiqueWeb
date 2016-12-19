

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MusicShow</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://localhost/ProjetLecteur/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
  <div id="header">
    <div id="menu" <?php echo " <p style='margin-left:80%; font-size:12px; color: white;'  >Connecté en tant que ".$_SESSION['email']."</p>"
            . "<p style='margin-top: 2px;'>Role : " .$_SESSION['role'] ."</p>" ?> </div>
    <div id="header-Bottom">
      <div id="logoBlock">
        <h1>MusicShow</h1>
  
      </div>
      
  </div>
  </div>
  <div id="mainCont">
    <div id="centerCol">
      
      <div id="playListTop">
        <h3>MUSICS</h3>
        
        <form method ="post" action="?action=saisie"><input type="submit" value="AjouterMusique" name="create" /></form>
      </div>
      <div id="playListBody">
        <div class="head">
          <p class="left">PLAY</p>
          <p class="centr">TRACK</p>
          <p class="right">ARTIST</p>
          <p class="average">AVERAGE</p>
        </div>
        
        <div class="playListLight">
          <p class="bot">&nbsp;</p>
        </div>
      </div>
      <div id="playListBot"></div> 
    </div>
        
  
    </div>
      <div id="footer">
          <div class="rights">Copyright © <p>Alexandre Donné Nahel Chazot</p>
  
  </div>
</div>
</body>
</html>