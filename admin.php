<?php
session_start();
if ($_SESSION["role"] != 'admin') {
    die("Accès refusé. Vous n'avez pas les droits nécessaires");
}

include("fonction/fonctions.php");
$connex = connexionBDD();

//Gestion des comptes des utilisateurs de notre site

if (isset($_POST["action"])) {
    $email = htmlspecialchars($_POST["email"]);

    if ($_POST["action"] == "promouvoir") {
        promouvoir_admin($connex, $email);
        $message = "Compte modifié avec succès.";
    }
     elseif ($_POST["action"] == "retrograder") {
        retrograder_utili($connex, $email);
        $message = "Compte modifié avec succès.";
    }
     elseif ($_POST['action'] == 'supprimer') {
        sup_compte($connex, $email);
        $message = "Compte supprimé avec succès.";
    }
}

//Gestion des prix pour nos interventions

if (isset($_POST["modif_prix"]) && ($_POST["nouveau_prix"])) {
    $nv_prix = $_POST["nouveau_prix"];
    if ($_POST["modif_prix"] == "prix_particulier_deratisation"){
        $p = $connex->prepare("UPDATE prix SET prix_particulier_deratisation = ?");
        $p->execute(array($nv_prix));

    }
    elseif ($_POST["modif_prix"] == "prix_pro_deratisation"){
        $p = $connex->prepare("UPDATE prix SET prix_pro_deratisation = ?");
        $p->execute(array($nv_prix));

    }
    elseif ($_POST["modif_prix"] == "prix_pro_insectes"){
        $p = $connex->prepare("UPDATE prix SET prix_pro_insectes = ?");
        $p->execute(array($nv_prix));

    }

    elseif ($_POST["modif_prix"] == "prix_particulier_insectes"){
        $p = $connex->prepare("UPDATE prix SET prix_pro_insectes = ?");
        $p->execute(array($nv_prix));
        
    }

    $message2 = "Prix modifiés avec succès.";
}

// Récupérer tous les avis de la bdd
$a = $connex->prepare("SELECT * FROM avis"); //Pas besoin de protéger l'injection de sql car pas un champ mofifiable par l'utilisateur
$a->execute();
$avis = $a->fetchAll();

//Enregistrement en base des actions sur les avis
if (isset($_POST["id"]) && ($_POST["action"])) {
    $id = $_POST["id"];
    $action = $_POST["action"];
    
    if ($action == "Publier") {
        $a = $connex->prepare("UPDATE avis SET publie = TRUE WHERE id = ?");
        $a->execute(array($id));
        $message3 = "Avis publié";
    } elseif ($action == "Retirer") {
        $a = $connex->prepare("UPDATE avis SET publie = FALSE WHERE id = ?");
        $a->execute(array($id));
        $message3 = "Avis retiré";
    } elseif ($action == "Supprimer") {
        $a = $connex->prepare("DELETE FROM avis WHERE id = ?");
        $a->execute(array($id));
        $message3 = "Avis supprimé";
    }
//Pour que les modif apparaissent recharger la page
header("Location: admin.php");
}


?>

<h2>Gérer les comptes</h2>
<?php
if (isset($message)) {
    echo "<p style='color:green;'>$message</p>";
}
?>
<form method="post" action="admin.php">
    <label for="email">Entrez l'email de l'utilisateur :</label>
    <input type="email" name="email" placeholder="Email" required>
    
    <label for="action">Action :</label>
    <select name="action" required>
        <option value="promouvoir">Promouvoir en administrateur</option>
        <option value="retrograder">Rétrograder en utilisateur</option>
        <option value="supprimer">Supprimer le compte</option>
    </select>
    
    <button type="submit">Valider</button>
</form>
<br>
<br>
<br>
<h2>Modifier le prix de nos interventions</h2>
<?php
if (isset($message2)) {
    echo "<p style='color:green;'>$message2</p>";
}
?>
<form method="post" action="admin.php">
    
    <label for="modif_prix">Sélectionnez le service que vous souhaitez modifier :</label>
    <select name="modif_prix" required>
        <option value="prix_particulier_deratisation">Prix de dératisation pour un particulier</option>
        <option value="prix_pro_deratisation">Prix de dératisation pour un professionnel</option>
        <option value="prix_particulier_insectes">Prix désinsectisation pour un particulier</option>
        <option value="prix_pro_insectes">Prix désinsectisation pour un professionnel</option>
    </select>
    <br>
    <label for="modif_prix">Entrez le nouveau prix :</label>
    <input type="number" name="nouveau_prix" required>
    <br>
    <button type="submit">Valider le nouveau tarif</button>
</form>
<br>
<br>
<br>
<h2>Gestion des avis :</h2>
<?php
if (isset($message3)) {
    echo "<p style='color:green;'>$message3</p>";
}
?>
<?php
if (count($avis) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Email</th>
                <th>Action</th>
            </tr>";
    foreach ($avis as $avi) {
        echo "<tr>
                <td>{$avi['note']}</td>
                <td>{$avi['commentaire']}</td>
                <td>{$avi['email']}</td>
                <td>";
        if ($avi['publie']) {
            echo "<form action='admin.php' method='post'>
                    <input type='hidden' name='id' value='{$avi['id']}'>
                    <input type='submit' value='Retirer' name='action'>
                  </form>";
        } else {
            echo "<form action='admin.php' method='post'>
                    <input type='hidden' name='id' value='{$avi['id']}'>
                    <input type='submit' value='Publier' name='action'>
                  </form>";
        }
        echo "<form action='admin.php' method='post'>
                <input type='hidden' name='id' value='{$avi['id']}'>
                <input type='submit' value='Supprimer'name='action' >
              </form>
              </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Aucun avis soumis.</p>";
}
?>

<br>
<a href="deconnexion.php">Se déconnecter</a>


