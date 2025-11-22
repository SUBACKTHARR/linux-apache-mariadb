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

if (!empty($_POST['nom']) && !empty($_POST['capacite'])) {

    $nom = $_POST['nom'];
    $capacite = (int)$_POST['capacite'];

    $stmt = $db->prepare("INSERT INTO salles(nom, capacite) VALUES (?, ?)");
    $stmt->execute([$nom, $capacite]);

    header("Location: liste_salles.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter une salle</title>
</head>
<body>
    <h1>Ajouter une salle</h1>

    <form method="post">
        Nom : <input type="text" name="nom" required><br><br>
        Capacité : <input type="number" name="capacite" required><br><br>
        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="liste_salles.php">Retour à la liste</a>
</body>
</html>
