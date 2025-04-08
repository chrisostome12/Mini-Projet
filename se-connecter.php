<?php
session_start();
if(!isset($_SESSION["id"]))
{
 header('Location:inscription.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //S'assurer que les champs existent
    if(isset($_POST["email"]) && isset($_POST["mot_de_passe"]) && empty(!$_POST["email"]) && empty(!$_POST["mot_de_passe"]) )
    {
        $email = $_POST["email"];
        $mot_de_passe = $_POST["mot_de_passe"];

        try{
            
             include("connexion-bd.php");
             $req = "select id, mot_de_passe,nom from users where email = '$email'";
             $lancer = $connexion->query($req);
             $resultat = $lancer->fetchAll();
             if(count($resultat)!=0)
             {
                //Récupérer le mot de passe de l'utilisateur
                $hash = $resultat[0]["mot_de_passe"];
                // Vérifier si le mot de passe est correcte
                if (password_verify ($_POST["mot_de_passe"], $hash)) 
                {
                    //Récupérer l'ID de l'utilisateur
                    $_SESSION["id"] = $resultat[0]["id"];
                    $_SESSION["nom"] = $resultat[0]["nom"];
                    header("Location:solde.php");

                }
                else{
                    echo 'Mot de passe incorrecte !';
                }
             }
             else
             {
                echo "Vous n'avez pas de compte !";
             }


            
        }
        catch(PDOException $e){
            echo 'ERREUR =>'.$e->getMessagee();
        }
       
    }
    else{
        echo 'Il y a un problème dans  les champs ';
    }
}
else{
    echo 'Il y a un  problème';
}



?>