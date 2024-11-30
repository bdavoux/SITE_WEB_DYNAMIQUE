<?php
session_start();
include("fonction/fonctions.php");
$connex = connexionBDD();

// Récupérer tous les avis de la bdd
$a = $connex->prepare("SELECT * FROM avis"); //Pas besoin de protéger l'injection de sql car pas un champ mofifiable par l'utilisateur
$a->execute();
$avis = $a->fetchAll();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page index sur la dératisation du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="styles.css">
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
        <a href="Nous_contacter.php">Nous contacter</a>
        <a href="rdv.php">Prendre un Rendez-Vous</a>
        <a href="devis.php">Obtenir un Devis</a>
    </nav>
    <main class="main">
        <h1>A Chaque nuisible son expert KASS 3D</h1>
        <img src="images/fond.jpg" alt="Hero Image">
        <hr>
        <p>Choisissez l'efficacité au prix juste.</p>
        <a href="devis.php"><button>Votre devis en 2 minutes</button></a>
        <section class="service">
            <h2>Nos Services</h2>
            <br>
            <div class="content">
            <div class="images">
                <div class="case">Nos produits
                <div class="image-container">
                    <img src="images/service_1_image.jpg" alt="Nos produits">
                    <div class="disparaitre">KASS 3D propose des produits adaptés à tous les insectes.</div>
                </div>
                </div>
                <div class="case">Nos avantages
                <div class="image-container">
                    <img src="images/maison_protg_1.png" alt="Nos avantages">
                    <div class="disparaitre">L’éfficacté de nos produits protège votre maison/entreprise sur le long terme.</div>
                </div>
                </div>
                <div class="case">Nos informations
                <div class="image-container">
                    <img src="images/eclos.png" alt="Satisfaction">
                    <div class="disparaitre">Nos agents s'emploient à éliminer les larves et les œufs pour garantir une efficacité accrue de nos prestations.</div>
                </div>
                </div>
                <div class="case">Satisfaction
                <div class="image-container">
                    <img src="images/image_converted_1.jpeg" alt="Informations" height="100px">
                    <div class="disparaitre">Satisfaction garantit</div>
                </div>
                </div>
            </div>
            </div>
        </section>

        <section class="BandeBleu">
           <center> <h1>Avec notre expertise, dites adieu aux nuisibles</h1></center>
        </section>
        <section class="aDieu">
            <video src="images/video.mp4" controls></video>
        <section class="OuNousTrouver">
            
            <h2>Où nous trouver ?</h2>
            <div class="map">
                
                <div class="text-left">Nous intervenons dans toute l’île de France.
                    Nos magasins sont ouverts (24h/24h) dans le 95 à Survilliers ,
                    dans le 77 à Chelles et à Juvisy dans le 91.
                </div>
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1DpsToJnV_R0zC6ItI7vX8e6hp9CcJfE&ehbc=2E312F&noprof=1"  width="50%" height="450" ></iframe>
                
            
            </div>
        </section>
        <section class="AvisClient">
            <h2>Avis clients</h2>
            <div class="avis">
                <?php
                    if (count($avis) > 0) {
                        foreach ($avis as $avi) {
                            if ($avi["publie"]){
                                echo "<p><strong>Note :</strong> {$avi['note']}<br>";
                                echo "<strong>Commentaire :</strong> {$avi['commentaire']}<br>";
                                echo "<hr>";
                                
                            }
 
                        }
                    } else {
                        echo "<p>Aucun avis publié pour le moment</p>";
                    }
                ?>
            </div>
        </section>
                    
    </main>
    <footer>
         <center><h2>SUIVEZ NOUS</h2></center>
    <section class="footert">
       
        <div class="contact">
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
