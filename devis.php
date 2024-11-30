<?php
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page devis du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header class="header">
        <a href="index.php"><img src="images/logo.jpg" height="150px"></a>

        <div class="links">
            <a href="connexion.php">Connexion</a>
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
        <a href="devis.php" class="rubrique_active">Obtenir un Devis</a>
    </nav>
    <br>

    <main class="main">
        <div class="rdv">
        <div class="information">
            <form  method="post" action="calcul_devis.php">
                <h2>Obtenez votre devis instantanément</h2>

                <label for ="email">Votre Email :</label>
                <input type="email" id="email" name="email">
                <br><br>
                
                
                <label for="service">Type de service :</label>
                <select id="service" name="service" required>
                    <option value="desinsectisation">Désinsectisation</option>
                    <option value="deratisation">Dératisation</option>
                </select>
                <br><br>

                <label for="surface">Taille du site (m²) :</label>
                <input type="number" id="surface" name="surface" required>
                <br><br>

                <label for="statut">vous êtes un :</label>
                <select id="statut" name="statut" required>
                    <option value="particulier">Particulier</option>
                    <option value="professionnel">Professionnel</option>
                </select>
                <br><br>

                <label>Indiquez votre numéro de SIRET si professionnel :</label>
                <input type="text" id="SIRET" name="SIRET">
                <br><br>

                <label for="niveau_infestation">Niveau d'infestation :</label>
                <select id="niveau_infestation" name="niveau_infestation" required>
                    <option value="leger">Léger</option>
                    <option value="moyen">Moyen</option>
                    <option value="eleve">Élevé</option>
                </select>
                <br><br>

                <label for="frequence">Fréquence du service :</label>
                <select id="frequence" name="frequence" required>
                    <option value="unique">Unique</option>
                    <option value="mensuel">Mensuel</option>
                    <option value="trimestriel">Trimestriel</option>
                </select>
                <br><br>

                <label for="date">Date Préférée pour l'intervention :</label>
                <input type="date" id="date" name="date" required>
                <br><br>

                <label for="commentaires">Commentaires / Instructions spécifiques :</label>
                <textarea id="commentaires" name="commentaires"></textarea>
                <br><br>

                <label for="conditions">
                    <input type="checkbox" id="conditions" name="conditions" required>
                    Accepter les Conditions Générales
                </label>
                <br><br>

                <button type="submit">Soumettre le Formulaire</button>
            </form>
        </div>
        </div>
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
            <a href="https://www.facebook.com" target="_blank"><img src="images/f.png" alt="Avis"></a> : kass3d_solution
            <br>
            <a href="https://www.instagram.com" target="_blank"><img src="images/i.png"> : @kass3d_solution</a> 
            <br>
            <a href="https://www.twitter.com" target="_blank"><img src="images/x.png"> </a> : kass3d_solution
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
