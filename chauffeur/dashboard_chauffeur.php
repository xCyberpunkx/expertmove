<?php
session_start();

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);
$user_photo = $is_logged_in && !empty($_SESSION['user_photo']) ? $_SESSION['user_photo'] : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
$user_name = $is_logged_in ? $_SESSION['user_nom'] . ' ' . $_SESSION['user_prenom'] : '';

// Connexion PDO (voir l'exemple ci-dessus)
$dsn = 'mysql:host=localhost;dbname=expertmove';
$username = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit;
}

// Récupérer l'ID du chauffeur connecté
$chauffeur_id = $_SESSION['user_id'];

// Requête pour compter les demandes acceptées
$query = "SELECT COUNT(*) AS accepted_requests FROM reservation WHERE id_chauffeur = :chauffeur_id AND status_ch = 'validée'";
$stmt = $conn->prepare($query);
$stmt->bindParam(':chauffeur_id', $chauffeur_id, PDO::PARAM_INT);
$stmt->execute();

// Récupérer le résultat
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$accepted_requests = $result['accepted_requests'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Chauffeur - Déménagement Pro</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
  <!-- <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['user_nom']) . " " . htmlspecialchars($_SESSION['user_prenom']); ?></h2>
<p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
<p><a href="logout.php">Déconnexion</a></p> -->
    <!-- Barre latérale -->
   <style>
    
.menu-container {
    position: relative;
    left: 200px; /* décalage vers la gauche */
}
.menu-button {
    width: 50px;
    height: 50px;
    background-color: #fff;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}
.menu-button img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}
.menu {
    display: none;
    position: absolute;
    top: 60px;
    left: -50px;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    min-width: 150px;
}
.menu img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-bottom: 10px;
}
.menu p {
    font-weight: bold;
    margin: 5px 0;
    color: #333;
}
.menu button {
    width: 100%;
    padding: 8px;
    background: #d9181e;
    color: white;
    border: none;
    cursor: pointer;
    margin-top: 10px;
    border-radius: 5px;
}
.menu button:hover {
    background: #b0151a;
}




   </style>
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Chauffeur Pro</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard_chauffeur.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="demandes_chauffeurr.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Mes Demandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="profil_chauffeur.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Mon Profil</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres_chauffeur.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <!-- En-tête avec notifications -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Tableau de bord Chauffeur</h1>
        <div class="menu-container">
    <button class="menu-button" onclick="toggleMenu()">
        <img id="userIcon" src="<?= htmlspecialchars($user_photo) ?>" alt="User">
    </button>
    <div class="menu" id="menu">
        <?php if ($is_logged_in): ?>
            <p id="userName"><?= htmlspecialchars($user_name) ?></p>
            <button onclick="window.location.href='logout.php'">Déconnexion</button>
        <?php else: ?>
          <button onclick="window.location.href='../utilisateur/LOGIN1_R.php'">Se connecter</button>

        <?php endif; ?>
    </div>
</div>

        <div class="relative">
          
          <div id="notification-dropdown" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
            <ul class="p-2">
              <li class="py-2">Nouvelle demande assignée</li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Bloc Statistiques : uniquement Nouvelles Demandes -->
      <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow cursor-pointer" onclick="window.location.href='parametres_chauffeur.php?filter=accepted'">
    <h3 class="text-xl font-semibold">Demandes Acceptées</h3>
    <p class="text-2xl"><?= $accepted_requests ?></p>
</div>
      <!-- Graphique d'activité -->
      <div class="mt-8 p-4 bg-white dark:bg-gray-800 rounded-lg shadow" style="height: 400px;">
  <canvas id="chart" class="w-full h-full"></canvas>
</div>
    </main>
  </div>
  <script>
    document.addEventListener('click', function(e) {
  if (!userBubble.contains(e.target)) {
    userMenu.style.display = 'none';
  }
});

   


function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}
        document.addEventListener("DOMContentLoaded", function () {
            const profileImg = document.getElementById("profile-img");
            const dropdownMenu = document.getElementById("dropdown-menu");
            const logoutBtn = document.getElementById("logout");

            // Vérifier si l'utilisateur est connecté
            let isConnected = sessionStorage.getItem("connected");

            if (isConnected) {
                profileImg.src = "user-avatar.png"; // Image après connexion
                profileImg.style.border = "2px solid green"; // Bordure verte pour montrer la connexion
            } else {
                profileImg.onclick = function () {
                    window.location.href = "LOGIN1_R.php"; // Redirige vers la connexion
                };
            }

            // Gérer l'affichage du menu déroulant
            profileImg.addEventListener("click", function (event) {
                if (isConnected) {
                    dropdownMenu.classList.toggle("show");
                }
                event.stopPropagation(); // Empêche la fermeture immédiate
            });

            // Cacher le menu si on clique ailleurs
            document.addEventListener("click", function (event) {
                if (!profileImg.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });

            // Déconnexion
            logoutBtn.addEventListener("click", function () {
                sessionStorage.removeItem("connected"); // Supprime la session
                window.location.reload(); // Recharge la page
            });
        });
    
    // Exemple de graphique avec Chart.js
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
        datasets: [{
          label: 'Demandes traitées',
          data: [3, 5, 2, 4, 3, 6, 1],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
  responsive: true,
  maintainAspectRatio: false
}

    });
  </script>
</body>
</html>
