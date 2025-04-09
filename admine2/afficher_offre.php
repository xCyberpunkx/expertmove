<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Afficher Offre - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Pro</h2>
      <nav>
        <ul>
          <li class="mb-4"><a href="dashboard.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">dashboard</span><span class="ml-2">Tableau de bord</span></a></li>
          <li class="mb-4"><a href="commandes.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">assignment</span><span class="ml-2">Commandes</span></a></li>
          <li class="mb-4"><a href="entreprise.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">business</span><span class="ml-2">Entreprise</span></a></li>
          <li class="mb-4"><a href="chauffeurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_shipping</span><span class="ml-2">Chauffeurs</span></a></li>
          <li class="mb-4"><a href="commentaire.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">comment</span><span class="ml-2">Commentaires</span></a></li>
          <li class="mb-4"><a href="offre.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="user.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Détails de l'Offre</h1>
      <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <?php
          // Connexion à la base de données
          $conn = new mysqli("localhost", "root", "", "expertmove");

          if ($conn->connect_error) {
              die("Échec de la connexion : " . $conn->connect_error);
          }

          if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']);
        

              $stmt = $conn->prepare("SELECT nom, description, prix FROM offres WHERE id_offres = ?");
              if ($stmt) {
                  $stmt->bind_param("i", $id);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo "<h2 class='text-2xl font-bold mb-4'>Offre : " . htmlspecialchars($row["nom"]) . "</h2>";
                      echo "<p><strong>Description : </strong>" . htmlspecialchars($row["description"]) . "</p>";
                      echo "<p><strong>Prix : </strong>" . htmlspecialchars($row["prix"]) . "€</p>";
                  } else {
                      echo "<p>Aucune offre trouvée pour l'ID spécifié.</p>";
                  }

                  $stmt->close();
              } else {
                  echo "<p>Erreur dans la requête : " . $conn->error . "</p>";
              }
          } else {
              echo "<p>ID de l'offre non spécifié ou invalide.</p>";
          }

          $conn->close();
        ?>
        <div class="mt-4">
          <a href="offre (1).php" class="px-4 py-2 bg-gray-500 text-white rounded">Retour aux Offres</a>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
