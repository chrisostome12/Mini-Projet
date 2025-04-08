<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //S'assurer que les champs existent dans le formulaire
    if(isset($_POST["nom"])&& isset($_POST["prenom"]) &&isset($_POST["mot_de_passe"])&& isset($_POST["email"])&& isset($_POST["mot_de_passe2"]))
    {   //S'assurer que les champs ne sont pas vides
        if(empty(!$_POST["nom"])&& empty(!$_POST["prenom"]) &&empty(!$_POST["mot_de_passe"])&& empty(!$_POST["email"])&& empty(!$_POST["mot_de_passe2"]))
        {
            if($_POST["mot_de_passe"]==$_POST["mot_de_passe2"])
            {
                $nom = $_POST["nom"];
                $prenom =$_POST["prenom"];
                $mot_de_passe = $_POST["mot_de_passe"];
                $email = $_POST["email"];
                // Se connecter à la base de données
                include 'connexion-bd.php';
                //S'assurer que l'adresse mail est unique
                $req = "select * from users where email = '$email'";
                $lancer = $connexion->query($req);
                $resultat = $lancer->fetchAll();

                if(count($resultat)==0)
                {
                    //Hacher le mot de passe
                    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
                    $req = "insert into users(nom, prenom, mot_de_passe, email)
                            values ('$nom','$prenom','$mot_de_passe','$email')";
                    $connexion->query($req);
                    //header("Location:register.php");
                    //Afficher l'interface de l'utilisateur après l'avoir connecté
                    $req = "select id,nom from users where email = '$email'";
                    $lancer = $connexion->query($req);
                    $resultat = $lancer->fetch();
                    $user_id = $resultat["id"];
                    //Créer le compte bancaire de l'utilisateur
                    $req = "insert into accounts(user_id, montant) values ('$user_id','0')";
                    $lancer = $connexion->query($req);
                    //Récupérer l'ID de l'utilisateur
                    $_SESSION["id"] = $resultat["id"];
                    $_SESSION["nom"] = $resultat["nom"];
                    header("Location:solde.php");
                }
                else
                {
                    echo "Cette adresse email est déjà utilisée !";
                }



            }
            else{
                echo 'Les mots de passe ne sont pas identiques !';
            }
        }
        else
        {
            echo 'Remplissez tous les champs !';
        }
    }
    else{
        echo '\il y a un problème !';
    }


    /*$nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users ( nom, email, mot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }*/
}
?>