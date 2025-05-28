<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Gestion des utilisateurs</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php include '../php/header.php'; ?>
<?php 

    if (!isset($_SESSION['authentifie']) || $_SESSION['authentifie'] !== true || $_SESSION['admin'] != 2) {
        header("Location:../php/index.php");
        exit();
    }

    require("../Amis/connexion.php");

    if (isset($_GET['supprimer_avis']) && is_numeric($_GET['supprimer_avis'])) {
        $stmt = $conn->prepare("DELETE FROM avis WHERE Id_avis = ?");
        $stmt->execute([$_GET['supprimer_avis']]);
    }

    if (isset($_GET['supprimer_user']) && is_numeric($_GET['supprimer_user'])) {
        $conn->prepare("DELETE FROM avis WHERE Id_profil = ?")->execute([$_GET['supprimer_user']]);
        $conn->prepare("DELETE FROM profil WHERE Id = ?")->execute([$_GET['supprimer_user']]);
    }

    $searchedPseudo = $_GET['rechercher'] ?? '';
    $userData = null;
    $userAvis = [];

    if (!empty($searchedPseudo)) {
        $stmtUser = $conn->prepare("SELECT Id, Mail, Pseudo, Admin FROM profil WHERE Pseudo = ?");
        $stmtUser->execute([$searchedPseudo]);
        $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $stmtAvis = $conn->prepare("SELECT * FROM avis WHERE Id_profil = ?");
            $stmtAvis->execute([$userData['Id']]);
            $userAvis = $stmtAvis->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
<div class="admin-container">
    <h1>Panneau d'administration</h1>

    <section class="search-section">
        <h2>Rechercher un utilisateur</h2>
        <form method="get">
            <input type="text" name="rechercher" placeholder="Pseudo..." value="<?= htmlspecialchars($searchedPseudo) ?>" required>
            <button type="submit">Rechercher</button>
        </form>

        <?php if ($userData): ?>
            <div class="user-info">
                <h3><?= htmlspecialchars($userData['Pseudo']) ?> (<?= $userData['Mail'] ?>)</h3>
                <p>Statut : <strong><?= $userData['Admin'] ? 'Administrateur' : 'Utilisateur' ?></strong></p>
				<br><br>
                <a href="?supprimer_user=<?= $userData['Id'] ?>" class="btn delete" onclick="return confirm('Supprimer ce compte et tous ses avis ?')">Supprimer ce compte</a>
                <h4>Ses avis :</h4>
                <?php if ($userAvis): ?>
                    <ul>
                        <?php foreach ($userAvis as $avis): ?>
                            <li>
                                <strong><?= htmlspecialchars($avis['Nom_bar']) ?> :</strong> <?= htmlspecialchars($avis['avis']) ?>
								<br><br>
                                <a class="btn small delete" href="?rechercher=<?= urlencode($userData['Pseudo']) ?>&supprimer_avis=<?= $avis['Id_avis'] ?>" onclick="return confirm('Supprimer cet avis ?')">Supprimer</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Aucun avis trouvé.</p>
                <?php endif; ?>
            </div>
        <?php elseif (!empty($searchedPseudo)): ?>
            <p>Aucun utilisateur trouvé avec ce pseudo.</p>
        <?php endif; ?>
    </section>

    <section class="all-users">
        <h2>Liste des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Pseudo</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT Id, Mail, Pseudo, Admin FROM profil");
                while ($u = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $u['Id'] ?></td>
                        <td><?= $u['Mail'] ?></td>
                        <td><?= $u['Pseudo'] ?></td>
                        <td><?= $u['Admin'] ? 'Oui' : 'Non' ?></td>
                        <td>
                            <a href="modifier.php?identifiant=<?= $u['Id'] ?>&admin=<?= $u['Admin'] ? 'oui' : 'non' ?>">
                                <?= $u['Admin'] ? 'Retirer Admin' : 'Passer Admin' ?>
                            </a> |
                            <a href="supprimer.php?identifiant=<?= $u['Id'] ?>&type=user" class="delete">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</div>
</body>
</html>""
