<?php
$host = "localhost"; // ou l'adresse de ton serveur
$user = "root"; // remplace par ton utilisateur MySQL
$pass = ""; // remplace par ton mot de passe MySQL
$dbname = "expertmove";

$conn = new mysqli($host, $user, $pass, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
