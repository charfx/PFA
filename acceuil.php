<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RentalCars</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php
    require('header.php');
    ?>
    <!--acceul-section-->
    <section id="marhba">
        <div class="find-trip">
            <form action="">
                <div>
                    <label>Voiture</label>
                    <input type="text" placeholder="Entrer une voiture">
                </div>
                <div>
                    <label>Model</label>
                    <input type="text" placeholder="Entrer une model">
                </div>
                <div>
                    <label>Budget</label>
                    <input type="text" placeholder="Entrer votre budget">
                </div>
                <a href="#popular-des" style=" display: inline-block;
                        padding: 8px 20px;
                        color: #29d9d5;
                        background-color: transparent;
                        border: 2px solid #29d9d5;
                        border-radius: 5px;
                        font-size: 14px;
                        text-transform: uppercase;
                        font-weight: bold;
                        text-decoration: none;
                        transition: background-color 0.3s ease, color 0.3s ease;">voire plus</a>
            </form>
        </div>
    </section>
    <!--a propos section -->
    <section id="a-propos">
        <h1 class="title">a propos </h1>
        <div class="img-desc">
            <div class="left">
                <video src="video.mp4" autoplay loop></video>
            </div>
            <div class="right">
                <h3>Découvrez notre agence moderne et accueillante, prête à vous fournir les meilleures offres de location de voitures au Maroc.</h3>
                <p>Explorez le monde, de nouvelles destinations,pour cela vous avez besoin de notre agence pour louer les meuilleurs vehicules pour visiter vos reves .</p>
                <a href="verification_connection.php">Lire plus</a>
            </div>
        </div>

    </section>
    <!--SEction nos voiture populaire -->
    <section id="popular-des">
        <h1 class="title"> les Vehicules les plus louee :</h1>
        <div class="content">
            <div class="box">
                <img src="5 avr. 2025, 15_56_18.png" alt="">
                <div class="content">
                    <h4>Polo Wolsvaken </h4>
                    <p>Une voiture jeune, vive et pratique. Son design accrocheur et sa taille compacte en font l’alliée idéale pour les trajets quotidiens.</p>
                    <a href="verification_connection.php">Lire plus</a>
                </div>
            </div>
            <div class="box">
                <img src="5 avr. 2025, 15_56_23.png" alt="">
                <div class="content">
                    <h4>golf</h4>
                    <p>Une tres belle voiture,automatique. Son design accrocheur et sa taille compacte en font l’alliée idéale pour les trajets quotidiens..
                    </p>
                    <a href="verification_connection.php">Lire plus</a>
                </div>
            </div>
            <div class="box">
                <img src="ChatGPT Image 5 avr. 2025, 15_42_32.png" alt="">
                <div class="content">
                    <h4>zebra</h4>
                    <p>Une voiture jeune, vive et pratique. Son design accrocheur et sa taille compacte en font l’alliée idéale pour les trajets quotidiens..</p>
                    <a href="verification_connection.php">Lire plus</a>
                </div>
            </div>
            <div class="box">
                <img src="ChatGPT Image 5 avr. 2025, 15_56_57.png" alt="">
                <div class="content">
                    <h4>passate</h4>
                    <p>Une voiture jeune, vive et pratique. Son design accrocheur et sa taille compacte en font l’alliée idéale pour les trajets quotidiens. .</p>
                    <a href="verification_connection.php">Lire plus</a>
                </div>
            </div>
            <div class="box">
                <img src="ChatGPT Image 5 avr. 2025, 15_56_49.png" alt="">
                <div class="content">
                    <h4>dacia</h4>
                    <p>Une voiture jeune, vive et pratique. Son design accrocheur et sa taille compacte en font l’alliée idéale pour les trajets quotidiens. .</p>
                    <a href="verification_connection.php">Lire plus</a>
                </div>
            </div>
            <div class="box">
                <img src="ChatGPT Image 5 avr. 2025, 15_56_26.png" alt="">
                <div class="content">
                    <h4>mercedes</h4>
                    <p>Une voiture jeune, vive et pratique. Son design accrocheur et sa taille compacte en font l’alliée idéale pour les trajets quotidiens. .</p>
                    <a href="verification_connection.php">Lire plus</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>Votre agence<span>RentalCar</span> !!satisfaire vos besoin !! </p>

    </footer>
    <script src="home.js"></script>
</body>

</html>