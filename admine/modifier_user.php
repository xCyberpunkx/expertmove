<?php
require('../config/config.php');

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Mapping type → table & champs
    $tables = [
        'utilisateur' => [
            'table' => 'utilisateur',
            'id_column' => 'id_utilisateur',
            'fields' => ['nom', 'email']
        ],
        'chauffeur' => [
            'table' => 'chauffeur',
            'id_column' => 'id_chauffeur',
            'fields' => ['Nom', 'email']
        ],
        'entreprise' => [
            'table' => 'entreprise',
            'id_column' => 'id_entreprise',
            'fields' => ['om', 'email']
        ]
    ];

    if (!isset($tables[$type])) {
        die("Type invalide.");
    }

    $table = $tables[$type]['table'];
    $id_column = $tables[$type]['id_column'];
    $fields = $tables[$type]['fields'];

    // Récupération des données
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE $id_column = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Données introuvables.");
    }
} else {
    die("ID ou type non fourni.");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = [];
    $set_clause = [];

    foreach ($fields as $field) {
        $value = $_POST[$field] ?? '';
        $values[] = $value;
        $set_clause[] = "$field = ?";
    }

    $values[] = $id;
    $sql = "UPDATE $table SET " . implode(', ', $set_clause) . " WHERE $id_column = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute($values)) {
        header("Location: user.php?success=1");
        exit;
    } else {
        $error = "Erreur lors de la mise à jour.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier <?= ucfirst($type) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-md p-8 rounded-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Modifier <?= ucfirst($type) ?></h2>

    <?php if (!empty($error)) : ?>
      <p class="bg-red-100 text-red-700 p-2 mb-4 rounded"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <?php foreach ($fields as $field): ?>
        <div>
          <label for="<?= $field ?>" class="block font-medium mb-1">
            <?= ucfirst(str_replace('_', ' ', $field)) ?>
          </label>
          <input 
            type="<?= $field === 'email' ? 'email' : 'text' ?>" 
            name="<?= $field ?>" 
            id="<?= $field ?>" 
            value="<?= htmlspecialchars($user[$field]) ?>" 
            class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
            required>
        </div>
      <?php endforeach; ?>

      <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
        Enregistrer
      </button>
      <a href="user.php" class="block text-center text-sm text-gray-600 mt-2 hover:underline">Annuler</a>
    </form>
  </div>
</body>
</html>
