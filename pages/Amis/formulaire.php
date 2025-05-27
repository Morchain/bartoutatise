<?php
session_start();

// Fonctions pour valider les champs
function nettoyer_donnees($donnees){
    $donnees=trim($donnees);
    $donnees=stripslashes($donnees);
    $donnees=htmlspecialchars($donnees);
    return $donnees;
}   

function valider_ID($id){
    $id=nettoyer_donnees($id);
    if(preg_match("/^[0-9]{1}$/",$id)){
        return true;
    }
    else{
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traitement si c’est le bouton 'Envoyer'
    if (isset($_POST['Envoyer'])) {
        if (empty($_POST['id'])) {
            header('location:amis.php');
            die();
        }

        $vID = nettoyer_donnees($_POST['id']);

        try {
            require("connexion.php");
            $reqPrep = "SELECT * FROM profil WHERE Id = :id";
            $req = $conn->prepare($reqPrep);
            $req->bindParam(':id', $vID);
            $req->execute();
            $resultat = $req->fetch();
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }

        if (!valider_ID($vID)) {
            header('location:amis.php');
            die();
        } else if ($resultat == false) {
            echo "<h2>L'utilisateur n'existe pas</h2>";
        } else {
            echo "<img src='../../img/pp" . htmlspecialchars($resultat['Id_avatar']) . ".jpg' alt='Photo de profil' class='portrait'>";
            echo "<h2>Pseudo : " . $resultat['Pseudo'] . "</h2>";
            echo "<p>ID : " . $resultat['Id'] . "</p>";
            for ($index = 1; $index < 11; $index++) {
                if ($resultat['Ami'.$index] != NULL) {
                    $a=$resultat['Ami'.$index];
                    $reqAmi = "SELECT Pseudo FROM profil WHERE Id = :idAmi";
                    $stmtAmi = $conn->prepare($reqAmi);
                    $stmtAmi->bindParam(':idAmi', $a);
                    $stmtAmi->execute();
                    $amiResult = $stmtAmi->fetch();
                    echo "<p>Ami".$index." : " . htmlspecialchars($amiResult['Pseudo']) . "</p>";
                    
                }
            }

            // Afficher les meilleurs avis (4 et 5 étoiles) du profil consulté
            try {
                $reqAvis = "SELECT Nom_bar, note, avis, date_avis 
                            FROM avis 
                            WHERE Id_profil = :idUser AND note >= 4 
                            ORDER BY date_avis DESC";
                $stmtAvis = $conn->prepare($reqAvis);
                $stmtAvis->bindParam(':idUser', $vID);
                $stmtAvis->execute();
                $avis = $stmtAvis->fetchAll();

                if ($avis) {
                    echo "<h3>Meilleurs avis (4 et 5 étoiles) :</h3><ul style='list-style:none; padding-left:0;'>";
                    foreach ($avis as $unAvis) {
                        $dateFormatee = date("d/m/Y", strtotime($unAvis['date_avis']));
                        echo "<li style='margin-bottom:15px; padding:10px; background:#e8f0d1; border-radius:8px;'>";
                        echo "<strong>" . htmlspecialchars($unAvis['Nom_bar']) . "</strong> ";
                        echo "<span style='color:#b79f57; font-weight:bold;'>(" . intval($unAvis['note']) . "/5)</span><br>";
                        echo "<em>" . nl2br(htmlspecialchars($unAvis['avis'])) . "</em><br>";
                        echo "<small>Date : " . $dateFormatee . "</small>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Pas encore d'avis 4 ou 5 étoiles pour ce profil.</p>";
                }
            } catch (Exception $e) {
                echo "<p>Erreur lors de la récupération des avis : " . htmlspecialchars($e->getMessage()) . "</p>";
            }

            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='id_ami' value='" . $resultat['Id'] . "'>";
            echo "<input type='submit' name='Ajouter' value='Ajouter un ami' class='send_button'>";
            echo "</form>";

            echo "<input type='button' value='Retour' onclick=\"window.location.href='amis.php'\" class='send_button'>";
        }
    }

    // Traitement si c’est le bouton 'Ajouter'
    if (isset($_POST['Ajouter'])) {
        $idAmi = nettoyer_donnees($_POST['id_ami']);
        $monId = $_SESSION['Id'];

        try {
            require("connexion.php"); // s’assurer que la connexion est faite ici aussi

            $reqPrep = "SELECT * FROM profil WHERE Id = :id";
            $req = $conn->prepare($reqPrep);
            $req->bindParam(':id', $monId);
            $req->execute();
            $monProfil = $req->fetch();

            $amiDejaPresent = false;
            $amiAjoute = false;

            for ($i = 1; $i <= 10; $i++) {
                if ($monProfil['Ami'.$i] == $idAmi) {
                    $amiDejaPresent = true;
                    break;
                }
            }

            if ($amiDejaPresent) {
                echo "<p style='color:darkred; font-weight:bold;'>Cet ami est déjà dans votre liste.</p>";
                echo "<br><input type='button' value='Retour' onclick=\"window.location.href='amis.php'\" class='send_button'>";
            } else {
                for ($i = 1; $i <=10; $i++) {
                    if ($monProfil['Ami'.$i] == NULL) {
                        $colonne = 'Ami'.$i;
                        $updateReq = "UPDATE profil SET $colonne = :idAmi WHERE Id = :monId";
                        $update = $conn->prepare($updateReq);
                        $update->bindParam(':idAmi', $idAmi);
                        $update->bindParam(':monId', $monId);
                        $update->execute();
                        header('location:amis.php');
                        $amiAjoute = true;
                        die();
                        break;
                    }
                }

                if (!$amiAjoute) {
                    echo "<p style='color:darkred; font-weight:bold;'>Vous avez déjà 10 amis !</p>";
                    echo "<br><input type='button' value='Retour' onclick=\"window.location.href='amis.php'\" class='send_button'>";
                }
            }
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
} else {
    header('location:amis.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Recherche de Gaulois</title>
</head>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f5e1;
        color: #4a703c; /* Vert gaulois */
        margin: 0;
        padding: 20px;
    }
    h2 {
        font-family: 'Papyrus', cursive, serif;
        font-size: 2.5rem;
        color: #4a703c;
        text-shadow: 2px 2px #b79f57;
        border-bottom: 3px solid #b79f57;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }
    h3 {
        font-family: 'Papyrus', cursive, serif;
        color: #4a703c;
        margin-top: 30px;
        margin-bottom: 10px;
    }
    p {
        font-size: 1.1rem;
        margin: 10px 0;
    }
    input.send_button {
        background-color: #4a703c;
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 12px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input.send_button:hover {
        background-color: #3b552d;
    }
    input.send_button:active {
        background-color: #2c3e1e;
    }
    input.send_button:focus {
        outline: none;
        box-shadow: 0 0 5px #b79f57;
    }
    input[type="button"] {
        margin-top: 15px;
        background-color: #b79f57;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    input[type="button"]:hover {
        background-color: #9b8745;
    }
    input[type="button"]:active {
        background-color: #7a6d33;
    }
    .portrait {
    width: 200px;
    height: auto;
    border: 5px solid #0074b7;
    border-radius: 15px;
    background: #fff;

    display: block;
    margin: 0 auto; /* ← centre horizontalement */
}

</style>
