<style>
  header{
  background-color: #222;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 50px;
  padding: 0 5%;
  flex-wrap: wrap;
}
header  .logo a{
 font-size: 25px;
 color: #29d9d5;
 text-decoration: 0;

}
header  .logo a span{
  color: #fff;
}
.theme-dropdown {
  position: relative;
  display: inline-block;
}

.theme-btn {
  background-color:#29d9d5;
  color: black;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}
.theme-options {
  display: none;
  position: absolute;
  background-color: #222;
  border: 1px solid #29d9d5;
  border-radius: 6px;
  top: 110%;
  left: 0;
  z-index: 1000;
  min-width: 140px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.4);
}

.theme-options button {
  display: flex;
  align-items: center;
  gap: 6px;          /* 🔽 Moins d’espace entre icône et texte */
  background: none;
  border: none;
  color: #fff;
  padding: 6px 10px; /* 🔽 Réduction padding */
  font-size: 13px;   /* 🔽 Police plus petite */
  cursor: pointer;
  width: 100%;
  transition: background-color 0.2s ease;
}

.theme-options button:hover {
  background-color: #29d9d5;
  color: #000;
}

.theme-options svg {
  width: 16px;     /* 🔽 Taille de l'icône réduite */
  height: 16px;
  flex-shrink: 0;
}
.menu {
  display: flex;
  align-items: center;
}
.menu li  {
  margin: 0 15px ;
  list-style-type: none;
  
}
.menu li a{
  color: #fff;
  font-size: 14px;

}

</style>
<body>
<header>
    <div class="logo">
        <a href="acceuil.php"> <span>Rental</span>Cars</a>
    </div>
    <ul class="menu">
        <li><a href="acceuil.php">Acceuil</a></li>
            <li><a href="acceuil.php">a propos de nous</a></li>
            <li><a href="acceuil.php">nos vehicule</a></li>
            <!-- <li><a href="acceuil.php">contact</a></li> -->
    </ul>
    <div class="theme-dropdown">
  <button class="theme-btn" >Theme</button>
  <div class="theme-options" >
    <button id="change-bg-btn">
      <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#000" viewBox="0 0 24 24"><path d="M12 4V2m0 20v-2m8.49-10.49l1.42-1.42m-17 0l1.42 1.42M4 12H2m20 0h-2m-3.95 6.95l1.42 1.42m-11.9 0l1.42-1.42M12 6a6 6 0 100 12 6 6 0 000-12z"/></svg>Dark
    </button>
    <button id="reset-bg-btn">
      <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#000" viewBox="0 0 24 24"><path d="M21.64 13.73A9 9 0 0110.27 2.36a9 9 0 1011.37 11.37z"/></svg>
    white</button>
  </div>
</div>

    <div class="connection-menu">
        <button>Connection :</button>
        <div class="connection-options">
            <a href="login.php">se connecter</a>
            <a href="sign_in.php">S'inscrire</a>
        </div>
    </div>
</header>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const themeBtn = document.querySelector('.theme-btn');
  const themeOptions = document.querySelector('.theme-options');

  themeBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    themeOptions.style.display = (themeOptions.style.display === 'block') ? 'none' : 'block';
  });

  // Fermer si on clique ailleurs
  window.addEventListener('click', function () {
    themeOptions.style.display = 'none';
  });

  // Empêcher fermeture si on clique à l’intérieur
  themeOptions.addEventListener('click', function (e) {
    e.stopPropagation();
  });
});
</script>

