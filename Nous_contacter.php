<?php
// Vérifier si tous les paramètres sont définis
if (isset($_POST["nom"], $_POST["telephone"], $_POST["email"], $_POST["liste_demande"], $_POST["message"])) {
    // Connexion à la base de données
    include("fonction/fonctions.php");
    $connex = connexionBDD();

   // Préparer la requête d'insertion
   $cont = $connex->prepare("INSERT INTO contact (nom, telephone, email, objet_demande, message) 
VALUES (?, ?, ?, ?, ?)");

    // Exécuter la requête avec un tableau de valeurs
    $cont->execute(array($_POST["nom"],$_POST["telephone"],$_POST["email"],$_POST["liste_demande"],$_POST["message"]));
    $message = "Demande de contact envoyer";

}
session_start(); 

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page contact sur la dératisation du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous Contacter</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header class="header">
        <a href="index.php"><img src="images/logo.jpg" height="150px"></a>

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
        <a href="Nous_contacter.php" class=rubrique_active>Nous contacter</a>
        <a href="rdv.php">Prendre un Rendez-Vous</a>
        <a href="devis.php">Obtenir un Devis</a>
    </nav>
  <br>
  
    <main class="main">
        
        <div class="formulaire">
            <div class="contact">
                <h2>Contactez-nous</h2>
                <?php
                if (isset($message)) {
                    echo "<p style='color:green;'>$message</p>";
                }
                 ?>
                <form method="post" action="Nous_contacter.php">
                <label>Nom:</label>
                <input type="text" id="nom" name="nom" required>
                <br><br>
                
                <label>Télephone:</label>
                <input type="text" id="email" name="telephone" required>
                <br><br>

                <label>Email:</label>
                <input type="email" id="email" name="email" required>
                <br><br>
                <label for="demande">Veuillez selectioner l’objet de votre demande:</label>
                    <select id="demande" name="liste_demande">
                        <option value="">Sélectionnez</option>
                        <option value="sugestion">Une sugestion</option>
                        <option value="connexion">Problème de connexion</option>
                        <option value="formation">Une formation</option>
                        <option value="autres">Autres</option>
                    </select> 
                <br><br>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <br><br>

                <button type="submit">Envoyer</button>
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