<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer Utilisateur - Dashboard Déménagement</title>
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
          <li class="mb-4"><a href="commandes.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">assignment</span><span class="ml-2">Commandes</span></a></li>
          <li class="mb-4"><a href="entreprisee .php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">business</span><span class="ml-2">Entreprise</span></a></li>
          <li class="mb-4"><a href="chauffeurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_shipping</span><span class="ml-2">Chauffeurs</span></a></li>
          
          <li class="mb-4"><a href="commentaire (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">comment</span><span class="ml-2">Commentaires</span></a></li>
          <li class="mb-4"><a href="offre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="user.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Créer un Nouveau Utilisateur</h1>
      <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <div class="mb-4">
          <label for="user-name" class="block text-lg font-medium mb-2">Nom</label>
          <input type="text" id="user-name" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" placeholder="Ex : Ahmed Benali">
        </div>
        <div class="mb-4">
          <label for="user-type" class="block text-lg font-medium mb-2">Type</label>
          <select id="user-type" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
            <option value="client">Client</option>
            <option value="chauffeur">Chauffeur</option>
            <option value="entreprise">Entreprise</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="user-email" class="block text-lg font-medium mb-2">Email</label>
          <input type="email" id="user-email" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" placeholder="exemple@domaine.com">
        </div>
        <div class="flex space-x-2">
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Créer</button>
          <a href="utilisateurs.php" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
        </div>
      </form>
    </main>
  </div>
</body>
</html>