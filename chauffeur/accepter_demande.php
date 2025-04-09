<?php
session_start();
require('../config/config.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Aucune donnée de session trouvée. Veuillez vous connecter.";
    exit();
}

// Récupérer l'ID de la réservation et de chauffeur
$id_reservation = $_POST['id_reservation'];
$id_chauffeur = $_POST['id_chauffeur'];

// Vérifier que la demande n'a pas déjà été acceptée
$sql_check = "SELECT status_ch FROM reservation WHERE id_reservation = ? AND id_chauffeur IS NULL";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->execute([$id_reservation]);

$reservation = $stmt_check->fetch(PDO::FETCH_ASSOC);

if ($reservation && $reservation['status_ch'] !== 'validée') {
    // Mettre à jour le statut de la réservation et attribuer le chauffeur à cette demande
    $sql_update = "UPDATE reservation SET status_ch = 'validée', id_chauffeur = ? WHERE id_reservation = ?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute([$id_chauffeur, $id_reservation]);

    // Rediriger le chauffeur vers la page des demandes après l'acceptation
    header('Location: demandes_chauffeurr.php');
    exit();
} else {
    echo "Cette demande a déjà été acceptée ou n'est pas disponible.";
    exit();
}
// Vérifier que la demande n'a pas déjà été acceptée
$sql_check = "SELECT status_ch FROM reservation WHERE id_reservation = ?";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->execute([$id_reservation]);

$reservation = $stmt_check->fetch(PDO::FETCH_ASSOC);


?>
