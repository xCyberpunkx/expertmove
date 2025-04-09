
<?php
session_start(); 


$is_logged_in = isset($_SESSION['user_id']);
$user_photo = $is_logged_in && !empty($_SESSION['user_photo']) ? $_SESSION['user_photo'] : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
$user_name = $is_logged_in ? $_SESSION['user_nom'] . ' ' . $_SESSION['user_prenom'] : '';
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Actif - Déménagement</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f8f8;
        }
 h1, p {
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #d9181e;
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 1000;
    color: #fff;
}

.navbar .logo {
    font-size: 1.5rem;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    text-decoration: none;
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #f8f8f8;
    font-weight: bold;
}

.auth-buttons button {
    background-color: #fff;
    color: #d9181e;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: 0.3s;
    margin-left: 10px;
}

.auth-buttons button:hover {
    background-color: #f8f8f8;
}

.burger {
    display: none;
    cursor: pointer;
}

.burger div {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 5px;
    transition: all 0.3s ease;
}

/* Responsive Navbar */
@media (max-width: 760px) {
    .nav-links {
        display: none;
        flex-direction: column;
        background-color: #d9181e;
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        padding: 20px;
        border-radius: 0 0 10px 10px;
    }

    .nav-links.active {
        display: flex;
    }

    .burger {
        display: block;
    }
}

        /* Slider Container */
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .slides {
            display: flex;
            transition: transform 0.6s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
            position: relative;
            background-size: cover;
            background-position: center;
            height: 500px; /* Hauteur par défaut */
            color: #fff;
        }

        .slide-content {
            position: absolute;
            bottom: 20%;
            left: 5%;
            max-width: 500px;
        }

        .slide h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #d9181e;
        }

        .slide p {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            margin: 10px 10px 0 0;
            padding: 10px 20px;
            color: #fff;
            background-color: #d9181e;
            text-decoration: none;
            border: 2px solid #d9181e;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: transparent;
            color: #d9181e;
        }

        /* Navigation Buttons */
        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .navigation button {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .navigation button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Dots */
        .dots {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #d9181e;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .slide {
                height: 300px; /* Réduction de la hauteur */
            }

            .slide h2 {
                font-size: 1.5rem; /* Texte plus petit */
            }

            .slide p {
                font-size: 0.9rem;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
        /* Section pricing */
    .pricing {
      text-align: center;
      background-color: #f7f7f7;
      padding: 40px 20px;
    }

    .pricing h1 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #333;
    }

    .cards {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    /* Carte 3D */
    .card {
      width: 350px;
      height: 400px;
      perspective: 1000px;
      margin: 10px;
      cursor: pointer; /* Ajout du curseur pointer pour indiquer que c'est cliquable */
    }

    .card-inner {
      width: 100%;
      height: 100%;
      position: relative;
      transform-style: preserve-3d;
      transition: transform 0.8s;
    }

    .card.flipped .card-inner {
      transform: rotateY(180deg); /* La carte est retournée lorsqu'elle a la classe 'flipped' */
    }

    .card-front,
    .card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: white;
      text-align: center;
      pointer-events: none; /* Désactive les clics par défaut */
    }

    .card-front {
      pointer-events: auto; /* Active les clics uniquement pour la face avant */
    }

    .card-front h3,
    .card-back h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }
    .features {
    text-align: left;
    padding: 0;
    list-style: none;
    font-size: 14px;
    line-height: 1.8;
}

.features li {
    margin: 5px 0;
    padding: 5px 10px;
    background: #f4f4f4;
    border-radius: 5px;
    display: flex;
    align-items: center;
}

.features li::before {
    content: "•"; 
    color: #ff5733; 
    font-weight: bold;
    margin-right: 10px;
}


    .card-front .prix {
      font-size: 1.2rem;
      font-weight: bold;
      color: #af0c0c;
    }

    .card-back ul {
      list-style: none;
      padding: 0;
    }

    .card-back ul li {
      font-size: 0.9rem;
      color: #333;
      margin: 5px 0;
    }

    .card-back {
  transform: rotateY(180deg);
  pointer-events: auto; /* تسمح للكليكات */
  z-index: 2; /* تتأكد باللي راهو فوق */
}
    .card-front .btnn,
