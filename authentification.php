<?php

/*
 * Cette page sert de passage entre la page de connexion et la page affichant le compte de l'utilisateur et ses informations perso
 * Avec vérification de l'authentification
 * Affichage des messages si authentification ok
 */

// $affichage permet de gérer le type d'affichage
// Si true : affichage de la page mon_compte
// Si false : erreur de connexion (par défaut)
$affichage = false;

// S'il y a des données de connexion (via $_POST)
if (isset($_POST["email"]) && isset($_POST["mdp"]) && htmlspecialchars($_POST["email"]) != "" && htmlspecialchars($_POST["mdp"]) != "") {
  //On met les données dans des variables et sécurisation
  $email = htmlspecialchars($_POST["email"]);
  $mdp = htmlspecialchars($_POST["mdp"]);
  include("fonction/fonctions.php");
  $connex = connexionBDD();
  $ligne = verif_connexion($connex, $email, $mdp);
  
    if ($ligne != null) {
      $affichage = true;
      $nom = recup_nom($connex, $email);
      $tab_devis = recup_devis($connex, $email);
      $tab_rdv = recup_rdv($connex, $email);
      $role = $ligne["role"];
      
    }
  
  

}
?>
<!DOCTYPE html>
<head>
    <title>Page authentification</title>
	  <meta charset="UTF-8"/>
	  <meta name="language" content="fr">
	  <meta name="description" content="Page d'autentification">
	  <meta name="keywords" content="mdp,email">
	  <link rel="stylesheet" href="style2.css">
   </head>
<body>
  <main class="main">
    <?php
    // Si $affichage est true, traitement et affichage des messages et liens
    if ($affichage) {
        // Démarrage de la session (avant l'affichage)
        session_start();

        // Récupération des données et mises en session pour les utiliser sur d'autres pages
        $_SESSION["nom"] = $nom;
        $_SESSION["email"] = $email;
        $_SESSION["tab_devis"] = $tab_devis;
        $_SESSION["tab_rdv"] = $tab_rdv;
        $_SESSION['connexion'] = "connexion";
        $_SESSION["role"] = $role;

        /////////////////////////
        // DEBUT PARTIE AFFICHAGE
        /////////////////////////

        echo "<p>Bonjour " . htmlspecialchars($_SESSION["nom"]) . "</p>";
        echo "<br>";
        echo "<br>";
        echo "<p>Votre connexion est acceptée.</p>";
        echo "<p>Pour continuer, cliquez sur le lien <a href=\"mon_compte.php\">suivant</a></p>";
        echo "<br>";
        echo "<br>";

        // Si c'est un administrateur on lui propose de se connecter en tant que tel
        if ($_SESSION["role"] == 'admin') {
            echo "<p>Vous êtes administrateur.</p>";
            echo "<p>Pour gérer les comptes, cliquez <a href=\"admin.php\">ici</a></p>";
        }

        ///////////////////////
        // FIN PARTIE AFFICHAGE
        ///////////////////////

        // Suppression des données de $_POST
        unset($_POST["email"]);
        unset($_POST["mdp"]);
    }
    else {
        // Si $affichage est false, affichage message renvoyant sur page de connexion
        echo "<p>Erreur de connexion, retour vers la <a href=\"connexion.php\">page de connexion</a></p>";
    }
    ?>
  </main>
</body>
</html>

