


<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page création sur la dératisation du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crea_compte</title>
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
        
        <form action="en_cours_creation.php" method="post" class="formconnexioncrea">
        <h2>Créer un compte</h2>
            <fieldset>
            <legend>Informations pour la création du compte :</legend>
                <br>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" required>
                <br>
                <label for="confirme">Confirmer le mot de passe :</label>
                <input type="password" name="confirme" required>
            </fieldset>
                <br>
          <fieldset>
              <legend>Informations personnelles :</legend>
              <label for="nom">Nom :</label>
              <input type="text" name="nom" required>
          <br>
              <label for="adresse">Adresse :</label>
              <input type="text"  name="adresse" placeholder="Saisissez votre adresse" required><br>
              <ul id="suggestions"></ul>
          <br>
              <label for="telephone">Téléphone :</label>
              <input type="text" name="telephone" required>
          <br>
              <label>Vous êtes un professionnel ? Entrez votre numéro de SIRET :</label>
              <input type="text" name="SIRET"><br>
          </fieldset>
          <br>
            
              <button type="submit">Créer un compte</button>
            
            <p>Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></p>
        </form>
      
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

