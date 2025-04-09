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
    <title> Déménagement</title>
    <style>
        /* Global Styles */
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f8f8;
            align-items: center;
            justify-content: center;
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

        

        

        /* Responsive Navbar */
        @media (max-width: 768px) {
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
        /*la video !!!!*/
        .slider-container {
            position: relative;
            max-width: 100%;
            height: 100vh;  /* Prendre toute la hauteur de l'écran */
            overflow: hidden;
        }
        
        .slider {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
        .slide {
            position: relative;
            width: 100%;
            height: 100%;
        }
        
        .slide-video {
            width: 100%;
            height: 100%;
            object-fit: cover;  /* S'assure que la vidéo occupe tout l'espace */
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);  /* Opacité de la vidéo */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .textt {
            text-align: center;
            color: white;
        }
        
        .textt h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        
        .textt p {
            font-size: 1.5em;
            margin-top: 0;
        }

        /* Footer Styling */
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
            padding-left: 10px;
        }

        .phone-number {
            font-weight: bold;
            color: #d9181e;
            font-size: 20px;
            transition: transform 0.5s ease-in;
        }

        .phone-number:hover {
            transform: scaleY(1.2);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #666;
        }

        /* Back to Top Button */
        #back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #d9181e;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            display: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        #back-to-top:hover {
            background-color: #b9151b;
        }

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
        /*le css d' etapes */
        .steps-container {
            text-align: center;
            padding: 50px 80px;
            background-color: #f9f9f9;
          }
          
          .steps-container h2 {
            font-size: 1.8rem;
            margin-bottom: 30px;
          }
          
          .steps-container p {
            font-size: 1.25rem;
            font-style: oblique;
            /*text-align: justify;*/
          }

          .steps-progress {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
          }
          
          .progress-bar {
            position: relative;
            width: 80%;
            height: 5px;
            background-color: #e6e6e6;
            margin-bottom: 30px;
          }
          
          .progress {
            height: 100%;
            width: 0%;
            background-color: #ff4b5c;
            transition: width 0.5s ease-in-out;
          }
          
          .steps-content {
            display: flex;
            justify-content: space-between;
            width: 80%;
          }
          
          .step {
            text-align: center;
            max-width: 250px;
          }
          
          .step .circle {
            width: 50px;
            height: 50px;
            background-color: #ff4b5c;
            color: #fff;
            border-radius: 50%;
            line-height: 50px;
            margin: 0 auto 15px;
            font-weight: bold;
          }
          
          .step h3 {
            font-size: 1.2rem;
            margin: 10px 0;
          }
          
          .step h3 span {
            font-weight: bold;
          }
          
          .step p {
            font-size: 1rem;
            color: #666;
            text-align: justify;
          }
          
          .cta-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff4b5c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease-in-out;
          }
          
          .cta-button:hover {
            background-color: #d94047;
          }
          .step-icon {
            width: 80px;
            height: auto;
            margin: 0 auto 10px;
          }
                    
         /*les commentaire */
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .testimonials {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }
        
        .review-container {
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }
        
        .review-card {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }
        
        .stars {
            display: flex;
            gap: 5px;
        }
        
        .star {
            color: #ccc;
            font-size: 30px;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .star.filled {
            color: #4caf50;
        }
        
        .star.hovered {
            color: #ff9800;
        }
        
        .review-title {
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
        }
        
        .review-text {
            margin: 10px 0;
            color: #555;
        }
        
        .reviewer {
            font-size: 14px;
            color: #777;
            font-weight: bold;

        }
        
        
        /* 3 cards */
        .service-cards {
            display: flex;
            gap: 90px;

            display: flex;
            justify-content: center; /* Centre horizontalement */
            width: 100%; /* Important pour que le conteneur prenne toute la largeur */
            padding: 20px; /* Ajoute un peu d'espace autour des cartes */
        }
        
        .service-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 350px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            
            
        }
        
        .service-card h3 {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #d9181e;
        }
        
        .service-card p {
            font-size: 15px;
            color: #666;
            margin-top: 10px;
            text-align: justify;
        }
        
        .icon {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            display: block;
            
        }
       
 



















      
        .menu-container {
            position: relative;
            left: -60px;
        }

        .menu-button {
            width: 50px;
            height: 50px;
            background-color: #c50606;
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
            margin: 5px 0;
            font-weight: bold;
            color: black; /
        }

        .menu button {
            width: 100%;
            padding: 8px;
            background: #e90606;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        .menu button:hover {
            background: #b30000;
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
        <div class="logo">Déménagement</div>
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
    
    <div class="slider-container"><!-- la video !!!! -->
        <div class="slider">
            <div class="slide">
                <video class="slide-video" id="video" autoplay loop muted>
                    <source src="deme.mp4" type="video/mp4">
                    Votre navigateur ne prend pas en charge la vidéo.
                </video>
                <div class="overlay">
                    <div class="textt">
                        <h1>Déménagez sans stress !</h1>
                        <p>Nous rendons votre déménagement facile et rapide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="steps-container"><h2> Quels sont nos avantages ?</h2>
    <p>Demandez votre devis en ligne et trouvez au sein du réseau des Artisans déménageurs, les partenaires déménageurs les plus près de chez vous. Nous regroupons près de 300 déménageurs professionnels à travers la France. Nous sommes de fait la plus grande enseigne de déménageurs professionnels d'Europe.

Réactivité, simplicité, proximité, souplesse : votre déménagement est un moment clé dans votre vie. Notre vaste réseau d'artisans déménageurs nous permet de pouvoir répondre à tout type de déménagement, sur tout le territoire français et européen. Chaqu'un de nos partenaire déménageur vous proposera une prestation et un tarif qui sera calculé en prenant en compte vos demandes, et les particularités éventuelles de votre déménagement.
    </p></div>
    <div class="service-cards">
        <div class="service-card">
            <img src="global.svg" alt="Globe" class="icon">
            <h3>Simple et rapide</h3>
            <p>Accédez à votre demande de devis de déménagement 24 heures sur 24 et 7 jours sur 7</p>
        </div>
        <div class="service-card">
            <img src="specialist.svg" alt="Specialist" class="icon">
            <h3>Spécialiste de l'accompagnement dans la mobilité en France</h3>
            <p>Profitez de nos conseils, outils, et devis gratuit pour vous faciliter l'organisation de votre déménagement.</p>
        </div>
        <div class="service-card">
            <img src="lightningg.svg" alt="Lightning" class="icon">
            <h3>Rapidité</h3>
            <p>Inutile d'appeler 1000 déménageurs différents pour comparer les prix, 2 minutes suffisent pour obtenir votre comparatif en moins de 48h.</p>
        </div>
    </div>
    
    <!-- les br pour tester 
    <br><br><br><br> 
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>-->
    <!-- la bare -->
    <div class="progress-bar-container">
        <div id="progress-bar"></div>
    </div>
    
     <!-- les etapes  -->
     <section id="steps" class="steps-container">
        <h2>En 3 étapes simples, obtenez une entreprise de déménagement fiable à votre porte</h2>
        <div class="steps-progress">
          <div class="progress-bar">
            <div class="progress"></div>
          </div>
          <div class="steps-content">
            <div class="step">
              <img src="step1.svg" alt="Post your Listing Icon" class="step-icon" />
              <div class="circle">1</div>
              <h3>Demandez votre <span>Service</span></h3>
              <p>Répondez aux questions spécifiques à vos besoins et en quelques clics, elle est publiée et visible par toutes les entreprises de déménagement.</p>
            </div>
            <div class="step">
              <img src="step2.svg" alt="Competitive offers Icon" class="step-icon" />
              <div class="circle">2</div>
              <h3>Recevez <span> des offres concurrentielles</span></h3>
              <p>Nos entreprises de déménagement professionnelles seront alertées instantanément et vous proposeront leurs meilleurs devis de déménagement.</p>
            </div>
            <div class="step">
              <img src="step3.svg" alt="Removal company Icon" class="step-icon" />
              <div class="circle">3</div>
              <h3>Réservez <span> votre offre de déménagement</span></h3>
              <p>Une fois que vous avez sélectionné votre devis, le déménageur viendra récupérer vos meubles et effets personnels à la date choisie, puis les transportera jusqu'à la destination.</p>
            </div>
          </div>
        </div>
        <br>
        <button class="cta-button">Obtenir un devis</button>
      </section>
      <br>
      <br>
      <!-- les commentaire -->
      <section class="testimonials">
        <center><h2>Ils ont déménagé avec Xpertmove</h2></center>
        <div class="review-container">
            <div class="review-card" data-review-id="1">
                <div class="stars">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <p class="review-title">Excellent service de déménagement</p>
                <p class="review-text">Excellent service de déménagement ! Déménageurs aimables et ponctuels. Ils nous ont tenus informés de tout et le prix est très abordable.</p>
                <p class="reviewer">Elsa</p>
            </div>
            <div class="review-card" data-review-id="2">
                <div class="stars">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <p class="review-title">je recommande</p>
                <p class="review-text">Excellent chauffeur, moum32. Il a respecté les délais et les engagements, a entièrement déchargé mon camion et m'a aidé à transporter les meubles lourds jusqu'à ma nouvelle maison.</p>
                <p class="reviewer">Liam Loyer</p>
            </div>
            <div class="review-card" data-review-id="3">
                <div class="stars">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <p class="review-title">Site agréable et produits de qualité</p>
                <p class="review-text">Le site est très agréable à utiliser et les produits sont de bonne qualité. La livraison a été effectuée dans les délais et le service client est très réactif.</p>
                <p class="reviewer">britannie</p>
            </div>
        </div>
        
    </section>

      <br><br>
    <!-- Footer -->
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
                    <li><a href="entreprise.html">Devenir partenaire</a></li>
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

    <!-- Back to Top Button -->
    <button id="backToTop">↑</button>

    <script>
      
      
        // la video !!!! 
        let video = document.getElementById('video');
const totalSlides = 1;  // Une seule vidéo dans ce cas

// Optionnel : Si vous voulez ajouter un contrôle pour jouer/mettre en pause la vidéo (si besoin)
video.addEventListener('click', function () {
    if (video.paused) {
        video.play();
    } else {
        video.pause();
    }
});


        // Back to Top Button
        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        /*js des etapes*/
        window.addEventListener('scroll', function () {
            const stepsSection = document.querySelector('#steps');
            const progress = document.querySelector('.progress');
            const stepsContent = document.querySelector('.steps-content');
          
            const sectionTop = stepsSection.offsetTop;
            const sectionHeight = stepsSection.offsetHeight;
            const scrollPosition = window.scrollY + window.innerHeight;
          
            if (scrollPosition >= sectionTop && scrollPosition <= sectionTop + sectionHeight) {
              const percentage =
                ((scrollPosition - sectionTop) / sectionHeight) * 100;
              progress.style.width = `${percentage}%`;
            }
          });
 // Ajout de l'animation de remplissage lors du survol
 document.querySelectorAll('#steps').forEach((step, index) => {
    step.addEventListener('mouseenter', () => {
        // Remplit la barre de progression suivante
        const progressBar = step.nextElementSibling.querySelector('.progress');
        if (progressBar) {
            progressBar.style.width = '100%';
        }
    });

    step.addEventListener('mouseleave', () => {
        // Réinitialise la barre de progression
        const progressBar = step.nextElementSibling.querySelector('.progress');
        if (progressBar) {
            progressBar.style.width = '0%';
        }
    });
});          

//js de commentaire
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');

    // Fonction pour gérer les survols
    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            const value = parseInt(star.getAttribute('data-value'));
            // Mettre à jour les étoiles qui seront survolées
            updateStars(value, 'hovered');
        });

        star.addEventListener('mouseout', () => {
            // Réinitialiser les étoiles survolées
            updateStars(0, 'hovered');
        });

        // Fonction pour gérer les clics
        star.addEventListener('click', () => {
            const selectedStars = parseInt(star.getAttribute('data-value'));
            const reviewId = star.closest('.review-card').getAttribute('data-review-id');
            // Mettre à jour les étoiles pour refléter le choix de l'utilisateur
            updateStars(selectedStars, 'filled');
            // Envoi de la note via AJAX (ici simulé par un log dans la console)
            submitRating(reviewId, selectedStars);
        });
    });

    // Fonction pour mettre à jour les étoiles
    function updateStars(count, className) {
        stars.forEach(star => {
            const value = parseInt(star.getAttribute('data-value'));
            if (value <= count) {
                star.classList.add(className);
            } else {
                star.classList.remove(className);
            }
        });
    }

    
});
// Example JS to animate icons on hover
document.querySelectorAll('.service-card').forEach(card => {
    card.addEventListener('mouseover', () => {
        card.style.transform = 'scale(1.05)';
        card.style.transition = 'transform 0.3s ease';
    });

    card.addEventListener('mouseout', () => {
        card.style.transform = 'scale(1)';
    });
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
