<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres - Dashboard Entreprise Partenaire</title>
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
            <a href="commandes_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
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
            <a href="parametres_entreprise.html" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètre</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    
    <main class="flex-1 p-6 space-y-6">
      <h1 class="text-3xl font-semibold">Paramètres</h1>
      <!-- Bloc Données personnelles -->
      <section class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Données Personnelles</h2>
        <p><strong>Nom :</strong> Entreprise Partenaire XYZ</p>
        <p><strong>Email :</strong> contact@entreprisexyz.com</p>
        <div class="mt-4">
          <a href="modifier_donne_perso_entreprise.html" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Modifier mes données</a>
        </div>
      </section>
      <!-- Autres blocs de paramètres peuvent être ajoutés ici -->
    </main>
  </div>
</body>
</html>
