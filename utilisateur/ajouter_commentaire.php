<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: LOGIN1_R.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le commentaire soumis
    $commentaire = $_POST['commentaire'];
    $user_id = $_SESSION['user_id']; // Récupérer l'ID de l'utilisateur connecté
    $nom = $_SESSION['user_nom'];    // Récupérer le nom de l'utilisateur
    $email = $_SESSION['user_email']; // Récupérer l'email de l'utilisateur
    $objet = "commentaire"; // Objet fixe pour les commentaires

    // Connexion à la base de données via PDO
    require_once __DIR__ . '/../config/config.php';

    // Préparer la requête d'insertion dans la table `demande`
    $stmt = $pdo->prepare("INSERT INTO demandes (nom, email, objet, message) VALUES (:nom, :email, :objet, :message)");

    // Lier les paramètres
   
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':objet', $objet, PDO::PARAM_STR);
    $stmt->bindParam(':message', $commentaire, PDO::PARAM_STR);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Commentaire ajouté avec succès!";
    } else {
        echo "Erreur lors de l'ajout du commentaire: " . $stmt->errorInfo()[2]; // Affiche l'erreur PDO
    }

    // Fermer la connexion (PDO gère la fermeture automatiquement)
    $pdo = null;

    // Rediriger vers la page d'accueil ou une autre page
    header("Location: accueil.php");
    exit();
}
?>
