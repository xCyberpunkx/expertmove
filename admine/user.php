<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Utilisateurs - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale commune -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Pro</h2>
      <nav>
      <ul>
    <li class="mb-4">
        <a href="dashboard (2).php" class="flex items-center p-2 <?php echo ($current_page == 'dashboard (2).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">dashboard</span>
            <span class="ml-2">Tableau de bord</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="commande.php" class="flex items-center p-2 <?php echo ($current_page == 'commande.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">assignment</span>
            <span class="ml-2">Commandes</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="entreprisee .php" class="flex items-center p-2 <?php echo ($current_page == 'entreprisee .php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">business</span>
            <span class="ml-2">Entreprise</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="chauffeurs.php" class="flex items-center p-2 <?php echo ($current_page == 'chauffeurs.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">local_shipping</span>
            <span class="ml-2">Chauffeurs</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="messagerie.php" class="flex items-center p-2 <?php echo ($current_page == 'messagerie.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">chat</span>
            <span class="ml-2">Messagerie</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="commentaire (1).php" class="flex items-center p-2 <?php echo ($current_page == 'commentaire (1).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">comment</span>
            <span class="ml-2">Commentaires</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="offre (1).php" class="flex items-center p-2 <?php echo ($current_page == 'offre (1).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">local_offer</span>
            <span class="ml-2">Offres</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="user.php" class="flex items-center p-2 <?php echo ($current_page == 'user.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">person</span>
            <span class="ml-2">Utilisateurs</span>
        </a>
    </li>
    <li class="mb-4">
        <a href="parametre (1).php" class="flex items-center p-2 <?php echo ($current_page == 'parametre (1).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
            <span class="material-icons">settings</span>
            <span class="ml-2">Paramètres</span>
        </a>
    </li>
</ul>
      </nav>
    </aside>

<?php
require('../config/config.php');

$utilisateurs = $pdo->query("SELECT id_utilisateur AS id, 'utilisateur' AS type, nom, email FROM utilisateur")->fetchAll(PDO::FETCH_ASSOC);
$chauffeurs = $pdo->query("SELECT id_chauffeur AS id, 'chauffeur' AS type, nom, email FROM chauffeur")->fetchAll(PDO::FETCH_ASSOC);
$entreprises = $pdo->query("SELECT id_entreprise AS id, 'entreprise' AS type, nom, email FROM entreprise")->fetchAll(PDO::FETCH_ASSOC);

// Combinaison des résultats
$users = array_merge($utilisateurs, $chauffeurs, $entreprises);
?>


    <main class="flex-1 p-6">
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Utilisateurs</h1>
    

      </div>
      <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <thead class="bg-gray-200 dark:bg-gray-700">
          <tr>
            <th class="px-4 py-2 text-left">id</th>
            <th class="px-4 py-2 text-left">Type</th>
            <th class="px-4 py-2 text-left">Nom</th>
            <th class="px-4 py-2 text-left">Email</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
  <?php foreach ($users as $user): ?>
  <tr class="user-row cursor-pointer" 
      data-id="<?= htmlspecialchars($user['id']); ?>" 
      data-type="<?= htmlspecialchars($user['type']); ?>">
    <td class="px-4 py-2"><?= htmlspecialchars($user['id']); ?></td>
    <td class="px-4 py-2"><?= htmlspecialchars($user['type']); ?></td>
    <td class="px-4 py-2"><?= htmlspecialchars($user['nom']); ?></td>
    <td class="px-4 py-2"><?= htmlspecialchars($user['email']); ?></td>
    <td class="px-4 py-2 space-x-2">
      <a href="modifier_user.php?id=<?= htmlspecialchars($user['id']); ?>&type=<?= htmlspecialchars($user['type']); ?>"
         class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</a>
      <a href="supprimer_user.php?id=<?= htmlspecialchars($user['id']); ?>&type=<?= htmlspecialchars($user['type']); ?>"
         class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</a>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>

        </tbody>
      </table>
    </main>
  </div>

