<?php
// Si ton routeur fait un extract($viewData), $article est déjà disponible.
// Si non, on le récupère via $viewData['article']
$article = $article ?? $viewData['article'];
?>

<link rel="canonical" href="https://www.techforbusiness.fr/conseils-informatique-business-web/<?= $article['slug']; ?>" />

<main class="my-5 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div data-aos="fade-down">
                    <span class="badge bg-primary text-uppercase mb-2"><?= htmlspecialchars($article["rubrique"]); ?></span>
                    <h1 class="display-5 fw-bold mb-3" style="font-family: var(--font-title);"><?= htmlspecialchars($article["titre_general"]); ?></h1>
                    <p class="text-muted small mb-4">
                        Publié le <?= htmlspecialchars($article["date"]); ?> |
                        <i class="far fa-clock me-1"></i> 5 min de lecture
                    </p>
                </div>

                <div class="article-content" data-aos="fade-up">
                    <p class="lead"><?= nl2br(htmlspecialchars($article["para1"])); ?></p>

                    <h2><?= htmlspecialchars($article["titre2"]); ?></h2>
                    <p><?= nl2br(htmlspecialchars($article["para2"])); ?></p>

                    <div class="text-center my-4 mb-5 mx-auto" style="max-width: 600px;">
                        <img src="/uploads/<?= htmlspecialchars($article["photo2"]); ?>"
                            class="img-fluid rounded shadow"
                            alt="<?= htmlspecialchars($article["titre_general"]); ?>"
                            loading="lazy"
                            width="600" height="400">
                    </div>

                    <h2><?= htmlspecialchars($article["titre3"]); ?></h2>
                    <p><?= nl2br(htmlspecialchars($article["para3"])); ?></p>

                    <?php if (!empty($article["titre4"])): ?>
                        <h2><?= htmlspecialchars($article["titre4"]); ?></h2>
                        <p><?= nl2br(htmlspecialchars($article["para4"])); ?></p>
                    <?php endif; ?>

                    <div class="article-content" data-aos="fade-up">


                        <?php if (!empty($article["titre5"])): ?>
                            <h2 class="mt-4"><?= htmlspecialchars($article["titre5"]); ?></h2>
                            <p><?= nl2br(htmlspecialchars($article["para5"])); ?></p>
                        <?php endif; ?>

                    </div>

                </div>

                

                <div class="author-box d-flex align-items-center p-4 rounded-4 mt-5 shadow-sm border-start"
                    style="border-left: 5px solid #0fb881 !important; background-color: rgba(50, 255, 180, 0.05);">
                    <div>
                        <h5 class="fw-bold mb-1 text-white">Par Nicolas Delannay</h5>
                        <p class="small text-muted mb-0">Fondateur de Tech for Business. Je simplifie la technologie pour booster votre efficacité commerciale.</p>
                    </div>
                </div>

                <div class="mt-5 pt-3">
                    <a href="/conseils-informatique-business-web"
                        hx-get="/conseils-informatique-business-web"
                        hx-target="#main"
                        hx-push-url="true"
                        class="btn-ps-primary px-3 rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Retour aux articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    AOS.refreshHard();
</script>