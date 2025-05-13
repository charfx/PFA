<?php
session_start();
include('connection_db.php');
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Nom_Complet = $_POST['Nomcomplet'] ?? '';
  $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
  $Email = $_POST['Email'] ?? '';
  $Numero = $_POST['Numero'] ?? '';
  $Message = $_POST['message'] ?? '';

  $sql = "INSERT INTO client (Nom_complet, password, Email, Numero, Message) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $Nom_Complet, $password, $Email, $Numero, $Message);

  if ($stmt->execute()) {
    $_SESSION['client'] = [
        'Nom_Complet' => $Nom_Complet,
        'Email' => $Email,
        'Numero' => $Numero,
        'Source' => 'Inscription'
    ];
    header("Location: choix.php");
    exit();
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Connexion / Inscription</title>
  <link rel="stylesheet" href="home.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    #contact {
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    form {
      background-color: #29d9d5;
      padding: 30px 40px;
      border-radius: 20px;
      max-width: 1000px;
      width: 100%;
      box-shadow: 0 0 15px rgba(41, 217, 213, 0.4);
      display: flex;
      flex-direction: column;
    }

    .left-right {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
    }

    .left,
    .right {
      flex: 1;
      min-width: 280px;
    }

    label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
    }

    textarea {
      resize: none;
    }

    .btn-reservation {
      padding: 12px 20px;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 20px;
      align-self: flex-end;
      transition: background-color 0.3s ease;
    }

    .btn-reservation:hover {
      background-color: #fff;
      color: #000;
      border: 1px solid #000;
    }

    #localisation-msg {
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      padding: 10px;
      border: 2px solid #000808;
      border-radius: 8px;
      background-color: #ffffff22;
      margin-bottom: 15px;
      box-shadow: 0 0 8px rgba(41, 217, 213, 0.4);
      animation: pulseMessage 2s infinite;
    }

    iframe {
      width: 100%;
      height: 300px;
      border: none;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    footer {
      background-color: #111;
      color: #fff;
      text-align: center;
      padding: 20px 10px;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    footer span {
      color: #29d9d5;
      font-weight: bold;
    }

    @keyframes pulseMessage {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    @media (max-width: 768px) {
      .left-right {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>
  <section id="contact">
    <form action="" method="POST">
      <h1 style="text-align:center; margin-bottom: 30px;">Faites votre inscription :</h1>
      <div class="left-right">
        <div class="left">
          <label>Nom Complet</label>
          <input type="text" name="Nomcomplet" required>

          <label>Mot de passe</label>
          <input type="password" name="password" required>

          <label>Email</label>
          <input type="email" name="Email" required>

          <label>Numéro</label>
          <input type="text" name="Numero" required>

          <label>Message</label>
          <textarea name="message" required></textarea>
        </div>

        <div class="right">
          <p id="localisation-msg">Identifiez votre localisation :</p>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.3615075493385!2d-6.846767125962229!3d34.008930420019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76c7d6ac12571%3A0x3b8dfb27d936ccb2!2sISGA%20Rabat%20%7C%20%C3%89cole%20d&#39;Ing%C3%A9nieurs%20-%20%C3%89cole%20de%20Management!5e0!3m2!1sfr!2sma!4v1736555624131!5m2!1sfr!2sma"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
      <button type="submit" class="btn-reservation">S'inscrire</button>
    </form>
  </section>

  <script src="home.js"></script>
</body>

<footer>
  <p>Votre agence <span>RentalCar</span> — satisfaire vos besoins !</p>
</footer>
</html>
