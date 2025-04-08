<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_SESSION["id"];

    include("connexion-bd.php");

    $req = "select nom, prenom, email from users where id=$id";
    $lancer = $connexion->query($req);
    $resultat = $lancer->fetch();
    $nom = $resultat["nom"];
    $prenom = $resultat["prenom"];
    $email = $resultat["email"];



    if(isset($_POST["nom"])&& empty(!$_POST["nom"]))
    {
        $nom = $_POST["nom"];
    }
    if(isset($_POST["prenom"])&& empty(!$_POST["prenom"]))
    {
        $prenom = $_POST["prenom"];
    } 
    
    if(isset($_POST["email"])&& empty(!$_POST["email"]))
    {
        $emailVerification = $_POST["email"];
  

        $req = "select email from users where email = '$emailVerification' ";
        $lancer = $connexion->query($req);
        $resultat = $lancer->fetchAll();

        echo '<pre>';
            print_r($resultat);
        echo '</pre>';
        //S'assurer que l'email est unique, sinon, ne pas le changer
        if(count($resultat)==0)
        {
            $email = $_POST["email"];
        }
    }

    $req = "UPDATE `users` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$email' WHERE `users`.`id` = $id";
    $connexion->query($req);
    
    header("Location:list_of_users.php");

}


?>