<?php
include 'connection_db.php';

// --- Suppression voiture ---
if (isset($_GET['delete_voiture'])) {
    $id = intval($_GET['delete_voiture']);
    $conn->query("DELETE FROM voiture WHERE id=$id");
    header("Location: admin.php");
    exit();
}
// --- Modifier voiture ---
if (isset($_POST['modifier_voiture'])) {
    $id = $_POST['id'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $type = $_POST['type'];
    $prix = $_POST['prix_par_jour'];
    $image = $_POST['image_url'];

    $stmt = $conn->prepare("UPDATE voiture SET marque=?, modele=?, type=?, prix_par_jour=?, image_url=? WHERE id=?");
    $stmt->bind_param("sssdsi", $marque, $modele, $type, $prix, $image, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
    exit();
}

// --- Modifier client ---
if (isset($_POST['modifier_client'])) {
    $id = $_POST['ID_client'];
    $nom = $_POST['Nom_Complet'];
    $email = $_POST['Email'];
    $numero = $_POST['Numero'];
    $message = $_POST['Message'];

    $stmt = $conn->prepare("UPDATE client SET Nom_Complet=?, Email=?, Numero=?, Message=? WHERE ID_client=?");
    $stmt->bind_param("ssssi", $nom, $email, $numero, $message, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
    exit();
}

// --- Suppression client ---
if (isset($_GET['delete_client'])) {
    $id = intval($_GET['delete_client']);
    $conn->query("DELETE FROM client WHERE ID_client=$id");
    header("Location: admin.php");
    exit();
}

// --- Ajout voiture ---
if (isset($_POST['ajouter_voiture'])) {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $type = $_POST['type'];
    $prix = $_POST['prix_par_jour'];
    $image = $_POST['image_url'];

    $stmt = $conn->prepare("INSERT INTO voiture (marque, modele, type, prix_par_jour, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $marque, $modele, $type, $prix, $image);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="home.css">
    <style>
        .admin-section {
            margin: 40px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(41, 217, 213, 0.2);
            width: 95%;
            color: white;
        }

        .admin-section h2,
        .admin-section h3 {
            color: #29d9d5;
            margin-bottom: 10px;
            text-align: center;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.03);
        }

        .admin-table th,
        .admin-table td {
            padding: 10px;
            border: 1px solid #29d9d5;
            text-align: center;
        }

        .admin-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .admin-form input {
            padding: 8px;
            border: 1px solid #29d9d5;
            background: transparent;
            color: white;
            border-radius: 8px;
            width: calc(20% - 10px);
        }

        .admin-form button {
            padding: 8px 16px;
            background-color: #29d9d5;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: black;
            font-weight: bold;
        }

        .delete-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            text-decoration: none;
        }

        header {
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

        header .logo a {
            font-size: 25px;
            color: #29d9d5;
            text-decoration: 0;

        }

        header .logo a span {
            color: #fff;
        }

        .theme-dropdown {
            position: relative;
            display: inline-block;
        }

        .theme-btn {
            background-color: #29d9d5;
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }

        .theme-options button {
            display: flex;
            align-items: center;
            gap: 6px;
            /* 🔽 Moins d’espace entre icône et texte */
            background: none;
            border: none;
            color: #fff;
            padding: 6px 10px;
            /* 🔽 Réduction padding */
            font-size: 13px;
            /* 🔽 Police plus petite */
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s ease;
        }

        .theme-options button:hover {
            background-color: #29d9d5;
            color: #000;
        }

        .theme-options svg {
            width: 16px;
            /* 🔽 Taille de l'icône réduite */
            height: 16px;
            flex-shrink: 0;
        }

        .menu {
            display: flex;
            align-items: center;
        }

        .menu li {
            margin: 0 15px;
            list-style-type: none;

        }

        .menu li a {
            color: #fff;
            font-size: 14px;

        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <a href="admin.php"><span>Admin</span></a>
        </div>
        <ul class="menu">
            <li><a href="acceuil.php">Accueil</a></li>
            <li><a href="#voitures">Voitures</a></li>
            <li><a href="#clients">Clients</a></li>
        </ul>
        <div class="theme-dropdown">
            <button class="theme-btn">Theme</button>
            <div class="theme-options">
                <button id="change-bg-btn"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#000" viewBox="0 0 24 24">
                        <path d="M21.64 13.73A9 9 0 0110.27 2.36a9 9 0 1011.37 11.37z" />
                    </svg>light</button>
                <button id="reset-bg-btn"> <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="#000" viewBox="0 0 24 24">
                        <path d="M12 4V2m0 20v-2m8.49-10.49l1.42-1.42m-17 0l1.42 1.42M4 12H2m20 0h-2m-3.95 6.95l1.42 1.42m-11.9 0l1.42-1.42M12 6a6 6 0 100 12 6 6 0 000-12z" />
                    </svg>Dark </button>
            </div>
        </div>
        <div class="connection-menu">
            <button>Connection :</button>
            <div class="connection-options">
                <a href="login.php">Se connecter </a>
                <a href="sign_in.php">S'inscrire</a>
            </div>
        </div>
    </header>

    <!-- SECTION GESTION VOITURES -->
    <section id="voitures" class="admin-section">
        <h2>Gestion des Voitures</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Type</th>
                    <th>Prix/jour</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $conn->query("SELECT * FROM voiture");
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                <form method='POST' action='admin.php'>
                    <td><input type='hidden' name='id' value='{$row['id']}'>{$row['id']}</td>
                    <td><input type='text' name='marque' value='{$row['marque']}' required></td>
                    <td><input type='text' name='modele' value='{$row['modele']}' required></td>
                    <td><input type='text' name='type' value='{$row['type']}' required></td>
                    <td><input type='number' name='prix_par_jour' value='{$row['prix_par_jour']}' required></td>
                    <td><input type='text' name='image_url' value='{$row['image_url']}' required></td>
                    <td>
                        <button type='submit' name='modifier_voiture' style='background:orange; color:white;'>Modifier</button>
                        <a class='delete-btn' href='admin.php?delete_voiture={$row['id']}'>Supprimer</a>
                    </td>
                </form>
            </tr>";
                }
                ?>
            </tbody>
        </table>

        <h3>Ajouter une Voiture</h3>
        <form action="admin.php" method="POST" class="admin-form">
            <input type="text" name="marque" placeholder="Marque" required>
            <input type="text" name="modele" placeholder="Modèle" required>
            <input type="text" name="type" placeholder="Type" required>
            <input type="number" step="0.01" name="prix_par_jour" placeholder="Prix par jour" required>
            <input type="text" name="image_url" placeholder="Image URL" required>
            <button type="submit" name="ajouter_voiture">Ajouter</button>
        </form>
    </section>

    <!-- SECTION GESTION CLIENTS -->
    <section id="clients" class="admin-section">
        <h2>Gestion des Clients</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numéro</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $conn->query("SELECT * FROM client");
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>
                <form method='POST' action='admin.php'>
                    <td><input type='hidden' name='ID_client' value='{$row['ID_client']}'>{$row['ID_client']}</td>
                    <td><input type='text' name='Nom_Complet' value='{$row['Nom_Complet']}' required></td>
                    <td><input type='email' name='Email' value='{$row['Email']}' required></td>
                    <td><input type='text' name='Numero' value='{$row['Numero']}' required></td>
                    <td><input type='text' name='Message' value='{$row['Message']}' required></td>
                    <td>
                        <button type='submit' name='modifier_client' style='background:orange; color:white;'>Modifier</button>
                        <a class='delete-btn' href='admin.php?delete_client={$row['ID_client']}'>Supprimer</a>
                    </td>
                </form>
            </tr>";
                }

                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>Votre agence <span>RentalCar</span> !! Satisfaire vos besoins !!</p>
    </footer>

    <script src="home.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const themeBtn = document.querySelector('.theme-btn');
            const themeOptions = document.querySelector('.theme-options');

            themeBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                themeOptions.style.display = (themeOptions.style.display === 'block') ? 'none' : 'block';
            });

            // Fermer si on clique ailleurs
            window.addEventListener('click', function() {
                themeOptions.style.display = 'none';
            });

            // Empêcher fermeture si on clique à l’intérieur
            themeOptions.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
</body>

</html>