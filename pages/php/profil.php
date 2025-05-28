<?php
session_start();

if (isset($_POST['save_profile'])) {
  $_SESSION['tribu'] = $_POST['tribu'];
  $_SESSION['force'] = $_POST['force'];
  $_SESSION['compagnon'] = $_POST['compagnon'];
  $_SESSION['phrase'] = $_POST['phrase'];
  // On revient à l'affichage classique après enregistrement
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Gaulois</title>
  <link rel="stylesheet" href="../../css/profil.css" />
  <style>
    #formulaire-modif { display: none; margin-bottom: 2em; }
    button { 
      margin: 10px auto 0;
      display: block;
      background: #d35400;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="parchemin">
    <header>
      <h1>⚔️ Profil de Gaulois : <?php echo htmlspecialchars($_SESSION['Pseudo']); ?></h1>
    </header>
    <?php
    require("../Amis/connexion.php");
    try {
                $vId = $_SESSION['Id'];
                $reqPrep = "SELECT * FROM profil WHERE Id = :id";
                $req = $conn->prepare($reqPrep);
                $req->bindParam(':id', $vId);
                $req->execute();
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $e) {
                die("Erreur : " . $e->getMessage());
    } finally {
                $conn = null; // Fermer la connexion à la base de données
    }
    ?>

    <section class="profil">
      <img src='../../img/pp<?php echo $resultat["Id_avatar"]; ?>.jpg' alt='Profile Image' class='portrait'>

      <!-- Affichage classique -->
      <div id="affichage-profil">
        <div class="infos">
          <h2>Nom : <?php echo htmlspecialchars($_SESSION['Pseudo']); ?></h2>
          <p> <strong>Id :</strong> <?php echo htmlspecialchars($_SESSION['Id']) ?> </p>
          <p><strong>Tribu :</strong> <?php echo htmlspecialchars($_SESSION['tribu'] ); ?></p> 
          <p><strong>Force spéciale :</strong> <?php echo htmlspecialchars($_SESSION['force'] ); ?></p>  
          <p><strong>Compagnon :</strong> <?php echo htmlspecialchars($_SESSION['compagnon'] ); ?></p>
          <p><strong>Phrase culte :</strong> <?php echo htmlspecialchars($_SESSION['phrase'] ); ?></p>
        </div>
        <button id="btnModifier">Modifier</button>
      </div>

      <!-- Formulaire caché -->
      <form id="formulaire-modif" method="post" action="form.php">
        <h2>Modifier ton profil</h2>
        <label>Choisis ta photo :</label><br />
        <div class="photo-select">
          <?php
          $photos = [
            "pp0.jpg",
            "pp1.jpg",
            "pp2.jpg",
            "pp3.jpg",
            "pp4.jpg",
            "pp5.jpg",
            "pp6.jpg",
            "pp7.jpg",
            "pp8.jpg",
          ];

          $currentPhoto = $_SESSION['photo'] ?? $photos[0];

          foreach ($photos as $photo) {
            $checked = ($currentPhoto === $photo) ? 'checked' : '';
            echo '<label style="cursor:pointer; display:inline-block; margin:5px; border: 2px solid transparent; border-radius: 8px;">';
            echo '<input type="radio" name="photo" value="' . htmlspecialchars($photo) . '" ' . $checked . ' style="display:none;" />';
            echo '<img src="../../img/' . htmlspecialchars($photo) . '" alt="' . htmlspecialchars($photo) . '" style="width:80px; height:80px; object-fit:cover; border-radius:8px;" />';
            echo '</label>';
          }
          ?>
        </div>

        <style>
          .photo-select input[type="radio"]:checked + img {
            border: 3px solid #d35400;
          }
        </style><br /><br />

        <label for="tribu">Choisis ta tribu :</label><br />
        <select name="tribu" id="tribu" required>
          <?php
          $tribus = [
            "Les Irréductibles Gaulois",
            "Les Normands",
            "Les Germains",
            "Les Belges",
            "Les Helvètes",
            "Les Ibères",
            "Les Corses",
            "Les Égyptiens",
            "Les Vikings"
          ];
          foreach ($tribus as $tribu) {
            $selected = (isset($_SESSION['tribu']) && $_SESSION['tribu'] === $tribu) ? 'selected' : '';
            echo "<option value=\"$tribu\" $selected>$tribu</option>";
          }
          ?>
        </select><br /><br />

        <label for="force">Force spéciale :</label><br />
        <select name="force" id="force" required>
          <?php
          $forces = [
            "Buveur de potion magique ",
            "Force surhumaine",
            "Grand stratège",
            "Courage exceptionnel"
          ];
          foreach ($forces as $force) {
            $selected = (isset($_SESSION['force']) && $_SESSION['force'] === $force) ? 'selected' : '';
            echo "<option value=\"$force\" $selected>$force</option>";
          }
          ?>
        </select><br /><br />

        <label for="compagnon">Compagnon :</label><br />
        <select name="compagnon" id="compagnon" required>
          <?php
          $compagnons = [
            "Obélix (et Idéfix )",
            "Panoramix",
            "Assurancetourix",
            "Abraracourcix",
            "Cétautomatix",
            "Bonemine",
            "Ordralfabétix",
            "Agecanonix",
            "Goudurix"
          ];
          foreach ($compagnons as $compagnon) {
            $selected = (isset($_SESSION['compagnon']) && $_SESSION['compagnon'] === $compagnon) ? 'selected' : '';
            echo "<option value=\"$compagnon\" $selected>$compagnon</option>";
          }
          ?>
        </select><br /><br />

        <label for="phrase">Phrase culte :</label><br />
        <select name="phrase" id="phrase" required>
          <?php
          $phrases = [
            "Ils sont fous ces Romains !",
            "Par Toutatis !",
            "La potion magique, c’est sacré !",
            "Je suis pas gros, je suis juste un peu enveloppé.",
            "Où est mon menhir ?",
            "Il est énorme, ce menhir !",
            "C’est un coup de César !",
            "Moi, j’aime pas les sangliers… sauf ceux qu’on mange !",
            "Nom d’un Gaulois !",
            "Tu vas voir ce que tu vas voir !"
          ];
        

          foreach ($phrases as $phrase) {
            $selected = (isset($_SESSION['phrase']) && $_SESSION['phrase'] === $phrase) ? 'selected' : '';
            echo "<option value=\"$phrase\" $selected>$phrase</option>";
          }
          //Changer les valeur de sesion avant de les implémnenter dans la bdd
          $_SESSION['tribu'] = $_POST['tribu'] ?? $_SESSION['tribu'];
          $_SESSION['force'] = $_POST['force'] ?? $_SESSION['force'];
          $_SESSION['compagnon'] = $_POST['compagnon'] ?? $_SESSION['compagnon'];
          $_SESSION['phrase'] = $_POST['phrase'] ?? $_SESSION['phrase'];
          //Update la bdd
          ?>
        </select><br /><br />

        <button type="submit" name="save_profile">Enregistrer</button>
        <button type="button" id="btnAnnuler">Annuler</button>
      </form>
     
      



    </section>

    

    <script>
      const btnModifier = document.getElementById("btnModifier");
      const btnAnnuler = document.getElementById("btnAnnuler");
      const affichageProfil = document.getElementById("affichage-profil");
      const formulaireModif = document.getElementById("formulaire-modif");

      btnModifier.addEventListener("click", () => {
        affichageProfil.style.display = "none";
        formulaireModif.style.display = "block";
      });

      btnAnnuler.addEventListener("click", () => {
        formulaireModif.style.display = "none";
        affichageProfil.style.display = "block";
      });

      // Code existant pour les trophées
      const voirPlusBtn = document.getElementById("voirPlusBtn");
      const voirMoinsBtn = document.getElementById("voirMoinsBtn");
      const tropheesCaches = document.querySelectorAll(".trophee-cache");

      voirPlusBtn.addEventListener("click", () => {
        tropheesCaches.forEach(el => el.style.display = "block");
        voirPlusBtn.style.display = "none";
        voirMoinsBtn.style.display = "block";
      });

      voirMoinsBtn.addEventListener("click", () => {
        tropheesCaches.forEach(el => el.style.display = "none");
        voirPlusBtn.style.display = "block";
        voirMoinsBtn.style.display = "none";
      });
    </script>

    <footer>
      <p>© Village Gaulois - 50 avant J.C.</p>
    </footer>
  </div>
</body>
</html>