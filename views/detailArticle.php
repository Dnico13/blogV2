 <?php require_once 'controller/articleController.php'; ?>

<link rel="canonical" href="https://www.techforbusiness.fr/article/<?= $article['slug']; ?>" />

<main class="py-5">
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
                        <img src="/uploads/<?= htmlspecialchars($article["photo2"]); ?>" class="img-fluid rounded shadow" alt="<?= htmlspecialchars($article["titre_general"]); ?>">
                    </div>

                    <h2><?= htmlspecialchars($article["titre3"]); ?></h2>
                    <p><?= nl2br(htmlspecialchars($article["para3"])); ?></p>

                    <h2><?= htmlspecialchars($article["titre4"]); ?></h2>
                    <p><?= nl2br(htmlspecialchars($article["para4"])); ?></p>

                    <hr class="mt-5 mb-4">
                    <h3 class="conclusion-title"><?= htmlspecialchars($article["titre5"]); ?></h3>
                    <p><?= nl2br(htmlspecialchars($article["para5"])); ?></p>
                </div>

                <div class="author-box d-flex align-items-center bg-light p-4 rounded-4 mt-5 shadow-sm">
                    <div>
                        <h5 class="fw-bold mb-1">Par Nicolas Delannay</h5>
                        <p class="small text-muted mb-0">Fondateur de Tech for Business. Je simplifie la technologie pour booster votre efficacité.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    AOS.refreshHard();
</script>