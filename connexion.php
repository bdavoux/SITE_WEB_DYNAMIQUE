<?php
session_start();

// Suppresion des variables de session
$_SESSION = array();

// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page de connexion du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header class="header">
        <a href="index.php"><img src="images/logo.jpg" height="150px"></a>

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
        <a href="devis.php">Obtenir un Devis</a>
    </nav>
  <br>
    <main class="mainc">
    <div class="login-container">
        <h2>Connexion</h2>
        <form method="post" action="authentification.php" class="formconnexion">
            <div class="input-group">
                <label>Email :</label>
                <input type="text" id="email" name="email" required>
            </div>
            <br>
            <div class="input-group">
                <label>Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <br>
            <div class="input-group">
                <button type="submit">Se connecter</button>
            </div>
            <p>Vous n'avez pas de compte ? <a href="creation_compte.php">Créer un compte</a></p>
        </form>
    </div>
    </main>
</body>
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
</html>
