


<?php
require('../config/config.php');
if (!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['type']) || empty($_GET['type'])) {
    die("❌ Erreur : Identifiant ou type non fourni.");
}

$id = intval($_GET['id']); 
$type = htmlspecialchars($_GET['type']);
$types_valides = ['utilisateur', 'entreprise', 'chauffeur']; 
if (!in_array($type, $types_valides)) {
    die("⚠️ Erreur : Type invalide.");
}

$check_sql = "SELECT * FROM $type WHERE id = :id";
$stmt = $pdo->prepare($check_sql);
$stmt->execute(['id' => $id]);

if ($stmt->rowCount() == 0) {
    die("⚠️ Erreur : Enregistrement non trouvé.");
}

if (isset($_POST['confirm']) && $_POST['confirm'] === 'oui') {
    $delete_sql = "DELETE FROM $type WHERE id = :id";
    $delete_stmt = $pdo->prepare($delete_sql);
    $delete_stmt->execute(['id' => $id]);

    echo "<script>alert('✔️ Suppression réussie.'); window.location.href='user.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Suppression</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold">⚠️ Confirmation de suppression</h2>
        <p class="mt-2">Voulez-vous vraiment supprimer cet enregistrement ?</p>
        <form method="POST" class="mt-4">
            <button type="submit" name="confirm" value="oui" class="bg-red-500 text-white px-4 py-2 rounded">Oui, Supprimer</button>
            <a href="user.php" class="bg-gray-300 text-black px-4 py-2 rounded ml-2">Annuler</a>
        </form>
    </div>
</body>
</html>
