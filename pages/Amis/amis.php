<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Amix</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../css/amis.css">
        <style>
            .portrait {
                width: 100px;
                height: auto;
                border: 5px solid #0074b7;
                border-radius: 15px;
                background: #fff;
            }
        </style>
    </head>
    <body>

        <?php require("../php/header.php"); ?> 

        <div class="block">

            <h2>🔍 Recherche d’un Gaulois</h2>
            <form method="post" action="formulaire.php">
                <label for="id">ID :</label>
                <input type="text" name="id" id="id" required />
                <input type="submit" name="Envoyer" class="send_button" value="Rechercher" />
            </form>

            <h2>🛡️ Mes compagnons de bataille</h2>

            <?php

            if (isset($_SESSION['Id'])) {
                $id = $_SESSION['Id'];

                // Suppression d'un ami
                if (isset($_POST['supprimer_ami'])) {
                    $amiASupprimer = $_POST['ami_id'];
                    try {
                        require("connexion.php");
                        $req = $conn->prepare("SELECT * FROM profil WHERE Id = :id");
                        $req->bindParam(':id', $id);
                        $req->execute();
                        $profil = $req->fetch();

                        for ($i = 1; $i <= 10; $i++) {
                            if ($profil["Ami$i"] == $amiASupprimer) {
                                $col = "Ami$i";
                                $update = $conn->prepare("UPDATE profil SET $col = NULL WHERE Id = :id");
                                $update->bindParam(':id', $id);
                                $update->execute();
                                echo "<p style='color:green;'>Ce valeureux guerrier a été banni du village.</p>";
                                break;
                            }
                        }
                    } catch (Exception $e) {
                        die("Erreur : " . $e->getMessage());
                    }
                }

                // Affichage des amis
                try {
                    require("connexion.php");
                    $req = $conn->prepare("SELECT * FROM profil WHERE Id = :id");
                    $req->bindParam(':id', $id);
                    $req->execute();
                    $resultat = $req->fetch();
                } catch (Exception $e) {
                    die("Erreur : " . $e->getMessage());
                }

                echo "<div class='amis-container'>";
                $aDesAmis = false;
                for ($index = 1; $index <= 10; $index++) {
                    if (!empty($resultat['Ami' . $index])) {
                        $aDesAmis = true;
                        $id_ami = $resultat['Ami' . $index];

                        try {
                            require("connexion.php");
                            $req = $conn->prepare("SELECT * FROM profil WHERE Id = :id_ami");
                            $req->bindParam(':id_ami', $id_ami);
                            $req->execute();
                            $ami = $req->fetch();
                        } catch (Exception $e) {
                            die("Erreur : " . $e->getMessage());
                        }

                        echo "<div class='card-ami'>";
                        echo "<img src='../../img/pp" . htmlspecialchars($ami['Id_avatar']) . ".jpg' alt='Photo de profil' class='portrait'>";
                        echo "<h3>" . htmlspecialchars($ami['Pseudo']) . "</h3>";
                        echo "<p>ID : " . htmlspecialchars($ami['Id']) . "</p>";
                        echo "<p>Email : " . htmlspecialchars($ami['Mail']) . "</p>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='ami_id' value='" . $ami['Id'] . "' />";
                        echo "<input type='submit' name='supprimer_ami' value='Supprimer' class='delete-button' />";
                        echo "</form>";
                        echo "</div>";
                    }
                }
                echo "</div>";

                if (!$aDesAmis) {
                    echo "<p>Pas de compagnons pour l’instant... Par Toutatis, il faut y remédier !</p>";
                }

            } else {
                echo "<p>Tu dois être connecté pour rejoindre la tribu des irréductibles.</p>";
            }
            ?>

        </div>

    </body>
</html>
