<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <title>Inscription</title>
  </head>
    <body>
        <div id="container">
        
            <form action="inscriptionController.php" method="POST">
                <h1>Inscription</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label>Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <label>Vérifier mot de passe</label>
                <input type="password" placeholder="Entrer à nouveau le mot de passe" name="password-check" required>

                <input type="submit" id='submit' value='INSCRIPTION' >
                <?php 
                if (isset($_GET['erreur'])) 
                {
                  $erreur = $_GET['erreur'];
                  switch ($erreur) 
                  {
                    case 1 : 
                      echo "<p style='color: red'>  Nom d'utilisateur ou mot de passe vide </p>";
                    break;
                    case 2 : 
                      echo "<p style='color: red'> les mots de passe ne sont pas identiques</p>";
                    break ; 
                    case 3 : 
                      echo "<p style='color: red'> une erreur est survenue, nous n'avons pas pu vous enregistrer, merci de recommencer.</p>";
                    break ; 
                  }
                }
                ?>

            </form>
        </div>
    </body>
</html>