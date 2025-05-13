document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('a[href="#ajouter-voiture"]').addEventListener('click', function (e) {
        e.preventDefault();

        document.getElementById('admin-content').innerHTML = `
              <section class="form-section">
                <h2>Ajouter une nouvelle voiture</h2>
                <form id="addCarForm" class="admin-form">
                    <label for="nom">Nom de la voiture :</label>
                    <input type="text" id="nom" name="nom" placeholder="ex: Clio">
      
                    <label for="type">Type :</label>
                    <select id="type" name="type">
                        <option value="Automatique">Automatique</option>
                        <option value="Manuelle">Manuelle</option>
                        <option value="Hybride">Hybride</option>
                    </select>
      
                    <label for="prix">Prix par jour (MAD) :</label>
                    <input type="number" id="prix" name="prix" placeholder="ex: 300">
      
                    <label for="image">Lien vers l'image :</label>
                    <input type="text" id="image" name="image" placeholder="URL de l'image">
      
                    <button type="submit">Ajouter la voiture</button>
                </form>
              </section>
            `;
    });
});
//Section suppression voiture :
document.addEventListener("DOMContentLoaded", function () {
    // 🔁 On écoute le clic sur "Supprimer une voiture"
    document.querySelector('a[href="#supprimer-voiture"]').addEventListener("click", function (e) {
      e.preventDefault();
  
      // Données fictives (stockées en JS uniquement pour le test)
      let voitures = [
        { id: 1, nom: "Clio", type: "Manuelle", prix: 250 },
        { id: 2, nom: "Golf", type: "Automatique", prix: 320 },
        { id: 3, nom: "Mercedes", type: "Automatique", prix: 550 },
      ];
  
      // Fonction pour afficher les voitures avec bouton supprimer
      function afficherVoitures() {
        let html = `
          <section class="form-section">
            <h2>Supprimer une voiture</h2>
            <div class="voitures-list">`;
  
        voitures.forEach((v, index) => {
          html += `
            <div class="voiture-card">
              <p><strong>Nom :</strong> ${v.nom}</p>
              <p><strong>Type :</strong> ${v.type}</p>
              <p><strong>Prix :</strong> ${v.prix} MAD</p>
              <button class="supprimer-btn" data-index="${index}">Supprimer</button>
            </div>`;
        });
  
        html += `</div></section>`;
        document.getElementById("admin-content").innerHTML = html;
  
        // Ajouter les écouteurs d'événement aux boutons
        document.querySelectorAll(".supprimer-btn").forEach(btn => {
          btn.addEventListener("click", function () {
            let i = this.getAttribute("data-index");
            voitures.splice(i, 1);
            afficherVoitures(); // re-render
          });
        });
      }
  
      // Premier affichage
      afficherVoitures();
    });
  });
  