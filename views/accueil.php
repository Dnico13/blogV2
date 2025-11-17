 <?php
    require_once 'controller/articleController.php';
    ?>


 <header class="hero-section ">
     <div class="hero-overlay"></div>
     <div class="container hero-content" data-aos="fade-up" data-aos-duration="1200">
         <h1 class=" pt-5 pt-md-0 mb-3">La Tech au Service de Votre Réussite</h1>
         <p class="lead mb-4 text-white-50">Des solutions concrètes et éprouvées pour les PME, TPE et Autoentrepreneurs.</p>
         <a href="/detailArticle?id=<?= $lastArticle['id']; ?>" class="btn btn-tech btn-sm btn-md-lg mx-auto" title="Lire le dernier article">Lire le dernier article</a>
     </div>
 </header>

 <main class="">

     <section class="my-5 py-5 bg-white" id="featured">
         <div class="container ">
             <h2 class="section-title">À la Une</h2>
             <div class="separator-line"></div>

             <div class="row g-0 shadow-lg" data-aos="zoom-in">

                 <div class="col-lg-7">
                     <img src="/uploads/<?= $lastArticle['photo1']; ?>" class="img-fluid w-100" alt="illustration de l'article <?= $lastArticle['titre_general']; ?> " loading="lazy">

                 </div>

                 <div class="col-lg-5 ">
                     <div class="featured-article-content bg-body-secondary">
                         <span class="badge bg-primary mb-3 text-uppercase"><?= $lastArticle['rubrique']; ?></span>
                         <h3 class="card-title-article mb-3"><?= $lastArticle['titre_general']; ?></h3>
                         <p class="text-muted small mb-3"><?= $lastArticle['date']; ?></p>
                         <p class="lead fw-light"><?= $lastArticle['2lignes']; ?></p>
                         <a href="/detailArticle?id=<?= $lastArticle['id']; ?>" class="text-decoration-none fw-bold" style="color: var(--primary-color);" title="Lire l'article complet">Lire l'article complet <i class="fas fa-arrow-right ms-2"></i></a>
                     </div>
                 </div>
             </div>

         </div>
     </section>

     <section class="py-5" style="background-color: var(--light-bg);">
         <div class="container">
             <h2 class="section-title">Les Derniers Billets</h2>
             <div class="separator-line"></div>

             <?php
                // Initialisation du délai pour les animations AOS // 
                $delai = 150;
                ?>

             <div class="row g-4">
                 <?php foreach ($recentArticles as $article): ?>

                     <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delai; ?>">
                         <div class="card article-card h-100 rounded-4 shadow-sm">
                             <img src="/uploads/<?= htmlspecialchars($article['photo1']); ?>" class="card-img-top" alt="illustration de l'article <?= htmlspecialchars($article['titre_general']); ?>" loading="lazy">
                             <div class="card-body bg-body-secondary">
                                 <span class="badge bg-primary w-50 mb-2"><?= htmlspecialchars($article['rubrique']); ?></span>
                                 <h4 class="card-title-article mb-3"><?= htmlspecialchars($article['titre_general']); ?></h4>
                                 <p class="card-text small text-muted"><?= htmlspecialchars($article['2lignes']); ?></p>
                                 <a href="/detailArticle?id=<?= htmlspecialchars($article['id']); ?>" class="stretched-link" title="Lire l'article: <?= htmlspecialchars($article['titre_general']); ?> "></a>
                             </div>
                             <div class="card-footer bg-white border-0 small text-muted">
                                 Publié le <?= htmlspecialchars($article['date']); ?>
                             </div>
                         </div>
                     </div>
                 <?php
                        // Incrémentation du délai pour la prochaine carte //
                        $delai += 250;
                    endforeach; ?>



             </div>

             <div class="text-center mt-5" data-aos="fade-up">
                 <a href="/articles" class="btn btn-outline-primary rounded-pill px-4" title=" Voir tous les articles">Voir tous les articles <i class="fas fa-long-arrow-alt-right ms-2"></i></a>
             </div>

         </div>
     </section>

     <!-- <section class="  py-5 bg-primary" data-aos="zoom-in">
         <div class="container text-center text-white">
             <h3 class="fw-bold mb-3" style="font-family: var(--font-title);">Ne manquez aucune tendance Tech !</h3>
             <p class="lead mb-4 text-white-75">Recevez nos analyses directement par email. (Gratuit et sans spam)</p>

             <form class="row justify-content-center" action="subscribe.php" method="POST">
                 <div class="col-md-5 mb-3">
                     <input type="email" class="form-control rounded-pill py-2" placeholder="Votre adresse email professionnelle" required>
                 </div>
                 <div class="col-md-3 mb-3">
                     <button type="submit" class="btn btn-light btn-tech rounded-pill w-100 py-2" style="background-color: white !important; color: var(--primary-color) !important; border-color: white !important;">S'abonner</button>
                 </div>
             </form>
         </div>
     </section>-->
     <script>
         AOS.refreshHard()
     </script>
 </main>