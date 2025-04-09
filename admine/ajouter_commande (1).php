<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter Commande - Dashboard Déménagement</title>
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

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-4">Ajouter une nouvelle commande</h1>
      <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <div class="mb-4">
          <label for="order-id" class="block text-lg font-medium mb-2">ID Commande</label>
          <input type="text" id="order-id" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" placeholder="Ex: 005">
        </div>
        <div class="mb-4">
          <label for="order-date" class="block text-lg font-medium mb-2">Date</label>
          <input type="date" id="order-date" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
        </div>
        <div class="mb-4">
          <label for="order-wilaya" class="block text-lg font-medium mb-2">Wilaya</label>
          <select id="order-wilaya" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
            <option value="">Sélectionnez une wilaya</option>
            <!-- Liste (exemples) : vous pouvez ajouter la liste complète des 58 wilayas -->
            <option value="alger">Alger</option>
            <option value="adrar">Adrar</option>
            <option value="chlef">Chlef</option>
            <option value="relizane">Relizane</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="order-status" class="block text-lg font-medium mb-2">Statut</label>
          <select id="order-status" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
            <option value="">Sélectionnez le statut</option>
            <option value="en-attente">En attente</option>
            <option value="en-cours">En cours</option>
            <option value="termine">Terminé</option>
          </select>
        </div>
        <div class="flex space-x-2">
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Créer</button>
          <a href="commandes.html" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
