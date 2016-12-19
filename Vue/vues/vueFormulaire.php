
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MusicShow</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="http://localhost/ProjetLecteur/css/styleForm.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="?action=validateAuth" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="Adresse email" required autofocus>
                <input type="password" name="motdepasse" id="motdepasse" class="form-control" placeholder="Password" required>
                
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Sign in</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->
    </body> 
</html> 


