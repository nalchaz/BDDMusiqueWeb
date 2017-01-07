<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?=\ProjetLecteur\Vue\VueHtmlUtils::enTeteHTML5 ( "MusicShow" ,"UTF−8" , \ProjetLecteur\Config\Config::getStyleSheetsURL()["formLogin"]) ?>
    <body>
        <div style="margin-left: 70%" ><a style="color : black;"  href='<?=\ProjetLecteur\Config\Config::getRootURI()?>'>Retour à l'accueil</a></div>
        <div class="container">
            <h1>Se créer un compte</h1>
            <p>Permet de donner son avis, d'écrire des commentaires et d'accéder aux pages d'infos des titres en cliquant dessus</p>
        <div class="card card-container">
 
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="?action=validateRegister" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <?=\ProjetLecteur\Vue\FormManager::addHiddenInput("role", "role", "visitor"); ?>
                <?php 
                    if (isset($dataError['login'])){ 
                        echo "<p style=\"color : red;\">".$dataError['login']."</p>"; 
                    }

                    if (isset($dataError['loginExist'])){ 
                        echo "<p style=\"color : red;\">".$dataError['loginExist']."</p>"; 
                    }
                ?>
                <input style="height : 40px;"  type="email" id="email" name="email" class="form-control" placeholder="Adresse email" required autofocus>
                 <?php 
                    if (isset($dataError['mdp'])){ 
                        echo "<p style=\"color : red;\">".$dataError['mdp']."</p>"; 
                    }
                ?>
                
                <input style="height : 40px;" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <?php 
                    if (isset($dataError['confirm'])){ 
                        echo "<p style=\"color : red;\">".$dataError['confirm']."</p>"; 
                    }
                ?>
                <input style="height : 40px;" type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" placeholder="Confirm Password" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Register</button>
            </form>
            
        </div>
    </div>
        <footer>
            <p class="rights">Copyright : Alexandre Donné & Nahel Chazot, G5 2016</p>
            
        </footer>
        
    </body> 
</html> 
