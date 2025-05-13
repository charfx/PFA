
const changeBgBtn = document.getElementById('change-bg-btn');
const resetBgBtn = document.getElementById('reset-bg-btn');
const body = document.body;
const colors = ['black', '#fff', '#29d9d5'];
const initialColor = 'black'; 
changeBgBtn.addEventListener('click', changeBackgroundColor);
function changeBackgroundColor() {
  let currentColor = body.style.backgroundColor || initialColor;
  let currentIndex = colors.indexOf(currentColor);

  if (currentIndex === -1 || currentIndex === colors.length - 1) {
    currentIndex = 0;
  } else {
    currentIndex++;
  }
  body.style.backgroundColor = colors[currentIndex];
  localStorage.setItem('backgroundColor', colors[currentIndex]);
}
function resetBackgroundColor() {
  body.style.backgroundColor = initialColor;
  localStorage.removeItem('backgroundColor');
}
resetBgBtn.addEventListener('click', resetBackgroundColor);
window.onload = function () {
  const savedColor = localStorage.getItem('backgroundColor');
  if (savedColor) {
    body.style.backgroundColor = savedColor;
  } else {
    body.style.backgroundColor = initialColor;
  }
};

//affichage de plusieur message animation login :
// home.js ou login.js
const messages = [
  "Bienvenue chez rentalCar",
  "Louez les meilleures voitures",
  "Connectez-vous pour réserver",
];
let index = 0;
setInterval(() => {
  document.getElementById("login-message").innerText = messages[index];
  index = (index + 1) % messages.length;
}, 3000);

//message dynamique pour affichage de ifram localisation :
const message = [
  "identifier votre localisation ",
  "Set your localisation",
  "fen kayn nta ",
];
let index2 = 0;
setInterval(() => {
  document.getElementById("localisation-msg").innerText = message[index2];
  index2 = (index2 + 1) % message.length;
}, 3000);
//dashbord changement d'animation
setInterval(() => {
  const louees = Math.floor(Math.random() * 10) + 10;
  const dispo = 60 - louees;
  const clients = 100 + Math.floor(Math.random() * 20);
  const revenus = louees * 300;

  document.getElementById('nbLouees').textContent = louees;
  document.getElementById('nbDispo').textContent = dispo;
  document.getElementById('nbClients').textContent = clients;
  document.getElementById('revenus').textContent = revenus.toLocaleString() + " MAD";
}, 4000); // mise à jour toutes les 4 secondes
// fin dashbord changement d'animation


// Cibler le lien "Ajouter une voiture"
// document.querySelector('a[href="#ajouter-voiture"]').addEventListener('click', function (e)) {
//   e.preventDefault();

  // Générer le formulaire dynamiquement
  // document.getElementById('admin-content').innerHTML = 
  //     <section class="form-section">
  //         <h2>Ajouter une nouvelle voiture</h2>
  //         <form id="addCarForm" class="admin-form">
  //             <label for="nom">Nom de la voiture :</label>
  //             <input type="text" id="nom" name="nom" placeholder="ex: Clio">

  //             <label for="type">Type :</label>
  //             <select id="type" name="type">
  //                 <option value="Automatique">Automatique</option>
  //                 <option value="Manuelle">Manuelle</option>
  //                 <option value="Hybride">Hybride</option>
  //             </select>

  //             <label for="prix">Prix par jour (MAD) :</label>
  //             <input type="number" id="prix" name="prix" placeholder="ex: 300">

  //             <label for="image">Lien vers l'image :</label>
  //             <input type="text" id="image" name="image" placeholder="URL de l'image">

  //             <button type="submit">Ajouter la voiture</button>
  //         </form>
  //     </section>
//   ;
// });