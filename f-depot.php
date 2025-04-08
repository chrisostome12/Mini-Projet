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
    <title>Formulaire de dépôt</title>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<body>
<?php include("header.php"); ?>
    <div class="depot-card">
    <form method="post" action="f-depot.php">
        <label for="retrait">Déposer de l'argent:</label>
        <input type="text" id="montant" name="montant"><br>
        <?php
                if(isset($_POST["montant"]) && empty(!$_POST["montant"]))
                {
                    echo '<div style="color:green;">Vous avez déposé '.$_POST["montant"].'$ sur
                    votre compte</div>';
                    include("connexion-bd.php");
                    try{
                        //Récupérer le solde de l'utilisateur
                        $req = "select montant from accounts where user_id = '$user_id'";
                        $lancer = $connexion->query($req);
                        $resultat = $lancer->fetch();
                        $ancien_montant = $resultat["montant"];
                        if(is_numeric( $_POST['montant'])){
                            $montant = $_POST['montant']+$ancien_montant;
                            $req = "update accounts set montant='$montant' where user_id = '$user_id'";
                            $connexion->query($req);
                            header("Location:solde.php");
                        } 
                    }
                    catch(PDOException $e)
                    {
                        echo "ERREUR";
                    }
                    
                }
        ?>
        <button type="submit">Déposer</button>
    </form>
    </div>
</body>
</html>