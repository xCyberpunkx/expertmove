<?php
require('../config/config.php');
$messageSuccess = '';
$messageError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name           = trim($_POST['name']);
    $email          = trim($_POST['email']);
    $phone          = trim($_POST['phone']);
    $currentAddress = trim($_POST['currentAddress']);
    $newAddress     = trim($_POST['newAddress']);
    $tarif          = trim($_POST['tarif']);
    $date           = trim($_POST['date']);
    $time           = trim($_POST['time']);
    $businessMove   = isset($_POST['businessMove']) ? 1 : 0;
    $details        = trim($_POST['details']);
    $message        = trim($_POST['message']);
    $wilaya         = trim($_POST['wilaya']);
    if ($name && $email && $phone && $currentAddress && $newAddress && $tarif && $date && $time && $wilaya) {
        try {
            $sql = "INSERT INTO reservation (name, email, phone, currentAddress, newAddress, tarif, `date`, `time`, businessMove, details, message, wilaya)
                    VALUES (:name, :email, :phone, :currentAddress, :newAddress, :tarif, :date, :time, :businessMove, :details, :message, :wilaya)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name'           => $name,
                ':email'          => $email,
                ':phone'          => $phone,
                ':currentAddress' => $currentAddress,
                ':newAddress'     => $newAddress,
                ':tarif'          => $tarif,
                ':date'           => $date,
                ':time'           => $time,
                ':businessMove'   => $businessMove,
                ':details'        => $details,
                ':message'        => $message,
                ':wilaya'         => $wilaya,
            ]);
            $messageSuccess = "Votre réservation a été envoyée avec succès !";
        } catch (PDOException $e) {
            $messageError = "Erreur lors de l'envoi de la réservation : " . $e->getMessage();
        }
    } else {
        $messageError = "Veuillez remplir tous les champs obligatoires.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Réservation - Logistique</title>
  <!-- Import Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* Réinitialisation et base */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #cfc8c8);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    /* Conteneur principal */
    .container {
      background: #fff;
      width: 90%;
      max-width: 600px;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    /* Titre */
    h1 { text-align: center; color: rgb(206, 30, 30); margin-bottom: 20px; }
    /* Formulaire */
    form { display: flex; flex-direction: column; }
    .form-group { margin-bottom: 15px; display: flex; flex-direction: column; }
    label { margin-bottom: 5px; font-weight: bold; color: #333; }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="time"],
    select,
    textarea {
      padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px; transition: border-color 0.3s ease;
    }
    input:focus, select:focus, textarea:focus { border-color: rgb(206, 30, 30); outline: none; }
    /* Bouton de soumission */
    button {
      padding: 15px;
      border: none;
      background: rgb(206, 30, 30);
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s ease;
      margin-top: 10px;
    }
    button:hover { background: rgb(182, 35, 35); }
    /* Messages */
    .success-message, .error-message {
      text-align: center;
      padding: 10px;
      margin-top: 20px;
      border-radius: 4px;
    }
    .success-message { background: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6; }
    .error-message { background: #f2dede; color: #a94442; border: 1px solid #ebccd1; }
  </style>
</head>
<body>
  
  <div class="container">
    <h1>Réservez votre service</h1>
    <?php if ($messageSuccess): ?>
      <div class="success-message"><?php echo htmlspecialchars($messageSuccess); ?></div>
    <?php endif; ?>
    <?php if ($messageError): ?>
      <div class="error-message"><?php echo htmlspecialchars($messageError); ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <div class="form-group">
        <label for="name">Nom complet</label>
        <input type="text" id="name" name="name" placeholder="Votre nom complet" required>
      </div>
      <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" id="email" name="email" placeholder="Votre email" required>
      </div>
      <div class="form-group">
        <label for="phone">Numéro de téléphone</label>
        <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone" required>
      </div>
      <div class="form-group">
        <label for="wilaya">Wilaya</label>
        <select id="wilaya" name="wilaya" required>
          <option value="">Sélectionnez votre wilaya</option>
          <option value="adrar">1 - Adrar</option>
    <option value="Chlef">2 - Chlef</option>
    <option value="Laghouat">3 - Laghouat</option>
    <option value=" Oum El Bouaghi">4 - Oum El Bouaghi</option>
    <option value="Batna">5 - Batna</option>
    <option value="Béjaïa">6 - Béjaïa</option>
    <option value="Biskra">7 - Biskra</option>
    <option value="Béchar">8 - Béchar</option>
    <option value="Blida">9 - Blida</option>
    <option value="Bouira">10 - Bouira</option>
    <option value="Tamanrasset">11 - Tamanrasset</option>
    <option value="Tébessa">12 - Tébessa</option>
    <option value="Tlemcen">13 - Tlemcen</option>
    <option value="Tiaret">14 - Tiaret</option>
    <option value="Tizi Ouzou">15 - Tizi Ouzou</option>
    <option value="Alger">16 - Alger</option>
    <option value="djelfa">17 - Djelfa</option>
    <option value="Jijel">18 - Jijel</option>
    <option value="Sétif">19 - Sétif</option>
    <option value="Saïda">20 - Saïda</option>
    <option value="Skikda">21 - Skikda</option>
    <option value="Sidi Bel Abbès">22 - Sidi Bel Abbès</option>
    <option value="Annaba">23 - Annaba</option>
    <option value="Guelma">24 - Guelma</option>
    <option value="Constantine">25 - Constantine</option>
    <option value="Médéa">26 - Médéa</option>
    <option value="Mostaganem">27 - Mostaganem</option>
    <option value="M'Sila">28 - M'Sila</option>
    <option value="Mascara">29 - Mascara</option>
    <option value="Ouargla">30 - Ouargla</option>
    <option value="Oran">31 - Oran</option>
    <option value="El Bayadh">32 - El Bayadh</option>
    <option value="Illizi">33 - Illizi</option>
    <option value="Bordj Bou Arreridj">34 - Bordj Bou Arreridj</option>
    <option value="Boumerdès">35 - Boumerdès</option>
    <option value="El Tarf">36 - El Tarf</option>
    <option value="Tindouf">37 - Tindouf</option>
    <option value="Tissemsilt">38 - Tissemsilt</option>
    <option value="El Oued">39 - El Oued</option>
    <option value="Khenchela">40 - Khenchela</option>
    <option value="Souk Ahras">41 - Souk Ahras</option>
    <option value="Tipaza">42 - Tipaza</option>
    <option value="Mila">43 - Mila</option>
    <option value="Aïn Defla">44 - Aïn Defla</option>
    <option value="Naâma">45 - Naâma</option>
    <option value="Aïn Témouchent">46 - Aïn Témouchent</option>
    <option value="Ghardaïa">47 - Ghardaïa</option>
    <option value="Relizane">48 - Relizane</option>
    <option value="Timimoun">49 - Timimoun</option>
    <option value="Bordj Baji Mokhtar">50 - Bordj Baji Mokhtar</option>
    <option value="Ouled Djellal">51 - Ouled Djellal</option>
    <option value="Touggourt">52 - Touggourt</option>
    <option value="Djanet">53 - Djanet</option>
    <option value="In Salah">54 - In Salah</option>
    <option value="In Guezzam">55 - In Guezzam</option>
    <option value="El M'Ghair">56 - El M'Ghair</option>
    <option value="El Meniaa">57 - El Meniaa </option>
    <option value="Autre">58 - Autre</option>
    </select><br>
      <div class="form-group">
        <label for="currentAddress">Votre logement actuel</label>
        <input type="text" id="currentAddress" name="currentAddress" placeholder="Adresse de votre logement actuel" required>
      </div>
      <div class="form-group">
        <label for="newAddress">Votre nouveau logement</label>
        <input type="text" id="newAddress" name="newAddress" placeholder="Adresse de votre nouveau logement" required>
      </div>
      <div class="form-group">
        <label for="tarif">Tarifs compétitifs</label>
        <select id="tarif" name="tarif" required>
          <option value="">Sélectionnez un tarif</option>
          <option value="economique">Économique</option>
          <option value="confort">Confort</option>
          <option value="lux">Lux</option>
        </select>
      </div>
        
      </div>
      <div class="form-group">
        <label for="date">Date de réservation</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="time">Heure de réservation</label>
        <input type="time" id="time" name="time" required>
      </div>
      <div class="form-group">
        <label>
          <input type="checkbox" id="businessMove" name="businessMove">
          Déménagement d'entreprise ou d'association
        </label>
      </div>
      <div class="form-group">
        <label for="details">Précisions sur votre déménagement</label>
        <textarea id="details" name="details" placeholder="Précisions sur le déménagement..." rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="message">Message (optionnel)</label>
        <textarea id="message" name="message" placeholder="Votre message" rows="4"></textarea>
      </div>
      <button type="submit">Réserver maintenant</button>
    </form>
  </div>
</body>
</html>
