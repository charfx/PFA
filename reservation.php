<?php
session_start();
include 'connection_db.php';

$voiture = null;
$client = null;
$erreur = false;

// 1. Récupérer la voiture
if (isset($_GET['id'])) {
    $id_voiture = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM voiture WHERE id = ?");
    $stmt->bind_param("i", $id_voiture);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $voiture = $result->fetch_assoc();
    } else {
        $erreur = true;
    }
    $stmt->close();
}

// 2. Récupérer client depuis session
if (isset($_SESSION['client'])) {
    $client = $_SESSION['client'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Réservation voiture</title>
  <link rel="stylesheet" href="home.css">
  <style>
body {
  font-family: 'Courier New', Courier, monospace;
  /*background-color: #000;*/
  color: white;
}

.reservation-container {
  max-width: 900px;
  margin: 80px auto;
  padding: 30px;
  border-radius: 15px;
  background: rgba(41, 217, 213, 0.05);
  border: 1px solid #29d9d5;
  box-shadow: 0 0 20px rgba(41, 217, 213, 0.15);
}

.reservation-title {
  font-size: 30px;
  color: #29d9d5;
  text-align: center;
  margin-bottom: 30px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.details-section {
  display: flex;
  flex-direction: column;
  gap: 40px;
  align-items: center;
}

.details-box {
  width: 100%;
  background-color: rgba(255,255,255,0.02);
  border: 1px solid #29d9d5;
  padding: 20px;
  border-radius: 10px;
}

.details-box h3 {
  font-size: 24px;
  color: #29d9d5;
  margin-bottom: 15px;
  text-align: center;
}

.details-box img {
  display: block;
  margin: 0 auto 20px auto;
  max-width: 300px;
  border-radius: 10px;
}

.details-box p {
  font-size: 16px;
  margin: 8px 0;
  color: #fff;
}

.details-box p strong {
  color: #29d9d5;
}

.countdown {
  text-align: center;
  font-size: 18px;
  margin-top: 10px;
  color: #ff5c5c;
}
  </style>
</head>
<body>
  <?php
    include('header.php');
    ?>
<section class="reservation-container">
  <div class="reservation-title">Détails de la réservation</div>
  <div class="details-section">

    <?php if ($erreur): ?>
      <div class="details-box">
        <h3>Voiture Indisponible</h3>
        <p>La voiture que vous avez sélectionnée n'est plus disponible.</p>
        <div class="countdown" id="countdown"></div>
        <button onclick="window.location.href='choix.php'" style="margin-top:20px; padding:10px 20px; background:#29d9d5; border:none; color:black; font-weight:bold; cursor:pointer;">Retour aux choix</button>
      </div>

      <script>
        let seconds = 10;
        const countdownEl = document.getElementById('countdown');
        const interval = setInterval(() => {
          countdownEl.innerText = `Retour dans ${seconds} secondes...`;
          seconds--;
          if (seconds < 0) {
            clearInterval(interval);
            window.location.href = 'choix.php';
          }
        }, 1000);
      </script>

    <?php else: ?>

      <?php if ($voiture): ?>
        <div class="details-box">
          <h3>Véhicule</h3>
          <img src="<?php echo $voiture['image_url']; ?>" alt="Voiture">
          <p><strong>Modèle :</strong> <?php echo $voiture['marque'] . " " . $voiture['modele']; ?></p>
          <p><strong>Type :</strong> <?php echo $voiture['type']; ?></p>
          <p><strong>Prix :</strong> <?php echo $voiture['prix_par_jour']; ?> MAD / jour</p>
        </div>
      <?php endif; ?>

      <?php if ($client): ?>
        <div class="details-box">
          <h3>Client (<?php echo $client['Source']; ?>)</h3>
          <p><strong>Nom :</strong> <?php echo $client['Nom_Complet']; ?></p>
          <p><strong>Email :</strong> <?php echo $client['Email']; ?></p>
          <p><strong>Tél :</strong> <?php echo $client['Numero']; ?></p>
        </div>

        <!-- Formulaire de paiement -->
        <div class="details-box">
          <h3>Confirmation du paiement</h3>
          <form id="formPaiement">
            <label for="methode">Méthode de paiement :</label><br>
            <select id="methode" required>
              <option value="">-- Choisir --</option>
              <option value="Carte bancaire">Carte bancaire</option>
              <option value="PayPal">PayPal</option>
              <option value="Espèces">Espèces</option>
            </select><br><br>
            <button type="submit" style="padding:10px 20px; background:#29d9d5; border:none; color:black; font-weight:bold; cursor:pointer;">Confirmer paiement</button>
          </form>
          <div id="confirmation" style="margin-top:20px;"></div>
        </div>

        <script>
          document.getElementById('formPaiement').addEventListener('submit', function(e) {
            e.preventDefault();
            const methode = document.getElementById('methode').value;
            if (!methode) {
              alert("Veuillez sélectionner une méthode de paiement.");
              return;
            }

            const idReservation = Math.floor(Math.random() * 90000) + 10000;
            const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?data=http://localhost/acceuil.php?id=${idReservation}&size=120x120`;

            document.getElementById('confirmation').innerHTML = `
              <p><strong>ID de réservation :</strong> ${idReservation}</p>
              <img src="${qrUrl}" alt="QR Code">
              <p>Votre réservation est confirmée avec la méthode : <strong>${methode}</strong></p>
            `;
          });
        </script>
      <?php endif; ?>

    <?php endif; ?>
  </div>
</section>

<footer>
  <p>Votre agence <span>RentalCar</span> - Satisfaire vos besoins</p>
</footer>

</body>
</html>
