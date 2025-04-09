<?php
session_start();
require('../config/config.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["user_id"])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: login.php");
    exit();
}

// Récupérer l'ID du chauffeur depuis la session
$chauffeur_id = $_SESSION["user_id"];

try {
    // Connexion à la base de données via PDO
    $sql = "SELECT nom, email, telephone, vehicule, photo FROM chauffeur WHERE id_chauffeur = :chauffeur_id";
    $stmt = $pdo->prepare($sql);
    
    // Lier le paramètre :chauffeur_id
    $stmt->bindParam(':chauffeur_id', $chauffeur_id, PDO::PARAM_INT);
    
    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $chauffeur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$chauffeur) {
        // Si aucun chauffeur n'est trouvé, afficher des valeurs par défaut
        $chauffeur = [
            "nom" => "Inconnu",
            "email" => "Non défini",
            "telephone" => "Non défini",
            "vehicule" => "Non défini",
            "photo" => "https://via.placeholder.com/150"
        ];
    }

} catch (PDOException $e) {
    // Gérer les erreurs de connexion ou de requête
    echo "Erreur : " . $e->getMessage();
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil - Dashboard Chauffeur</title>
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
            <a href="profil_chauffeur.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Mon Profil</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres_chauffeur.php"
              class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Mon Profil</h1>
      <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow flex flex-col items-center">
        <!-- Photo de profil ronde -->
        <img src="<?= htmlspecialchars($chauffeur['photo']); ?>" alt="Photo de Profil"
          class="w-32 h-32 rounded-full object-cover mb-4">

        <!-- Bouton pour modifier la photo -->
        <a href="modifier_profil_chauffeur.php"
          class="mb-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Modifier Photo</a>

        <!-- Affichage des informations du chauffeur -->
        <h2 class="text-2xl font-bold mb-4"><?= htmlspecialchars($chauffeur['nom']); ?></h2>
        <p><strong>Email :</strong> <?= htmlspecialchars($chauffeur['email']); ?></p>
        <p><strong>Téléphone :</strong> <?= htmlspecialchars($chauffeur['telephone']); ?></p>
        <p><strong>Véhicule :</strong> <?= htmlspecialchars($chauffeur['vehicule']); ?></p>

        <div class="mt-4">
          <a href="modifier_profil_chauffeur.php"
            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Modifier mon profil</a>
        </div>
      </div>
    </main>
  </div>
</body>

</html>
