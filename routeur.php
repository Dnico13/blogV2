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
    include 'views/_htmx_head_swap.php'; 
    
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