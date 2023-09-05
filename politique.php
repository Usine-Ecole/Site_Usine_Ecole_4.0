<?php
require './admin/config/database.php';

// fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id ";
    $result = mysqli_query($connexion, $query);
    $avatar = mysqli_fetch_assoc($result);
}

//fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connexion, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);



// fetch 6 posts from posts table

$queryPosts = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 3";
$posts = mysqli_query($connexion, $queryPosts);


?>


<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4ERD0LRTX6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4ERD0LRTX6');
</script>
    <title>Usine-Ecole 4.0</title>
    <meta content="L'Usine-Ecole 4.0 accompagne depuis son inauguration une trentaine d’étudiants en alternance au brevet de techniciens supérieur CPRP en partenariat avec le lycée Leonard-de-Vinci de Melun et près de 200 demandeurs d'emploi." name="description">
    <meta content="Usine, école, usinage, mécanique, accompagnements, apprentissages, LMS" name="keywords">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/svg+xml">
    <!-- Bundle CSS file -->
    <link href="./assets/css/bundle.css" rel="stylesheet" />
</head>

<body>
     <!-- HEADER -->
     <header id="header" class="header clearfix">
        <div class="header-box">
            <!-- Logo & Nav -->
            <div class="clearfix logo-nav-box">
                <div class="container">
                    <div class="logo-nav-box-container">
                        <!-- Logo -->
                        <a href="/" class="logo d-flex align-items-center">
                            <img src="./assets/images/logo-1.png" srcset="./assets/images/logo-1@2x.png 2x" class="logo-dark" alt="">
                            <img src="./assets/images/logo-3.png" srcset="./assets/images/logo-3@2x.png 2x" class="logo-dark-2" alt="">
                            <h1 class="d-none">Usine-Ecole 4.0</h1>
                        </a>
                        <!-- Logo -->
                        <!-- Nav menu -->
                        <nav id="navbar" class="navbar">
                            <ul>
                                <li class="dropdown active">
                                    <a href="/" class="">
                                        <span>Accueil</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="">
                                        <span>Nous connaitre</span>
                                        <i class="ficon ficon-thin-arrow-down dropdown-indicator"></i>
                                    </a>
                                    <ul>
                                        <li><a href="partenaires" class="k-hover">Partenaires</a></li>
                                        <li><a href="index#rooms" class="k-hover">Inscription</a></li>
                                        <li><a href="login-adherant-projet" class="k-hover">Nos projets</a></li>
                                        <li><a href="opportunite" class="k-hover">Nos opportunités</a></li>
                                        <li><a href="galerie" class="k-hover">Galerie</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="soutenir" class="k-hover">Nous soutenir</a></li>
                                <li class="dropdown">
                                    <a href="apprenti" class="k-hover"><span>Accompagnement</span></a>
                                </li>
                                <li class="dropdown">
                                    <a href="actu" class="k-hover"><span>Actualités</span></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" target="_blank" class="k-hover">
                                        <span>Plateforme</span>
                                        <i class="ficon ficon-thin-arrow-down dropdown-indicator"></i>
                                    </a>
                                    <ul>
                                        <li><a href="learning" class="k-hover">Présentation LMS</a></li>
                                        <li><a href="https://www.paris-villaroche-training-center.parcours.pro/" target="_blank" class="k-hover"> Voir notre plateforme
                                            </a></li>

                                    </ul>
                                </li>
                                <li class="dropdown has-icon">
                                    <a href="register_soft" class="k-hover">
                                        <span>Soft-skills</span>
                                    </a>
                                </li>
                                <li class="dropdown has-icon">
                                    <a href="contact" class="k-hover">
                                        <span>Contact</span>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <!-- Nav menu -->
                        <!-- Mobile toggle -->
                        <i class="mobile-nav-toggle mobile-nav-show ficon ficon-hamburger-menu"></i>
                        <i class="mobile-nav-toggle mobile-nav-hide d-none ficon ficon-x-icon"></i>
                        <!-- Mobile toggle -->
                    </div>
                </div>
            </div>
            <!-- Logo & Nav -->
        </div>
    </header>
    <!-- HEADER -->

    <!--MAIN-->
    <main id="main">
        <section id="location" class="clearfix bg-transparent-top pd-top-1000 pd-bottom-1000">
            <div class="title-box mg-bottom-400">
                <div class="container">
                    <div class="pd-right-30pc mb-5" data-aos-delay="300" data-aos="fade-up">
                        <div class="clearfix">
                            <div class="heading heading-sub">
                                <span class="sub-title line-before" style="color: white;">Nos politiques</span>
                                <h1 class="title title-lg fw-light" style="color: white;">Politique de confidentialité</h1>
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <p style="color: white;">Notre politique de confidentialité et nos pratiques en la matière se concentrent sur un traitement, un partage et une sauvegarde des données personnelles qui soient appropriées et en accord avec la législation en vigueur, tout en assurant la confidentialité, l’intégrité et la disponibilité. Nous nous conformons au règlement général sur la protection des données (le « RGPD ») (Règlement (EU) 2016/679).</p>
                                
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <br>
                                <h2 style="color: white;"><u>Principes</u></h2>
                                <p style="color: white;">La politique de protection des données de l'Usine-Ecole 4.0 se fonde sur les principes de protection suivants :</p>
                                <p style="color: white;">• Le traitement des données personnelles aura lieu en toute conformité avec la loi et de façon claire et transparente.</p>
                                <p style="color: white;">• La collecte de données personnelles n’aura lieu qu’à des fins spécifiées, explicites et légitimes et les données ne seront pas traitées par la suite d’une façon qui ne soit pas compatible avec les présents principes.</p>
                                <p style="color: white;">• La collecte de données personnelles doit être appropriée, pertinente et limitée aux informations nécessaires dans le cadre des fins auxquelles les données sont traitées.</p>
                                <p style="color: white;">• Les données personnelles doivent être exactes et actualisées si nécessaire.</p>
                                <p style="color: white;">• Toutes les mesures raisonnables doivent être prises pour garantir que les données s’avérant inexactes et liées aux fins auxquelles elles sont traitées soient supprimées ou rectifiées sans délai.</p>
                                <p style="color: white;">• Les données personnelles doivent être conservées pour l’identification de leur sujet uniquement tant que cela est nécessaire aux fins auxquelles elles sont traitées.</p>
                                <p style="color: white;">• Toutes les données personnelles doivent rester confidentielles et stockées d’une façon qui garantisse la sécurité appropriée.</p>
                                <p style="color: white;">• Les données personnelles ne doivent pas être partagées avec des tiers, hormis lorsque cela est nécessaire afin de fournir les prestations ayant au préalable fait l’objet d’un accord.</p>
                                <p style="color: white;">Les sujets des données doivent avoir la possibilité d’exiger la consultation, la rectification ou la suppression de leurs données personnelles, ainsi que des restrictions en ce qui concerne leur traitement, la possibilité de s’opposer à leur traitement, ainsi que leur droit à la transférabilité des données.</p>
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <br>
                                <h2 style="color: white;"><u>Données personnelles</u></h2>
                                <p style="color: white;">Les données personnelles désignent toute information pouvant être reliées à une personne physique identifiée ou identifiable (le « sujet des données »). Les données personnelles incluent tout type d’information directement ou indirectement attribuable (c’est-à-dire en étant mis en relation avec d’autres données) au sujet des données, tel que le nom, la date de naissance l’adresse, l’adresse email, le numéro de téléphone, etc.</p>
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <br>
                                <h2 style="color: white;"><u>Utilisation des données personnelles</u></h2>
                                <p style="color: white;">Nous utiliserons les données personnelles aux fins auxquelles elles ont été collectées et ne les conserverons que tant que cela est nécessaire à ces fins.L’accès aux données personnelles est strictement restreint au personnel de l'Usine-Ecole 4.0 détenant l’autorisation correspondante et présentant un réel besoin de ces données dans le cadre de leur activité.</p>
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <br>
                                <h2 style="color: white;"><u>Partage des données personnelles</u></h2>
                                <p style="color: white;">Nous ne divulguerons aucune donnée personnelle à des tiers à des fins de publicité pour leurs produits ou prestations auprès de nos clients.</p>
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <br>
                                <h2 style="color: white;"><u>Sécurité des traitements</u></h2>
                                <p style="color: white;">Nous traitons les données personnelles de façon sécurisée et appliquons et maintenons les mesures techniques et organisationnelles appropriées afin de protéger les données personnelles de toute destruction accidentelle ou illicite, perte accidentelle, modification, divulgation ou accès non autorisé.</p>
                            </div>
                            <div class="description" data-aos-delay="500" data-aos="fade-up">
                                <br>
                                <h2 style="color: white;"><u>Consultation, rectification et suppression des données personnelles</u></h2>
                                <p style="color: white;">Les clients peuvent à tout moment exiger la consultation, la rectification ou la suppression de leurs données personnelles ou restreindre le traitement de toute information que nous aurions collecté, sur simple demande à l’adresse https://www.usinecole.com</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <!-- MAIN -->
     <!-- FOOTER -->
    <footer id="footer" class="footer">
        <div class="container">
            <!-- Block -->
            <!-- Footer top -->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-xl-3 col-lg-12 col-md-6">
                        <!-- Brand -->
                        <div class="footer-widget">
                        <h4 class="widget-title">Usine-Ecole 4.0</h4>
                            <p>
                            Pôle de ressources et d'accompagnement vers les métiers mécaniques aéronautiques et industriels soutenu par l'Europe.
                            </p>
                        </div>
                        <!-- Brand -->
                    </div>
                    <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                        <!-- Contact Info -->
                        <div class="footer-widget">
                            <h4 class="widget-title">Informations</h4>
                            <div class="contact-box">
                                <p>
                                Aérodrome de Melun Villaroche <br> 77950 Montereau-sur-le-Jard
                                </p>
                                <p>
                                <span> <a href="tel:+330160681144"></a> 01 60 68 11 44</span>
                                </p>
                                <p>
                                <a href="mailto:trainingcenter@parisvillaroche.com" class="k-hover">trainingcenter@parisvillaroche.com
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- Contact Info -->
                    </div>
                    <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                        <!-- Liens rapides -->
                        <div class="footer-widget">
                            <h4 class="widget-title">Liens rapides</h4>
                            <div class="row g-3">
                                <div class="col-6">
                                    <ul class="list-unstyled footer-list">
                                    <li>
                                            <a href="/" class="k-hover">Accueil</a>
                                        </li>
                                        <li>
                                            <a href="partenaires" class="k-hover">Partenaires</a>
                                        </li>
                                        <li>
                                            <a href="inscriptions" class="k-hover">Inscriptions</a>
                                        </li>
                                        <li>
                                            <a href="galerie" class="k-hover">Galerie</a>
                                        </li>
                                        <li>
                                            <a href="apprenti" class="k-hover">Accompagnement</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-unstyled footer-list">
                                        <li>
                                            <a href="actu" class="k-hover">Actualités</a>
                                        </li>
                                        <li>
                                            <a href="learning" class="k-hover">E-learning</a>
                                        </li>
                                        <li>
                                            <a href="https://www.paris-villaroche-training-center.parcours.pro/" class="k-hover">Plateforme</a>
                                        </li>
                                        <li>
                                            <a href="register_soft" class="k-hover">Soft-Skills</a>
                                        </li>
                                        <li>
                                            <a href="contact" class="k-hover">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Liens rapides -->
                    </div>
                    <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                        <!-- Subscribe & Social -->
                        <div class="footer-widget">
                            <!-- Subscribe -->
                            <div class="footer-social">
                                <!-- Social -->
                                <h4 class="social-title">Réseaux-Sociaux</h4>
                                <div class="social-list">
                                    <a href="https://m.facebook.com/trainingcentersympav/" class="btn-social btn-facebook k-hover"><i class="pe-so-facebook"></i></a>
                                    <a href="https://twitter.com/TCenter4_0/" class="btn-social btn-twitter k-hover"><i class="pe-so-twitter"></i></a>
                                    <a href="https://www.instagram.com/trainingcenter4.0/" class="btn-social btn-youtube-1 k-hover"><i class="pe-so-youtube-1"></i></a>
                                    <a href="https://www.youtube.com/channel/UCqan073e4fkLA_HtG_uWk8Q" class="btn-social btn-vimeo k-hover"><i class="pe-so-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/tcenter-sympav-28bb571a3/" class="btn-social btn-linkedin k-hover"><i class="pe-so-linkedin"></i></a>
                                </div>
                                <!-- Social -->
                            </div>
                        </div>
                        <!-- Subscribe & Social -->
                    </div>
                </div>
            </div>
            <!-- Footer top -->
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!-- Copyright -->
                        <p>© 2023 Usine-Ecole 4.0 Tous droits réservés.</p>
                        <!-- Copyright -->
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- Bottom links -->
                        <div class="bottom-link text-start text-md-end">
                            <ul class="list-inline">
                                <li class="list-inline-item me-4">
                                    <a href="mentions" target="_blank">Mentions légales</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="politique" target="_blank">Politique de confidentialité</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Bottom links -->
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <!-- Block -->
        </div>
    </footer>
    <!-- FOOTER -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center k-hover"><i class="ficon ficon-thin-arrow-up"></i></a>

    <div id="preloader"></div>

    <!-- Bundle JS Files -->
    <script src="./assets/js/bundle.js"></script>

</body>

</html>