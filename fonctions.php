<?php

/*
 * Fonction connexion_bdd permet la connexion en BDD
 * @param $bdd = le nom de la base de données
 * @param $login = l'identifiant de connexion à la BDD
 * @param $mdp = le mot de passe de connexion à la BDD
 * @param $dsn = DSN avec "mysql" par défaut
 * @param $host = host avec "localhost" par défaut
 * @return $connex = objet avec la connexion
 */
include("parametrages/param.php");
 function connexionBDD() {
    $host = DB_HOST; // Nom du serveur
    $dbname = DB_NOM; // Nom de la base de données
    $username = DB_USER; // Nom d'utilisateur
    $password = DB_MDP; // Mot de passe

    try {
        $connex = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        return $connex;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
/**
 * Vérifie si l'utilisateur avec l'email et le mot de passe donnés existe dans la base de données.
 *
 * @param PDO $connex Connexion à la base de données.
 * @param string $email Email de l'utilisateur.
 * @param string $mdp Mot de passe de l'utilisateur.
 * @return bool Retourne true si l'utilisateur existe, sinon false.
 */
function verif_connexion($connex, $email, $mdp) {
    try {
        // Préparation de la requête
        $personne = $connex->prepare("SELECT * FROM compte WHERE email = ? AND mdp = ?");
        // Exécution de la requête en passant les paramètres directement dans execute
        $ligne = $personne->execute(array($email, $mdp));
        //Récupération du résultat
        $ligne = $personne->fetch();
        //retourne le résultat
        return $ligne;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur PDO : " . $e->getMessage();
        return false;
    }
}

function recup_nom($connex, $email) {
    // Requête SQL pour récupérer le nom de l'utilisateur
    $query = "SELECT nom FROM compte WHERE email = ?";
    // Préparation de la requête
    $personne = $connex->prepare("SELECT nom FROM compte WHERE email = ?");
    // Exécution de la requête en passant l'email comme paramètre
    $personne->execute([$email]);
    // Récupération du résultat
    $resultat = $personne->fetch();
    return $resultat['nom']; // Retourne le nom de l'utilisateur

}


/**
 * Récupère les devis de l'utilisateur à partir de son email.
 *
 * @param PDO $connex Connexion à la base de données.
 * @param string $email Email de l'utilisateur.
 * @return array Tableau contenant les devis de l'utilisateur ou tableau vide si aucun devis trouvé.
 */
function recup_devis($connex, $email) {
    // Préparation de la requête
    $dev = $connex->prepare("SELECT * FROM devis WHERE email = ?");
    // Exécution de la requête en passant l'email comme paramètre
    $dev->execute([$email]);
    // Récupération de tous les résultats
    $devis = $dev->fetchAll();
    // Retourne les résultats (tableau associatif) ou un tableau vide si aucun résultat
    return $devis;
}

function recup_rdv($connex, $email) {
    // Préparation de la requête
    $r = $connex->prepare("SELECT * FROM rdv WHERE email = ?");
    // Exécution de la requête en passant l'email comme paramètre
    $r->execute([$email]);
    // Récupération de tous les résultats
    $rdv = $r->fetchAll();
    // Retourne les résultats (tableau associatif) ou un tableau vide si aucun résultat
    return $rdv;
}




function obtenirPrix($connex, $statut, $service) {
    $p = $connex->prepare("SELECT * FROM prix WHERE id = 1");
    $p->execute();
    $resultat = $p->fetch();
    
    if ($statut == 'particulier' && $service == 'deratisation') {
        return $resultat['prix_particulier_deratisation'];
    } elseif ($statut == 'professionel' && $service == 'deratisation') {
        return $resultat['prix_pro_deratisation'];
    } elseif ($statut == 'particulier' && $service == 'desinsectisation') {
        return $resultat['prix_particulier_insectes'];
    } elseif ($statut == 'professionel' && $service == 'desinsectisation') {
        return $resultat['prix_pro_insectes'];
    } else {
        return 0;
    }
}


// cette fonction app une autre fonction qui calcul le prix de base de l'intervention (prix présent en bdd) et ajuste le prix en fonction des informations de l'utilisateur
function calculerDevis($connex, $service, $surface, $statut, $niveauInfestation, $frequence) {
    $prix_base = obtenirPrix($connex, $statut, $service); //fonction au dessus.
    if ($prix_base == 0) {
        return "Erreur lors du calcul du devis";
    }

    // On ajuste le prix grace à des coefficients
    $coeffInfestation = CI1;
    if ($niveauInfestation == "moyen") {
        $coeffInfestation = CI2;
    } 
    elseif ($niveauInfestation == "eleve") {
        $coeffInfestation = CI3;
    }

    // On ajuste le prix grace à des coefficients
    $coeffFrequence = CF1;
    if ($frequence == "mensuel") {
        $coeffFrequence = CF2;
    } 
    elseif ($frequence == "trimestriel") {
        $coeffFrequence = CF3;
    }

    // Calcul de fin
    $montant_final = $prix_base * $surface * $coeffInfestation * $coeffFrequence;

    // on retourne le prix final 
    return $montant_final;
}

//Gestion des roles par les comptes admin:

function promouvoir_admin($connex, $email) {
    $ad = $connex->prepare("UPDATE compte SET role = 'admin' WHERE email = ?");
    $ad->execute(array($email));
}

function retrograder_utili($connex, $email) {
    $ut = $connex->prepare("UPDATE compte SET role = 'utilisateur' WHERE email = ?");
    $ut->execute(array($email));
}

function sup_compte($connex, $email) {
    $sup = $connex->prepare("DELETE FROM compte WHERE email = ?");
    $sup->execute(array($email));
}
?>


