<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page info sur la dératisation du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui sommes nous</title>
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
        <a href="Qui_sommes_nous.php"class=rubrique_active>Qui sommes nous ?</a>
        <a href="Nous_contacter.php">Nous contacter</a>
        <a href="rdv.php">Prendre un Rendez-Vous</a>
        <a href="devis.php">Obtenir un Devis</a>
    </nav>
    <main>
        <section class="BandeBleu">
            <center><h1>Qui sommes nous ?</h1></center>
        </section>
        <section class="QuiSommesNous"> 
            <div class="imagemuscle">
                <p class="texte">
        
                        KASS 3D est une entreprise spécialisée en dératisation,         
                        désinsectisation et désinfection. Nous nous engageons à fournir un  travail de qualité, en mettant tout en œuvre pour satisfaire pleinement nos clients à des prix accessibles.
                
                </p>
           
                <img src="images/HommeNoir.png" alt="Persomuscle" class="Persomuscle">
            </div>
        </section>
        <section class="BandeBleu">
           <center> <h1>NOS DOMAINES DE PREDILECTION</h1></center>
        </section>
        <section class="NosDomaines">
            <div class="text_nosdomaines">
                <div class="textDeratisation">
                   <b>Dératisation</b> 
                </div>
                <div class="textDesinsectisation">
                   <b>Désinsectisation</b> 
                </div>
            </div>
            <div class="image">
               <a href="deratisation.php"><img src="images/Logo_souris_barre.png" alt="Deratisation" class="deratisation"></a> 
                <a href="desinsectisation.php"><img src="images/logo_blates_barre.png" alt="Desinsectisation" class="desinsectisation"></a>
            </div>
        </section>
        <section class="BandeBleu">
           <center> <h1>Protégez vos établissements</h1></center>
        </section>
        <section class="ProtegezVosEtablissements">
            <div class="texprotege">
                <p>
                Chez Kass3D, nous intervenons dans divers domaines tels que les restaurants, les hôtels, les cafés, et bien plus encore. Notre équipe de professionnels est dédiée à offrir des solutions efficaces pour éliminer les nuisibles et garantir un environnement sain et sûr pour vos clients et employés.
                </p>
                <br>
            </div>
            <img src="images/restaurant.png" alt="ProtegezVosEtablissement" class="imgprotege">
        </section>

        <section class="BandeBleu">
           <center> <h1>Nos produits</h1></center>
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
          <center>  <h1>Faites-nous confiance pour une satisfaction garantie </h1></center>
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