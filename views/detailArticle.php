 <?php require_once 'controller/articleController.php'; ?>

 <link rel="canonical" href="https://www.techforbusiness.fr/article/<?= $article['slug']; ?>" />

 <main class=" my-5 py-5">
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

                     <div class="my-5 p-4 rounded-4 shadow-sm"
                         style="background-color: rgba(50, 255, 180, 0.05); border-left: 5px solid var(--ps-green);"
                         data-aos="zoom-in">
                         <h4 class="fw-bold text-light">Prêt à concrétiser votre vision ?</h4>
                         <p class="mb-3 text-muted">Besoin d'un accompagnement pour créer votre site web ou booster votre présence digitale avec un expert.</p>
                         <div class="d-flex flex-wrap gap-3">
                             <a href="https://www.proxisite.fr" target="_blank" rel="noopener noreferrer me"
                                 class="btn btn-sm rounded-pill px-4 fw-bold"
                                 style="background-color: var(--ps-green); color: #000; border: none;">
                                  Lancer votre projet
                             </a>
                             <a href="https://www.developpeurweb83.fr/projets" target="_blank" rel="noopener noreferrer me"
                                 class="btn btn-sm rounded-pill text-muted px-4 fw-bold shadow-sm"
                                 style="border: 2px solid var(--ps-green); color: #000; background: transparent;">
                                  Voir les démos techniques
                             </a>
                         </div>
                     </div>

                     <hr class="mt-5 mb-4">

                     <hr class="mt-5 mb-4">
                     <h3 class="conclusion-title"><?= htmlspecialchars($article["titre5"]); ?></h3>
                     <p><?= nl2br(htmlspecialchars($article["para5"])); ?></p>
                 </div>

                 <div class="author-box d-flex align-items-center  p-4 rounded-4 mt-5 shadow-sm border-start"
                     style="border-left: 4px solid var(--ps-green) !important; background-color: rgba(50, 255, 180, 0.05); border-left: 5px solid var(--ps-green);">
                     <div>
                         <h5 class="fw-bold mb-1 text-white">Par Nicolas Delannay</h5>
                         <p class="small text-muted mb-2">Fondateur de <strong>Tech for Business</strong>. Je simplifie la technologie pour booster votre efficacité commerciale.</p>
                        <!-- <p class="small mb-0">
                             <span class="text-muted fw-semibold">Mes services :</span>

                             <a href="https://www.proxisite.fr" target="_blank" rel="noopener noreferrer me"
                                 class="fw-bold text-decoration-none ms-1" style="color: #0fb881;">ProxiSite.fr</a>

                             <span class="mx-1 text-muted">|</span>

                             <a href="https://www.developpeurweb83.fr/projets" target="_blank" rel="noopener noreferrer me"
                                 class="fw-bold text-decoration-none" style="color: #0fb881;">Démos Live</a>
                         </p>-->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </main>

 <script>
     AOS.refreshHard();
 </script>