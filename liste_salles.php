<?php
$host = "localhost";
$dbname = "salleDB";
$username = "webuser";
$password = "motdepasse123";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}

$req = $db->query("SELECT * FROM salles");
$salles = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des salles</title>
</head>
<body>
    <h1>Liste des salles</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Capacité</th>
        </tr>

        <?php foreach ($salles as $salle): ?>
        <tr>
            <td><?= $salle['id'] ?></td>
            <td><?= $salle['nom'] ?></td>
            <td><?= $salle['capacite'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="ajout_salle.php">Ajouter une salle</a>
</body>
</html>
