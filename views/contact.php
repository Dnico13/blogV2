 <header class="page-header-contact text-center">
     <div class="container" data-aos="fade-down">
         <h1 class="display-5 fw-bold mb-3">Entrons en Contact</h1>
         <p class="lead text-white-50">Que vous ayez une question, une proposition de collaboration ou une idée d'article.</p>
     </div>
 </header>

 <main class="py-5">
     <div class="container">

         <div class="row g-5">

             <div class="col-lg-7" data-aos="fade-right">
                 <h2 class="h4 fw-bold mb-4">Envoyez-moi un message direct</h2>
                 <form action="./formSend.php" method="POST">
                     <div class="mb-3">
                         <label for="name" class="form-label small fw-bold">Nom & Prénom</label>
                         <input type="text" class="form-control" id="name" name="name" required>
                     </div>
                     <div class="mb-3">
                         <label for="email" class="form-label small fw-bold">Adresse Email</label>
                         <input type="email" class="form-control" id="email" name="email" required>
                     </div>
                     <div class="mb-3">
                         <label for="objet" class="form-label small fw-bold">Objet de votre demande</label>
                         <select class="form-select" id="objet" name="objet" required>
                             <option selected>J'aimerais vous contacter pour...</option>
                             <option>J'ai une question sur un article !</option>
                             <option>Idée de collaboration / Partenariat</option>
                             <option>J'ai besoin d'une astuce personnalisée (Projet)</option>
                             <option>Juste un coucou / Autre sujet</option>
                         </select>
                     </div>
                     <div class="mb-4">
                         <label for="message" class="form-label small fw-bold">Votre Message</label>
                         <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                     </div>

                     <button type="submit" name="submit" class="btn btn-tech" title="Envoyer le message">Envoyer le Message <i class="fas fa-paper-plane ms-2"></i></button>
                 </form>
             </div>

             <div class="col-lg-5" data-aos="fade-left">
                 <h2 class="h4 fw-bold mb-4">Autres moyens de connexion</h2>

                 <div class="contact-info-card">

                     <div class="text-center mb-4">
                         <i class="fas fa-envelope"></i>
                         <h5 class="fw-bold">Email Direct</h5>
                         <p class="mb-0 small text-muted">contact@techforbusiness.fr</p>
                         <p class="small text-muted">Réponse garantie</p>
                     </div>

                     <hr>

                     <div class="text-center mb-4">
                         <i class="fab fa-linkedin"></i>
                         <h5 class="fw-bold">Réseaux Sociaux</h5>
                         <p class="mb-1">Connectons-nous sur LinkedIn :</p>
                         <a href="https://www.linkedin.com/in/nicolas-delannay-743385236" class="btn btn-outline-secondary rounded-pill btn-sm mt-1" target="_blank" rel="noopener noreferrer">
                             Mon Profil LinkedIn <i class="fas fa-external-link-alt ms-1"></i>
                         </a>
                     </div>

                     <hr>

                     <div class="text-center">
                         <i class="fas fa-map-marker-alt"></i>
                         <h5 class="fw-bold">Basé en France</h5>
                         <p class="mb-0 small text-muted">Opérant à distance et partout en France.</p>
                     </div>

                 </div>
             </div>

         </div>
     </div>
     <script>
         AOS.refreshHard()
     </script>
 </main>