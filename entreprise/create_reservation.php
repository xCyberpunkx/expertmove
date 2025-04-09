<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter une Réservation</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Nouvelle Réservation</h1>
  <form action="store_reservation.php" method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-2xl">
    <label class="block mb-2">Nom:
      <input name="name" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Email:
      <input name="email" type="email" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Téléphone:
      <input name="phone" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Adresse actuelle:
      <input name="currentAddress" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Nouvelle adresse:
      <input name="newAddress" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Wilaya:
      <input name="wilaya" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Date:
      <input name="date" type="date" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Heure:
      <input name="time" type="time" class="w-full p-2 border rounded" required>
    </label>
    <label class="block mb-2">Détails:
      <textarea name="details" class="w-full p-2 border rounded"></textarea>
    </label>
    <button class="bg-green-600 text-white px-4 py-2 rounded">Ajouter</button>
  </form>
</body>
</html>
