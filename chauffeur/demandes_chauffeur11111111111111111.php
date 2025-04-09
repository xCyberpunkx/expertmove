<?php
session_start();
require('../config/config.php');

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Aucune donnée de session trouvée. Veuillez vous connecter.";
    exit();
}

$chauffeur_id = $_SESSION['user_id']; 

// Récupérer les réservations attribuées à ce chauffeur
$sql = "SELECT * FROM reservation WHERE status = 'validée' AND (status_ch IS NULL OR status_ch != 'validée')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupération des filtres depuis GET
$tarif  = isset($_GET['tarif']) ? $_GET['tarif'] : '';
$filterWilaya = isset($_GET['wilaya']) ? $_GET['wilaya'] : '';

// Construction de la clause WHERE pour afficher uniquement les demandes validées
$whereClauses = ["status = 'validée'", "(status_ch IS NULL OR status_ch != 'validée')"];

$params = [];

// Filtrer par tarif si renseigné
if (!empty($tarif)) {
    $whereClauses[] = "tarif = ?";
    $params[] = $tarif;
}

// Filtrer par wilaya si renseigné
if (!empty($filterWilaya)) {
    $whereClauses[] = "wilaya = ?";
    $params[] = $filterWilaya;
}

$where = 'WHERE ' . implode(' AND ', $whereClauses);

// Tri des demandes de la plus ancienne à la plus récente
$sql = "SELECT * FROM reservation $where ORDER BY date ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$demandes = $stmt->fetchAll();


