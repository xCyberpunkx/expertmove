<?php
session_start();
require_once __DIR__ . '/../config/config.php';



$id_chauffeur = $_SESSION['user_id'];

// Requête pour récupérer les demandes non validées
$sql = "SELECT * FROM reservation WHERE status_ch = 'validée' AND confirmation != 'validée' AND id_chauffeur = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]); // Assurez-vous d'utiliser l'ID du chauffeur connecté
$demandes = $stmt->fetchAll();



?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres - Dashboard Chauffeur</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Chauffeur Pro</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard_chauffeur.php"
              class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="demandes_chauffeurr.php"
              class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Mes Demandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="profil_chauffeur.php"
              class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Mon Profil</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres_chauffeur.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <main class="flex-1 p-6 space-y-6">
      <?php
    // Affichage des demandes
   
foreach ($demandes as $demande) {
  echo "<div class='bg-gray-100 p-4 rounded-md mb-4'>
          
          <p><strong>ID Client :</strong> {$demande['name']}</p>
          <p><strong>email :</strong> {$demande['email']}</p>
          <p><strong>phone :</strong> {$demande['phone']}</p>
          <p><strong>Adresse de départ :</strong> {$demande['currentAddress']}</p>
          <p><strong>Adresse de destination :</strong> {$demande['newAddress']}</p>
          <p><strong>tarif :</strong> {$demande['tarif']}</p>
          <p><strong>time :</strong> {$demande['time']}</p>
          <p><strong>details :</strong> {$demande['details']}</p>
          <p><strong>message :</strong> {$demande['message']}</p>
          <div class='mt-4 flex space-x-4'>
              <!-- Formulaire pour valider la demande -->
              <form action='valider_demande.php' method='post'>
                  <input type='hidden' name='id_reservation' value='{$demande['id_reservation']}'>
                  <button class='px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600'>Valider la Demande</button>
              </form>
              <!-- Formulaire pour annuler la demande -->
              <form action='annuler_demande.php' method='post'>
                  <input type='hidden' name='id_reservation' value='{$demande['id_reservation']}'>
                  <button class='px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600'>Annuler la Demande</button>
              </form>
          </div>
        </div>";
}   ?>
      </section>
    </main>
  </div>
</body>

</html>
