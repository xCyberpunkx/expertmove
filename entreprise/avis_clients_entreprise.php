<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis Clients - Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
    <div class="flex">
        <!-- Barre latérale -->
        <aside class="w-64 bg-white dark:bg-gray-800 h-screen p-5 shadow-md">
            <h2 class="text-2xl font-bold mb-6">Entreprise Partenaire</h2>
            <nav>
                <ul>
                    <li class="mb-4"><a href="dashboard_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">dashboard</span><span class="ml-2">Tableau de bord</span></a></li>
                    <li class="mb-4"><a href="commandes_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">assignment</span><span class="ml-2">Commande</span></a></li>
                    <li class="mb-4"><a href="profil_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Mon Profil</span></a></li>
                    <li class="mb-4"><a href="parametres_entreprise.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètre</span></a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenu principal -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-semibold mb-4">Avis Clients</h1>
            
            <!-- Liste des avis -->
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="p-3 text-left">Client</th>
                            <th class="p-3 text-left">Avis</th>
                            <th class="p-3 text-left">Évaluation</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3">Jean Dupont</td>
                            <td class="p-3">Service rapide et efficace !</td>
                            <td class="p-3 text-yellow-400">
                                ★★★★☆
                            </td>
                            <td class="p-3">
                                <button onclick="afficherAvis('Jean Dupont', 'Service rapide et efficace !', 4)" class="bg-blue-500 text-white px-3 py-1 rounded">Afficher</button>
                                <button onclick="supprimerAvis(this)" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3">Sophie Martin</td>
                            <td class="p-3">Très bonne organisation, je recommande.</td>
                            <td class="p-3 text-yellow-400">
                                ★★★★★
                            </td>
                            <td class="p-3">
                                <button onclick="afficherAvis('Sophie Martin', 'Très bonne organisation, je recommande.', 5)" class="bg-blue-500 text-white px-3 py-1 rounded">Afficher</button>
                                <button onclick="supprimerAvis(this)" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modale d'affichage d'avis -->
    <div id="modalAvis" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-2">Avis de <span id="modalNom"></span></h2>
            <p id="modalTexte" class="mb-4"></p>
            <div id="modalEtoiles" class="text-yellow-400 mb-4"></div>
            <button onclick="fermerModal()" class="bg-gray-500 text-white px-3 py-1 rounded">Fermer</button>
        </div>
    </div>

    <script>
        function afficherAvis(nom, texte, etoiles) {
            document.getElementById('modalNom').textContent = nom;
            document.getElementById('modalTexte').textContent = texte;
            
            let etoilesHtml = '';
            for (let i = 0; i < etoiles; i++) {
                etoilesHtml += '★';
            }
            for (let i = etoiles; i < 5; i++) {
                etoilesHtml += '☆';
            }
            document.getElementById('modalEtoiles').innerHTML = etoilesHtml;
            
            document.getElementById('modalAvis').classList.remove('hidden');
        }

        function fermerModal() {
            document.getElementById('modalAvis').classList.add('hidden');
        }

        function supprimerAvis(button) {
            if (confirm("Voulez-vous vraiment supprimer cet avis ?")) {
                button.closest('tr').remove();
            }
        }
    </script>
</body>
</html>
