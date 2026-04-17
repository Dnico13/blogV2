<?php

// Assurez-vous que 'pdo.php' est inclus avant toute tentative d'accès à la BDD
// C'est souvent mieux de le faire ici, mais je le laisse dans la route pour l'exemple.
// require_once 'pdo.php'; 
define('IMG_URL', 'https://www.stompin-bones.fr/image/LesDeuxMusiciensPetit.webp');
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
require_once 'pdo.php'; // Assurez-vous que la connexion PDO est disponible pour les routes qui en ont besoin
// =========================================================================
// 2. ROUTAGE & LOGIQUE (MODIFIÉE POUR DetailDuProjet)
// =========================================================================

// Détermine la vue et les données
if ($uri === '' || $uri === 'accueil' || $uri === 'accueil-partial') {
    $contentView = 'views/accueil.php';

    // NOUVELLES BALISES MÉTA POUR LE BLOG "TECH FOR BUSINESS"

    // Titre : Optimisé pour le SEO avec mots-clés au début
    $viewData['title'] = 'Tech for Business | Stratégies Numériques pour TPE, PME & Associations';

    // Description : Accrocheuse et contient les bénéfices clients
    $viewData['description'] = 'Boostez votre TPE avec Tech for Business. Découvrez des micro-stratégies concrètes, du No-Code et de l\'IA simple pour développer votre activité sans jargon technique.';

    // Keywords : (Optionnel, Google ne les lit plus trop, mais bon pour les moteurs internes)
    $viewData['keywords'] = 'Tech for Business, astuces numériques Var, digital TPE, micro-stratégies business, IA simple PME, No-code business, développement commercial numérique';

    // URL Canonique : On garde la racine propre
    $viewData['canonical'] = 'https://www.techforbusiness.fr/';

    // Image OG : On utilise ton nouveau visuel AVIF
    // Note : Certains réseaux sociaux (vieux) préfèrent encore le JPG pour l'Open Graph, 
    // mais l'AVIF est de plus en plus supporté.
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';
} elseif ($uri === '' || $uri === 'confidentialite' || $uri === 'confidentialite-partial') {
    $contentView = 'views/confidentialite.php';

    // NOUVELLES BALISES MÉTA POUR LA PAGE DE CONFIDENTIALITÉ

    $viewData['title'] = 'Confidentialité | Tech for Business';

    $viewData['description'] = 'Découvrez notre politique de confidentialité et comment nous protégeons vos données personnelles.';

    $viewData['keywords'] = 'confidentialité, protection des données, RGPD, Tech for Business';

    $viewData['canonical'] = 'https://www.techforbusiness.fr/confidentialite';

    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';

    $viewData['noIndex'] = true;
} elseif ($uri === 'mentions-legales' || $uri === 'mentions-legales-partial') {
    $contentView = 'views/mentions-legales.php';

    $viewData['title'] = 'Mentions Légales | Tech for Business';

    $viewData['description'] = 'Découvrez nos mentions légales et les conditions d\'utilisation de notre site.';

    $viewData['keywords'] = 'mentions légales, conditions d\'utilisation, Tech for Business';

    // Utilisation de l'URL réelle du blog
    $viewData['canonical'] = 'https://www.techforbusiness.fr/';

    // Mise à jour de l'image OG avec une image pertinente pour le blog
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';

    //pour ne pas indexer cette page 
    $viewData['noIndex'] = true;
} elseif ($uri === 'conseils-informatique-business-web' || $uri === 'conseils-informatique-business-web-partial') {
    $contentView = 'views/conseils-informatique-business-web.php';

    // NOUVELLES BALISES MÉTA POUR LA PAGE DES ARTICLES (LISTING)
    $viewData['title'] = 'Guides Tech & Business | Solutions Numériques pour TPE et Commerçants';

    $viewData['description'] = 'Explorez tous nos guides pratiques : IA simplifiée, No-Code et micro-stratégies web. Des solutions concrètes pour booster la croissance de votre TPE ou association sans jargon.';

    $viewData['keywords'] = 'articles tech TPE, guide numérique Var, micro-stratégies web, No Code pour PME, astuces IA business, blog tech accessible';

    // CORRECTION : Alignement strict sur l'URL du sitemap
    $viewData['canonical'] = 'https://www.techforbusiness.fr/conseils-informatique-business-web';

    // IMAGE : On pointe vers ton image de listing (vérifie bien le dossier /images/ ou /uploads/)
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';
} elseif ($uri === 'contact-creation-site-83' || $uri === 'contact-creation-site-83-partial') {
    $contentView = 'views/contact-creation-site-83.php';

    // NOUVELLES BALISES MÉTA POUR LA PAGE CONTACT
    $viewData['title'] = 'Contact & Expertise Web dans le Var | Tech for Business';

    $viewData['description'] = 'Un projet web ou une question sur l\'IA et le No-code ? Contactez Tech for Business pour un échange simple et sans jargon sur vos défis numériques dans le Var.';

    $viewData['keywords'] = 'contact Tech for Business, création site web Var, expert informatique 83, projet numérique TPE, aide PME numérique Var';

    // CORRECTION : Alignement sur l'URL exacte du sitemap
    $viewData['canonical'] = 'https://www.techforbusiness.fr/contact-creation-site-83';

    // IMAGE : On garde ton image de contact (vérifie bien sa présence dans le dossier)
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';
} elseif (str_starts_with($uri, 'conseils-informatique-business-web')) {

    $segments = explode('/', trim($uri, '/'));
    $projet_slug = $segments[1] ?? '';

    if (!empty($projet_slug)) {

        $clean_slug = str_replace('-partial', '', $projet_slug);

        // 1. RECHERCHE
        $statement = $pdo->prepare("SELECT * FROM article WHERE slug = :slug");
        $statement->execute(['slug' => $clean_slug]);
        $articleData = $statement->fetch(PDO::FETCH_ASSOC);

        // Article Précédent
        $stmtPrev = $pdo->prepare("SELECT slug FROM article WHERE id < ? ORDER BY id DESC LIMIT 1");
        $stmtPrev->execute([$articleData['id']]);
        $prevArticle = $stmtPrev->fetch();

        // Article Suivant
        $stmtNext = $pdo->prepare("SELECT slug FROM article WHERE id > ? ORDER BY id ASC LIMIT 1");
        $stmtNext->execute([$articleData['id']]);
        $nextArticle = $stmtNext->fetch();

        if (!$articleData) {
            goto notFound;
        }

        // 2. PRÉPARATION
        $contentView = 'views/detailArticle.php';

        // On prépare $viewData pour le head.php
        $viewData['article'] = $articleData; // Pour la vue
        $viewData['title'] = htmlspecialchars($articleData['titre_general']) . ' | TechForBusiness';
        $viewData['description'] = htmlspecialchars($articleData['meta_description'] ?? 'Conseils tech et business.');
        $viewData['canonical'] = 'https://www.techforbusiness.fr/conseils-informatique-business-web/' . $clean_slug;
    } else {
        $contentView = 'views/conseils-informatique-business-web.php';
        require_once 'controller/articleController.php';
    }
} elseif ($uri === 'expert-informatique-web-var' || $uri === 'expert-informatique-web-var-partial') {
    $contentView = 'views/expert-informatique-web-var.php';

    // NOUVELLES BALISES MÉTA POUR LA PAGE À PROPOS (EXPERT VAR)
    $viewData['title'] = 'Expert Informatique & Web dans le Var | À Propos de Tech for Business';

    $viewData['description'] = 'Découvrez la vision de Tech for Business : simplifier les technologies (IA, No-code) pour booster l\'efficacité des TPE, associations et commerces du Var, sans jargon.';

    $viewData['keywords'] = 'expert informatique Var, consultant web 83, mission Tech for Business, aide numérique TPE Var, simplification technologie PME, micro-stratégies croissance';

    // CORRECTION : Alignement strict sur l'URL du sitemap avec le protocole complet
    $viewData['canonical'] = 'https://www.techforbusiness.fr/expert-informatique-web-var';

    // IMAGE : On garde ton image dédiée à la présentation
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';
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
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';

    //pour ne pas indexer cette page 
    $viewData['noIndex'] = true;
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
    $viewData['ogImage'] = 'https://www.techforbusiness.fr/uploads/pageDaccueilTechForBusiness.avif';
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
