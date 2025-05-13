<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>choix voiture</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <!--petit formulaire de date depart et date retour :-->
    <div style="text-align: center; margin: 80px auto;">
        <h2 style="color: #29d9d5; font-size: 30px; margin-bottom: 20px;">Choisissez vos dates</h2>
        <form id="globalDateForm" style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
            <input type="date" id="globalDateDepart" required style="padding: 10px; font-size: 18px; width: 250px; border-radius: 5px; border: 2px solid #29d9d5;">
            <input type="date" id="globalDateRetour" required style="padding: 10px; font-size: 18px; width: 250px; border-radius: 5px; border: 2px solid #29d9d5;">
        </form>
    </div>

    <!--end petit formulaire de date depart et date retour :-->

    <!--trending section start-->
    <section class="rentals container" id="cars">
        <div class="heading">
            <h2>our top cars rentals</h2>
            <p>Vous verrez ici les meuilleurs locations disponibles dans notre agence.</p>

        </div>
        <div class="rentals-content">
            <!--box 1-->
            <div class="rental-box">
                <div class="rental-top">
                    <h3>mini SUV</h3>
                    <i class="ri-heart-fill"></i>
                </div>
                <img src="rental-1.png" alt="">
                <h2>Punch</h2>
                <h4>Automatic car</h4>
                <div class="price-btn">
                    <p>200$ <span>/day</span></p>
                    <a href="reservation.php?id=1" class="rental-btn">Réserver</a>
                </div>
            </div>
            <!--box 2-->
            <div class="rental-box">
                <div class="rental-top">
                    <h3>mini SUV</h3>
                    <i class="ri-heart-fill"></i>
                </div>
                <img src="rental-2.png" alt="">
                <h2>Punch</h2>
                <h4>Automatic car</h4>
                <div class="price-btn">
                    <p>200$ <span>/day</span></p>
                    <a href="reservation.php?id=2" class="rental-btn">Réserver</a>
                </div>
            </div>
            <!--box 3-->
            <div class="rental-box">
                <div class="rental-top">
                    <h3>mini SUV</h3>
                    <i class="ri-heart-fill"></i>
                </div>
                <img src="rental-3.png" alt="">
                <h2>maserati</h2>
                <h4>electric car</h4>
                <div class="price-btn">
                    <p>1000$ <span>/day</span></p>
                    <a href="reservation.php?id=3" class="rental-btn">Réserver</a>
                </div>
            </div>
            <!--box 4-->
            <div class="rental-box">
                <div class="rental-top">
                    <h3>ferari</h3>
                    <i class="ri-heart-fill"></i>
                </div>
                <img src="rental-4.png" alt="">
                <h2>punch</h2>
                <h4>Automatic car</h4>
                <div class="price-btn">
                    <p>2500$ <span>/day</span></p>
                    <a href="reservation.php?id=4" class="rental-btn">Réserver</a>
                </div>
            </div>
            <!--box 5-->
            <div class="rental-box">
                <div class="rental-top">
                    <h3>ferari</h3>
                    <i class="ri-heart-fill"></i>
                </div>
                <img src="rental-5.png" alt="">
                <h2>Punch</h2>
                <h4>Automatic car</h4>
                <div class="price-btn">
                    <p>3500$ <span>/day</span></p>
                    <a href="reservation.php?id=3" class="rental-btn">Réserver</a>
                </div>
            </div>
        </div>
    </section>
    <!--trending section end-->
    <!--dashbord section-->
    <section id="dashboard" class="dashboard">
        <h2>Tableau de Bord - Statistiques</h2>
        <div class="dashboard-cards">
            <div class="card">
                <h3>Voitures Louées</h3>
                <p id="nbLouees">38</p>
            </div>
            <div class="card">
                <h3>Voitures Disponibles</h3>
                <p id="nbDispo">12</p>
            </div>
            <div class="card">
                <h3>Clients Inscrits</h3>
                <p id="nbClients">87</p>
            </div>
            <div class="card">
                <h3>Revenus (MAD)</h3>
                <p id="revenus">29,500</p>
            </div>
        </div>
    </section>
<script>
    //ce script pour rendre la reservation innaccessible avant de presicer la date!
  document.querySelectorAll('.rental-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      const dateDepart = document.getElementById('globalDateDepart').value;
      const dateRetour = document.getElementById('globalDateRetour').value;

      if (!dateDepart || !dateRetour) {
        e.preventDefault(); // ❌ bloque la redirection
        alert("Veuillez choisir une date de départ et une date de retour avant de réserver.");
        return;
      }

      // ✅ Sinon, ajoute les dates à l'URL pour les passer à reservation.php
      const url = new URL(this.href);
      url.searchParams.set('date_depart', dateDepart);
      url.searchParams.set('date_retour', dateRetour);
      window.location.href = url.toString();

      e.preventDefault(); // Bloque le comportement par défaut du lien
    });
  });
</script>

</body>
<script src="home.js"></script>
<footer>
    <p>Votre agence<span>RentalCar</span> !!satisfaire vos besoin !! </p>

</footer>

</html>