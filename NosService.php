<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <meta name="language" content="fr">
    <meta name="description" content="Page sur les services du site kass3d">
    <meta name="keywords" content="deratisation, desinsectisation, restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos services</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <a href="index.php"><img src="images/logo.jpg" height="150px" alt="Logo"></a>
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
            
        </div>
    </header>
    <hr>
    <nav class="nav">
        <a href="NosService.php" class="rubrique_active">Nos Services</a>
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
        <section class="service">
            <br>
            <h2>NOS SERVICES ET PRESTATIONS</h2>
            <div class="prestation">
                <div class="prestationhaut">
                    <h4>Lutte contre les nuisibles - Particuliers</h4>
                    <p>Le leader mondial de la lutte contre les nuisibles. Nous protégeons les particuliers et leurs domiciles en France depuis plus de 40 ans.</p>
                    <a href="rdv.php"><button>Prendre un Rendez-Vous</button></a>
                </div>
                <div class="prestationhaut">
                    <h4>Lutte contre les nuisibles - Professionnels</h4>
                    <p>Kass3D propose des solutions de gestion des nuisibles aux professionnels, spécifiques à chaque secteur d'activité afin de préserver votre entreprise des nuisibles.</p>
                    <a href="rdv.php"><button>Prendre un Rendez-Vous</button></a>
                </div>
                <div class="prestationbas">
                    <h4>Désinfection des surfaces</h4>
                    <p>Nous intervenons auprès des professionnels et des particuliers pour lutter contre la prolifération des maladies transmises par les insectes et animaux nuisibles. Nos solutions d’assainissement de surfaces éliminent bactéries, virus et agents pathogènes qui pourraient nuire à votre bien-être.</p>
                    <a href="rdv.php"><button>Prendre un Rendez-Vous</button></a>
                </div>
                <div class="prestationbas">
                    <h4>Formations</h4>
                    <p>Nos formations sont conçues pour offrir à vos équipes les compétences nécessaires pour identifier et traiter efficacement les infestations. Kass3D propose des sessions pratiques et théoriques, animées par des experts du secteur, qui vous permettront de maîtriser les meilleures pratiques en matière de désinsectisation et dératisation. En participant à nos formations, vous assurez non seulement la sécurité de votre établissement, mais vous renforcez également la confiance de vos clients grâce à un personnel formé et compétent. Investissez dans l'excellence et la prévention avec Kass3D !</p>
                    <a href="rdv.php"><button>Prendre un Rendez-Vous</button></a>
                </div>
            </div>

            <div class="motfin">
                Pour toute information spécifique vous pouvez nous contacter. N’hésitez pas à simuler votre devis en ligne, c’est rapide et gratuit.
            </div>
            <a href="devis.php"><button class="buttontext">Votre devis en 2 minutes</button></a>
            <br>
            
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
