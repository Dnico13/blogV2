<?php 
require_once 'pdo.php';

// 1. Liste de tous les articles
$statement = $pdo->prepare("SELECT * FROM article ORDER BY id DESC");
$statement->execute();
$articles = $statement->fetchAll(PDO::FETCH_ASSOC);

// 2. Récupération d'un article spécifique (ID ou SLUG)
if (isset($_GET['id']) || isset($_GET['slug'])) {
    if (isset($_GET['slug'])) {
        $param = $_GET['slug'];
        $sql = "SELECT * FROM article WHERE slug = :param";
        $type = PDO::PARAM_STR;
    } else {
        $param = $_GET['id'];
        $sql = "SELECT * FROM article WHERE id = :param";
        $type = PDO::PARAM_INT;
    }

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':param', $param, $type);
    $statement->execute();
    $article = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    $article = null; 
} 

// 3. Les 3 articles récents (pour les suggestions)
$statement = $pdo->prepare("SELECT * FROM article ORDER BY id DESC LIMIT 3 OFFSET 1");
$statement->execute();  
$recentArticles = $statement->fetchAll(PDO::FETCH_ASSOC);

// 4. Le tout dernier article (pour la mise en avant)
$statement = $pdo->prepare("SELECT * FROM article ORDER BY id DESC LIMIT 1");
$statement->execute();  
$lastArticle = $statement->fetch(PDO::FETCH_ASSOC);
?>