<?php
// Démarrage de la session pour récupérer les variables de session
session_start();

// Vérification si l'utilisateur est connecté en vérifiant la présence de $_SESSION["email"]
if (!isset($_SESSION["email"])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

// Connexion à la base de données (à adapter avec vos informations)
include("fonction/fonctions.php");
$connex = connexionBDD();

// Traitement du formulaire de changement de mot de passe
if (isset($_POST["ancien"]) && isset($_POST["nouveau"]) && isset($_POST["confirme"])) {
    $email = $_SESSION["email"];
    $ancien = $_POST["ancien"];
    $nouveau = $_POST["nouveau"];
    $confirme = $_POST["confirme"];

    if ($nouveau != $confirme) {
        $message = "Les nouveaux mots de passe ne sont pas identiquent";
    }
     else {
        // Vérification si l'ancien mot de passe se trouve bien dans la base
        
        $m = $connex->prepare("SELECT mdp FROM compte WHERE email = ?");
        $m->execute (array($email));
        $resultat = $m->fetch();

        if (($resultat["mdp"]) != ($ancien)) {
            $message = "L'ancien mot de passe est incorrect";
        } 
        else {
            // Mise à jour du nouveau mot de passe
            $n = $connex->prepare("UPDATE compte SET mdp = ? WHERE email = ?");
            $n->execute (array($nouveau,$email));
            $message = "Mot de passe modifié";
        }
    }
}

if (isset($_POST["note"]) && isset($_POST["commentaires"])) {
    $note = $_POST["note"];
    $commentaire = $_POST["commentaires"];
    $email = $_SESSION["email"];
// Ecriture dans la BDD
    $m = $connex->prepare("INSERT INTO avis (note, commentaire, email) VALUES (?, ?, ?)");
    $m->execute (array($note,$commentaire,$email));
    $resultat = $m->fetch();
    $message2 = "Avis enregistré";

        
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page compte du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<main class="main_c">
    <h1>Mon Compte</h1>
    <?php
    // Affichage du nom de l'utilisateur récupéré de la variable de session
    echo "<p>Bonjour, " . $_SESSION["nom"] . "!</p>";
    echo "<p>Voici vos informations personnelles :</p>";
    echo "<p>Email : " . $_SESSION["email"] . "</p>";

    // Affichage des rendez-vous en cours s'il y en a
    if (!empty($_SESSION["tab_rdv"])) {
        echo "<h2>Vos rendez-vous en cours ou passés :</h2>";
        
        foreach ($_SESSION["tab_rdv"] as $rdv) {
            echo "<p>" . $rdv["date"] . " - " . $rdv["heure"] . " - " . $rdv["adresse"] . "<p>";
            echo "<hr>";
        }
       
    }
    else {
        echo "<p>Vous n'avez pas de rendez-vous en cours.</p>";
    }

    // Affichage des informations de devis s'il y en a
    if (!empty($_SESSION["tab_devis"])) {
        $i = 1;
        echo "<h2>Vos devis :</h2>";
        foreach ($_SESSION["tab_devis"] as $devis) {
            echo "<span>Devis: ".$i."</span>";
            $i++;
            echo "<p>Type de service : " . $devis["service"] . "<p>";
            echo "<p>Surface : " . $devis["surface"] . " m²<p>";
            echo "<p>Niveau d'infestation : " . $devis["niveau_infestation"] . "<p>";
            echo "<p>Fréquence du service : " . $devis["frequence"] . "<p>";
            echo "<p>Date préférée pour l'intervention : " . $devis["date"] . "<p>";
            echo "<p>Prix TTC : " . $devis["prix_ttc"] . "<p>";
            echo "<br>";
            echo "<hr>";
        }
        
    }
    else {
        echo "<p>Vous n'avez pas de devis enregistrés.</p>";
    }
    ?>
    <h2>Changer de mot de passe</h2>
    <?php
    if (isset($message)) {
        echo "<p style='color:green;'>$message</p>";
    }
    ?>
    <form action="mon_compte.php" method="post">
        <label for="ancien">Ancien mot de passe :</label>
        <input type="password" id="ancien" name="ancien" required><br>
        <label for="nouveau">Nouveau mot de passe :</label>
        <input type="password" id="nouveau" name="nouveau" required><br>
        <label for="confirme">Confirmer le nouveau mot de passe :</label>
        <input type="password" id="confirme" name="confirme" required><br>
        <input type="submit" value="Changer de mot de passe">
    </form>
     <br><br>
    <h2>Laisser un avis :</h2>
    <?php
    if (isset($message2)) {
        echo "<p style='color:green;'>$message2</p>";
    }
    ?>
    <form action="mon_compte.php" method="post">
        <label for="note">Note de 1 à 5 :</label>
        <select id="note" name="note" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <br><br>
        <label for="commentaires">Commentaires :</label>
        <textarea id="commentaires" name="commentaires"></textarea>
        <br><br>
        <input type="submit" value="Enregistrer mon avis">
    </form>

    <br>
    <a href="deconnexion.php">Se déconnecter</a>
    </main> 
 

</body>
</html>
