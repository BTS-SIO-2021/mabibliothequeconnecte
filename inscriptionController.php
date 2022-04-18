<?php

require __DIR__.'/inc/db.php';

var_dump($_POST);
//die;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check'])) {

    if ($_POST['username'] !=="" && ($_POST['password']) !=="") 
    {

         if ($_POST['password'] === $_POST['password-check']) {

            $dbConnexion = new DB; 
            $pdo = $dbConnexion->getPdo();

            $newUserName = $_POST['username'];
            $newUserPass = $_POST['password'];
            $newUserPassSecured = password_hash($newUserPass, PASSWORD_DEFAULT);

            $pdoConnexionSecured = $pdo->prepare('INSERT INTO utilisateurs (username, password) VALUES(:username, :password)');
            $pdoConnexionSecured->bindValue(':username', $newUserName);
            $pdoConnexionSecured->bindValue(':password', $newUserPassSecured);
            $result = $pdoConnexionSecured->execute();

            var_dump($result);
            if ($result != 0){
                header('Location: connexion.php');
            } else {
                header('Location: inscription.php?erreur=3');
                // une erreur est survenue, nous n'avons pas pu vous enregistrer, merci de recommencer.
            }

         } else {
             header('Location: inscription.php?erreur=2');
             // Les mots de passe ne sont pas identiques
         }

    } else {
        header('Location: inscription.php?erreur=1');
        // erreur1 = Nom d'utilisateur ou mot de passe vide
    }

} else {
    header('Location: inscription.php');
}
?>