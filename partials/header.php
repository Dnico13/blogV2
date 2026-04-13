 <div class="network-bar d-none d-md-block">
     <div class="container d-flex justify-content-end align-items-center">
         <span class="d-none d-md-inline text-white-50 me-2" style="font-size: 10px;">NOS PLATEFORMES :</span>
         <a href="https://www.proxisite.fr" target="_blank" rel="noopener noreferrer me" title="Visiter le site de ProxiSite">ProxiSite</a>
         <a href="https://www.techforbusiness.fr" class="active-site" title="Visiter Tech for Business">Tech for Business</a>
         <a href="https://www.developpeurweb83.fr" target="_blank" rel="noopener noreferrer me" title="Visiter mon site de développeur">DevSite</a>
     </div>
 </div>

 <div class="bg-glow"></div>

 <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm" style="backdrop-filter: blur(15px); border-bottom: 1px solid var(--ps-border); background: rgba(15, 17, 19, 0.8);">
     <div class="container">
         <div class="d-flex align-items-center">
             <i class="fa-solid fa-location-dot fs-2 fs-md-1 me-2" style="color: var(--ps-green);"></i>
             <a class="navbar-brand font-montserrat fs-3 fw-bold" href="/accueil" title="Accueil Tech for Business">
                 Tech for <span class="text-green">Business</span>
             </a>
         </div>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Ouvrir le menu">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto align-items-center gap-2">
                 <li class="nav-item">
                     <a class="nav-link <?php echo ($currentPage == 'accueil' || $currentPage == 'index') ? 'active' : ''; ?>"
                         hx-get="/accueil" hx-target="#main" hx-push-url="/accueil" href="/accueil">Accueil</a>
                 </li>

                 <li class="nav-item">
                     <?php
                        $isArticleActive = (str_starts_with($currentPage, 'conseils-informatique-business-web')) ? 'active' : '';
                        ?>
                     <a class="nav-link <?= $isArticleActive ?>"
                         hx-get="/conseils-informatique-business-web" hx-target="#main" hx-push-url="/conseils-informatique-business-web"
                         href="/conseils-informatique-business-web" title="Découvrez tous nos articles">Articles</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link <?php echo ($currentPage == 'expert-informatique-web-var') ? 'active' : ''; ?>"
                         hx-get="/expert-informatique-web-var-partial" hx-target="#main" hx-push-url="/expert-informatique-web-var"
                         href="/expert-informatique-web-var" title="En savoir plus">À Propos</a>
                 </li>

                 <li class="nav-item">
                     <a class="btn-ps-primary btn-sm ms-lg-3 px-4 <?php echo ($currentPage == 'contact-creation-site-83') ? 'active' : ''; ?>"
                         hx-get="/contact-creation-site-83-partial" hx-target="#main" hx-push-url="/contact-creation-site-83"
                         href="/contact-creation-site-83">
                         Contactez-moi
                     </a>
                 </li>
             </ul>
         </div>
     </div>

 </nav>