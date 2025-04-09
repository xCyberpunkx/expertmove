
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer Offre - Dashboard Déménagement</title>
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
          <li class="mb-4"><a href="dashboard (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">dashboard</span>
            <span class="ml-2">Tableau de bord</span>
          </a></li>
          <li class="mb-4"><a href="commandes.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">assignment</span>
            <span class="ml-2">Commandes</span>
          </a></li>
          <li class="mb-4"><a href="entreprisee .php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">business</span>
            <span class="ml-2">Entreprise</span>
          </a></li>
          <li class="mb-4"><a href="chauffeurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">local_shipping</span>
            <span class="ml-2">Chauffeurs</span>
          </a></li>
          <li class="mb-4"><a href="commentaire (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">comment</span>
            <span class="ml-2">Commentaires</span>
          </a></li>
          <li class="mb-4"><a href="offre (1).php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
            <span class="material-icons">local_offer</span>
            <span class="ml-2">Offres</span>
          </a></li>
          <li class="mb-4"><a href="user.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">person</span>
            <span class="ml-2">Utilisateurs</span>
          </a></li>
          <li class="mb-4"><a href="parametre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">settings</span>
            <span class="ml-2">Paramètres</span>
          </a></li>
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <?php

require('../config/config.php');

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération et sécurisation des données du formulaire
    $nom = trim($_POST["nom"]);
    $description = trim($_POST["description"]);
    $prix = floatval($_POST["prix"]);
    $duree_max = trim($_POST["duree_max"]);
    $contenu = isset($_POST["contenu"]) ? trim($_POST["contenu"]) : "";

    // Options : on vérifie si la case est cochée (1) ou non (0)
    $chargement_dechargement = isset($_POST["chargement_dechargement"]) ? 1 : 0;
    $protection_meubles = isset($_POST["protection_meubles"]) ? 1 : 0;
    $emballage_fragile = isset($_POST["emballage_fragile"]) ? 1 : 0;
    $emballage_complet = isset($_POST["emballage_complet"]) ? 1 : 0;
    $fourniture_cartons = isset($_POST["fourniture_cartons"]) ? 1 : 0;
    $montage_meubles_simples = isset($_POST["montage_meubles_simples"]) ? 1 : 0;

    // Vérification des champs obligatoires (Nom, Prix et Durée maximale)
    if(empty($nom) || empty($prix) || empty($duree_max)) {
        $error_message = "⚠️ Veuillez remplir les champs obligatoires.";
    } else {
        // Préparation de la requête d'insertion dans la table "offre"
        $sql = "INSERT INTO offres 
                (nom, description, prix, contenu, chargement_dechargement, protection_meubles, 
                emballage_fragile, emballage_complet, fourniture_cartons, montage_meubles_simples, duree_max) 
                VALUES (:nom, :description, :prix, :contenu, :chargement, :protection, :emballage_fragile, 
                        :emballage_complet, :fourniture_cartons, :montage_meubles, :duree_max)";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([
                ":nom" => $nom,
                ":description" => $description,
                ":prix" => $prix,
                ":contenu" => $contenu,
                ":chargement" => $chargement_dechargement,
                ":protection" => $protection_meubles,
                ":emballage_fragile" => $emballage_fragile,
                ":emballage_complet" => $emballage_complet,
                ":fourniture_cartons" => $fourniture_cartons,
                ":montage_meubles" => $montage_meubles_simples,
                ":duree_max" => $duree_max
            ]);
            $success_message = "✅ Offre ajoutée avec succès !";
        } catch (PDOException $e) {
            $error_message = "❌ Erreur : " . $e->getMessage();
        }
    }
}
?>

  <main class="flex-1 p-6">
    <h1 class="text-3xl font-semibold mb-6">Créer une Nouvelle Offre</h1>
    <?php if ($error_message): ?>
      <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
        <?= htmlspecialchars($error_message); ?>
      </div>
    <?php endif; ?>
    <?php if ($success_message): ?>
      <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
        <?= htmlspecialchars($success_message); ?>
      </div>
    <?php endif; ?>
    <!-- Formulaire d'insertion -->
    <form action="creer_offre.php" method="post" class="bg-white p-6 rounded-lg shadow">
      <div class="mb-4">
        <label for="nom" class="block text-lg font-medium mb-2">Nom de l'Offre <span class="text-red-500">*</span></label>
        <input type="text" name="nom" id="nom" class="w-full p-2 border rounded-md bg-gray-50" placeholder="Ex : Économique" required>
      </div>
      <div class="mb-4">
        <label for="description" class="block text-lg font-medium mb-2">Description</label>
        <textarea name="description" id="description" class="w-full p-2 border rounded-md bg-gray-50" rows="3" placeholder="Description de l'offre"></textarea>
      </div>
      <div class="mb-4">
        <label for="prix" class="block text-lg font-medium mb-2">Prix <span class="text-red-500">*</span></label>
        <input type="number" name="prix" id="prix" class="w-full p-2 border rounded-md bg-gray-50" placeholder="Ex : 100" required step="0.01">
      </div>
      <div class="mb-4">
        <label for="duree_max" class="block text-lg font-medium mb-2">Durée maximale <span class="text-red-500">*</span></label>
        <input type="text" name="duree_max" id="duree_max" class="w-full p-2 border rounded-md bg-gray-50" placeholder="Ex : 7 jours min" required>
      </div>
      <div class="mb-4">
        <label for="contenu" class="block text-lg font-medium mb-2">Contenu</label>
        <textarea name="contenu" id="contenu" class="w-full p-2 border rounded-md bg-gray-50" rows="3" placeholder="Détails supplémentaires de l'offre"></textarea>
      </div>
      <!-- Options de l'offre -->
      <div class="mb-4">
        <p class="text-lg font-medium mb-2">Options :</p>
        <div class="flex flex-wrap gap-4">
          <label class="inline-flex items-center">
            <input type="checkbox" name="chargement_dechargement" class="form-checkbox">
            <span class="ml-2">Chargement/Déchargement</span>
          </label>
          <label class="inline-flex items-center">
            <input type="checkbox" name="protection_meubles" class="form-checkbox">
            <span class="ml-2">Protection de base des meubles</span>
          </label>
          <label class="inline-flex items-center">
            <input type="checkbox" name="emballage_fragile" class="form-checkbox">
            <span class="ml-2">Emballage des objets fragiles</span>
          </label>
          <label class="inline-flex items-center">
            <input type="checkbox" name="emballage_complet" class="form-checkbox">
            <span class="ml-2">Emballage complet</span>
          </label>
          <label class="inline-flex items-center">
            <input type="checkbox" name="fourniture_cartons" class="form-checkbox">
            <span class="ml-2">Fourniture de cartons</span>
          </label>
          <label class="inline-flex items-center">
            <input type="checkbox" name="montage_meubles_simples" class="form-checkbox">
            <span class="ml-2">Montage meubles simples</span>
          </label>
        </div>
      </div>
      <div class="flex space-x-2">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
          Créer
        </button>
        <button type="reset" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
          Annuler
        </button>
      </div>
    </form>
  </main>

  

  </div>
</body>
</html>
