<?php
include '../config/config.php';

if (!isset($_GET['id'])) {
    die("ID non fourni.");
}

$id_reservation = $_GET['id'];  // Change this to `id_reservation`

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $date = $_POST['date'];
    $wilaya = $_POST['wilaya'];
    $status = $_POST['status'];

    try {
        // Update query with the correct column name (id_reservation)
        $stmt = $pdo->prepare("UPDATE reservation SET date = ?, wilaya = ?, status = ? WHERE id_reservation = ?");
        $stmt->execute([$date, $wilaya, $status, $id_reservation]);
        header("Location: list_reservations.php?updated=1");
        exit;
    } catch (PDOException $e) {
        die("Erreur de mise à jour : " . $e->getMessage());
    }
}

// Fetch reservation to edit
$stmt = $pdo->prepare("SELECT * FROM reservation WHERE id_reservation = ?");  // Change to `id_reservation`
$stmt->execute([$id_reservation]);
$reservation = $stmt->fetch();

if (!$reservation) {
    die("Réservation introuvable.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier la réservation</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="max-w-2xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Modifier la commande</h1>
    <form method="POST">
      <div class="mb-4">
        <label for="date" class="block mb-1">Date</label>
        <input type="date" name="date" id="date" value="<?= htmlspecialchars($reservation['date']) ?>" class="w-full px-3 py-2 rounded bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
      </div>
      <div class="mb-4">
        <label for="wilaya" class="block mb-1">Wilaya</label>
        <input type="text" name="wilaya" id="wilaya" value="<?= htmlspecialchars($reservation['wilaya']) ?>" class="w-full px-3 py-2 rounded bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
      </div>
      <div class="mb-4">
        <label for="status" class="block mb-1">Statut</label>
        <select name="status" id="status" class="w-full px-3 py-2 rounded bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
          <option value="En attente" <?= $reservation['status'] === 'En attente' ? 'selected' : '' ?>>En attente</option>
          <option value="Confirmée" <?= $reservation['status'] === 'Confirmée' ? 'selected' : '' ?>>Confirmée</option>
          <option value="Annulée" <?= $reservation['status'] === 'Annulée' ? 'selected' : '' ?>>Annulée</option>
        </select>
      </div>
      <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Mettre à jour</button>
    </form>
  </div>
</body>
</html>
