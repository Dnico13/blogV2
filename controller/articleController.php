<?php require_once 'pdo.php';
   

        // Requête préparée sécurisée pour l esemble des articles//
        $statement = $pdo->prepare("SELECT * FROM article ORDER BY id DESC");
        $statement->execute();
        $articles = $statement->fetchAll(PDO::FETCH_ASSOC);


        // Requête préparée sécurisée pour un article spécifique//
        if (isset($_GET['id'])) {
            $articleId = $_GET['id'];
            $statement = $pdo->prepare("SELECT * FROM article WHERE id = :id");
            $statement->bindParam(':id', $articleId, PDO::PARAM_INT);
            $statement->execute();
            $article = $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $article = null; // Aucun article spécifique demandé
        } 
        
        
        // requete pour les 3 dernieres articles apres le dernier       
        $statement = $pdo->prepare("SELECT * FROM article ORDER BY id DESC LIMIT 3 OFFSET 1");
        $statement->execute();  
        $recentArticles = $statement->fetchAll(PDO::FETCH_ASSOC);

        // requete pour le dernier article
        $statement = $pdo->prepare("SELECT * FROM article ORDER BY id DESC LIMIT 1");
        $statement->execute();  
        $lastArticle = $statement->fetch(PDO::FETCH_ASSOC);

?>
       