<?php
session_start();
session_unset(); // Supprimer toutes les variables de session
session_destroy(); // Détruire la session
header('Location:formulaire_connexion.php'); // Redirection vers la page d'accueil
exit;
?>