<?php
include('connection_db.php');


session_start(); // Toujours en haut pour utiliser $_SESSION

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom_complet'];
    $password = $_POST['password']; // PAS de hash ici directement

    if ($nom === "saad" || $nom === "safae") {
        header("Location: admin.php");
        exit();
    } else {
        // Insérer dans deja_inscrit
        $sql = "INSERT INTO deja_inscrit (Nom_complet, Password, Date_connexion) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $nom, $password_hash);
        $stmt->execute();
        $stmt->close();

        // Stocker seulement le nom dans la session, email/numero non disponibles
        $_SESSION['client'] = [
            'Nom_Complet' => $nom,
            'Email' => 'Non disponible',
            'Numero' => 'Non disponible',
            'Source' => 'Connexion'
        ];

        header("Location: choix.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="home.css">
<style>
    /* section login css */
    /* ✅ Centre le bloc du formulaire */
    /* ✅ Section centrée, fond noir cohérent */
    #contact2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: black;
        min-height: 100vh;
        padding: 40px 20px;
    }

    /* ✅ Titre centré lisible */
    #contact2 .title {
        font-size: 22px;
        color: #29d9d5;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        line-height: 1.4;
    }

    /* ✅ Bloc formulaire propre et équilibré */
    #contact2 form {
        background-color: #29d9d5;
        border-radius: 20px;
        padding: 25px 30px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 0 15px rgba(41, 217, 213, 0.3);
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* ✅ Champ label + input propre */
    #contact2 form label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        color: black;
    }

    #contact2 form input {
        padding: 10px;
        border-radius: 6px;
        border: none;
        font-size: 14px;
        width: 100%;
        outline: none;
    }

    /* ✅ Bouton simple, centré et fluide */
    #contact2 .btn-reservation {
        background-color: #000;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s ease;
        font-weight: bold;
    }

    #contact2 .btn-reservation:hover {
        background-color: #fff;
        color: #29d9d5;
        border: 1px solid #29d9d5;
    }

    /* section login css */
</style>

<body>
    <?php
    include('header.php');?>
<section id="contact2">
        <p id="login-message">Bienvenue cher client</p>
        <h1 class="title">Connectez vous pour accéder à nos services :</h1>

        <form action="" method="POST">
            <label>Nom Complet</label>
            <input type="text" name="nom_complet" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-reservation">Se connecter</button>
        </form>
    </section>
</body>
<script src="home.js"></script>
<footer>
    <p>Votre agence<span>RentalCar</span> !!satisfaire vos besoin !! </p>
</footer>

</html>