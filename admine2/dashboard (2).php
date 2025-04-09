<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Déménagement</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Professionel</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard (2).php" class="flex items-center p-2 <?php echo ($current_page == 'dashboard.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="commandes.php" class="flex items-center p-2 <?php echo ($current_page == 'commandes.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Commandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="entreprisee .php" class="flex items-center p-2 <?php echo ($current_page == 'entreprise.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">business</span>
              <span class="ml-2">Entreprise</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="chauffeurs.php" class="flex items-center p-2 <?php echo ($current_page == 'chauffeurs.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">local_shipping</span>
              <span class="ml-2">Chauffeurs</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="messagerie.php" class="flex items-center p-2 <?php echo ($current_page == 'messagerie.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">chat</span>
              <span class="ml-2">Messagerie</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="commentaire (1).php" class="flex items-center p-2 <?php echo ($current_page == 'commentaire (1).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">comment</span>
              <span class="ml-2">Commentaires</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="offre (1).php" class="flex items-center p-2 <?php echo ($current_page == 'offre (1).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">local_offer</span>
              <span class="ml-2">Offres</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="user.php" class="flex items-center p-2 <?php echo ($current_page == 'user.php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Utilisateurs</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametre (1).php" class="flex items-center p-2 <?php echo ($current_page == 'parametre (1).php') ? 'bg-gray-200 dark:bg-gray-700' : 'hover:bg-gray-200 dark:hover:bg-gray-700'; ?> rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <!-- En-tête avec notifications et sélection de langue -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Tableau de bord</h1>
        <div class="flex items-center space-x-4">
          <!-- Bouton de sélection de langue -->
          <div class="relative">
            <button id="lang-btn" class="px-4 py-2 bg-white dark:bg-gray-800 rounded-md border hover:bg-gray-200 dark:hover:bg-gray-700">
              Langue <span class="material-icons align-middle">arrow_drop_down</span>
            </button>
            <div id="lang-dropdown" class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
              <ul>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Français</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">English</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">العربية</a></li>
              </ul>
            </div>
          </div>
          <!-- Bouton notifications -->
          <div class="relative">
            <button id="notification-btn" class="p-2 bg-white dark:bg-gray-800 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none">
              <span class="material-icons">notifications</span>
              <span id="notification-count" class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1">3</span>
            </button>
            <div id="notification-dropdown" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
              <ul class="p-2">
                <li class="border-b border-gray-200 dark:border-gray-700 py-2">Nouvelle commande reçue</li>
                <li class="border-b border-gray-200 dark:border-gray-700 py-2">Mise à jour du planning</li>
                <li class="py-2">Chauffeur disponible</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Message du jour pour l'admin -->
      <div class="mt-4 p-4 bg-blue-100 dark:bg-blue-900 rounded-md">
        <p class="text-blue-800 dark:text-blue-200"> Bienvenue dans votre espace de travail !!</p>
      </div>

      <!-- Statistiques cliquables -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <a href="commandes.php?filter=new" class="block p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-700">
          <h3 class="text-lg font-semibold">Nouvelles demandes</h3>
          <p class="text-2xl">124</p>
        </a>
        <a href="commandes.php?filter=in-progress" class="block p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-700">
          <h3 class="text-lg font-semibold">Déménagements en cours</h3>
          <p class="text-2xl">58</p>
        </a>
      </div>
      <canvas id="chart" width="400" height="200"></canvas>
      <div class="mt-8 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <canvas id="chart"></canvas>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <?php
      // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expertmove";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérer les données des réservations par jour
    $sql = "SELECT DATE(created_at) AS date, COUNT(*) AS total_reservations FROM reservation GROUP BY DATE(created_at) ORDER BY DATE(created_at)";
    $result = $conn->query($sql);

    // Vérifiez si la requête a échoué
    if ($result === false) {
        die("Erreur de requête SQL : " . $conn->error);
    }

    $dates = [];
    $reservations = [];

    // Traiter les résultats
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row['date'];
            $reservations[] = $row['total_reservations'];
        }
    } else {
        echo "<p>Aucune donnée trouvée.</p>";
    }

    $conn->close();
  ?>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const ctx = document.getElementById('reservationChart').getContext('2d');
      const dates = <?php echo json_encode($dates); ?>;
      const reservations = <?php echo json_encode($reservations); ?>;

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: dates,
          datasets: [{
            label: 'Nombre de réservations',
            data: reservations,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              labels: {
                color: 'black' // Pour le mode sombre
              }
            }
          },
          scales: {
            x: {
              ticks: {
                color: 'black' // Pour le mode sombre
              }
            },
            y: {
              beginAtZero: true,
              ticks: {
                color: 'black' // Pour le mode sombre
              }
            }
          }
        }
      });
    });
  </script>

      <script>
        // Gestion du dropdown langue
        const langBtn = document.getElementById('lang-btn');
        const langDropdown = document.getElementById('lang-dropdown');
        langBtn.addEventListener('click', () => {
          langDropdown.classList.toggle('hidden');
        });

        // Notifications dropdown
        const notificationBtn = document.getElementById('notification-btn');
        const notificationDropdown = document.getElementById('notification-dropdown');
        notificationBtn.addEventListener('click', () => {
          notificationDropdown.classList.toggle('hidden');
        });
      </script>
    </main>
  </div>
</body>
</html>