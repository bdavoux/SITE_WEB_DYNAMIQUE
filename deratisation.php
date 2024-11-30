<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page sur la dératisation du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dératisation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <a href="index.php"><img src="images/logo.jpg" height="300px"></a>
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
        <a href="deratisation.php" class=rubrique_active>Dératisation</a>
        <a href="Qui_sommes_nous.php" >Qui sommes nous ?</a>
        <a href="Nous_contacter.php">Nous contacter</a>
        <a href="rdv.php">Prendre un Rendez-Vous</a>
        <a href="devis.php">Obtenir un Devis</a>
    </nav>
    <main>
    <section class="BandeBleu">
        <center><h1>Une invasion de rats ?</h1></center>
    </section>
    <section class="invasionrat">
        <img src="images/danger rat.png" alt="invasionrat" class="imginvasionrat">
        <div class="texteinvasionrat">
        Une invasion de rats dans une maison présente plusieurs dangers graves. Les rats peuvent propager des maladies dangereuses comme la leptospirose, la salmonellose et la peste en contaminant les aliments et les surfaces. Leurs morsures et griffures peuvent causer des infections. De plus, ils peuvent causer des dommages matériels en rongeant les câbles électriques, ce qui augmente le risque d'incendie. La présence de rats peut également causer un stress psychologique et une anxiété considérable pour les occupants de la maison.
        </div>
        
    </section>
<section class="BandeBleu">
    <center><h1>KASS 3D meilleur remède contre les rongueurs !</h1></center>
</section>
<section class="rongueur">
    
    <div class="texte_rongueur">
Découvrez nos services professionnels de dératisation, conçus pour éliminer efficacement les infestations de rats et garantir un environnement sain et sécurisé pour votre maison ou votre entreprise. Faites confiance à notre expertise pour vous débarrasser de ces nuisibles et prévenir leur retour.
    </div>
    <img src="images/capture rat.png" alt="rong" class="imgrongueur">
</section>
<section class="BandeBleu">
           <center> <h1>Nous nous engageons</h1></center>
        </section>
        <section class="NosProduits">
            <div class="contentProduits">
                <img src="images/environnement.png" alt="environnement" class="imgecologie">
                <p class="texproduits">
                    Kass3D s’engage à utiliser des produits respectueux de l'environnement et conformes aux normes de sécurité. Nous priorisons des solutions écologiques qui garantissent l’efficacité tout en minimisant l'impact sur la santé et la nature. Notre objectif est de créer des environnements sains pour vos clients et vos employés, tout en préservant la planète. Faites confiance à notre expertise pour une intervention rapide et durable.
                </p>

            </div>
        </section>
        <section class="BandeBleu">
          <center>  <h1>Faites-nous confiance pour une expérience de dératisation exceptionnelle </h1></center>
        </section>
        <section class="fin">
            <a href="Nous_contacter.php" class="proposition">Nous contacter</a>
            <img src="images/logo_fin_sans.png" alt="logo_fin" class="logo_fin">
                 
            <a href="rdv.php" class="proposition">Prendre un Rendez-Vous</a> 
        </section>
        <section class="BandeBleuf">
        </section>
    </main>
<footer>
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