<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <form id="formulaire" method="post" action="se-connecter.php">
        <h1>Se connecter</h1>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1"name="mot_de_passe">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button><br><br>
    <div>Vous n'avez pas de compte ? Cliquez <a href="register.php"class="ici">&nbsp;ici</a></div>
    </form>   
</div>


 
</body>
</html>