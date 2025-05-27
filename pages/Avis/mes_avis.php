<?php
require("../Amis/connexion.php");
session_start();

if (!isset($_SESSION['Id'])) {
    header("Location: ../php/login.php");
    exit();
}
//Moyenne des notes par bar de la table avis / update table bar avis=moyenne pour chaque bar avec commentaire a chaque ligne
    $sqlUpdate = "UPDATE bar 
                SET avis = (SELECT AVG(note) FROM avis WHERE avis.Nom_bar = bar.Nom)
                WHERE EXISTS (SELECT 1 FROM avis WHERE avis.Nom_bar = bar.Nom)";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->execute();
    




             
// Suppression d'un avis
if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $idAvis = intval($_GET['supprimer']);
    $idUser = $_SESSION['Id'];

    $sqlDelete = "DELETE FROM avis WHERE Id_avis = :idAvis AND Id_profil = :idUser";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bindParam(':idAvis', $idAvis);
    $stmtDelete->bindParam(':idUser', $idUser);
    $stmtDelete->execute();

    header("Location: mes_avis.php?onglet=mes");
    exit();
}

// Récupération des avis
$idUser = $_SESSION['Id'];
$stmtAmis = $conn->prepare("SELECT Ami1, Ami2, Ami3, Ami4, Ami5, Ami6, Ami7, Ami8, Ami9, Ami10 FROM profil WHERE Id = ?");
$stmtAmis->execute([$idUser]);
$amis = $stmtAmis->fetch(PDO::FETCH_ASSOC);
$idsAmis = array_filter($amis); // supprime les NULL


// Recherche et tri pour avis communauté
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';

if ($sort === 'amis') {
    if (!empty($idsAmis)) {
        $placeholders = implode(',', array_fill(0, count($idsAmis), '?'));

        $baseQuery = "SELECT avis.*, profil.Pseudo, bar.avis AS moyenne_bar
                      FROM avis
                      JOIN profil ON avis.Id_profil = profil.Id
                      JOIN bar ON avis.Nom_bar = bar.Nom
                      WHERE avis.Id_profil IN ($placeholders)
                      AND avis.Nom_bar LIKE ?";

        $stmtComm = $conn->prepare($baseQuery);
        $params = array_values($idsAmis);
        $params[] = '%' . $search . '%';
        $stmtComm->execute($params);
        $avisCommunaute = $stmtComm->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $avisCommunaute = []; // Aucun ami → aucun avis
    }
} else {
    $baseQuery = "SELECT avis.*, profil.Pseudo, bar.avis AS moyenne_bar
                  FROM avis 
                  JOIN profil ON avis.Id_profil = profil.Id
                  JOIN bar ON avis.Nom_bar = bar.Nom
                  WHERE avis.Nom_bar LIKE :search";

    if ($sort === 'note') {
        $baseQuery .= " ORDER BY note DESC";
    } elseif ($sort === 'date') {
        $baseQuery .= " ORDER BY Date_avis DESC";
    }

    $stmtComm = $conn->prepare($baseQuery);
    $searchParam = '%' . $search . '%';
    $stmtComm->bindParam(':search', $searchParam);
    $stmtComm->execute();
    $avisCommunaute = $stmtComm->fetchAll(PDO::FETCH_ASSOC);
}



// Tri des avis personnels
$sortMes = $_GET['sort-mes'] ?? '';
$orderBy = '';
if ($sortMes === 'note') {
    $orderBy = ' ORDER BY note DESC';
} elseif ($sortMes === 'date') {
    $orderBy = ' ORDER BY Date_avis DESC';
}

$stmtPerso = $conn->prepare("SELECT * FROM avis WHERE Id_profil = :id_user" . $orderBy);
$stmtPerso->bindParam(':id_user', $idUser);
$stmtPerso->execute();
$mesAvis = $stmtPerso->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Gazette des Gaulois</title>
    <link rel="stylesheet" href="mes_avis.css">
</head>
<body>
<?php include '../php/header.php'; ?>
<div class="container">
    <h1>La Gazette des Gaulois</h1>

    <div class="tabs">
        <button class="tab-button" id="tab-commu">Les potins du village</button>
        <button class="tab-button" id="tab-mes">Mes exploits héroïques</button>
    </div>

    <div class="section" id="commu-section">
        <form method="get" class="search-sort">
            <input type="text" name="search" placeholder="Chercher un bistrot ou une taverne..." value="<?= htmlspecialchars($search) ?>">
            <select name="sort">
                <option value="">-- Trier comme Panoramix --</option>
                <option value="note" <?= $sort === 'note' ? 'selected' : '' ?>>Par potion magique (note)</option>
                <option value="date" <?= $sort === 'date' ? 'selected' : '' ?>>Par fresque du druide (date)</option>
                <option value="amis" <?= $sort === 'amis' ? 'selected' : '' ?>>Par mes amis gaulois</option>

            </select>
            <button class="add-button"  type="submit">Chercher</button>
        </form>

        <?php if ($avisCommunaute): ?>
            <?php if (!empty($search) && count($avisCommunaute) > 0): ?>
    <div class="moyenne-bar" style="margin-bottom: 15px;">
        <strong>Le "<?= htmlspecialchars($avisCommunaute[0]['Nom_bar']) ?>" posséde :</strong>
        <span class="note">
            <?php 
            $moyenne = round($avisCommunaute[0]['moyenne_bar']);
            for ($i = 0; $i < $moyenne; $i++) {
                echo '<img src="../../img/gourde.png" alt="gourde pleine" style="width:20px; height:auto; vertical-align:middle; margin-right:2px;">';
            }
            ?>
        </span> 

    </div>
