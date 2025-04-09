<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commandes - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
  document.addEventListener('DOMContentLoaded', () => {
  const tableBody = document.querySelector('#commandes-table tbody');
  const dateInput = document.getElementById('date');
  const locationInput = document.getElementById('location');
  const statusInput = document.getElementById('status');
  const filterBtn = document.getElementById('filter-btn');
  const clearBtn = document.getElementById('clear-btn');

  async function fetchCommandes(filters = {}) {
    let url = 'php/get_commandes.php';
    const params = new URLSearchParams(filters).toString();
    if (params) {
      url += `?${params}`;
    }

    try {
      const response = await fetch(url);
      const data = await response.json();
      const commandes = Array.isArray(data) ? data : data.data || [];

      console.log('Commandes reçues :', commandes); // Debug

      // Vider le tableau
      tableBody.innerHTML = '';

      if (commandes.length === 0) {
        const emptyRow = document.createElement('tr');
        emptyRow.innerHTML = `<td colspan="5" style="text-align: center;">Aucune commande trouvée</td>`;
        tableBody.appendChild(emptyRow);
        return;
      }

      commandes.forEach(commande => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${commande.date || '-'}</td>
          <td>${commande.location || '-'}</td>
          <td>${commande.status || '-'}</td>
          <td><a href="php/get_commandes.php?id=${commande.id}" target="_blank">Voir</a></td>
        `;
        tableBody.appendChild(row);
      });

    } catch (error) {
      console.error('Erreur lors du chargement des commandes:', error);
    }
  }

  // Charger les commandes au départ
  fetchCommandes();

  // Filtrer les commandes
  filterBtn.addEventListener('click', () => {
    const filters = {
      date: dateInput.value,
      location: locationInput.value,
      status: statusInput.value
    };
    fetchCommandes(filters);
  });

  // Réinitialiser les filtres
  clearBtn.addEventListener('click', () => {
    dateInput.value = '';
    locationInput.value = '';
    statusInput.value = '';
    fetchCommandes();
  });
});
</script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale commune -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Pro</h2>
      <nav>
        <ul>
          <li class="mb-4"><a href="dashboard (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">dashboard</span><span class="ml-2">Tableau de bord</span></a></li>
          <li class="mb-4"><a href="commandes.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">assignment</span><span class="ml-2">Commandes</span></a></li>
          <li class="mb-4"><a href="entreprisee .php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">business</span><span class="ml-2">Entreprise</span></a></li>
          <li class="mb-4"><a href="chauffeurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_shipping</span><span class="ml-2">Chauffeurs</span></a></li>
          <li class="mb-4"><a href="commentaire (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">comment</span><span class="ml-2">Commentaires</span></a></li>
          <li class="mb-4"><a href="offre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="utilisateurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <!-- En-tête avec titre et boutons d'action -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <h1 class="text-3xl font-semibold mb-4 md:mb-0">Commandes</h1>
      </div>
      
      <!-- Barre de filtrage -->
      <section class="mt-6 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Filtrer les commandes</h2>
        <form method="GET" action="commandes.php">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label for="filter-date" class="block mb-1">Date</label>
              <input type="date" id="filter-date" name="date" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700" value="<?= isset($_GET['date']) ? htmlspecialchars($_GET['date']) : '' ?>">
            </div>
            <div>
              <label for="filter-location" class="block mb-1">Wilaya</label>
              <select id="filter-location" name="location" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
                <option value="">Toutes les wilayas</option>
                <option value="adrar" <?= isset($_GET['location']) && $_GET['location'] == 'adrar' ? 'selected' : '' ?>>Adrar</option>
                <option value="chlef" <?= isset($_GET['location']) && $_GET['location'] == 'chlef' ? 'selected' : '' ?>>Chlef</option>
                <option value="laghouat" <?= isset($_GET['location']) && $_GET['location'] == 'laghouat' ? 'selected' : '' ?>>Laghouat</option>
                <option value="oum-el-bouaghi" <?= isset($_GET['location']) && $_GET['location'] == 'oum-el-bouaghi' ? 'selected' : '' ?>>Oum El Bouaghi</option>
                <option value="batna" <?= isset($_GET['location']) && $_GET['location'] == 'batna' ? 'selected' : '' ?>>Batna</option>
                <option value="bejaia" <?= isset($_GET['location']) && $_GET['location'] == 'bejaia' ? 'selected' : '' ?>>Béjaïa</option>
                <option value="biskra" <?= isset($_GET['location']) && $_GET['location'] == 'biskra' ? 'selected' : '' ?>>Biskra</option>
                <option value="bechar" <?= isset($_GET['location']) && $_GET['location'] == 'bechar' ? 'selected' : '' ?>>Béchar</option>
                <option value="blida" <?= isset($_GET['location']) && $_GET['location'] == 'blida' ? 'selected' : '' ?>>Blida</option>
                <option value="bouira" <?= isset($_GET['location']) && $_GET['location'] == 'bouira' ? 'selected' : '' ?>>Bouira</option>
                <option value="tamanrasset" <?= isset($_GET['location']) && $_GET['location'] == 'tamanrasset' ? 'selected' : '' ?>>Tamanrasset</option>
                <option value="tebessa" <?= isset($_GET['location']) && $_GET['location'] == 'tebessa' ? 'selected' : '' ?>>Tébessa</option>
                <option value="tlemcen" <?= isset($_GET['location']) && $_GET['location'] == 'tlemcen' ? 'selected' : '' ?>>Tlemcen</option>
                <option value="tiaret" <?= isset($_GET['location']) && $_GET['location'] == 'tiaret' ? 'selected' : '' ?>>Tiaret</option>
                <option value="tizi-ouzou" <?= isset($_GET['location']) && $_GET['location'] == 'tizi-ouzou' ? 'selected' : '' ?>>Tizi Ouzou</option>
                <option value="alger" <?= isset($_GET['location']) && $_GET['location'] == 'alger' ? 'selected' : '' ?>>Alger</option>
                <option value="djelfa" <?= isset($_GET['location']) && $_GET['location'] == 'djelfa' ? 'selected' : '' ?>>Djelfa</option>
                <option value="jijel" <?= isset($_GET['location']) && $_GET['location'] == 'jijel' ? 'selected' : '' ?>>Jijel</option>
                <option value="setif" <?= isset($_GET['location']) && $_GET['location'] == 'setif' ? 'selected' : '' ?>>Sétif</option>
                <option value="saida" <?= isset($_GET['location']) && $_GET['location'] == 'saida' ? 'selected' : '' ?>>Saïda</option>
                <option value="skikda" <?= isset($_GET['location']) && $_GET['location'] == 'skikda' ? 'selected' : '' ?>>Skikda</option>
                <option value="sidi-bel-abbes" <?= isset($_GET['location']) && $_GET['location'] == 'sidi-bel-abbes' ? 'selected' : '' ?>>Sidi Bel Abbès</option>
                <option value="annaba" <?= isset($_GET['location']) && $_GET['location'] == 'annaba' ? 'selected' : '' ?>>Annaba</option>
                <option value="guelma" <?= isset($_GET['location']) && $_GET['location'] == 'guelma' ? 'selected' : '' ?>>Guelma</option>
                <option value="constantine" <?= isset($_GET['location']) && $_GET['location'] == 'constantine' ? 'selected' : '' ?>>Constantine</option>
                <option value="medeaa" <?= isset($_GET['location']) && $_GET['location'] == 'medeaa' ? 'selected' : '' ?>>Médéa</option>
                <option value="mostaganem" <?= isset($_GET['location']) && $_GET['location'] == 'mostaganem' ? 'selected' : '' ?>>Mostaganem</option>
                <option value="msila" <?= isset($_GET['location']) && $_GET['location'] == 'msila' ? 'selected' : '' ?>>M'Sila</option>
                <option value="mascara" <?= isset($_GET['location']) && $_GET['location'] == 'mascara' ? 'selected' : '' ?>>Mascara</option>
                <option value="ouargla" <?= isset($_GET['location']) && $_GET['location'] == 'ouargla' ? 'selected' : '' ?>>Ouargla</option>
                <option value="oran" <?= isset($_GET['location']) && $_GET['location'] == 'oran' ? 'selected' : '' ?>>Oran</option>
                <option value="el-bayadh" <?= isset($_GET['location']) && $_GET['location'] == 'el-bayadh' ? 'selected' : '' ?>>El Bayadh</option>
                <option value="illizi" <?= isset($_GET['location']) && $_GET['location'] == 'illizi' ? 'selected' : '' ?>>Illizi</option>
                <option value="bordj-bou-arreridj" <?= isset($_GET['location']) && $_GET['location'] == 'bordj-bou-arreridj' ? 'selected' : '' ?>>Bordj Bou Arreridj</option>
                <option value="boumerdes" <?= isset($_GET['location']) && $_GET['location'] == 'boumerdes' ? 'selected' : '' ?>>Boumerdès</option>
                <option value="el-tarf" <?= isset($_GET['location']) && $_GET['location'] == 'el-tarf' ? 'selected' : '' ?>>El Tarf</option>
                <option value="tindouf" <?= isset($_GET['location']) && $_GET['location'] == 'tindouf' ? 'selected' : '' ?>>Tindouf</option>
                <option value="tissemsilt" <?= isset($_GET['location']) && $_GET['location'] == 'tissemsilt' ? 'selected' : '' ?>>Tissemsilt</option>
                <option value="el-oued" <?= isset($_GET['location']) && $_GET['location'] == 'el-oued' ? 'selected' : '' ?>>El Oued</option>
                <option value="khenchela" <?= isset($_GET['location']) && $_GET['location'] == 'khenchela' ? 'selected' : '' ?>>Khenchela</option>
                <option value="souk-ahras" <?= isset($_GET['location']) && $_GET['location'] == 'souk-ahras' ? 'selected' : '' ?>>Souk Ahras</option>
                <option value="tipaza" <?= isset($_GET['location']) && $_GET['location'] == 'tipaza' ? 'selected' : '' ?>>Tipaza</option>
                <option value="mila" <?= isset($_GET['location']) && $_GET['location'] == 'mila' ? 'selected' : '' ?>>Mila</option>
                <option value="ain-defla" <?= isset($_GET['location']) && $_GET['location'] == 'ain-defla' ? 'selected' : '' ?>>Aïn Defla</option>
                <option value="naama" <?= isset($_GET['location']) && $_GET['location'] == 'naama' ? 'selected' : '' ?>>Naâma</option>
                <option value="ain-temouchent" <?= isset($_GET['location']) && $_GET['location'] == 'ain-temouchent' ? 'selected' : '' ?>>Aïn Témouchent</option>
                <option value="ghardaia" <?= isset($_GET['location']) && $_GET['location'] == 'ghardaia' ? 'selected' : '' ?>>Ghardaïa</option>
                <option value="relizane" <?= isset($_GET['location']) && $_GET['location'] == 'relizane' ? 'selected' : '' ?>>Relizane</option>
                <option value="bordj-emir-abdelkader" <?= isset($_GET['location']) && $_GET['location'] == 'bordj-emir-abdelkader' ? 'selected' : '' ?>>Bordj Emir Abdelkader</option>
                <option value="touggourt" <?= isset($_GET['location']) && $_GET['location'] == 'touggourt' ? 'selected' : '' ?>>Touggourt</option>
                <option value="el-mghair" <?= isset($_GET['location']) && $_GET['location'] == 'el-mghair' ? 'selected' : '' ?>>El M'Ghair</option>
                <option value="in-salah" <?= isset($_GET['location']) && $_GET['location'] == 'in-salah' ? 'selected' : '' ?>>In Salah</option>
                <option value="in-guezzam" <?= isset($_GET['location']) && $_GET['location'] == 'in-guezzam' ? 'selected' : '' ?>>In Guezzam</option>
                <option value="djanet" <?= isset($_GET['location']) && $_GET['location'] == 'djanet' ? 'selected' : '' ?>>Djanet</option>
                <option value="ouled-djellal" <?= isset($_GET['location']) && $_GET['location'] == 'ouled-djellal' ? 'selected' : '' ?>>Ouled Djellal</option>
                <option value="timimoun" <?= isset($_GET['location']) && $_GET['location'] == 'timimoun' ? 'selected' : '' ?>>Timimoun</option>
                <option value="el-menia" <?= isset($_GET['location']) && $_GET['location'] == 'el-menia' ? 'selected' : '' ?>>El Menia</option>
                <option value="bordj-baji-mokhtar" <?= isset($_GET['location']) && $_GET['location'] == 'bordj-baji-mokhtar' ? 'selected' : '' ?>>Bordj Baji Mokhtar</option>
              </select>
            </div>
            <div>
              <label for="filter-status" class="block mb-1">Statut</label>
              <select id="filter-status" name="status" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
                <option value="">Tous les statuts</option>
                <option value="en-attente" <?= isset($_GET['status']) && $_GET['status'] == 'en-attente' ? 'selected' : '' ?>>En attente</option>
                <option value="en-cours" <?= isset($_GET['status']) && $_GET['status'] == 'en-cours' ? 'selected' : '' ?>>En cours</option>
                <option value="termine" <?= isset($_GET['status']) && $_GET['status'] == 'termine' ? 'selected' : '' ?>>Terminé</option>
              </select>
            </div>
          </div>
          <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Appliquer</button>
        </form>
      </section>
      
      <!-- Tableau des commandes -->
       <!-- Tableau des commandes -->
       <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-4 py-2 text-left">Date</th>
              <th class="px-4 py-2 text-left">Wilaya</th>
              <th class="px-4 py-2 text-left">Statut</th>
              <th class="px-4 py-2 text-center">Actions</th>
            </tr>
          </thead>