<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Commentaires</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray-100">
  <h1 class="text-2xl font-bold mb-4">Commentaires</h1>
  <div id="commentaire-list" class="space-y-4"></div>

  <script>
    function loadCommentaires() {
      const liste = document.getElementById('commentaire-list');
      const commentaires = JSON.parse(localStorage.getItem('commentaires')) || [];

      if (commentaires.length === 0) {
        liste.innerHTML = '<p class="text-gray-500">Aucun commentaire.</p>';
        return;
      }

      liste.innerHTML = '';
      commentaires.forEach(com => {
        const div = document.createElement('div');
        div.className = 'bg-white p-4 rounded shadow flex justify-between items-center';
        div.innerHTML = `
          <div>
            <p class="font-semibold">${com.auteur}</p>
            <p>${com.contenu}</p>
          </div>
          <button onclick="confirmerSuppression(${com.id})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Supprimer</button>
        `;
        liste.appendChild(div);
      });
    }

    function confirmerSuppression(id) {
      if (confirm("Voulez-vous vraiment supprimer ce commentaire ?")) {
        let commentaires = JSON.parse(localStorage.getItem('commentaires')) || [];
        commentaires = commentaires.filter(c => c.id !== id);
        localStorage.setItem('commentaire (1)', JSON.stringify(commentaires));
        loadCommentaires(); // rafraîchir la liste
      }
    }

    // Chargement initial
    loadCommentaires();
  </script>
</body>
</html>
