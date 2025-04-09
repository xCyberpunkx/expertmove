

<?php
session_start();
require_once __DIR__ . '/../config/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Requête invalide.";
    exit;}
$email    = isset($_POST['email']) ? trim($_POST['email']) : "";
$password = isset($_POST['password']) ? trim($_POST['password']) : "";
$role     = isset($_POST['role_signin']) ? trim($_POST['role_signin']) : "";
if (empty($email) || empty($password) || empty($role)) {
    echo "Tous les champs sont obligatoires.";
    exit;}
switch ($role) {
    case 'utilisateur':
        $table = 'utilisateur';
        break;
    case 'chauffeur':
        $table = 'chauffeur';
        break;
    case 'entreprise':
        $table = 'entreprise';
        break;
    default:
        echo "Rôle invalide.";
      exit;}
try {
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['passwordd'] === $password) {
        if ($role === 'utilisateur') {
            $_SESSION['user_id'] = $user['id_utilisateur'];
        } elseif ($role === 'chauffeur') {
            $_SESSION['user_id'] = $user['id_chauffeur']; 
        } elseif ($role === 'entreprise') {
            $_SESSION['user_id'] = $user['id_entreprise'];
        }
        var_dump($_SESSION);
        $_SESSION['user_role'] = $role;
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_photo'] = !empty($user['photo']) ? $user['photo'] : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
    
    
        if ($role === 'utilisateur') {
            header("Location: ../utilisateur/accueil.php");
        } elseif ($role === 'chauffeur') {
            header("Location: ../chauffeur/dashboard_chauffeur.php");
        } elseif ($role === 'entreprise') {
            header("Location: ../entreprise/dashboard_entreprise.php");
        }
        exit;
    } else {
        header("Location: LOGIN1_R.php?error=1");
exit();
    }
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
