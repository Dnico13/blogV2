<?php

if (basename($_SERVER['PHP_SELF']) == 'pdo.php') {
    header('Location: index.php');
    exit;
}

$user = 'ndev2023_blog'; 
$password = 'Tec4Business2025@'; 
$dbName = 'ndev2023_blog'; 

try {
    
    $pdo = new PDO("mysql:host=mysql-ndev2023.alwaysdata.net;dbname=$dbName", $user, $password);
    
    // Configurez le mode d'erreur pour lancer des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Assurez-vous que l'encodage des caractères est correct
    $pdo->exec("SET CHARACTER SET utf8");
    
   
    
} catch (\PDOException $e) {
    // En cas d'échec, lancez une exception avec un message d'erreur
    throw new \Exception("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>