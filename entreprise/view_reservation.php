<?php
// Import the config file for database connection
include '../config/config.php';
// Fetch the reservation ID from the URL (e.g., view_reservation.php?id=1)
$reservationId = isset($_GET['id']) ? $_GET['id'] : null;

// If no reservation ID is provided, exit with an error
if ($reservationId === null) {
    echo "Erreur: Aucun ID de réservation fourni.";
    exit;
}

// SQL query to get the reservation details
$sql = "SELECT * FROM reservation WHERE id_reservation = :id_reservation";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_reservation', $reservationId, PDO::PARAM_INT);
$stmt->execute();

// Fetch the reservation data
$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the reservation exists
if ($reservation === false) {
    echo "Réservation introuvable.";
    exit;
}
?>

<p><strong>ID de la réservation:</strong> <?= htmlspecialchars($reservation['id_reservation']) ?></p>
<p><strong>Date:</strong> <?= htmlspecialchars($reservation['date']) ?></p>
<p><strong>Wilaya:</strong> <?= htmlspecialchars($reservation['wilaya']) ?></p>
<p><strong>Statut:</strong> <?= htmlspecialchars($reservation['status']) ?></p>
<p><strong>Adresse actuelle:</strong> <?= htmlspecialchars($reservation['currentAddress']) ?></p>
<p><strong>Nouvelle adresse:</strong> <?= htmlspecialchars($reservation['newAddress']) ?></p>
<p><strong>Téléphone:</strong> <?= htmlspecialchars($reservation['phone']) ?></p>
<p><strong>Nom:</strong> <?= htmlspecialchars($reservation['name']) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($reservation['email']) ?></p>
<p><strong>Détails:</strong> <?= nl2br(htmlspecialchars($reservation['details'])) ?></p>
<p><strong>Message:</strong> <?= nl2br(htmlspecialchars($reservation['message'])) ?></p>
<p><strong>Chauffeur ID:</strong> <?= htmlspecialchars($reservation['id_chauffeur']) ?></p>
<p><strong>Entreprise ID:</strong> <?= htmlspecialchars($reservation['id_entreprise']) ?></p>
<p><strong>Utilisateur ID:</strong> <?= htmlspecialchars($reservation['id_utilisateur']) ?></p>
<p><strong>Tarif:</strong> <?= htmlspecialchars($reservation['tarif']) ?></p>
<p><strong>Status Chauffeur:</strong> <?= htmlspecialchars($reservation['status_ch']) ?></p>
<p><strong>Heure:</strong> <?= htmlspecialchars($reservation['time']) ?></p>