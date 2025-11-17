<?php

// Assurez-vous que 'pdo.php' est inclus avant toute tentative d'accès à la BDD
// C'est souvent mieux de le faire ici, mais je le laisse dans la route pour l'exemple.
// require_once 'pdo.php'; 

// =========================================================================
// 1. INITIALISATION & DÉTECTION (CORRIGÉE)
// =========================================================================

// Récupère l'URI brute (ex: '/DetailDuProjet?id=1')
$requestUri = $_SERVER['REQUEST_URI'];

// Isole le chemin (Path) de l'URI en ignorant le Query String (?...)
$path = strtok($requestUri, '?');
// Nettoie le chemin des slashes au début et à la fin (ex: 'DetailDuProjet')
$uri = trim($path, '/');

// Détecte si la requête a été initiée par HTMX
$isHtmxRequest = isset($_SERVER['HTTP_HX_REQUEST']);

// Variables pour le rendu
$viewData = [];
$contentView = '';

// =========================================================================
// 2. ROUTAGE & LOGIQUE (MODIFIÉE POUR DetailDuProjet)
// =========================================================================

// Détermine la vue et les données
if ($uri === '' || $uri === 'accueil' || $uri === 'accueil-partial') {
    $contentView = 'views/accueil.php';
    
    // NOUVELLES BALISES MÉTA POUR LE BLOG "TECH FOR BUSINESS"
    
    $viewData['title'] = 'Tech for Business | Astuces & Stratégies Numériques pour TPE, PME et Associations';
    
    $viewData['description'] = 'Le blog pour les Très Petites Structures. Découvrez des astuces concrètes, des micro-stratégies (No Code, IA simple) et des outils pour développer efficacement votre courant d’affaires sans jargon.';
    
    $viewData['keywords'] = 'Tech for Business, astuces numériques, TPE, PME, associations, développement d\'affaires, micro-stratégies, No Code, IA simple, blog tech accessible';
    
    // Utilisation de l'URL réelle du blog
    $viewData['canonical'] = 'https://www.techforbusiness.fr/';
    
    // Mise à jour de l'image OG avec une image pertinente pour le blog
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/logo-tech-business.png';
} elseif ($uri === 'articles' || $uri === 'articles-partial') {
    $contentView = 'views/articles.php';
    
    // NOUVELLES BALISES MÉTA POUR LA PAGE DES ARTICLES
    
    $viewData['title'] = 'Tous nos Articles Tech | Les Meilleurs Guides pour TPE et Petits Commerces';
    
    $viewData['description'] = 'Retrouvez toutes les analyses et les guides pratiques de Tech for Business. De l\'IA simplifiée au No Code, découvrez des micro-stratégies pour booster le courant d\'affaires de votre TPE ou association.';
    
    $viewData['keywords'] = 'articles tech TPE, guide numérique TPE, micro-stratégies web, No Code pour PME, astuces IA, développer courant d\'affaires, blog tech accessible';
    
    // IMPORTANT : Mettre l'URL réelle de votre blog ici (j'ai conservé celle du code d'origine si c'est la bonne)
    $viewData['canonical'] = 'https://www.techforbusiness.fr/articles'; 
    
    // IMPORTANT : Mettre une image de couverture/listing pertinente pour le blog
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/listing-blog-tech.jpg'; 
}  elseif ($uri === 'contact' || $uri === 'contact-partial') {
    $contentView = 'views/contact.php';
    
    // NOUVELLES BALISES MÉTA POUR LA PAGE CONTACT
    
    $viewData['title'] = 'Contact | Échangez avec Tech for Business sur votre Projet Numérique';
    
    $viewData['description'] = 'Vous avez une question sur un article, une idée de collaboration ou besoin d\'une astuce personnalisée ? Contactez-nous pour un échange simple, rapide et sans jargon sur votre défi tech !';
    
    $viewData['keywords'] = 'contact Tech for Business, question astuce tech, échange projet TPE, collaboration blog numérique, aide PME web';
    
    // IMPORTANT : Mettre l'URL réelle de votre blog ici
    $viewData['canonical'] = 'https://www.techforbusiness.fr/contact';
    
    // IMPORTANT : Mettre une image de contact pertinente pour le blog
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/contact-blog-tech.jpg'; 
}  elseif ($uri === 'detailArticle' || $uri === 'detailArticle-partial') {

    // --- NOUVELLE LOGIQUE POUR LE DÉTAIL DE L'ARTICLE ---
    require_once 'pdo.php';
    $article_id = (int) ($_GET['id'] ?? 0); // Renommé $projet_id en $article_id pour la clarté du blog

    if ($article_id > 0) {

        // Requête préparée sécurisée
        $statement = $pdo->prepare("SELECT * FROM article WHERE id = :id");
        $statement->execute(['id' => $article_id]);
        $articleData = $statement->fetch(PDO::FETCH_ASSOC); // Renommé $projetData en $articleData

        if (!$articleData) {
            // Article non trouvé en base de données
            goto notFound;
        }

        // Si l'article est trouvé
        $contentView = 'views/detailArticle.php';
        $viewData['article'] = $articleData; // Passe les données de l'article

        // MISE À JOUR DES BALISES MÉTA AVEC LES DONNÉES SPÉCIFIQUES DE L'ARTICLE
        
        // Titre : On conserve le titre dynamique + ajout du nom du blog
        $viewData['title'] = htmlspecialchars($articleData['titre_general']) . ' | Blog Tech for Business';
        
        // Description : On utilise la présentation (si disponible) et on ajoute un appel à l'action
        // Remplacement de 'Détail d\'un projet' par une phrase plus pertinente pour le blog
        $default_description = 'Découvrez les astuces, outils et stratégies expliqués dans cet article de fond par Tech for Business.';
        $viewData['description'] = htmlspecialchars($articleData['presentation'] ?? $default_description);
        
        // Canonical : Reste dynamique
        $viewData['canonical'] = 'https://www.techforbusiness.fr/detailArticle?id=' . $article_id; // Changement de 'DetailDuProjet' à 'article' pour la cohérence
        
        // Image OG : Utiliser l'image de l'article si elle existe (ici on conserve l'image par défaut)
        $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/image-par-defaut-article.jpg';
        
        // AJOUT RECOMMANDÉ : Mots-clés Dynamiques
        // Si vous avez un champ 'mots_cles' ou 'tags' dans votre table 'article', utilisez-le ici !
        // Exemple (en supposant que 'mots_cles' est un champ dans la DB) :
        // $viewData['keywords'] = htmlspecialchars($articleData['mots_cles'] ?? 'tech for business, astuces, IA, No Code');
        
    } else {
        // ID manquant ou invalide
        goto notFound;
    }
} elseif ($uri === 'aPropos' || $uri === 'aPropos-partial') {
    $contentView = 'views/aPropos.php';
    
    // NOUVELLES BALISES MÉTA POUR LA PAGE À PROPOS
    
    $viewData['title'] = 'À Propos de Tech for Business | La passion du Web au service des TPE';
    
    $viewData['description'] = 'Découvrez la vision du blog Tech for Business : combler le fossé entre les technologies émergentes et l\'efficacité des TPE, associations et petits commerces, avec passion et sans jargon.';
    
    $viewData['keywords'] = 'mission Tech for Business, vision blog tech, fondateur passionné, aide TPE numérique, simplifier la tech, micro-stratégies, croissance PME';
    
    // IMPORTANT : Mettre l'URL réelle de votre blog ici
    $viewData['canonical'] = 'www.techforbusiness.fr/aPropos';
    
    // IMPORTANT : Mettre une image de couverture/fond pertinente pour cette page
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/about-blog-tech.jpg';

} elseif ($uri === 'test' || $uri === 'test-partial') {
    $contentView = 'views/test.php';
    
    // NOUVELLES BALISES MÉTA POUR LA PAGE DE TEST
    
    $viewData['title'] = 'TEST | Page de Développement - Tech for Business';
    
    $viewData['description'] = 'Ceci est une page de test interne du blog Tech for Business. Elle n\'est pas destinée au public. Veuillez naviguer vers l\'accueil.';
    
    $viewData['keywords'] = 'test, développement, debug, Tech for Business';
    
    // TRÈS IMPORTANT : Utiliser la balise canonical sur l'accueil ou non indexer la page.
    // Dans ce cas, nous pointons vers l'accueil pour éviter l'indexation de contenu dupliqué.
    $viewData['canonical'] = 'https://www.techforbusiness.fr/'; 
    
    // Utilisation de l'URL réelle du blog (www.techforbusiness.fr) pour l'image
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/logo-tech-business.png'; 
} else {

    // Label pour la gestion du 404 (utilisé par le 'goto' ci-dessus)
    notFound:
    http_response_code(404);
    $contentView = 'views/404.php';
    
    // NOUVELLES BALISES MÉTA POUR LA PAGE 404
    
    $viewData['title'] = 'Erreur 404 | Astuces Tech Perdues - Tech for Business';
    
    $viewData['description'] = 'Oups ! L\'astuce numérique que vous cherchez a disparu. Retournez à l\'accueil pour retrouver nos guides TPE et micro-stratégies, ou contactez-nous.';
    
    $viewData['keywords'] = '404, page introuvable, erreur, blog Tech for Business, astuces TPE, guide numérique';
    
    // IMPORTANT : Utilisation de l'URL réelle du blog
    $viewData['canonical'] = 'https://www.techforbusiness.fr/404';
    
    // Utilisation d'une image de logo ou une image montrant l'erreur
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/images/logo-tech-business.png';
}


// =========================================================================
// 3. RENDU CONDITIONNEL (MODIFIÉ)
// =========================================================================

// Rend les données accessibles dans les vues (title, description, projet, etc.)
extract($viewData);

if ($isHtmxRequest) {
    // Si c'est un appel HTMX (AJAX) :

    // 1. Inclut le contenu principal (la vue)
    include $contentView;

    // 2. Inclut le fragment OOB pour la mise à jour des balises <head>
    include 'views/maj.php';

    exit;
} else {
    // Si c'est un chargement complet du navigateur :

    // 1. Capture du contenu dynamique (la vue)
    ob_start();
    include $contentView;
    $dynamicContent = ob_get_clean();

    // 2. Inclusion du layout qui affichera $dynamicContent dans <main>
    include 'views/layout.php';
}
