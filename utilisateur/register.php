<?php
require('../config/config.php');

// Récupération des données du formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$email = $_POST['email'] ?? '';
$passwordd = $_POST['passwordd'] ?? '';
$role = $_POST['role_signup'] ?? '';
$wilaya = $_POST['wilaya'] ?? ''; 

try {
    if ($role == "utilisateur") {
        $sql = "INSERT INTO utilisateur (nom, prenom, telephone, email, passwordd, wilaya)
                VALUES (:nom, :prenom, :telephone, :email, :passwordd, :wilaya)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':telephone' => $telephone,
            ':email' => $email,
            ':passwordd' => $passwordd,
            ':wilaya' => $wilaya
        ]);
    } elseif ($role == "chauffeur") {
        $licence = $_POST['licence'] ?? '';
        $vehicule = $_POST['vehicule'] ?? '';

        $sql = "INSERT INTO chauffeur (nom, prenom, telephone, email, passwordd, licence, vehicule, wilaya)
                VALUES (:nom, :prenom, :telephone, :email, :passwordd, :licence, :vehicule, :wilaya)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':telephone' => $telephone,
            ':email' => $email,
            ':passwordd' => $passwordd,
            ':licence' => $licence,
            ':vehicule' => $vehicule,
            ':wilaya' => $wilaya
        ]);
    } elseif ($role == "entreprise") {
        $nom_entreprise = $_POST['nom_entreprise'] ?? '';
        $registre = $_POST['registre'] ?? '';

        $sql = "INSERT INTO entreprise (nom_entreprise, telephone, email, passwordd, registre, wilaya)
                VALUES (:nom_entreprise, :telephone, :email, :passwordd, :registre, :wilaya)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom_entreprise' => $nom_entreprise,
            ':telephone' => $telephone,
            ':email' => $email,
            ':passwordd' => $passwordd,
            ':registre' => $registre,
            ':wilaya' => $wilaya
        ]);
    } else {
        die("Rôle invalide !");
    }

    echo "✅ Inscription réussie !";

} catch (PDOException $e) {
    echo "❌ Erreur lors de l'inscription : " . $e->getMessage();
}
?>
