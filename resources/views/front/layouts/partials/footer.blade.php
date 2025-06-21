<footer class="footer-section footer-bg">
    <div class="footer-shape-4">
        <img src="assets/img/footer-shape-4.png" alt="shape-img">
    </div>
    <div class="shape-2">
        <img src="assets/img/footer-shape-3.png" alt="shape-img">
    </div>
    <div class="footer-widgets-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>À propos de nous</h3>
                        </div>
                        <div class="footer-content">
                            <p>
                                La Maison du Village, votre destination pour découvrir
                                la richesse culturelle, promouvoir l'autonomisation des femmes
                                et explorer les innovations technologiques.
                            </p>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Navigation</h3>
                        </div>
                        <ul class="list-area">
                            <li>
                                <a href="{{ route('accueil.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Accueil
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('propos.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    À propos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cultures.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Culture
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('women.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Femmes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Actualités
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-footer-widget style-margin">
                        <div class="widget-head">
                            <h3>Nos Services</h3>
                        </div>
                        <ul class="list-area">
                            <li>
                                <a href="{{ route('site.informatique.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Informatique
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('projects.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Projets
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('equipe.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Équipe
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Fête de la jeunesse
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contacter.index') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single-footer-widget style-margin">
                        <div class="widget-head">
                            <h3>Newsletter</h3>
                        </div>
                       <div class="footer-content">
                            <p>
                                Inscrivez-vous à notre newsletter hebdomadaire pour recevoir
                                les dernières mises à jour de La Maison du Village.
                            </p>
                            <div class="footer-input">
                                <input type="email" id="email2" placeholder="Entrez votre adresse email">
                                <button class="newsletter-btn" type="submit">
                                    <i class="fab fa-telegram-plane"></i>
                                </button>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="footer-bottom style-3">
    <div class="container">
        <div class="footer-wrapper d-flex align-items-center justify-content-between">
            <!-- Logo dans un avatar -->
            <div class="footer-logo wow fadeInLeft" data-wow-delay=".3s">
                <a href="{{ route('accueil.index') }}" class="d-flex align-items-center">
                    <div style="
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                        overflow: hidden;
                        border: 2px solid #fff;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                    ">
                        <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="logo-img" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </a>
            </div>

            <!-- Texte du footer -->
            <p class="wow fadeInRight color-2" data-wow-delay=".5s">
                © Tous droits réservés 2025 par <a href="{{ route('accueil.index') }}">LA MAISON DU VILLAGE</a>
            </p>
        </div>
    </div>

    <!-- Bouton pour remonter -->
    <a href="#" id="scrollUp" class="scroll-icon">
        <i class="far fa-arrow-up"></i>
    </a>
</div>

</footer>

<!--<< All JS Plugins >>-->
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/viewport.jquery.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
