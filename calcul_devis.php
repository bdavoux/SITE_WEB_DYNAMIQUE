<?php
include("fonction/fonctions.php");
// Connexion à la base de données
$connex = connexionBDD();

$service = $_POST['service'];
$surface = $_POST['surface'];
$statut = $_POST['statut'];
$niveauInfestation = $_POST['niveau_infestation'];
$frequence = $_POST['frequence'];

// Calculer le devis
$devis = calculerDevis($connex, $service, $surface, $statut, $niveauInfestation, $frequence);

//enregistrement des données du devis dans notre bdd

// Récupération des données du formulaire pas encore recup, on utilise pas if isset car des données peuvent etre vide comme commentaire et il existe des chmap required en html
$email = $_POST['email'];
$siret = $_POST['SIRET'];
$date = $_POST['date'];
$commentaires = $_POST['commentaires'];


$dev = $connex->prepare("INSERT INTO devis (email, service, surface, statut, siret, niveau_infestation, frequence, date, commentaire, prix_ttc)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Exécution de la requête avec un tableau de valeurs
$dev->execute(array(
$email,
$service,
$surface,
$statut,
$siret,
$niveauInfestation,
$frequence,
$date,
$commentaires,
$devis
));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat du Devis</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<header class="header">
        <img src="images/logo.jpg" height="150px">
        <div class="links">
            <a href="#"><img src="" height="30px" ></a>
        </div>
    </header>
    <hr>
    <nav class="nav">
    <a href="NosService.php">Nos Services</a>
        <a href="desinsectisation.php">Désinsectisation</a>
        <a href="deratisation.php">Dératisation</a>
        <a href="Qui_sommes_nous.php">Qui sommes nous ?</a>
        <a href="Nous_contacter.php">Nous contacter</a>
        <a href="rdv.php">Prendre un Rendez-Vous</a> 
    </nav>
  <br>
    <main class="mainc">
        <section class="login-container">
        <h2>Votre devis :</h3>
        <p>Montant total : <?php echo $devis; ?> euros.</p>
        <br><br>
        
        <p>Réserver dès maintenant votre intervention : </p><a href="rdv.php">Prendre un RDV</a>
        <br>
        <p>Consulter vos devis et vos RDV : </p><a href="connexion.php">Consulter mon compte</a>
        </section>
</main>
<footer>
         <center><h2>SUIVEZ NOUS</h2></center>
    <section class="footert">
       
        <div>
        <h4>Nos Contact :</h4><br>
            Mail : kass3d@gmail.com<br>
            Tél : +33 6 12 34 56 78<br>
            Adresse : 1 rue de la paix, 75001 Paris<br>
            fax : +33 6 12 34 56 78<br>
            
        </div>
        <div class="réseaux">
          <h4>Nos réseaux :</h4><br>
          <a href="https://www.facebook.com" target="_blank"><img src="images/f.png" alt="Avis"> : kass3d_solution</a>
            <br>
            <a href="https://www.instagram.com" target="_blank"><img src="images/i.png"> : kass3d_solution</a> 
            <br>
            <a href="https://www.twitter.com" target="_blank"><img src="images/x.png"> : kass3d_solution</a> 
        </div>
    </section>
    <section class="mentions">
        <img src="images/logo_fond_noir.png" alt="Logo" height="100px">
        <div class="mentionslegales">
            @2024 Tous droits réservés
        </div>
        
    </section>
    </footer>
</body>
</html>
