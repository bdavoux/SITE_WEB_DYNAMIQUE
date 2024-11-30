<?php
// Vérifier si tous les paramètres sont définis
if (isset($_POST["nuisible"], $_POST["probleme"], $_POST["date"], $_POST["time"], $_POST["nom"], $_POST["email"], $_POST["adresse"], $_POST["SIRET"], $_POST["surface"])) {
    // Connexion à la base de données
    include("fonction/fonctions.php");
    $connex = connexionBDD();
    // Préparer la requête d'insertion
    $r = $connex->prepare("INSERT INTO rdv (nuisible, probleme, date, heure, nom, email, adresse, SIRET, surface) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // Exécuter la requête avec un tableau de valeurs
    $r->execute(array($_POST["nuisible"],$_POST["probleme"],$_POST["date"],$_POST["time"],$_POST["nom"],$_POST["email"],$_POST["adresse"],$_POST["SIRET"],$_POST["surface"]));
    $reponse = "RDV enregistrés avec succès.";

      
}
session_start(); 


?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page RDV du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDV</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header class="header">
        <img src="images/logo.jpg" height="150px">
        <div class="links">
        <a href="<?php //pour se déplacer soit vers la page de connexion ou rster sur la page et se déco
        if(isset($_SESSION['connexion']))
        {
            echo "deconnexion.php";
        }
        else{
            echo "connexion.php";
        }
        ?>">
            
            <?php // Pour savoir si ou non l'utilisateur est connecterr
            if(isset($_SESSION['connexion']))
                {
                    echo "Déconnexion";
                }
                else{
                    echo "Connexion";
                }
            ?>
        </a>
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
        <a href="rdv.php" class=rubrique_active>Prendre un Rendez-Vous</a> 
        <a href="devis.php">Obtenir un Devis</a>
    </nav>
  <br>

    <main class="main">
        <div class="rdv">
            <div class="information">
                <h2>Prendre un rendez-vous</h2>
                <?php
                if (isset($reponse)) {
                    echo "<p style='color:green;'>$reponse</p>";
                }
                ?>
                <form action="rdv.php" method="post">
                    <!-- Étape 1 : Identification du problème -->
                    <div id="etape1">
                        <fieldset>
                            <legend>Étape 1 : Identification du problème</legend>
                            <fieldset class="radio_check">
                                  <legend>Choisissez les nuisibles qui vous posent problème : </legend>
                                  <input type="radio" value="rats" id="rats" name="nuisible"><label>Rats</label>
                                  <input type="radio" value="pl" id="pl" name="nuisible"><label>Punaises de lit</label>
                                  <input type="radio" value="cafards" id="cafards" name="nuisible"><label>Cafards / Blattes</label>
                                  <input type="radio" value="frelons" id="frelons" name="nuisible"><label>Frelons</label>
                                  <input type="radio" value="autres" id="autres" name="nuisible"><label>Autres</label>
                            </fieldset>
                            <br>
                            <label for="probleme">Décrivez votre problème :</label>
                            <textarea id="probleme" name="probleme"></textarea><br>
                            <br>
                            <fieldset>
                                <legend>Choisissez la date et l'heure de votre rendez-vous :</legend> </legend>
                                    <label for="date">Choisissez une date :</label>
                                    <input type="date" id="date" name="date"><br>
                                    <label for="time">Choisissez une heure :</label>
                                    <input type="time" id="time" name="time"><br>
                            </fieldset>
                            <!-- Autres champs pour cette étape -->
                            <button type="button" onclick="passerEtape(2)">Passer à l'étape suivante</button>
                        </fieldset>
                    </div>

                    <!-- Étape 2 : Informations personnelles -->
                    <div id="etape2" style="display:none;">
                        <fieldset>
                            <legend>Étape 2 : Informations</legend>
                            <label>Votre nom :</label>
                            <input type="text" id="nom" name="nom">
                            <br><br>

                            <label>Votre email :</label>
                            <input type="email" id="email" name="email">
                            <br><br>

                            <fieldset>
                                <legend>Saissisez votre adresse :</legend>
                                <label for="adresse">Adresse :</label>
                                <input type="text" id="adresse" name="adresse" placeholder="Saisissez votre adresse">
                                <ul id="suggestions"></ul>
                            </fieldset>
                            <br><br>

                            <fieldset>
                                <legend>Vous êtes un professionnel ?</legend>
                                <label>Votre numéro de SIRET :</label>
                                <input type="text" id="SIRET" name="SIRET">
  
                            </fieldset>
                            <br><br>

                            <fieldset>
                                <legend>Informations sur le batiment :</legend>
                                <label>Indiquez la surface du logement ou de l'entreprise en m2 :</label>
                                <input type="text" id="surface" name="surface">
                            </fieldset>
                           <br>
                            <button type="button" onclick="passerEtape(3)">Passer à l'étape suivante</button>
                        </fieldset>
                    </div>

                    <!-- Étape 3 : Validation et soumission -->
                    <div id="etape3" style="display:none;">
                        <fieldset>
                            <legend>Étape 3 : Validation et soumission</legend>
                            <p>
                                <input type="checkbox" value="choix1" id="choix1" name="choix">
                                <label for="choix1">L'individu atteste de la véracité des informations transmises</label>
                            </p>
                            <p>
                                <input type="checkbox" value="choix2" id="choix2" name="choix">
                                <label for="choix2">J'accepte la politique de confidentialité du groupe concernant le traitement de mes données à caractère personnel</label>
                            </p>
                            <button type="submit">Soumettre</button>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
        <script src="fonctions.js"></script> 
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