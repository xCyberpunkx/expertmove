<?php
session_start(); 


$is_logged_in = isset($_SESSION['user_id']);
$user_photo = $is_logged_in && !empty($_SESSION['user_photo']) ? $_SESSION['user_photo'] : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
$user_name = $is_logged_in ? $_SESSION['user_nom'] . ' ' . $_SESSION['user_prenom'] : '';
?>


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
<script> document.addEventListener("DOMContentLoaded", function () {
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
        <style>        .menu-container {
            position: relative;
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
