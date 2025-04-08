<?php
$serveur = "localhost";
$base_de_donnees = "banking";
$mot_de_passe = "";
$utilisateur = "root";
//connexion à la base de données
$connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees",$utilisateur,$mot_de_passe);
try {
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo '<p style="color:green">Connexion à la base de donnéés établie !</p><br>';
} catch (PDOException $e) {
    echo '<p style="color:orange">Quelque chose s\'est mal passé !</p><br>'.$e1->getMessage();
}
?>
