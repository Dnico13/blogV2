 <?php require_once 'controller/articleController.php';

    ?>

 <header class="hero-section position-relative overflow-hidden">
     <div class="liquid-blob"></div>
     <div class="liquid-blob-2"></div>

     <div class="container position-relative" style="z-index: 2;" data-aos="fade-up" data-aos-duration="1200">
         <div class="row align-items-center">
             <div class="col-lg-7">
                 <h1 class="display-4 font-montserrat mb-3">La Tech au Service de <span class="text-green">Votre Réussite</span></h1>
                 <p class="lead mb-4 text-muted">Des solutions concrètes et éprouvées pour les PME, TPE et Autoentrepreneurs.</p>
                 <a href="conseils-informatique-business-web/<?= htmlspecialchars($lastArticle['slug']) ?>"
                     hx-target="#main"
                     hx-push-url="conseils-informatique-business-web/<?= htmlspecialchars($lastArticle['slug']) ?>"
                     hx-get="conseils-informatique-business-web/<?= htmlspecialchars($lastArticle['slug']) ?>-partial"
                     class="btn-ps-primary"
                     title="Lire le dernier article">
                     Lire le dernier article
                 </a>
             </div>
         </div>
     </div>
 </header>

 <main>
     <section class="py-5" id="featured">
         <div class="container">
             <h2 class="section-title text-white font-montserrat">À la Une</h2>
             <div class="mini-line mb-4"></div>
             <div class="row g-0 shadow-green-glow rounded-4 overflow-hidden" data-aos="zoom-in" style="border: 1px solid var(--ps-border);">

                 <div class="col-lg-6 d-flex">
                     <div class="ratio ratio-16x9 w-100">
                         <img src="/uploads/<?= htmlspecialchars(trim($lastArticle['photo1'])); ?>"
                             class="object-fit-cover"
                             alt="illustration du dernier article dont le titre est :'<?= htmlspecialchars($lastArticle['titre_general']); ?>'"
                             style="filter: brightness(0.9);"
                             loading="lazy"
                             title="<?= htmlspecialchars($lastArticle['titre_general']); ?>">
                     </div>
                 </div>


                 <div class="col-lg-6 d-flex flex-column justify-content-center p-3 p-md-5" style="background: #1a1d21;">
                     <div class="featured-article-content p-0">
                         <span class="badge border border-success text-green mb-3 text-uppercase" style="background: rgba(50, 255, 180, 0.1);">
                             <?= htmlspecialchars($lastArticle['rubrique']); ?>
                         </span>

                         <h3 class="font-montserrat text-white mb-3"><?= htmlspecialchars($lastArticle['titre_general']); ?></h3>

                         <p class="text-muted small mb-3">
                             <i class="far fa-calendar-alt me-1"></i> <?= htmlspecialchars($lastArticle['date']); ?>
                         </p>

                         <p class="lead fw-light text-white-50 mb-4"><?= htmlspecialchars($lastArticle['2lignes']); ?></p>

                         <a href="conseils-informatique-business-web/<?= htmlspecialchars($lastArticle['slug']) ?>"
                             hx-target="#main"
                             hx-push-url="conseils-informatique-business-web/<?= htmlspecialchars($lastArticle['slug']) ?>"
                             hx-get="conseils-informatique-business-web/<?= htmlspecialchars($lastArticle['slug']) ?>-partial"
                             class="text-decoration-none fw-bold text-green stretched-link-pseudo"
                             title="Lire l'article complet">
                             Lire l'article complet <i class="fas fa-arrow-right ms-2"></i>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section class="py-5">
         <div class="container">
             <h2 class="section-title text-white font-montserrat">Les Derniers Billets</h2>
             <div class="mini-line mb-5"></div>

             <?php $delai = 150; ?>
             <div class="row g-4">
                 <?php foreach ($recentArticles as $article): ?>
                     <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delai; ?>">
                         <div class="feature-box h-100 d-flex flex-column position-relative">
                             <img src="/uploads/<?= htmlspecialchars($article['photo1']); ?>"
                                 class="rounded-4 mb-3"
                                 alt="illustration"
                                 style="width: 100%; height: 200px; object-fit: cover; border: 1px solid var(--ps-border);"
                                 loading="lazy"
                                 title="<?= htmlspecialchars($article['titre_general']); ?>">

                             <span class="text-green small text-uppercase fw-bold mb-2"><?= htmlspecialchars($article['rubrique']); ?></span>
                             <h4 class="text-white mb-3 font-montserrat" style="font-size: 1.2rem;"><?= htmlspecialchars($article['titre_general']); ?></h4>
                             <p class="text-muted small flex-grow-1"><?= htmlspecialchars($article['2lignes']); ?></p>

                             <div class="pt-3 mt-auto border-top border-secondary d-flex justify-content-between align-items-center">
                                 <span class="text-muted" style="font-size: 0.75rem;">Publié le <?= htmlspecialchars($article['date']); ?></span>
                                 <a href="conseils-informatique-business-web/<?= htmlspecialchars($article['slug']) ?>"
                                     hx-target="#main"
                                     hx-push-url="conseils-informatique-business-web/<?= htmlspecialchars($article['slug']) ?>"
                                     hx-get="conseils-informatique-business-web/<?= htmlspecialchars($article['slug']) ?>-partial"
                                     class="stretched-link text-green" title="Lire">
                                     <i class="fas fa-plus-circle"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                 <?php $delai += 100;
                    endforeach; ?>
             </div>

             <div class="text-center mt-5" data-aos="fade-up">
                 <a href="conseils-informatique-business-web"
                     hx-get="conseils-informatique-business-web-partial"
                     hx-target="#main"
                     hx-push-url="conseils-informatique-business-web"
                     class="btn-ps-primary px-5 rounded-pill"
                     title="Voir tous les articles">
                     Voir tous les articles <i class="fas fa-long-arrow-alt-right ms-2"></i>
                 </a>
             </div>
         </div>
     </section>

     <script>
         // Refresh pour s'assurer que les animations se déclenchent sur le nouveau contenu
         AOS.init();
         AOS.refreshHard();
     </script>
 </main>