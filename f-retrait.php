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
    <title>Formulaire de retrait</title>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php include("header.php"); ?>
    <div class="retrait-card">
    <form method="post" action="f-retrait.php">
        <label for="retrait">Rétirer de l'argent</label>
        <input type="text" id="retrait" name="montant">
        <button type="submit">Rétirer</button>
        <?php
                if(isset($_POST["montant"]) && empty(!$_POST["montant"]))
                {
                    try{
                        include("connexion-bd.php");
                        $montant = $_POST['montant'];
                        $req = "select montant from accounts where user_id = '$user_id'";
                        $lancer = $connexion->query($req);
                        $resultat = $lancer->fetch();
                        $montant2 = $resultat["montant"];
                        if($montant>$montant2){
                        ?>
                            <div style="color:red;">Votre solde est insuffisant !</div>
                        <?php
                        }
                        else{
                            try
                            {
                                $user_id = $_SESSION["id"];
                                echo '<div style="color:green;">Vous avez retiré '.$_POST["montant"].'$ de
                                votre compte</div>';
                                $req = "select montant from accounts where user_id = '$user_id'";
                                $lancer = $connexion->query($req);
                                $resultat = $lancer->fetch();
                                $ancien_montant = $resultat["montant"];
                                if(is_numeric( $_POST['montant']))
                                {
                                    $montant = $ancien_montant-$_POST['montant'];
                                    $req = "update accounts set montant='$montant' where user_id = '$user_id'";
                                    $connexion->query($req);
                                } 
                            }
                            catch(PDOException $e)
                            {
                                echo "ERREUR";
                            }
                            

                           
                        }
                        
                    }
                    catch(PDOException $e)
                    {
                        echo "ERREUR";
                    }
                    
                }
        ?>
    </form>
    </div>
</body>
</html>