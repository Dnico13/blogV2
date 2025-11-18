 <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm container-fluid ">
     <div class="container d-flex justify-content-between">
         <a class="navbar-brand" href="/accueil" title="Tech for Business - Accueil">
             Tech for <span>Business</span>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" title="Menu de navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                    <a class="nav-link 
                    <?php if ('accueil' === $currentPage || $currentPage === '') echo 'active'; ?> "
                       hx-get="/accueil" 
                       hx-target="#main"
                       hx-push-url="/accueil"
                       href="/accueil"
                       title="Visiter la page d'accueil">
                        Accueil
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if ($currentPage === 'articles' || $currentPage === 'detailArticle')  echo 'active'; ?> "
                       hx-get="categories-content.html" 
                       hx-target="#main"
                       hx-push-url="articles.php"
                       href="/articles"
                       title="Voir les articles publiés">
                        Articles
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if ('aPropos' === $currentPage) echo 'active'; ?> "
                       hx-get="aPropos.php" 
                       hx-target="#main"
                       hx-push-url="aPropos.php"
                       href="/aPropos"
                       title="En savoir plus sur Tech for Business">
                        À Propos
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if ('contact' === $currentPage) echo 'active'; ?> "
                       hx-get="contact.php" 
                       hx-target="#main"
                       hx-push-url="contact.php"
                       href="/contact"
                       title="Contacter Tech for Business">
                        Contact
                    </a>
                </li>
             </ul>
             <!--<form class="d-flex ms-lg-3">
                 <input class="form-control me-2 rounded-pill" type="search" placeholder="Rechercher..." aria-label="Search" style="width: 150px;">
             </form>-->
         </div>
     </div>
 </nav>