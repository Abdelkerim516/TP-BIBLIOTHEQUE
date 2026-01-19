<?php
$host = "localhost";
$user = "admin"; 
$pass = "root"; 
$dbname = "Bibliotheque";

try {
    // On utilise PDO, c'est plus moderne et sécurisé que mysqli
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>