<?php endif; ?>

    <?php foreach ($avisCommunaute as $a): ?>
                <div class="avis">
                <h3>
                    <?= htmlspecialchars($a['Nom_bar']) ?>
                    <span class="note">
                        <?php 
                        $note = (int)$a['note'];
                        for ($i = 0; $i < $note; $i++) {
                            echo '<img src="../../img/gourde.png" alt="gourde pleine" style="width:20px; height:auto; vertical-align:middle; margin-right:2px;">';
                        }
                        for ($i = $note; $i < 5; $i++) {
                            echo '<img src="../../img/gourde_black.png" alt="gourde vide" style="width:20px; height:auto; vertical-align:middle; margin-right:2px;">';
                        }
                        ?>
                    </span>
                    <span class="date-avis"><?= date('d/m/Y', strtotime($a['date_avis'])) ?></span>
                </h3>
                    <p><?= nl2br(htmlspecialchars($a['avis'])) ?></p>
                    <p><em>Signé par le gaulois <?= htmlspecialchars($a['Pseudo']) ?></em></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Le village est calme, aucun potin pour le moment.</p>
        <?php endif; ?>
    </div>

    <div class="section" id="mes-section">
        <form method="get" class="sort-mes">
            <input type="hidden" name="onglet" value="mes">
            <label for="sort-mes">Trier mes exploits :</label>
            <select name="sort-mes" id="sort-mes" onchange="this.form.submit()">
                <option value="">-- Choisir un tri --</option>
                <option value="note" <?= ($sortMes === 'note') ? 'selected' : '' ?>>Par note</option>
                <option value="date" <?= ($sortMes === 'date') ? 'selected' : '' ?>>Par date</option>
            </select>
        </form>

        <?php if ($mesAvis): ?>
            <?php foreach ($mesAvis as $a): ?>
                <div class="avis">
                <h3>
                    <?= htmlspecialchars($a['Nom_bar']) ?>
                    <span class="note">
                        <?php 
                        $note = (int)$a['note'];
                        for ($i = 0; $i < $note; $i++) {
                            echo '<img src="../../img/gourde.png" alt="gourde pleine" style="width:20px; height:auto; vertical-align:middle; margin-right:2px;">';
                        }
                        for ($i = $note; $i < 5; $i++) {
                            echo '<img src="../../img/gourde_black.png" alt="gourde vide" style="width:20px; height:auto; vertical-align:middle; margin-right:2px;">';
                        }
                        ?>
                    </span>
                    <span class="date-avis"><?= date('d/m/Y', strtotime($a['date_avis'])) ?></span>
                </h3>
                    <p><?= nl2br(htmlspecialchars($a['avis'])) ?></p>
                    <form method="GET" onsubmit="return confirm('Voulez-vous vraiment effacer cet exploit ?');">
                        <input type="hidden" name="supprimer" value="<?= $a['Id_avis'] ?>">
                        <button type="submit" class="delete-button">Effacer cet exploit</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tu n'as encore raconté aucun exploit au village.</p>
        <?php endif; ?>

        <button class="add-button" onclick="window.location.href='ajouter_avis.php'">+ Raconter un nouvel exploit</button>
    </div>
</div>

<script>
    const tabCommu = document.getElementById('tab-commu');
    const tabMes = document.getElementById('tab-mes');
    const sectionCommu = document.getElementById('commu-section');
    const sectionMes = document.getElementById('mes-section');

    function showTab(which) {
        tabCommu.classList.remove('active');
        tabMes.classList.remove('active');
        sectionCommu.classList.remove('active');
        sectionMes.classList.remove('active');

        if (which === 'commu') {
            tabCommu.classList.add('active');
            sectionCommu.classList.add('active');
        } else {
            tabMes.classList.add('active');
            sectionMes.classList.add('active');
        }
    }

    tabCommu.addEventListener('click', () => showTab('commu'));
    tabMes.addEventListener('click', () => showTab('mes'));

    const params = new URLSearchParams(window.location.search);
    const onglet = params.get('onglet');
    showTab(onglet === 'mes' ? 'mes' : 'commu');
</script>
</body>
</html>
