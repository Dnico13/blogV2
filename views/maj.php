<?php 
/**
 * Fragment pour la mise à jour des balises <head> via HTMX Out-of-Band (OOB).
 * Ce fichier est inclus par le routeur UNIQUEMENT lors des requêtes HTMX (AJAX).
 * Il suppose que les variables $title, $description, $keywords, $canonical, $ogImage
 * sont disponibles via extract($viewData) dans le routeur.
 */

// On utilise $canonical directement car il est déjà complet dans $viewData
$canonicalUrl = $canonical ?? 'https://www.ndev2023.fr/';

// --- MISE À JOUR DU <head> VIA hx-swap-oob --- 
?>
<title id="page-title" hx-swap-oob="true"><?= htmlspecialchars($title ?? 'Titre par Défaut') ?></title>

<meta name="description" content="<?= htmlspecialchars($description ?? 'Description par défaut') ?>" id="meta-description" hx-swap-oob="true">

<meta name="keywords" content="<?= htmlspecialchars($keywords ?? 'keywords') ?>" id="meta-keywords" hx-swap-oob="true">

<link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>" id="link-canonical" hx-swap-oob="true">

<meta property="og:title" content="<?= htmlspecialchars($title ?? 'Titre par Défaut OG') ?>" id="og-title" hx-swap-oob="true">

<meta property="og:description" content="<?= htmlspecialchars($description ?? 'Description par défaut OG') ?>" id="og-description" hx-swap-oob="true">

<meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>" id="og-url" hx-swap-oob="true">

<meta property="og:image" content="<?= htmlspecialchars($ogImage ?? 'URL image par défaut') ?>" id="og-image" hx-swap-oob="true">

<meta name="twitter:title" content="<?= htmlspecialchars($title ?? 'Titre par Défaut Twitter') ?>" id="twitter-title" hx-swap-oob="true">

<meta name="twitter:description" content="<?= htmlspecialchars($description ?? 'Description par défaut Twitter') ?>" id="twitter-description" hx-swap-oob="true">

<meta name="twitter:image" content="<?= htmlspecialchars($ogImage ?? 'URL image par défaut') ?>" id="twitter-image" hx-swap-oob="true">