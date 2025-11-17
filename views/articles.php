<?php require_once 'controller/articleController.php';

// Initialisation du délai pour les animations AOS // 
$delai = 150;

?>

<main class="py-5 ">
    <div class="container">
        <!--<div class="row mb-4 align-items-center">
                
                <div class="col-md-4" data-aos="fade-right">
                    <select class="form-select" aria-label="Filtre Catégorie">
                        <option selected>Toutes les catégories</option>
                        <option value="1">IA & Automatisation</option>
                        <option value="2">Marketing Digital</option>
                        <option value="3">Cybersécurité</option>
                        <option value="4">No Code & SaaS</option>
                    </select>
                </div>
                
                <div class="col-md-4 mt-3 mt-md-0" data-aos="fade-up">
                    <select class="form-select" aria-label="Filtre Tri">
                        <option selected>Trier par : Plus Récent</option>
                        <option value="1">Plus Populaire</option>
                        <option value="2">Temps de Lecture (Court)</option>
                    </select>
                </div>

                <div class="col-md-4 mt-3 mt-md-0 text-md-end" data-aos="fade-left">
                    <p class="mb-0 small text-muted fw-bold">Affichage de 120 résultats</p>
                </div>
            </div> -->

        <div class="row g-4 mt-4">

            <?php

            foreach ($articles as $article):
            ?>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delai; ?>">
                    <a href="/detailArticle?id=<?= htmlspecialchars($article['id']); ?>" class="text-decoration-none text-dark d-block h-100">
                        <div class="card article-card h-100 shadow-sm border rounded-4 shadow-sm">
                            <img src="./uploads/<?= htmlspecialchars($article['photo1']); ?>" class="card-img-top img-fluid **article-img**" alt="Article : <?= htmlspecialchars($article['titre_general']); ?>" loading="lazy">
                            <div class="card-body bg-body-secondary">
                                <span class="badge badge-category mb-2 w-50"><?= htmlspecialchars($article['rubrique']); ?></span>
                                <h4 class="card-title-article mb-3"><?= htmlspecialchars($article['titre_general']); ?></h4>
                                <!--<p class="card-text small text-muted"><?= htmlspecialchars($article['2lignes']); ?></p>-->
                            </div>
                            <div class="card-footer bg-light border-top small text-secondary d-flex justify-content-between">
                                <span><i class="far fa-clock me-1"></i> 5 min de lecture</span>
                                <span><i class="fas fa-calendar-alt me-1"></i><?= htmlspecialchars($article['date']); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
                // Incrémentation du délai pour la prochaine carte //
                $delai += 250;
            endforeach; ?>
        </div>

        <!-- en preparation pagination
        <nav class="mt-5" data-aos="fade-up">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
            </ul>
        </nav>-->

    </div>
    <script>
        AOS.refreshHard()
    </script>
</main>