?>




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Demandes - Dashboard Chauffeur</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Chauffeur Pro</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard_chauffeur.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="demandes_chauffeur.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
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
      <h1 class="text-3xl font-semibold mb-6">Mes Demandes Validées</h1>
      
      <!-- Barre de filtrage -->
      <section class="mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-2">Filtrer par tarif et wilaya</h2>
        <form method="GET" action="">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="tarif" class="block mb-1">Tarif</label>
              <select name="tarif" id="tarif" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
                <option value="" <?php echo ($tarif == '') ? 'selected' : ''; ?>>Tous</option>
                <option value="economique" <?php echo ($tarif == 'economique') ? 'selected' : ''; ?>>Économique</option>
                <option value="confort" <?php echo ($tarif == 'confort') ? 'selected' : ''; ?>>Confort</option>
                <option value="lux" <?php echo ($tarif == 'lux') ? 'selected' : ''; ?>>Lux</option>
              </select>
            </div>
            <div>
              <label for="wilaya" class="block mb-1">Wilaya</label>
              <select name="wilaya" id="wilaya" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
           <option value="" <?php echo ($filterWilaya == '') ? 'selected' : ''; ?>>Toutes les wilayas</option>    
           <option value="a - adrar" <?php echo ($filterWilaya == 'adrar') ? 'selected' : ''; ?>>Adrar</option>
    <option value="Chlef"<?php echo ($filterWilaya == 'Chlef') ? 'selected' : ''; ?>>2 - Chlef</option>
    <option value="Laghouat"<?php echo ($filterWilaya == 'Laghouat') ? 'selected' : ''; ?>>3 - Laghouat</option>
    <option value="Oum El Bouaghi<"<?php echo ($filterWilaya == 'Oum El Bouaghi<') ? 'selected' : ''; ?>>4 - Oum El Bouaghi</option>
    <option value="Batna"<?php echo ($filterWilaya == 'Batna') ? 'selected' : ''; ?>>5 - Batna</option>
    <option value="Béjaïa"<?php echo ($filterWilaya == 'Béjaïa') ? 'selected' : ''; ?>>6 - Béjaïa</option>
    <option value="Biskra"<?php echo ($filterWilaya == 'Biskra') ? 'selected' : ''; ?>>7 - Biskra</option>
    <option value="Béchar"<?php echo ($filterWilaya == 'Béchar') ? 'selected' : ''; ?>>8 - Béchar</option>
    <option value="Blida"<?php echo ($filterWilaya == 'Blida') ? 'selected' : ''; ?>>9 - Blida</option>
    <option value="Bouira"<?php echo ($filterWilaya == 'Bouira') ? 'selected' : ''; ?>>10 - Bouira</option>
    <option value="Tamanrasset"<?php echo ($filterWilaya == 'Taman  nrasset') ? 'selected' : ''; ?>>11 - Tamanrasset</option>
    <option value="Tébessa"<?php echo ($filterWilaya == 'Tébessa') ? 'selected' : ''; ?>>12 - Tébessa</option>
    <option value="Tlemcen"<?php echo ($filterWilaya == 'Tlemcen') ? 'selected' : ''; ?>>13 - Tlemcen</option>
    <option value="Tiaret"<?php echo ($filterWilaya == 'Tiaret') ? 'selected' : ''; ?>>14 - Tiaret</option>
    <option value="Tizi Ouzou"<?php echo ($filterWilaya == 'Tizi Ouzou') ? 'selected' : ''; ?>>15 - Tizi Ouzou</option>
    <option value="Alger"<?php echo ($filterWilaya == 'Alger') ? 'selected' : ''; ?>>16 - Alger</option>
    <option value="Djelfa"<?php echo ($filterWilaya == 'Djelfa') ? 'selected' : ''; ?>>17 - Djelfa</option>
    <option value="Jijel"<?php echo ($filterWilaya == 'Jijel') ? 'selected' : ''; ?>>18 - Jijel</option>
    <option value="Sétif"<?php echo ($filterWilaya == 'Sétif') ? 'selected' : ''; ?>>19 - Sétif</option>
    <option value="Saïda"<?php echo ($filterWilaya == 'Saïda') ? 'selected' : ''; ?>>20 - Saïda</option>
    <option value="Skikda"<?php echo ($filterWilaya == 'Skikda') ? 'selected' : ''; ?>>21 - Skikda</option>
    <option value="Sidi Bel Abbès"<?php echo ($filterWilaya == 'Sidi Bel Abbès') ? 'selected' : ''; ?>>22 - Sidi Bel Abbès</option>
    <option value="Annaba"<?php echo ($filterWilaya == 'Annaba') ? 'selected' : ''; ?>>23 - Annaba</option>
    <option value="Guelma"<?php echo ($filterWilaya == 'Guelma') ? 'selected' : ''; ?>>24 - Guelma</option>
    <option value="Constantine"<?php echo ($filterWilaya == 'Constantine') ? 'selected' : ''; ?>>25 - Constantine</option>
    <option value="Médéa"<?php echo ($filterWilaya == 'Médéa') ? 'selected' : ''; ?>>26 - Médéa</option>
    <option value="Mostaganem"<?php echo ($filterWilaya == 'Mostaganem') ? 'selected' : ''; ?>>27 - Mostaganem</option>
    <option value="M'Sila"<?php echo ($filterWilaya == 'M Sila') ? 'selected' : ''; ?>>28 - M'Sila</option>
    <option value="Mascara"<?php echo ($filterWilaya == 'Mascara') ? 'selected' : ''; ?>>29 - Mascara</option>
    <option value="Ouargla"<?php echo ($filterWilaya == 'Ouargla') ? 'selected' : ''; ?>>30 - Ouargla</option>
    <option value="Oran"<?php echo ($filterWilaya == 'Oran') ? 'selected' : ''; ?>>31 - Oran</option>
    <option value="El Bayadh"<?php echo ($filterWilaya == 'El Bayadh') ? 'selected' : ''; ?>>32 - El Bayadh</option>
    <option value="Illizi"<?php echo ($filterWilaya == 'Illizi') ? 'selected' : ''; ?>>33 - Illizi</option>
    <option value="Bordj Bou Arreridj"<?php echo ($filterWilaya == 'Bordj Bou Arreridj') ? 'selected' : ''; ?>>34 - Bordj Bou Arreridj</option>
    <option value="Boumerdès"<?php echo ($filterWilaya == 'Boumerdès') ? 'selected' : ''; ?>>35 - Boumerdès</option>
    <option value="El Tarf"<?php echo ($filterWilaya == 'El Tarf') ? 'selected' : ''; ?>>36 - El Tarf</option>
    <option value="Tindouf"<?php echo ($filterWilaya == 'Tindouf') ? 'selected' : ''; ?>>37 - Tindouf</option>
    <option value="Tissemsilt"<?php echo ($filterWilaya == 'Tissemsilt') ? 'selected' : ''; ?>>38 - Tissemsilt</option>
    <option value="El Oued"<?php echo ($filterWilaya == 'El Oued') ? 'selected' : ''; ?>>39 - El Oued</option>
    <option value="Khenchela"<?php echo ($filterWilaya == 'Khenchela') ? 'selected' : ''; ?>>40 - Khenchela</option>
    <option value="Souk Ahras"<?php echo ($filterWilaya == 'Souk Ahras') ? 'selected' : ''; ?>>41 - Souk Ahras</option>
    <option value="Tipaza"<?php echo ($filterWilaya == 'Tipaza') ? 'selected' : ''; ?>>42 - Tipaza</option>
    <option value="Mila"<?php echo ($filterWilaya == 'Mila') ? 'selected' : ''; ?>>43 - Mila</option>
    <option value="Aïn Defla"<?php echo ($filterWilaya == 'Aïn Defla') ? 'selected' : ''; ?>>44 - Aïn Defla</option>
    <option value="Naâma"<?php echo ($filterWilaya == 'Naâma') ? 'selected' : ''; ?>>45 - Naâma</option>
    <option value="Aïn Témouchent"<?php echo ($filterWilaya == 'Aïn Témouchent') ? 'selected' : ''; ?>>46 - Aïn Témouchent</option>
    <option value="Ghardaïa"<?php echo ($filterWilaya == 'Ghardaïa') ? 'selected' : ''; ?>>47 - Ghardaïa</option>
    <option value="Relizane"<?php echo ($filterWilaya == 'Relizane') ? 'selected' : ''; ?>>48 - Relizane</option>
    <option value="Timimoun"<?php echo ($filterWilaya == 'Timimoun') ? 'selected' : ''; ?>>49 - Timimoun</option>
    <option value="Bordj Baji Mokhtar"<?php echo ($filterWilaya == 'Bordj Baji Mokhtar') ? 'selected' : ''; ?>>50 - Bordj Baji Mokhtar</option>
    <option value="Ouled Djellal"<?php echo ($filterWilaya == 'Ouled Djellal') ? 'selected' : ''; ?>>51 - Ouled Djellal</option>
    <option value="Touggourt"<?php echo ($filterWilaya == 'Touggourt') ? 'selected' : ''; ?>>52 - Touggourt</option>
    <option value="Djanet"<?php echo ($filterWilaya == 'Djanet') ? 'selected' : ''; ?>>53 - Djanet</option>
    <option value="In Salah"<?php echo ($filterWilaya == 'In Salah') ? 'selected' : ''; ?>>54 - In Salah</option>
    <option value="In Guezzam"<?php echo ($filterWilaya == 'In Guezzam') ? 'selected' : ''; ?>>55 - In Guezzam</option>
    <option value="El M'Ghair"<?php echo ($filterWilaya == 'El MGhair') ? 'selected' : ''; ?>>56 - El M'Ghair</option>
    <option value="El Meniaa"<?php echo ($filterWilaya == 'El Meniaa') ? 'selected' : ''; ?>>57 - El Meniaa</option>
    <option value="Autre"<?php echo ($filterWilaya == 'Autre') ? 'selected' : ''; ?>>58 - Autre</option>
               
              </select>
            </div>
          </div>
          <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Filtrer</button>
        </form>
      </section>
      
      <body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">ID Demande</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">Type</th>
                    <th class="px-4 py-2 text-left">Wilaya</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo $row['id']; ?></td>
                        <td class="px-4 py-2"><?php echo $row['date']; ?></td>
                        <td class="px-4 py-2"><?php echo $row['type']; ?></td>
                        <td class="px-4 py-2"><?php echo $row['wilaya']; ?></td>
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</table><td class="px-4 py-2">
                            <form method="POST" action="accepter_demande.php" class="inline">
                                <input type="hidden" name="demande_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Accepter</button>
                            </form>
                        </td>
    </main>
  </div>
</body>
</html>
