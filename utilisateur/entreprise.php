<?php
session_start(); 


require_once __DIR__ . '/../config/config.php';
$is_logged_in = isset($_SESSION['user_id']);
$user_photo = $is_logged_in && !empty($_SESSION['user_photo']) ? $_SESSION['user_photo'] : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
$user_name = $is_logged_in ? $_SESSION['user_nom'] . ' ' . $_SESSION['user_prenom'] : '';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise de Déménagement et Partenariats</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f8f8;
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

        header {
            background: url('demee.jpg') no-repeat center center/cover;
            height: 60vh;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        header p {
            font-size: 1.2rem;
            margin-top: 10px;
        }


        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 40px;
            background-color: #fff;
        }

        .service {
            background: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .service img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-content {
            padding: 20px;
            text-align: center;
        }

        .service-content h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .service-content p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .service-content a {
            text-decoration: none;
            background-color: #d9181e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .service-content a:hover {
            background-color: #b01010;
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
            padding-left: 10px;
            /* Ajout de l'effet de décalage */
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
    <header>
        <div>
            <h1>Votre partenaire pour tous vos besoins en déménagement</h1>
            <p>Entreprises de stockage, nettoyage, partenariats logistiques et bien plus encore</p>
        </div>
    </header>

    <section id="services" class="services">
        <div class="service">
            <img src="stockage.jpg" alt="Stockage">
            <div class="service-content">
                <h3>Entreprises de stockage</h3>
                <p>Solutions de stockage sécurisées pour tous vos besoins.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
        </div>
        <div class="service">
            <img src="nettoyage.jpg" alt="Nettoyage">
            <div class="service-content">
                <h3>Entreprises de nettoyage</h3>
                <p>Services de nettoyage professionnels avant et après déménagement.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
        </div>

        <div class="service">
            <img src="Entreprises de manutention.jpeg" alt="Manutention">
            <div class="service-content">
                <h3>Entreprises de manutention</h3>
                <p>Solutions adaptées pour déplacer vos charges lourdes en toute sécurité.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
        </div>
        <div class="service">
            <img src="Emballages.jpg" alt="emballages">
            <div class="service-content">
                <h3>Entreprises d'emballages</h3>
                <p>Solutions adaptées pour emballer vos objets.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
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
    <script>


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