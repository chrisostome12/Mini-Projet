<?php 
session_start();
if(isset($_GET["id"]))
{
   $_SESSION["id"]=$_GET[ "id"];
   $userId =  $_GET["id"];
   

    include('connexion-bd.php');
    $userReq = "select * from users where id = $userId";
    $lancer = $connexion->query($userReq);
    $user = $lancer->fetch();
    $nom = $user["nom"];
    $prenom = $user["prenom"];
    $email = $user["email"];


?>
<link rel="stylesheet" href="styles.css">
<div class="container">
    <form id="formulaire" method="post" action="modifier.php">
        <h1>Modifier vos informations</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nom"name="nom" value="<?php echo htmlspecialchars($nom); ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" aria-describedby="prenom"name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email" value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button><br><br>
    </form>   
</div> 
<?php
}
else{
    echo 'Il y a un problème !';
}
?>



