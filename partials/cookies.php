<div id="cookie-banner" class="cookie-banner" data-aos="fade-up" data-aos-offset="0" data-aos-delay="1000">
    <div class="container">
        <div class="row align-items-center py-3 px-2">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div class="text-green fs-3 me-3"><i class="fas fa-cookie-bite"></i></div>
                    <p class="text-white small mb-0">
                        Chez <strong>Tech for <span class="text-green"> Business</span></strong>, nous utilisons des cookies pour optimiser votre expérience et analyser notre trafic. 
                        En continuant, vous acceptez notre <a href="/confidentialite" class="text-green text-decoration-none fw-bold">politique de confidentialité</a>.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-lg-end gap-2">
                <button id="accept-cookies" class="btn-ps-primary btn-sm px-4">Accepter</button>
                <button id="decline-cookies" class="btn btn-outline-light btn-sm rounded-pill px-3" style="font-size: 0.8rem;">Refuser</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const banner = document.getElementById('cookie-banner');
    const acceptBtn = document.getElementById('accept-cookies');
    const declineBtn = document.getElementById('decline-cookies');
    const storageKey = 'tfb_cookies_consent';

    // --- FONCTION POUR CHARGER LES TRACKERS ---
    function loadAnalytics() {
        // 1. Chargement de Google Analytics (gtag.js)
        const gtagScript = document.createElement('script');
        gtagScript.async = true;
        gtagScript.src = "https://www.googletagmanager.com/gtag/js?id=G-W7SJGSD8PM";
        document.head.appendChild(gtagScript);

        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-W7SJGSD8PM');

        // 2. Chargement de Microsoft Clarity
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "vomvk8wr2q");

        console.log("Analytics & Clarity chargés.");
    }

    // --- LOGIQUE D'AFFICHAGE ---
    const cookieChoice = localStorage.getItem(storageKey);

    // Si déjà accepté, on charge direct
    if (cookieChoice === 'accepted') {
        loadAnalytics();
    } 
    // Si pas de choix, on montre la bannière
    else if (!cookieChoice) {
        setTimeout(() => {
            banner.classList.add('show');
        }, 1500);
    }

    // --- ÉVÉNEMENTS BOUTONS ---
    acceptBtn.addEventListener('click', () => {
        localStorage.setItem(storageKey, 'accepted');
        banner.classList.remove('show');
        loadAnalytics(); // On charge les scripts immédiatement après le clic
    });

    declineBtn.addEventListener('click', () => {
        localStorage.setItem(storageKey, 'declined');
        banner.classList.remove('show');
        console.log("Cookies refusés par l'utilisateur.");
    });
});
defer
</script>