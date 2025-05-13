<?php
include('header.php');
session_start(); // Important pour utiliser $_SESSION

$content = ""; // On initialise une variable pour le message

if (isset($_SESSION['user'])) {
    $content = "
        <h1>Bienvenue dans la description détaillée !</h1>
        <p>Ici vous pouvez découvrir toutes les informations sur nos véhicules et notre agence.</p>
    ";
} else {
    $content = "
        <div class='access-denied'>
            <h1>Accès refusé 🚫</h1>
            <p>Merci de vous connecter  ou s'inscrire pour accéder à cette page.</p>
            <a class='btn-login' href='login.php'>Se connecter :</a> <br><br>
            <a class='btn-login' href='sign_in.php'>S'inscrire :</a>
        </div>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de Connexion</title>
    <link rel="stylesheet" href="home.css">
    <style>
    .access-denied {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 90vh; /* tu avais 80vh, je mets 90vh comme tu as dit */
    margin: 30px auto;
    padding: 30px;
    max-width: 600px;
    background-color: rgba(255, 0, 0, 0.05);
    border: 2px solid red;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 0 10px rgba(255, 0, 0, 0.2);
}

.access-denied h1 {
    font-size: 36px;
    color: red;
    margin-bottom: 15px;
}

.access-denied p {
    font-size: 18px;
    color: #20b2aa;
    margin-bottom: 20px;
}

.btn-login {
    font-size: 18px;
    padding: 12px 28px;
    background-color: #29d9d5;
    color: white;
    border: none;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-login:hover {
    background-color: #20b2aa;
}
</style>
</head>
<body>
<!-- Partie où on affiche le message -->
<main>
    <?php echo $content; ?>
</main>

<footer>
    <p>Votre agence <span>RentalCar</span> !! Satisfaire vos besoins !!</p>
</footer>

<script src="home.js"></script>
</body>
</html>
