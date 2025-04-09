<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Afficher Message - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale commune -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Pro</h2>
      <nav>
        <ul>
          <li class="mb-4"><a href="dashboard (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">dashboard</span><span class="ml-2">Tableau de bord</span></a></li>
          <li class="mb-4"><a href="messagerie.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">chat</span><span class="ml-2">Messagerie</span></a></li>
          <!-- Autres liens... -->
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Détails du Message</h1>
      <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Message de Jean Dupont</h2>
        <p><strong>Contenu : </strong>Demande de devis gratuit pour un déménagement.</p>
        <div class="mt-4">
          <a href="messagerie.php" class="px-4 py-2 bg-gray-500 text-white rounded">Retour aux Messages</a>
        </div>
      </div>
    </main>
  </div>
</body>
</html>