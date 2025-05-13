<?php
$host = '127.0.0.1';  
$port = 3307;         
$user = 'root';       
$password = '';       
$database = 'agence_location';
$conn = new mysqli($host, $user, $password, $database,$port);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}else{
    //echo"connection reussie";
}
?>
