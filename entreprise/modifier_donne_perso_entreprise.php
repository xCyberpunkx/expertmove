<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier Données Personnelles - Dashboard Entreprise Partenaire</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Entreprise Partenaire</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres_entreprise.html" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètre</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Modifier Mes Données Personnelles</h1>
      <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <div class="mb-4">
          <label for="company-name" class="block text-lg font-medium mb-2">Nom de l’Entreprise</label>
          <input type="text" id="company-name" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="Entreprise Partenaire XYZ">
        </div>
        <div class="mb-4">
          <label for="company-email" class="block text-lg font-medium mb-2">Email</label>
          <input type="email" id="company-email" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="contact@entreprisexyz.com">
        </div>
        <div class="mb-4">
          <label for="company-phone" class="block text-lg font-medium mb-2">Téléphone</label>
          <input type="text" id="company-phone" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="+213 987 654 321">
        </div>
        <div class="flex space-x-2">
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Enregistrer</button>
          <a href="parametres_entreprise.html" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
