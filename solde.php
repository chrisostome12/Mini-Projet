<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header('Location:formulaire_connexion.php');
}

   $user_id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body>
    <?php include("header.php"); ?>

    <div class="montant-solde">
        <h2>Solde </h2>
            <hr>
            <br>
            <?php
            include('connexion-bd.php');
            $req = "select montant from accounts where user_id = $user_id";
            $lancer = $connexion->query($req);
            $resultat = $lancer->fetch();
            $montant = $resultat["montant"];
            ?>

            <?php
            include('connexion-bd.php');
            $userReq = "select * from users where id = $user_id";
            $lancer = $connexion->query($userReq);
            $user = $lancer->fetch();
            $nom = $user["nom"];
            $prenom = $user["prenom"];
            $email = $user["email"];
            ?>
            <table>
                <tr>
                    <td>Nom :</td>
                    <td> </td>
                    <td><?=$nom?></td>
                </tr>
                <tr>
                    <td>Prénom :</td>
                    <td> </td>
                    <td><?=$prenom?></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td> </td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Montant :</td>
                    <td> </td>
                    <td><?=$montant?></td>
                </tr>
            </table>

    </div>
</body>

</html>