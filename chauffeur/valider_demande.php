<?php
session_start();
require_once __DIR__ . '/../config/config.php';

// Vérifie que le formulaire est bien envoyé et que l'id de la réservation est présent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_reservation']) && !empty($_POST['id_reservation'])) {
    // Récupère l'id de la réservation
    $id_reservation = $_POST['id_reservation'];

    // Prépare la requête pour mettre à jour le statut de confirmation
    $sql = "UPDATE reservation SET confirmation = 'validée' WHERE id_reservation = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_reservation]);

    // Rediriger vers la page des paramètres après la mise à jour
    header('Location: parametres_chauffeur.php');
    exit();
} else {
    // Affiche une erreur si l'ID de réservation est manquant ou incorrect
    echo "Erreur : Données non valides. Assurez-vous que l'ID de réservation est correctement envoyé.";
}

// Debug : Affichage de ce qui est envoyé dans le formulaire (pour les tests)
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