.card-back .btnn {
    margin-bottom: 20px; /* Ajuste cette valeur pour contrôler la position */
}

















    /* Bouton */
    .btnn {
      display: inline-block;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #af0c0cc4;
      color: white;
      font-size: 1rem;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btnn:hover {
      background-color: #c40808;
    }
        /* Section Services */
.service {
    padding: 50px 20px;
    background-color: #f8f8f8;
    
    text-align: center;
    max-width: 1000px; /* Limiter la largeur maximale */
    margin: 0 auto; /* Centrer la section */
}

.section-title {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #d9181e;
}

.services-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.service-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}







.menu-container {
    position: relative;
    left: -60px; /* décalage vers la gauche */
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



























/* Banner */
.service-banner {
    position: absolute;
    top: 0;
    left: 0;
    background: #d9181e;
    color: #fff;
    padding: 10px 20px;
    font-size: 1.1rem;
    font-weight: bold;
    clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);
    z-index: 1;
}



/* Image */
.service-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.1);
}

/* Content */
.service-content {
    padding: 20px;
}

.service-content p {
    font-size: 1rem;
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.service-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.service-buttons .btn {
    text-decoration: none;
    color: #fff;
    background: #d9181e;
    padding: 10px 20px;
    border-radius: 5px;
    transition: all 0.3s;
}

.service-buttons .btn:hover {
    background: transparent;
    color: #d9181e;
    border: 2px solid #d9181e;
}

/* Styles généraux */
footer {
    background-color: #f4f4f4;
    padding: 20px 110px;
    
    font-family: 'Arial', sans-serif;
    
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    left: 100px;
    
}

.footer-section {
    flex: 1;
    min-width: 250px;
    
}

.footer-section h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
    position: relative;
}

.footer-section h3::after {
    content: "";
    width: 50%;
    height: 2px;
    background-color: #d9181e;
    position: absolute;
    bottom: -5px;
    left: 0;
}

/* Transition de lien */
.footer-section a {
    display: block;
    color: #333;
    text-decoration: none;
    margin: 5px 0;
    padding-left: 0;
    transition: padding-left 0.3s ease, color 0.3s ease;
}

.footer-section a:hover {
    color: #d9181e;
    padding-left: 10px; /* Ajout de l'effet de décalage */
}

.phone-number {
    font-weight: bold;
    color: #d9181e;
    font-size: 20px;
    transition: transform 0.5s ease-in;
}

.phone-number:hover {
    transform:scaleY(1.2);
}

/* Bottom footer */
.footer-bottom {
    text-align: center;
    margin-top: 40px;
    font-size: 14px;
    color: #666;
}

/* Responsive */
@media screen and (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }
    .footer-section {
        min-width: 100%;
        text-align: center;
    }
    .footer-bottom {
        margin-top: 20px;
    }
}

 /* Bouton Go to Top */
 #goToTopBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: none;
  background-color: #d9181e;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 50%;
  font-size: 18px;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  transition: opacity 0.3s, transform 0.3s;
}

#goToTopBtn:hover {
  background-color: #a51416;
  transform: scale(1.1);
}



.profile-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

/* Image de profil */
.profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    transition: 0.3s;
}

/* Menu déroulant */
.dropdown-menu {
    position: absolute;
    top: 60px;
    right: 0;
    display: none;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    min-width: 180px;
    padding: 10px 0;
}

/* Affichage du menu si actif */
.dropdown-menu.show {
    display: block;
}

/* Style des liens */
.dropdown-menu a {
    display: block;
    padding: 10px 15px;
    color: black;
    text-decoration: none;
}

.dropdown-menu a:hover {
    background: #f0f0f0;
}

<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    // Inclure le fichier de configuration qui établit la connexion PDO
    require_once __DIR__ . '/../config/config.php';

    $user_id = $_SESSION['user_id'];
    $role    = $_SESSION['role'];

    // Détermine la table en fonction du rôle
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
            // Optionnel : rediriger ou gérer l'erreur
            die("Rôle inconnu.");
    }

    // Préparer et exécuter la requête pour récupérer nom et prénom
    $stmt = $pdo->prepare("SELECT nom, prenom FROM $table WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du résultat
    if ($user) {
        $nom    = $user['nom'];
        $prenom = $user['prenom'];
    } else {
        $nom = $prenom = "Inconnu";
    }
} else {
    // L'utilisateur n'est pas connecté
    $nom = $prenom = "";
}
?>




    </style>
</head>
<body>
    <!-- Barre de navigation -->
