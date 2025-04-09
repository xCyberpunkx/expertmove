<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supprimer Offre - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center h-screen">
<?php
  require('../config/config.php'); // Assure-toi que ce fichier contient la connexion $pdo

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $id = intval($_GET['id']);

      // Si l'utilisateur confirme la suppression
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $stmt = $pdo->prepare("DELETE FROM offres WHERE id_offres = ?");
          $stmt->execute([$id]);
          // Redirection après suppression
          header("Location: offre (1).php?msg=supprimee");
          exit;
      }
  } else {
      echo "<p class='text-red-500'>ID invalide ou non spécifié.</p>";
      exit;
  }
?>
  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
    <h1 class="text-2xl font-bold mb-4">Confirmer la suppression</h1>
    <p class="mb-6">Voulez-vous vraiment supprimer cette offre ? Cette action est irréversible.</p>
    <form method="post" class="flex justify-center space-x-4">
      <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Oui, supprimer</button>
      <a href="offre (1).php" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
    </form>
  </div>
</body>
</html>
