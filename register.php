
<link rel="stylesheet" href="styles.css">
<div class="container">
    <form id="formulaire" method="post" action="inscription.php">
        <h1>Créer un compte</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nom"name="nom">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" aria-describedby="prenom"name="prenom">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1"name="mot_de_passe">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1"name="mot_de_passe2">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button><br><br>
        <div>Vous avez déjà un compte ? Cliquez <a href="formulaire_connexion.php"class="ici">&nbsp;ici</a></div>
    </form>   
</div> 