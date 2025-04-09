<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chauffeurs - Dashboard Déménagement</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale commune -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Pro</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="commandes.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Commandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="entreprisee.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">business</span>
              <span class="ml-2">Entreprise</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="chauffeurs.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">local_shipping</span>
              <span class="ml-2">Chauffeurs</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="commentaires.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">comment</span>
              <span class="ml-2">Commentaires</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="offres.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">local_offer</span>
              <span class="ml-2">Offres</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="utilisateurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Utilisateurs</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Chauffeurs</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php
          // Connexion à la base de données avec PDO
          $dsn = "mysql:host=localhost;dbname=expertmove";
          $username = "root";
          $password = "";
          
          try {
              $pdo = new PDO($dsn, $username, $password);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              die("Erreur de connexion : " . $e->getMessage());
          }

          // Récupérer les chauffeurs depuis la base de données avec une condition sur la réservation
          $sql = "
          SELECT c.id_chauffeur, c.nom, c.email, 
                 MAX(CASE WHEN r.status_ch = 'validée' THEN 0 ELSE 1 END) AS disponibilite
          FROM chauffeur c
          LEFT JOIN reservation r ON c.id_chauffeur = r.id_chauffeur
          GROUP BY c.id_chauffeur, c.nom, c.email
      ";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();

          $chauffeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if (count($chauffeurs) > 0) {
              foreach ($chauffeurs as $row) {
                  $disponibilite = $row['disponibilite'] ? "Disponible" : "Indisponible";
                  $dispoClass = $row['disponibilite'] ? "text-green-500" : "text-red-500";
                  $buttonClass = $row['disponibilite'] ? "bg-blue-600 hover:bg-blue-700" : "bg-gray-500 cursor-not-allowed";
                  $buttonText = "Voir détails";
                  $buttonLink = "afficher_chauffeur.php?id=" . $row['id_chauffeur'];
                  
                  echo "
                    <div class='p-4 bg-white dark:bg-gray-800 rounded-lg shadow'>
                      <h2 class='text-xl font-bold'>" . htmlspecialchars($row['nom']) . "</h2>
                      <p>Disponibilité: <span class='$dispoClass'>" . htmlspecialchars($disponibilite) . "</span></p>
                      <p>Email: " . htmlspecialchars($row['email']) . "</p>
                      <div class='mt-4'>
                        <a href='$buttonLink' class='px-4 py-2 $buttonClass text-white rounded-md'>$buttonText</a>
                      </div>
                    </div>
                  ";
              }
          } else {
              echo "<p>Aucun chauffeur trouvé.</p>";
          }

          // Fermer la connexion PDO
          $pdo = null;
        ?>
      </div>
    </main>
  </div>
</body>
</html>
