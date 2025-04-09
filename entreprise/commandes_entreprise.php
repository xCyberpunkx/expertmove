<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commandes - Dashboard Entreprise Partenaire</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale -->
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
            <a href="commandes_entreprise.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Commande</span>
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
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <!-- Titre et bouton de création -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Commandes</h1>
        <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Créer une nouvelle commande</button>
      </div>
      <!-- Tableau des commandes -->
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
          <tr>
            <td class="px-4 py-2">C001</td>
            <td class="px-4 py-2">2025-04-10</td>
            <td class="px-4 py-2">Alger</td>
            <td class="px-4 py-2">En attente</td>
            <td class="px-4 py-2 space-x-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded">Afficher</button>
              <button class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</button>
              <button onclick="confirmDeletion()" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
            </td>
          </tr>
          <!-- Autres lignes... -->
        </tbody>
      </table>
    </main>
  </div>
  <script>
    function confirmDeletion() {
      if(confirm('Voulez-vous vraiment supprimer cette commande ? Cette action est irréversible.')) {
        alert('Commande supprimée.');
        // Redirection ou logique de suppression ici
      }
    }
  </script>
</body>
</html>
