<?php
require('../config/config.php');

// Vérifier si l'ID de l'utilisateur est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier le type d'utilisateur à supprimer
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        
        // Définir la table et la colonne ID en fonction du type
        $tables = [
            'utilisateur' => ['table' => 'utilisateur', 'id_column' => 'id_utilisateur'],
            'chauffeur' => ['table' => 'chauffeur', 'id_column' => 'id_chauffeur'],
            'entreprise' => ['table' => 'entreprise', 'id_column' => 'id_entreprise']
        ];

        if (!isset($tables[$type])) {
            die("Type invalide.");
        }

        $table = $tables[$type]['table'];
        $id_column = $tables[$type]['id_column'];

        // Requête de suppression
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $pdo->prepare("DELETE FROM $table WHERE $id_column = ?");
            if ($stmt->execute([$id])) {
                header("Location: user.php?success=1"); // Rediriger vers la page principale après suppression
                exit();
            } else {
                $error = "Erreur lors de la suppression.";
            }
        }
    } else {
        die("Type d'utilisateur non spécifié.");
}
} else {
    die("ID de l'utilisateur manquant.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supprimer Utilisateur - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center h-screen">
  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
    <h1 class="text-2xl font-bold mb-4">Confirmer la suppression</h1>
    <p class="mb-6">Voulez-vous vraiment supprimer cet utilisateur ? Cette action est irréversible.</p>
    <div class="flex justify-center space-x-4">
      <!-- Formulaire de suppression -->
      <form method="POST" id="deleteForm">
        <button type="button" onclick="confirmDeletion()" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
          Oui, supprimer
        </button>
      </form>
      <a href="user.php" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
    </div>
  </div>

  <script>
    // Fonction pour confirmer la suppression via une alerte
    function confirmDeletion() {
        const confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.");
        
        if (confirmation) {
            document.getElementById('deleteForm').submit(); // Soumettre le formulaire si confirmé
        }
    }
  </script>
</body>
</html>
