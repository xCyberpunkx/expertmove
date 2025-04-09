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

// Déclaration de variables pour stocker les données de l'utilisateur
$nom = $email = $telephone = $vehicule = $photo = "";

// Récupérer les données du chauffeur depuis la base de données
try {
    // Requête pour récupérer les informations du chauffeur
    $sql = "SELECT nom, email, telephone, vehicule, photo FROM chauffeur WHERE id_chauffeur = :chauffeur_id";
    $stmt = $pdo->prepare($sql);

    // Lier l'ID du chauffeur
    $stmt->bindParam(':chauffeur_id', $chauffeur_id, PDO::PARAM_INT);
    
    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $chauffeur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($chauffeur) {
        $nom = $chauffeur['nom'];
        $email = $chauffeur['email'];
        $telephone = $chauffeur['telephone'];
        $vehicule = $chauffeur['vehicule'];
        $photo = $chauffeur['photo'];
    } else {
        // Si l'utilisateur n'existe pas, rediriger ou afficher un message d'erreur
        echo "Erreur : Chauffeur non trouvé.";
        exit();
    }

} catch (PDOException $e) {
    // Gérer les erreurs de connexion ou de requête
    echo "Erreur : " . $e->getMessage();
    exit();
}

// Vérifier si le formulaire a été soumis pour modifier les données
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $vehicule = $_POST['vehicule'];
    
    // Si une nouvelle photo est téléchargée, gérer le téléchargement
    if ($_FILES['photo']['error'] == 0) {
        $photo = 'uploads/' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }

    // Requête pour mettre à jour les informations du chauffeur
    $update_sql = "UPDATE chauffeur SET nom = :nom, email = :email, telephone = :telephone, vehicule = :vehicule, photo = :photo WHERE id_chauffeur = :chauffeur_id";
    $update_stmt = $pdo->prepare($update_sql);
    
    // Lier les paramètres
    $update_stmt->bindParam(':nom', $nom);
    $update_stmt->bindParam(':email', $email);
    $update_stmt->bindParam(':telephone', $telephone);
    $update_stmt->bindParam(':vehicule', $vehicule);
    $update_stmt->bindParam(':photo', $photo);
    $update_stmt->bindParam(':chauffeur_id', $chauffeur_id, PDO::PARAM_INT);

    // Exécuter la requête de mise à jour
    $update_stmt->execute();

    // Rediriger après la mise à jour
    header("Location: profil_chauffeur.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier Mon Profil - Dashboard Chauffeur</title>
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
      <h1 class="text-3xl font-semibold mb-6">Modifier Mon Profil</h1>
      <form action="modifier_profil_chauffeur.php" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <!-- Photo de profil avec modification -->
        <div class="mb-4 flex flex-col items-center">
          <img src="<?= htmlspecialchars($photo); ?>" alt="Photo de Profil" class="w-32 h-32 rounded-full object-cover mb-4">
          <label for="profile-photo" class="cursor-pointer px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Modifier Photo</label>
          <input type="file" name="photo" id="profile-photo" class="hidden">
        </div>
        <!-- Données personnelles -->
        <div class="mb-4">
          <label for="user-name" class="block text-lg font-medium mb-2">Nom</label>
          <input type="text" id="user-name" name="nom" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= htmlspecialchars($nom); ?>">
        </div>
        <div class="mb-4">
          <label for="user-email" class="block text-lg font-medium mb-2">Email</label>
          <input type="email" id="user-email" name="email" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= htmlspecialchars($email); ?>">
        </div>
        <div class="mb-4">
          <label for="user-phone" class="block text-lg font-medium mb-2">Téléphone</label>
          <input type="text" id="user-phone" name="telephone" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= htmlspecialchars($telephone); ?>">
        </div>
        <div class="mb-4">
          <label for="user-vehicle" class="block text-lg font-medium mb-2">Véhicule</label>
          <input type="text" id="user-vehicle" name="vehicule" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= htmlspecialchars($vehicule); ?>">
        </div>
        <div class="flex space-x-2">
          <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Enregistrer</button>
          <a href="profil_chauffeur.php" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
        </div>
      </form>
    </main>
  </div>
</body>

</html>
