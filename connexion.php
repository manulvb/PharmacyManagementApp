<?php
$host = 'localhost';
$dbname = 'pharmacie_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;");
    $pdo->exec("use `$dbname`;");

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
