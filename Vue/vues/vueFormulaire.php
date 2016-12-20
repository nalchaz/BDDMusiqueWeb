
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?=\ProjetLecteur\Vue\VueHtmlUtils::enTeteHTML5 ( "MusicShow" ,"UTF−8" , \ProjetLecteur\Config\Config::getStyleSheetsURL()["formLogin"]) ?>
    <body>
        <div style="margin-left: 70%" ><a style="color : black;"  href='<?=\ProjetLecteur\Config\Config::getRootURI()?>'>Retour à l'accueil</a></div>
        <div class="container">
        <div class="card card-container">
 
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="?action=validateAuth" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input style="height : 40px;"  type="email" id="email" name="email" class="form-control" placeholder="Adresse email" required autofocus>
                <input style="height : 40px;" type="password" name="motdepasse" id="motdepasse" class="form-control" placeholder="Password" required>
                
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Sign in</button>
            </form>
            
        </div>
    </div>
        <footer>
            <p class="rights">Copyright : Alexandre Donné & Nahel Chazot, G5 2016</p>
            
        </footer>
        
    </body> 
</html> 


