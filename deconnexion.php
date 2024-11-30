<?php
// Démarre la session
session_start();

// Détruit toutes les variables de session
$_SESSION = array();


// destruction de la session.
session_destroy();

// Redirige l'utilisateur vers la page d'accueil (index.php)
header("Location: index.php");
exit;
?>