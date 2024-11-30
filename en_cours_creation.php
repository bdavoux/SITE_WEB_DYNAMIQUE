<?php
// Vérifier si tous les paramètres sont définis
if (isset($_POST["email"], $_POST["mdp"], $_POST["confirme"], $_POST["nom"], $_POST["adresse"], $_POST["telephone"])) {
    // Vérifier si les mots de passe correspondent
    if ($_POST["mdp"] !== $_POST["confirme"]) {
        echo "Les mots de passe sont différents, retour vers la <a href=\"creation_compte.php\">page de création du compte</a>";
    }

    // Connexion à la base de données
    include("fonction/fonctions.php");
    $connex = connexionBDD();

    // Préparer la requête d'insertion
    $com = $connex->prepare("INSERT INTO compte (email, mdp, nom, adresse, telephone, SIRET) 
    VALUES (?, ?, ?, ?, ?, ?)");

    // Exécuter la requête 
    $com->execute(array($_POST["email"],$_POST["mdp"],$_POST["nom"],$_POST["adresse"],$_POST["telephone"],$_POST["SIRET"]));

    echo "Le compte a été créé avec succès <a href=\"connexion.php\">page de connexion</a>";
} 
?>
