<?php

require __DIR__.'/inc/db.php';

session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $dbConnexion = new DB; 
    $pdo = $dbConnexion->getPdo();
    
    if($_POST['username'] !== "" && $_POST['password'] !== "")
    {
        $pdoConnexioSecured = $pdo->prepare("SELECT * FROM utilisateurs WHERE `username` = 
        :username");
        $pdoConnexioSecured->bindValue(':username',$_POST['username']);
        $pdoConnexioSecured->execute();
        $result = $pdoConnexioSecured->fetch(PDO::FETCH_ASSOC);
        $passwordTest = password_verify($_POST['password'], $result['password']);

        var_dump($result);
        var_dump($passwordTest);
        //die;

        if($result!=0 && $passwordTest!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['name'] = $result['username'];
           header('Location: privatespace.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: connexion.php');
}

?>