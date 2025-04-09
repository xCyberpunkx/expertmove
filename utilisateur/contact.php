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
            height: 100%;
   
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
} /*forme*/
.hero-section {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 500px;
    background: url('C:\Users\pc\Downloads\projet\pic\slide1.jpg') no-repeat center center/cover;
    margin-bottom: 30%;
  }
  
  .hero-content {
    color: white;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    max-width: 50%;
    margin-left: 50px;
    transform: translateY(30%);
  }
  
  .hero-content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
  }
  
  .hero-content p {
    font-size: 1.2rem;
  }
  
  .form-container {
    position: absolute;
    /*top: 70%;*/
    top: 50%;
    right: 50px;
    transform: translateY(30%);
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
  }
  
  .form-container h2 {
    margin-bottom: 10px;
    font-size: 1.5rem;
    text-align: center;
  }
  
  .form-container ul {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    font-size: 0.9rem;
  }
  
  .form-container ul li {
    margin-bottom: 5px;
    list-style: none;
  }
  
  /* Formulaire */
form {

flex-direction: column;
}

h2 {
margin: 15px 0 10px;
font-size: 1.2rem;
}

.form-group {
display: flex;
gap: 10px;
margin-bottom: 15px;
}

input, select, textarea {
width: 100%;
padding: 5px;
font-size: 1rem;
border: 1px solid #ccc;
border-radius: 5px;
}

textarea {
resize: none;
height: 80px;
margin-bottom: 15px;
}

label {
display: flex;
align-items: center;
gap: 5px;
margin-bottom: 10px;
}

.btn {
background-color: #af0c0ce0;
color: #fff;
padding: 10px 20px;
font-size: 1.1rem;
text-align: center;
border: none;
border-radius: 5px;
cursor: pointer;
transition: background 0.3s ease;
width: 100%;
}

.btn:hover {
background-color: #c40808;
}

/* Texte en bas */
.info-text {
font-size: 0.8rem;
color: #555;
margin-top: 10px;
line-height: 1.4;
}

/*section */

/* Styles généraux */
footer {
    background-color: #f4f4f4;
    padding: 20px 110px;
    font-family: 'Arial', sans-serif;
    margin-top: 10%;
    position: sticky;
    
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
#avantage{
    color: #333;
    text-shadow: 0 0px 0.1px rgba(0, 0, 0, 0.5);

}
/*effet difilement*/
.fade-in {
    opacity: 0;
    transition: opacity 3s ease-in-out;
}

.fade-in.visible {
    opacity: 1;
}


.menu-container {
            position: relative;
            left: -60PX;
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

<div class="hero-section">
    <div class="hero-content">
      <h1>Comparez et recevez plusieurs devis pour votre déménagement</h1>
      <p>
        Rapide et gratuit, votre demande sera transmise aux artisans déménageurs
        partenaires proche de chez vous, pouvant répondre à votre déménagement.
      </p>
      <br>
      <br><br><br><br>
      <br><br><br><br>
      <br><br><br><br>
    <br>
    <br>
      <br><br><br>
      <div id="avantage"> <h2>Pourquoi nous choisir ?</h2><br>
        <p class="fade-in"><strong>Simplifiez votre déménagement</strong><br>
        Vous déménagez prochainement ? Tournez-vous vers des professionnels du secteur qui vous garantiront un service de qualité.</p>
        <br><br>
        <p class="fade-in"><strong>Déménageurs professionnels uniquement</strong><br>
        Les partenaires de notre réseau d'artisans déménageurs sont des professionnels du déménagement certifiés, qui sont situés proche de chez vous.</p>
        <br><br>
        <p class="fade-in"><strong>Comparez et économisez</strong><br>
        Besoin de plusieurs devis ou simplement d'économiser de l'argent ? Restez chez vous, on s'occupe de tout.</p>
        <br><br>
        <p class="fade-in"><strong>Gagnez du temps</strong><br>
        Nos artisans déménageurs prendront contact directement avec vous pour l'obtention de vos devis en moins de 48h directement.</p>
      </div>
    </div>
    
    <div class="form-container">
      <h2>Votre devis en 2 minutes</h2>
      <ul>
        <li>✅ Gratuit</li>
        <li>✅ Sans engagement</li>
        <li>✅ Simple et rapide</li>
      </ul>
      <form id="devisForm">
        <!-- Votre logement actuel -->
        <h2>Votre logement actuel</h2>
        <div class="form-group">
            <input type="text" placeholder="Code postal*" required>
            <input type="text" placeholder="Ville*" required>
        </div>
        <div class="form-group">
            <input type="number" placeholder="Surface" required>
            <select>
                <option value="m2">m2</option>
                <option value="m3">m3</option>
            </select>
        </div>
        <!-- Votre nouveau logement -->
        <h2>Votre nouveau logement</h2>
        <div class="form-group">
            <input type="text" placeholder="Code postal*" required>
            <input type="text" placeholder="Ville*" required>
        </div>
        <!-- Vos informations -->
        <h2>Vos informations</h2>
        <label>
            <input type="checkbox"> Déménagement d'entreprise ou d'association
        </label>
        <div class="form-group">
            <input type="text" placeholder="Nom*" required>
            <input type="tel" placeholder="Numéro de téléphone*" required>
        </div>
        <div class="form-group">
            <input type="email" placeholder="E-mail*" required>
            <input type="date" placeholder="Date de déménagement*" required>
        </div>
        <textarea placeholder="Précisions à apporter sur votre déménagement : volume (en m3), étage, difficulté d'accès, espace de stockage, piano, monte meuble..."></textarea>
        <label>
            <input type="checkbox"> Je souhaite faire des économies, et profiter des offres exclusives Bemove
        </label>
        <!-- Bouton -->
        <button type="submit" class="btn">DEVIS GRATUIT</button>
    </form>
    <p class="info-text">
        * Champs obligatoire<br>
        Informations collectées par Bemove pour vous proposer un service gratuit d’accompagnement à l'emménagement...
    </p>
    </div>
  </div>
<br><br><br><br>

<br><br><br><br>
<!-- Bouton Go to Top -->
<button id="goToTopBtn" title="Retour en haut">↑</button>
   <br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- footer -->
   <footer>
    <div class="footer-container">
        <div class="footer-section contact">
            <h3>CONTACT</h3>
            <p>Pour nous joindre :</p>
            <p class="phone-number">02 90 22 52 77</p>
            <p>Lun - Ven : 8h00 à 19h00</p>
            <p>Sam : 9h00 à 17h00</p>
            <div class="links">
                <a href="a propos.html">À propos</a>
                <a href="contact.html">Contactez-nous</a>
            </div>
        </div>
        <div class="footer-section servicess">
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

 <!-- partie java script -->
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

function updateAuthButtons() {
    if (isLoggedIn) {
        loginBtn.style.display = 'none';
        profileBtn.style.display = 'inline-block';
    } else {
        loginBtn.style.display = 'inline-block';
        profileBtn.style.display = 'none';
    }
}
window.addEventListener('scroll', () => {
    const elements = document.querySelectorAll('.fade-in');
    elements.forEach(element => {
        const position = element.getBoundingClientRect().top;
        if (position < window.innerHeight && position > 0) {
            element.classList.add('visible');
        } else {
            element.classList.remove('visible');
        }
    });
});
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
</script>
</body>
</html>