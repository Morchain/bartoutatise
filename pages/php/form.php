<?php
    session_start();
    require("../Amis/connexion.php"); 
	//Fonctions pour valider les champs
	function nettoyer_donnees($donnees){
		$donnees=trim($donnees);
		$donnees=stripslashes($donnees);
		$donnees=htmlspecialchars($donnees);
		return $donnees;
	}	

    function validerPseudoMdp($pseudoMdp){
        if(strlen($pseudoMdp) <= 40 && strlen($pseudoMdp) >= 3){
            return TRUE;
        }
        return FALSE;
      }
    //Création d'un compte
    if(isset($_POST['valider'])) {                           
        $pseudo = nettoyer_donnees($_POST['pseudo']);

        // Vérifier si le pseudo est déjà utilisé
        $query = $conn->prepare("SELECT COUNT(*) FROM profil WHERE Pseudo = :pseudo"); 
        $query->bindParam(':pseudo', $pseudo); 
        $query->execute(); 
        $count = $query->fetchColumn();

        if($count > 0) {
            // Message d'erreur si  déjà utilisé
            header('Location: fail.php?err=pseudoUsed');
        } else {
            // Insérer si  n'est pas déjà utilisé
            $courriel = nettoyer_donnees($_POST['mail']);
            $password = nettoyer_donnees($_POST['mdp']);
            if(validerPseudoMdp($pseudo) == FALSE || validerPseudoMdp($password) == FALSE || $password != nettoyer_donnees($_POST['confirm'])) {
                header('Location: fail.php?err=falsePswd');
                exit();
            }

            $sql = $conn->prepare("INSERT INTO `profil`(`Pseudo`,`Mail`, `Mdp`) 
                                VALUES (:psd, :mail, :mdp)" );
            $sql->execute(array(
                ':psd' => $pseudo,
                ':mail' => $courriel,
                ':mdp' => $password
            ));
            setcookie("pseudo", $pseudo, time() + 365*24*3600);
            setcookie("password", $password, time() + 365*24*3600);
            header('Location: login.php');
        }
    }
    //Connexion
    if(isset($_POST['connecter'])) {                         
        $pseudo = nettoyer_donnees($_POST['pseudo']); 
        $password = nettoyer_donnees($_POST['mdp']);
     // Vérifier la crorrespondance entre le pseudo et le mot de passe et si c'est un compte utilisateur ou admin
     // vérifier la variable admin 2 si c'est un admin 0 si c'est un utilisateur 1 si c'est un bar
        $result = $conn->prepare('SELECT * FROM profil where Pseudo = ? AND Mdp = ? '); 
        $result->execute(array($pseudo, $password));
        if(validerPseudoMdp($pseudo) == TRUE && validerPseudoMdp($password) == TRUE && $result->rowCount() > 0) {
            $_SESSION['Pseudo'] = $pseudo;
            $_SESSION['Mdp'] = $password;
            $result = $conn->prepare('SELECT Admin FROM profil where Pseudo = ? AND Mdp = ? ');
            $result->execute(array($pseudo, $password));
            $admin = $result->fetchColumn();
            $_SESSION['admin'] = $admin;
            $_SESSION['authentifie'] = true;
            $result = $conn->prepare('SELECT Id FROM profil where Pseudo = ?');
            $result->execute(array($pseudo));
            $id = $result->fetchColumn();
            $_SESSION['Id'] = $id;
            setcookie("pseudo", $pseudo, time() + 365*24*3600);
            setcookie("password", $password, time() + 365*24*3600);
            header('Location: index.php');
        } else {
            header('Location: fail.php?err=falsePsdPswd');
        }
    }
    // Variable de sesion du profil
    if(isset($_SESSION['Id'])) {
        $id = $_SESSION['Id'];
        $stmt = $conn->prepare("SELECT * FROM profil WHERE Id = ?");
        $stmt->execute([$id]);
        $profil = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($profil) {
            $_SESSION['tribu'] = $profil['Tribu'];
            $_SESSION['force'] = $profil['Force'];
            $_SESSION['compagnon'] = $profil['Compagnon'];
            $_SESSION['phrase'] = $profil['Phrase'];
        }
    }
	

    // Enregistrement des modifications du profil
    if (isset($_POST['save_profile'])) {
      $_SESSION['tribu'] = $_POST['tribu'];
      $_SESSION['force'] = $_POST['force'];
      $_SESSION['compagnon'] = $_POST['compagnon'];
      $_SESSION['phrase'] = $_POST['phrase'];
      $photo = $_POST['photo'] ?? '';
    if (preg_match('/pp(\d+)\.jpg/', $photo, $matches)) {
        $id_photo = $matches[1];  // juste le chiffre
    } else {
        $id_photo = 0; // par exemple, valeur par défaut
    }
    $_SESSION['id_photo'] = $id_photo; // et le chiffre séparé

      // On revient à l'affichage classique après enregistrement
      $stmt = $conn->prepare("UPDATE profil SET Id_avatar = ?, Tribu = ?, `Force` = ?, Compagnon = ?, Phrase = ? WHERE Id = ?");
      $stmt->execute([$_SESSION['id_photo'], $_SESSION['tribu'], $_SESSION['force'], $_SESSION['compagnon'], $_SESSION['phrase'], $_SESSION['Id']]);
      // Redirection pour éviter la resoumission du formulaire
      header('Location: profil.php');
      
    }
    
    


?>