<nav class="navbar">
    <div class="logo"><img src="" alt=""></div>
    <ul class="nav-links">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="entreprise.php">Entreprise</a></li>
        <li><a href="a propos.php">À propos</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>

<div class="menu-container">
    <button class="menu-button" onclick="toggleMenu()">
        <img id="userIcon" src="<?= htmlspecialchars($user_photo) ?>" alt="User">
    </button>
    <div class="menu" id="menu">
        <?php if ($is_logged_in): ?>
            <p id="userName"><?= htmlspecialchars($user_name) ?></p>
            <button onclick="window.location.href='logout.php'">Déconnexion</button>
        <?php else: ?>
            <button onclick="window.location.href='LOGIN1_R.php'">Se connecter</button>
        <?php endif; ?>
    </div>
</div>


    </nav>
 

    











</nav>
<br><br>
    <!-- Slider Section -->
    <div class="slider-container" id="slider">
        <div class="slides">
            <!-- Slide 1 -->
            <div class="slide" style="background-image: url('slide1.jpg');">
                <div class="slide-content">
                    <h2>Un réseau unique</h2>
                    <p>Nos services sont disponibles dans le monde entier. Notre réseau couvre <strong>147 sites dans 100 pays.</strong></p>
                    <a href="#" class="btn">TROUVER UNE FILIALE</a>
                    <a href="#" class="btn">DEMANDE DE DEVIS</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="slide" style="background-image: url('slide2.jpg');">
                <div class="slide-content">
                    <h2>Déménagement International</h2>
                    <p>Des services de qualité sur mesure pour tous vos déménagements à travers les 5 continents.</p>
                    <a href="#" class="btn">EN SAVOIR PLUS</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="slide" style="background-image: url('slide3.jpg');">
                <div class="slide-content">
                    <h2>Garde-Meubles Sécurisés</h2>
                    <p>Stockage temporaire ou de longue durée, dans des entrepôts modernes et sécurisés.</p>
                    <a href="#" class="btn">RÉSERVER MA PLACE</a>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="navigation">
            <button id="prev">&#10094;</button>
            <button id="next">&#10095;</button>
        </div>

        <!-- Dots -->
        <div class="dots">
            <div class="dot active" data-index="0"></div>
            <div class="dot" data-index="1"></div>
            <div class="dot" data-index="2"></div>
        </div>
    </div>
    <br>
    <section class="service">
        <h2 class="section-title">Nos Services</h2>
        <br>
        <div class="services-container">
            <!-- Card 1 -->
            <div class="service-card" id="particuliers">
                <div class="service-banner">POUR LES PARTICULIERS</div>
                <div class="service-image">
                    <img src="particuliers.jpg" alt="Service pour particuliers">
                </div>
                <div class="service-content">
                    <p>
                        Laissez-nous vous aider à préparer un déménagement réussi. 
                        Que vous déménagiez d'Afrique en Asie ou d'Angleterre aux États-Unis, 
                        nous vous accompagnons du départ à l'arrivée.
                    </p>
                    <div class="service-buttons">
                        <a href="#" class="btn">DÉCOUVRIR NOS SERVICES</a>
                        <a href="#" class="btn">DEMANDEZ UN DEVIS</a>
                    </div>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="service-card" id="organisations">
                <div class="service-banner">POUR LES ENTREPRISES</div>
                <div class="service-image">
                    <img src="organisations.jpg" alt="Service pour organisations">
                </div>
                <div class="service-content">
                    <p>
                        Notre expertise unique s'intègre au cœur d’un réseau international 
                        de spécialistes qualifiés proposant des solutions sur mesure.
                    </p>
                    <div class="service-buttons">
                        <a href="#" class="btn">DÉCOUVRIR NOS SOLUTIONS</a>
                        <a href="#" class="btn">NOUS CONTACTER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

    <?php
 include('../config/config.php'); // Connexion à la base de données

