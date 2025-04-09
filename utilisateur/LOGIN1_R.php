


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
        <form action="register.php" method="post">
                <h1>Create Account</h1><!-- création de compte--> 
                <br>
                <div class="user-type">
                    <div class="role-card" data-role="chauffeur">
                        <i class="fa-solid fa-truck"></i>
                        <p>Chauffeur</p>
                    </div>
                    <div class="role-card" data-role="entreprise">
                        <i class="fa-solid fa-building"></i>
                        <p>Entreprise</p>
                    </div>
                    <div class="role-card" data-role="utilisateur">
                        <i class="fa-solid fa-user"></i>
                        <p>Utilisateur</p>
                    </div>
                </div>

                <input type="hidden" id="role_signup" name="role_signup" value="utilisateur">


                <span class="spane"> Nom</span>
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
                <span class="spane"> Prenom</span>
                <input type="text" id="prenom" name="prenom" placeholder="prenom"required>
                <span class="spane">Numéro</span>
                <input type="tel" id="telephone" name="telephone" placeholder="Numéro" required oninput="validatePhoneNumber(this)">
                <script>
    function validatePhoneNumber(input) {
        // Remplacer tout ce qui n'est pas un chiffre
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>
                <span class="spane">Email</span> 
                <input type="email" id="email" name="email" placeholder="Email"required>
                <span class="spane">Mot de passe</span>
                <div style="position: relative;">
                    <input type="password" id="password_signup" name="passwordd" placeholder="Mot de passe" required>
                    <span onclick="togglePassword('password_signup')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                        👁️
                    </span>
                </div>
                <script>
        function togglePassword(passwordFieldId) {
            const passwordInput = document.getElementById(passwordFieldId);
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }
    </script>
                <span class="spane">wilaya</span>
                <input type="texte" id="wilaya" name="wilaya" placeholder="wilaya"required>
                <button>S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="conx.php" method="post">
                <h1>Se connecter</h1><!-- connexion-->
                <br>
                <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const errorDiv = document.getElementById('error-msg');
      if (errorDiv) {
        errorDiv.textContent = "Email ou mot de passe incorrect.";
        errorDiv.style.display = "block";
      }
    });
  </script>
<?php endif; ?>
<div id="error-msg" style="color: red; display: none; margin-bottom: 10px;"></div>
                <div class="user-type">
                    <div class="role-card" data-role="chauffeur">
                        <i class="fa-solid fa-truck"></i>
                        <p>Chauffeur</p>
                    </div>
                    <div class="role-card" data-role="entreprise">
                        <i class="fa-solid fa-building"></i>
                        <p>Entreprise</p>
                    </div>
                    <div class="role-card" data-role="utilisateur">
                        <i class="fa-solid fa-user"></i>
                        <p>Utilisateur</p>
                    </div>
                </div>
                
                
                

                <input type="hidden" id="role_signin" name="role_signin" value="utilisateur">
               <input type="email" id="email" name="email" placeholder="Email" required>
               <div style="position: relative;">
                    <input type="password" id="password_signin" name="password" placeholder="Mot de passe" required>
                    <span onclick="togglePassword('password_signin')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                        👁️
                    </span>
                </div>
                <script>
        function togglePassword(passwordFieldId) {
            const passwordInput = document.getElementById(passwordFieldId);
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }
    </script>
    

                <a href="#">Mot de passe oublié?</a>
                <button>Se connecter</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Content de te revoir!</h1>
                    <p>Saisissez vos informations personnelles pour utiliser toutes les fonctionnalités du site</p>
                    <button class="hidden" id="login">Se connecter</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenue, ami !</h1>
                    <p>Saisissez vos informations personnelles pour utiliser toutes les fonctionnalités du site</p>
                    <button class="hidden" id="register">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}
.container span .spane{
 position: left;
}
body{
    background-color: #c9d6ff;
    background: linear-gradient(to bottom , #ffffff, #c6bfbf);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}

.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
    height: 500px;
}

.container p{
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.container span{
    font-size: 12px;
    position: left;
}

.container a{
    color: #333;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
}

.container button{
    background-color: rgb(206, 30, 30);
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}

.container form{
    background-color: #fff;
    display: flex;
    
    flex-direction: column;
    padding: 10% 10%;
    height: auto;
}

.container input{
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move{
    0%, 49.99%{
        opacity: 0;
        z-index: 1;
    }
    50%, 100%{
        opacity: 1;
        z-index: 5;
    }
}

.social-icons{
    margin: 20px 0;
}

.social-icons a{
    border: 1px solid #ccc;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle{
    /* background-color: orange; */
    height: 100%;
    background: linear-gradient(to right, rgb(206, 30, 30), rgb(253, 137, 137));
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
    background: linear-gradient(to left, rgb(206, 30, 30), rgb(238, 99, 99));
}

.container.active .toggle-right{
    transform: translateX(200%);
}








.form-container {
    overflow-y: auto;
    max-height: 100%;
    
}




.user-type {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-bottom: 20px;
    margin-top: 3px;
}

.role-card {
    width: 100px;
    height: 100px;
    background: #eee;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.role-card i {
    font-size: 30px;
    color: rgb(100, 100, 100);
    margin-bottom: -10px;
}

.role-card p {
    font-size: 14px;
    font-weight: bold;
    color: rgb(50, 50, 50);
    margin-bottom: -12px;
     
}

.role-card:hover, .role-card.active {
    background: rgb(206, 30, 30);
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.role-card.active i,
.role-card.active p {
    color: white;
}

























.password-container {
    position: relative;
    width: 100%;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.toggle-password i {
    color: #666;
}


</style>
    <script >
        const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.addEventListener("DOMContentLoaded", function () {
    const roleCards = document.querySelectorAll(".role-card");

    const roleSignupInput = document.getElementById('role_signup');
    const roleSigninInput = document.getElementById('role_signin');
    const formSignup = document.querySelector(".sign-up form");

    roleCards.forEach(card => {
        card.addEventListener("click", function () {
            let selectedRole = this.getAttribute("data-role");

            // ✅ تحديث الحقول المخفية حسب الدور
            if (roleSignupInput) roleSignupInput.value = selectedRole;
            if (roleSigninInput) roleSigninInput.value = selectedRole;

            console.log("Rôle sélectionné:", selectedRole);

            // ✅ حذف الحقول الإضافية القديمة (فقط في الفورم ديال signup)
            if (formSignup) {
                document.querySelectorAll(".extra-field").forEach(field => field.remove());

                // ✅ إضافة الحقول الخاصة حسب الدور
                if (selectedRole === "chauffeur") {
                    addField("Licence", "licence");
                    addField("Véhicule", "vehicule");
                } else if (selectedRole === "entreprise") {
                    addField("Nom de l'entreprise", "nom_entreprise");
                    addField("Numéro de registre", "registre");
                }

                
                setTimeout(() => {
                    formSignup.scrollTop = formSignup.scrollHeight;
                }, 200);
            }

            
            roleCards.forEach(c => c.classList.remove("active"));
            this.classList.add("active");
        });
    });

    // 🔧 دالة لإضافة الحقول الديناميكية
    function addField(placeholder, name) {
        let input = document.createElement("input");
        input.type = "text";
        input.placeholder = placeholder;
        input.name = name;
        input.classList.add("extra-field");
        formSignup.insertBefore(input, formSignup.querySelector("button"));
    }
});


    </script>
</body>

</html>