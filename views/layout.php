<!DOCTYPE html>
<html lang="fr">

<head>
    <?php if (isset($viewData['noIndex']) && $viewData['noIndex'] === true): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php else: ?>
        <meta name="robots" content="index, follow">
    <?php endif; ?>

    <?php if (!empty($lastArticle) && isset($lastArticle['photo1'])): ?>
        <link rel="preload" as="image" href="/uploads/<?= htmlspecialchars($lastArticle['photo1']) ?>">
    <?php endif; ?>


    <title id="page-title"><?= $title ?? 'Tech for Business : Astuces Numériques pour TPE, PME et Associations' ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?= htmlspecialchars($description ?? 'Le blog qui vous donne des astuces et des micro-stratégies concrètes (IA simple, No Code) pour développer le courant d\'affaires de votre TPE ou association, sans jargon.') ?>" id="meta-description">

    <meta name="keywords" content="<?= htmlspecialchars($keywords ?? 'Tech for Business, astuces numériques TPE, guide No Code PME, IA simple, micro-stratégies web, développement d\'affaires, blog tech accessible, association numérique') ?>" id="meta-keywords">

    <meta name="author" content="Nicolas Delannay - Fondateur Tech for Business">

    <meta http-equiv="Content-Language" content="fr">

    <meta property="og:title" content="<?= $title ?? 'Tech for Business | Le Blog des Entrepreneurs' ?>" id="og-title">
    <meta property="og:description" content="<?= htmlspecialchars($description ?? 'Découvrez nos astuces pour TPE et PME : IA simple, No Code, webmarketing. Un guide pratique et sans jargon pour votre croissance.') ?>" id="og-description">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $canonical ?? 'https://www.techforbusiness.fr/' ?>" id="og-url">
    <meta property="og:image" content="<?= $ogImage ?? 'https://www.techforbusiness.fr/images/logo-tech-business.png' ?>" id="og-image">

    <!-- coloration de la barre de nvigation sur mobile -->
    <meta name="theme-color" content="#0f1113">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <!-- fin de la coloration de la barre de navigation -->

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?? 'Tech for Business : Astuces Numériques pour TPE' ?>" id="twitter-title">
    <meta name="twitter:description" content="<?= htmlspecialchars($description ?? 'Micro-stratégies et astuces tech pour TPE, PME et associations. Sans jargon, avec passion.') ?>" id="twitter-description">
    <meta name="twitter:image" content="<?= $ogImage ?? 'https://www.techforbusiness.fr/images/logo-tech-business.png' ?>" id="twitter-image">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="canonical" href="<?= $canonical ?? 'https://www.techforbusiness.fr/' ?>" id="link-canonical">

    <link rel="icon" type="image/svg+xml" href="favicon.svg">

    <script src="https://unpkg.com/htmx.org@2.0.2" integrity="sha384-Y7hw+L/jvKeWIRRkqWYfPcvVxHzVzn5REgzbawhxAuQGwX1XWe70vjiPcVSeHOThJ" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="/css/style.min.css">


    <?php
    //variables pour le balise nav et le footer
    $currentPage = trim($uri, '/');
    $annee = date('Y');
    ?>
</head>

<body class="d-flex flex-column body_colors">

    <?php require_once 'partials/header.php'; ?>

    <div id="main" class="container-fluid mt-5 mt-md-0 pt-5 pt-md-0">
        <?php
        if (isset($dynamicContent)) {
            echo $dynamicContent;
        }
        ?>

    </div>

    <?php
    require_once 'partials/footer.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 900
        });
    </script>
    <?php
    require_once 'partials/cookies.php';
    ?>
</body>

</html>