// Récupérer les offres
$sql = "SELECT * FROM offres";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="pricing">
    <h1>Tarifs compétitifs</h1>
    <div class="cards">
        <?php foreach ($offres as $offre) : ?>
            <div class="card" onmouseover="flipCard(this)" onmouseout="unflipCard(this)" onclick="toggleFlip(this)">
                <div class="card-inner">
                    <!-- Face avant -->
                    <div class="card-front">
                        <h3><?= htmlspecialchars($offre['nom']); ?></h3>
                        <p><?= nl2br(htmlspecialchars($offre['description'])); ?></p>
                        <p class="prix"><?= number_format($offre['prix'], 2); ?> DA</p>
                        <br>
                                         </div>

                    <!-- Face arrière -->
                    <div class="card-back">
                        <h3><?= htmlspecialchars($offre['nom']); ?></h3>
                        <ul class="features">
                            <li><strong>Chargement et déchargement</strong></li>
                            <li> <strong>Transport sécurisé</strong></li>
                            <li><?= $offre['protection_meubles'] ? ' <strong>Protection de base des meubles</strong>' : ' <strong>Pas de protection des meubles</strong>'; ?></li>
                            <li><?= $offre['emballage_fragile'] ? ' <strong>Emballage des objets fragiles</strong>' : ' <strong>Pas d\'emballage des objets fragiles</strong>'; ?></li>
                            <?php if ($offre['emballage_complet']) : ?>
                                <li> <strong>Emballage/déballage complet</strong></li>
                            <?php endif; ?>
                            <?php if ($offre['fourniture_cartons']) : ?>
                                <li> <strong>Fourniture de cartons standards</strong></li>
                            <?php endif; ?>
                            <?php if ($offre['montage_meubles_simples']) : ?>
                                <li> <strong>Démontage/remontage meubles simples</strong></li>
                            <?php endif; ?>
                            <li> <strong>Durée max :</strong> <?= htmlspecialchars($offre['duree_max']); ?></li>
                        </ul>
                        <a href="<?= $is_logged_in ? 'formulaire reservation.php' : 'LOGIN1_R.php' ?>" class="btnn">Contactez-nous</a>

                        </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>




<style>



:root {
            --green-blue-crayola: hsl(198, 6%, 46%);
            --prussian-blue: hsl(202, 9%, 54%);
            --eerie-black: hsl(210, 11%, 15%);
            --dark-red: rgb(206, 30, 30);
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 100%);
            --light-gray: hsl(0, 0%, 80%);
            --font-main: 'Rubik', sans-serif;
            --font-heading: 'Oswald', sans-serif;
        }

    

        /* Newsletter Section */
        .newsletter {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background-color: var(--dark-red);
            padding: 50px;
            overflow: visible;
        }

        .newsletter-banner {
            position: absolute;
            left: 40px;
            /* Ajustement pour le faire dépasser */
            bottom: -6px;
            /* Fait sortir l'image vers le bas */
        }

        .newsletter-banner img {
            max-width: 250px;
            height: auto;
        }

        .newsletter-content {
            flex: 1;
            text-align: left;
            padding-left: 30%;
            /* Décalage pour ne pas chevaucher l’image */
        }/* Conteneur du formulaire */
.newsletter-content form {
    display: flex;
    align-items: center;
    gap: 10px; /* Espace entre textarea et bouton */
    max-width: 500px;
}

/* Champ de texte (commentaire) */
.email-field {
    flex: 1; /* Prend tout l’espace disponible */
    padding: 12px 15px;
    font-size: 16px;
    font-family: var(--font-main);
    border: 1px solid var(--light-gray);
    border-radius: 6px;
    height: 50px; /* Même hauteur que le bouton */
    resize: none; /* Empêche le redimensionnement */
    background-color: var(--white);
    box-shadow: 0 1px 2px rgb(255, 255, 255);
    outline: none;
    transition: border-color 0.3s, box-shadow 0.3s;
}

/* Effet focus sur le textarea */
.email-field:focus {
    border-color: var(--green-blue-crayola);
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.75);
}

/* Bouton d'envoi */
.newsletter-btn {
    height: 50px;
    padding: 0 20px;
    background-color: var(--prussian-blue);
    color: var(--white);
    font-family: var(--font-heading);
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap; /* Empêche le texte du bouton de se casser */
}

/* Effet hover sur le bouton */
.newsletter-btn:hover {
    background-color: var(--green-blue-crayola);
}

/* Responsive : aligner en colonne sur mobile */
@media (max-width: 768px) {
    .newsletter-content form {
        flex-direction: column;
        align-items: stretch;
    }

    .email-field, .newsletter-btn {
        width: 100%;
    }
}
.newsletter-content h2 {
    font-family: var(--font-heading);
    font-size: 24px;
    margin-bottom: 10px;
    color: var(--white); /* بدلناها من var(--black) إلى var(--white) */
}

