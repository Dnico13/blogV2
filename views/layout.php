<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="robots" content="index, follow">
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

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?? 'Tech for Business : Astuces Numériques pour TPE' ?>" id="twitter-title">
    <meta name="twitter:description" content="<?= htmlspecialchars($description ?? 'Micro-stratégies et astuces tech pour TPE, PME et associations. Sans jargon, avec passion.') ?>" id="twitter-description">
    <meta name="twitter:image" content="<?= $ogImage ?? 'https://www.techforbusiness.fr/images/logo-tech-business.png' ?>" id="twitter-image">

    <link rel="stylesheet" href="/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="canonical" href="<?= $canonical ?? 'https://www.techforbusiness.fr/' ?>" id="link-canonical">

    <link rel="icon" type="image/png" href="image/logo.ico">

    <script src="https://unpkg.com/htmx.org@2.0.2" integrity="sha384-Y7hw+L/jvKeWIRRkqWYfPcvVxHzVzn5REgzbawhxAuQGwX1XWe70vjiPcVSeHOThJ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.min.css">

    <!-- Google Analytics -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W7SJGSD8PM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-W7SJGSD8PM');
    </script>






    <?php 
    //variables pour le balise nav et le footer
    $currentPage = basename($_SERVER['REDIRECT_URL'], ".php"); 
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
    <?php require_once 'partials/footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 900
        });
    </script>
</body>

</html>