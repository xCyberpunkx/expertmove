<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier Offre - Dashboard Déménagement</title>
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
          <li class="mb-4"><a href="offre (1).php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="user.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Modifier l'Offre</h1>
      <?php
        require('../config/config.php');

        // Vérifier si id_offres est défini dans l'array $_GET
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
      

            // Si le formulaire est soumis
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Récupérer et sécuriser les données du formulaire
                $nom = trim($_POST["nom"]);
                $description = trim($_POST["description"]);
                $prix = floatval($_POST["prix"]);

                // Préparer la requête SQL pour mettre à jour les informations de l'offre
                $sql = "UPDATE offres SET nom = ?, description = ?, prix = ? WHERE id_offres = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $description, $prix, $id]);

                echo "<p class='bg-green-200 text-green-800 p-4 rounded'>Offre mise à jour avec succès.</p>";
            }

            // Récupérer les détails de l'offre actuelle
            $sql = "SELECT nom, description, prix FROM offres WHERE id_offres = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $offre = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "<p class='bg-red-200 text-red-800 p-4 rounded'>ID de l'offre non spécifié.</p>";
            exit;
        }
      ?>
     <form action="modifier_offre.php?id=<?= $id ?>" method="post"
     class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <div class="mb-4">
          <label for="nom" class="block text-lg font-medium mb-2">Nom de l'Offre</label>
          <input type="text" name="nom" id="nom" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= htmlspecialchars($offre['nom']) ?>">
        </div>
        <div class="mb-4">
          <label for="description" class="block text-lg font-medium mb-2">Description</label>
          <textarea name="description" id="description" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" rows="3"><?= htmlspecialchars($offre['description']) ?></textarea>
        </div>
        <div class="mb-4">
          <label for="prix" class="block text-lg font-medium mb-2">Prix</label>
          <input type="number" name="prix" id="prix" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= htmlspecialchars($offre['prix']) ?>">
        </div>
        <div class="flex space-x-2">
          <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Enregistrer</button>
          <a href="offre (1).php" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
        </div>
      </form>
    </main>
  </div>
</body>
</html>