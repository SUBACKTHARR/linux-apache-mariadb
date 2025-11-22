<?php
$host = "localhost";
$dbname = "salleDB";
$username = "webuser";
$password = "motdepasse123";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    echo "Connexion réussie à la base de données";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
