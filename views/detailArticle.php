 <?php require_once 'controller/articleController.php'; ?>


 <main class="py-5">
     <div class="container">
         <div class="row justify-content-center">

             <div class="col-lg-8">
                 <div data-aos="fade-down">
                     <span class="badge bg-primary text-uppercase mb-2"><?= $article["rubrique"]; ?></span>
                     <h1 class="display-5 fw-bold mb-3" style="font-family: var(--font-title);"><?= $article["titre_general"]; ?></h1>
                     <p class="text-muted small mb-4">
                         Publié le <?= $article["date"]; ?> |
                         <i class="far fa-clock me-1"></i> 5 min de lecture |
                         <!-- <i class="fas fa-eye me-1"></i> 1500 vues-->
                     </p>
                 </div>
                 <div class="d-flex flex-column">
                     <div class="row">

                         <p class="small text-center text-primary">
                             --- L'article en vidéo ---
                         </p>

                         <div class="mb-5 text-center mx-auto shadow-lg rounded-4  ratio ratio-16x9" data-aos="zoom-in" style="max-width: 500px;">
                             <video
                                 class=" rounded-4 "
                                 poster="/uploads/posterVideoBlog.png" controls
                                 preload="metadata"
                                 title="L'article <?= $article["titre_general"]; ?> en vidéo"
                                 loading="lazy">

                                 <source src="<?= $article["video"]; ?>" type="video/mp4">


                                 Votre navigateur ne supporte pas l'élément vidéo HTML5.
                             </video>

                         </div>

                     </div>
                 </div>

                 <div class="article-content" data-aos="fade-up">

                     <p class="lead"><?= $article["para1"]; ?></p>

                     <h2><?= $article["titre2"]; ?></h2>
                     <p><?= $article["para2"]; ?></p>

                     <div class="text-center my-4 mb-5 mx-auto" data-aos="fade-up" style="max-width: 600px;">
                         <img src="uploads/<?= $article["photo2"]; ?>" class="article-hero-img img-fluid rounded imageSize" alt="Image pour l'article <?= $article["titre_general"]; ?>" loading="lazy">
                         <!-- <img src="uploads/<?= $article["photo3"]; ?>" class="illustration-img-small img-fluid imageSize" alt="Illustration pour l'article <?= $article["titre_general"]; ?>" loading="lazy>
                         <p class="small text-muted fst-italic"></p>-->
                     </div>

                     <h2><?= $article["titre3"]; ?></h2>
                     <p><?= $article["para3"]; ?></p>

                     <h2><?= $article["titre4"]; ?></h2>
                     <p><?= $article["para4"]; ?></p>

                     <hr class="mt-5 mb-4">

                     <h3 class="conclusion-title"><?= $article["titre5"]; ?></h3>
                     <p><?= $article["para5"]; ?></p>

                 </div>

                 <hr class="my-5">

                 <div class="author-box d-flex align-items-center mb-5" data-aos="fade-up" data-aos-delay="100">
                     <div class="me-4">
                     </div>
                     <div>
                         <h5 class="fw-bold mb-1">Par Nicolas Delannay</h5>
                         <p class="small text-muted mb-2">Fondateur de Tech for Business (le Web est ma passion !).</p>
                         <p class="small mb-0">Je partage ici mes analyses et conseils pour aider les PME/TPE à maîtriser le numérique. Mon but est de simplifier la technologie pour booster votre efficacité opérationnelle.</p>
                     </div>
                 </div>

                 <!--<div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="h5 fw-bold mb-0">Partagez cet article</h4>
                        <div class="social-share">
                            <a href="#" title="Partager sur LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" title="Partager sur Twitter/X"><i class="fab fa-twitter"></i></a>
                            <a href="#" title="Partager sur Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" title="Partager par Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>-->

             </div>

         </div>
     </div>
     <script>
         AOS.refreshHard()
     </script>
 </main>