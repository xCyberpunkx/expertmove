<?php
include '../config/config.php';

if (!isset($_GET['id'])) {
    die("ID non fourni.");
}

$id_reservation = $_GET['id'];

try {
    // Delete reservation
    $stmt = $pdo->prepare("DELETE FROM reservation WHERE id_reservation = ?");
    $stmt->execute([$id_reservation]);

    // Redirect after successful deletion
    header("Location: list_reservations.php?deleted=1");
    exit;
} catch (PDOException $e) {
    die("Erreur de suppression : " . $e->getMessage());
}
?>