</style>


    <br><br><br><br><br><br><br>
    <section class="newsletter">
    <div class="newsletter-banner">
        <img src="../assets/images/newsletter-banner.png" alt="Newsletter Banner">
    </div>

    <div class="newsletter-content">
        <h2>Votre commentaire ici...</h2>

        <form action="ajouter_commentaire.php" method="post" onsubmit="return verifierConnexion();">
            <!-- Zone de commentaire ajustée pour ressembler à un input -->
            <textarea name="commentaire" class="email-field" rows="4" placeholder="Écris ton commentaire ici..." required></textarea>

            <button type="submit" class="newsletter-btn">Envoyer</button>
        </form>

        <!-- Vérification connexion -->
        <script>
            function verifierConnexion() {
                var estConnecte = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
                
                if (!estConnecte) {
                    window.location.href = 'LOGIN1_R.php';
                    return false;
                }
                return true;
            }
        </script>
    </div>
</section>


    
    
    
    
    
    
    
    
    
    <!-- Bouton Go to Top -->
    <button id="goToTopBtn" title="Retour en haut">↑</button>

    <!-- footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section contact">
                <h3>CONTACT</h3>
                <p>Pour nous joindre :</p>
                <p class="phone-number">+213 (0) 541 768 051</p>
                <p>Lun - Ven : 8h00 à 19h00</p>
                <p>Sam : 9h00 à 17h00</p>
                <div class="links">
                    <a href="a propos.html">À propos</a>
                    <a href="contact.html">Contactez-nous</a>
                </div>
            </div>
            <div class="footer-section services">
                <h3>SERVICES</h3>
                <ul>
                    <li><a href="#">Aide / FAQ</a></li>
                    <li><a href="a propos.html">Mes guides déménagement</a></li>
                    <li><a href="rntreprise.html">Devenir partenaire</a></li>
                    <li><a href="contact.html">Demandez votre devis déménagement</a></li>
                    <li><a href="#">Espace Déménageur</a></li>
                </ul>
            </div>
            <div class="footer-section mentions">
                <h3>MENTIONS</h3>
                <p><a href="#">Données personnelles</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>EXPERTMOVE.dz - Un site du groupe EXPERTMOVE</p>
        </div>
    </footer>
    
     <!-- partie java script -->
    <script>
    
   

        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const slider = document.getElementById('slider');

        let currentIndex = 0;
        let autoSlideInterval;

        function updateSlider() {
            document.querySelector('.slides').style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, index) => dot.classList.toggle('active', index === currentIndex));
        }

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }

        function showPrevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        }

        // Auto-slide function
        function startAutoSlide() {
            autoSlideInterval = setInterval(showNextSlide, 8000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event Listeners
        nextButton.addEventListener('click', showNextSlide);
        prevButton.addEventListener('click', showPrevSlide);

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                currentIndex = parseInt(dot.dataset.index);
                updateSlider();
            });
        });

        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);

        // Start auto-slide on page load
        startAutoSlide();
        //section pricing
        function flipCard(card) {
          card.classList.add('flipped'); // Applique l'effet de survol (inversion)
        }
    
        function unflipCard(card) {
          if (!card.classList.contains('flipped')) {
            card.classList.remove('flipped'); // Enlève l'inversion si la carte n'est pas déjà retournée
          }
        }
    
        
        // buuton go to top
        // Sélectionner le bouton
        const goToTopBtn = document.getElementById('goToTopBtn');

        // Afficher/Masquer le bouton en fonction du scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                goToTopBtn.style.display = 'block';
            } else {
                goToTopBtn.style.display = 'none';
            }
        });

        // Remonter en haut de la page lorsqu'on clique sur le bouton
        goToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Défilement fluide
            });
        });
        

let isConnected = false; // Passe à true quand l'utilisateur est connecté

const userBubble = document.getElementById('userBubble');
const userMenu = document.getElementById('userMenu');

// Fonction de redirection vers la page de connexion
function redirectToLogin() {
    console.log("Redirection vers LOGIN1_R.php");
    window.location.href = 'LOGIN1_R.php';
}

// Gère le clic sur la boule
userBubble.addEventListener('click', function(e) {
  // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
  if (!isConnected) {
    redirectToLogin();
  } else {
    // Si connecté, affiche ou cache le menu déroulant
    if (userMenu.style.display === 'block') {
      userMenu.style.display = 'none';
    } else {
      userMenu.style.display = 'block';
    }
  }
});

// Pour masquer le menu si on clique en dehors
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
    





    </script>
</body>
</html>
