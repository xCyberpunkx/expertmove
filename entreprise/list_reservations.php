<?php
include '../config/config.php'; // include your PDO config file

try {
    $stmt = $pdo->query("SELECT * FROM reservation");
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des réservations : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commandes - Dashboard Entreprise Partenaire</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Sidebar (same as before) -->
    <!-- ... -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Entreprise Partenaire</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard_entreprise.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="list_reservations.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Commandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="profil_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Mon Profil</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres_entreprise.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètre</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Commandes</h1>
        <a href="create_reservation.php" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Créer une nouvelle commande</a>
      </div>

      <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow overflow-x-auto">
        <thead class="bg-gray-200 dark:bg-gray-700">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Date</th>
            <th class="px-4 py-2 text-left">Wilaya</th>
            <th class="px-4 py-2 text-left">Statut</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          <?php foreach ($reservations as $reservation): ?>
            <tr>
              <td class="px-4 py-2"><?= htmlspecialchars($reservation['id_reservation']) ?></td>
              <td class="px-4 py-2"><?= htmlspecialchars($reservation['date']) ?></td>
              <td class="px-4 py-2"><?= htmlspecialchars($reservation['wilaya']) ?></td>
              <td class="px-4 py-2"><?= htmlspecialchars($reservation['status'] ?? 'Inconnu') ?></td>
              <td class="px-4 py-2 space-x-2">
                <a href="show_reservation.php?id=<?= $reservation['id_reservation'] ?>" class="bg-blue-500 text-white px-3 py-1 rounded">Afficher</a>
                <a href="edit_reservation.php?id=<?= $reservation['id_reservation'] ?>" class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</a>
                <a href="delete_reservation.php?id=<?= $reservation['id_reservation'] ?>" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')">Supprimer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
