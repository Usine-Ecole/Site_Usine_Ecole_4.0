<?php
require './admin/config/database.php';

// fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id ";
    $result = mysqli_query($connexion, $query);
    $avatar = mysqli_fetch_assoc($result);
}

//check login status
// if (!isset($_SESSION['user-id'])) {
//     header('location: ' . ROOT_URL . 'signin');
// }


//fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connexion, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);



// fetch 6 posts from posts table

$queryPosts = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 3";
$posts = mysqli_query($connexion, $queryPosts);

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;


unset($_SESSION['signin-data']);

// get back from data if there was a registration error

$name = $_SESSION['signup-data']['nom'] ?? null;
$phone = $_SESSION['signup-data']['phone'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$password = $_SESSION['signup-data']['password'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

// delete signup data session
unset($_SESSION['signup-data']);


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
                                        <li><a href="#rooms" class="k-hover">Inscription</a></li>
                                        <li><a href="login-adherant-projet" class="k-hover">Nos projets</a></li>
                                        <li><a href="opportunite" class="k-hover">Nos opportunités</a></li>
                                        <li><a href="login-adherant" class="k-hover">Galerie</a></li>
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
                                    <a href="https://www.paris-villaroche-training-center.parcours.pro/" target="_blank" class="k-hover">
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

    <main id="main">
        <!-- HERO -->
        <section id="hero" class="clearfix hero hero-fullwidth hero-light-content">
            <div class="hero-container">
                <div class="hero-prev swiper-button-prev d-none d-lg-flex"></div>
                <div class="hero-next swiper-button-next d-none d-lg-flex"></div>
                <!-- Caption -->
                <div class="hero-caption" data-aos-delay="650" data-aos="fade-in">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <span class="hero-sub-title">Le Training Center 4.0</span>
                                <h2 class="hero-title">Devient l'Usine-Ecole 4.0</h2>
                                <p class="hero-desc">Un accompagnement principalement orienté vers le secteur aéronautique, en liens étroits avec les entreprises.</p>
                                <div class="hero-link">
                                    <a href="#location" class="btn btn-lg btn-expand btn-ht-primary">
                                        <span>En savoir plus</span>
                                        <i class="ficon ficon-thin-arrow-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Caption -->
                <!-- Slider -->
                <div class="hero-slider" data-aos-delay="300" data-aos="fade-in">
                    <div class="hero-slider-container">
                        <div class="swiper">
                            <div class="swiper-wrapper" style="filter: brightness(70%);">
                                <div class="swiper-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="./assets/images/home/home-1.jpg"></div>
                                <div class="swiper-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="./assets/images/home/home-2.jpg"></div>
                                <div class="swiper-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="./assets/images/home/home-3.jpg"></div>
                            </div>
                            <div class="hero-pagination swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <!-- Slider -->
                <!-- Check rooms -->

                <!-- Check rooms -->
            </div>
        </section>
        <!-- HERO -->

        <!-- LOCATION -->
        <section id="location" class="clearfix bg-transparent-top pd-top-1000 pd-bottom-1000">
            <!-- Title & Description -->
            <div class="title-box mg-bottom-400">
                <div class="container">
                    <div class="pd-left-30pc">
                        <div class="heading heading-sub" data-aos-delay="300" data-aos="fade-in">
                            <span class="sub-title line-before" style="color: white;">UN ACCOMPAGNEMENT</span>
                            <h2 class="title title-lg fw-light" style="color: white;">Au cœur du centre aéronautique</h2>
                        </div>
                        <div class="description" data-aos-delay="300" data-aos="fade-in">
                            <p style="color: white;">Cet accompagnement s'adresse en priorité aux demandeurs d'emploi et aux jeunes, sans niveau spécifique pour une véritable opportunité d'emploi sur notre territoire.</p>

                            <p style="color: white;">L'Usine-Ecole 4.0 accompagne par une pédagogie adaptée toute personne qui souhaite découvrir les métiers de la mécanique de précision.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title & Description -->
            <!-- Image -->
            <div class="localtion-home-box-image info-box vh-65 bg-image bg-image-wrapper" data-image-src="./assets/images/about/about.jpg"">
                <div class=" container">
                <div class="localtion-home-box-image-container info-box-container">
                    <div class="info-box-content pd-left-30pc" data-aos-delay="300" data-aos="fade-in">
                        <div class="content">
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50236.83156661273!2d2.6484609497713203!3d48.56679442490831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5fb7b3824bca1%3A0xcb4dffb41c4ad580!2sA%C3%A9rodrome%20de%20Melun%20Villaroche!5e0!3m2!1sfr!2sfr!4v1646993857757!5m2!1sfr!2sfr" class="glightbox btn btn-lg btn-location btn-square-icon btn-square-icon-xxl k-hover">
                                <i class="ficon ficon-flights-pin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- Image -->
        </section>
        <!-- LOCATION -->

        <!-- ABOUT -->
        <section id="about" class="clearfix about-home-box pd-bottom-200 bg-light">
            <!-- Title & Description -->
            <div class="title-box mg-bottom-400">
                <div class="container">
                    <div class="pd-right-30pc">
                        <div class="heading heading-sub" data-aos="fade-in" data-aos-delay="300">
                            <span class="sub-title line-before" style="color: white;">Usine-Ecole 4.0</span>
                            <h2 class="title title-lg fw-light" style="color: white;">Trouvez votre voie aérienne</h2>
                        </div>
                        <div class="description" data-aos="fade-in" data-aos-delay="300" style="color: white;">
                            <p>L'Usine-Ecole 4.0 accompagne depuis son inauguration une trentaine d’étudiants en alternance au brevet de techniciens supérieurs CPRP en partenariat avec le lycée Léonard-de-Vinci de Melun et près de 200 demandeurs d'emploi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title & Description -->
            <!-- About home 1 -->
            <div class="clearfix about-home-1 info-box pd-bottom-800">
                <div class="container">
                    <div class="about-home-1-container info-box-container">
                        <div class="info-box-content image-left">
                            <!-- Image -->
                            <figure class="image" data-aos-delay="300" data-aos="fade-in">
                                <img src="./assets/images/about/about-1.jpg" srcset="./assets/images/about/about-1@2x.jpg 2x" class="img-fluid" alt="">
                            </figure>
                            <!-- Image -->
                            <!-- Description -->
                            <div class="content" data-aos-delay="800" data-aos="fade-in">
                                <div class="heading heading-sub">
                                    <span class="sub-title line-before line-before-50">01</span>
                                    <h3 class="title fw-light">Quel est l'objectif de
                                        l'Usine-Ecole 4.0 ?</h3>
                                </div>
                                <div class="info-box-desc">
                                    <p>Proposer aux apprenants des modules de formation directement adaptés aux besoins
                                        très spécifiques des entreprises de la mécanique de précision. L'Usine-Ecole 4.0
                                        s'associe au lycée Léonard-de-Vinci de Melun pour l'ouverture de la section BTS
                                        CPRP en alternance et au Greta MTI 77, CFA Académique de Créteil pour le bac pro
                                        technicien d'usinage.</p>
                                </div>
                            </div>
                            <!-- Description -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- About home 1 -->
            <!-- About home 2 -->
            <div class="clearfix about-home-2 info-box pd-bottom-800">
                <div class="container">
                    <div class="about-home-2-container info-box-container">
                        <div class="info-box-content image-right justify-content-end">
                            <!-- Image -->
                            <figure class="image" data-aos-delay="300" data-aos="fade-in">
                                <img src="./assets/images/about/about-2.jpg" srcset="./assets/images/about/about-2@2x.jpg 2x" class="img-fluid" alt="">
                            </figure>
                            <!-- Image -->
                            <div class="content" data-aos-delay="800" data-aos="fade-in">
                                <!-- Title & Description -->
                                <div class="heading heading-sub">
                                    <span class="sub-title line-before line-before-50">02</span>
                                    <h3 class="title fw-light">À qui est destiné l'Usine-Ecole 4.0 ?</h3>
                                </div>
                                <div class="info-box-desc">
                                    <p>Aux demandeurs d'emploi et aux jeunes inactifs ou étudiants, et sans niveau
                                        spécifique. Cet accompagnement constitue une véritable opportunité vers un
                                        emploi sur notre territoire. Fort de son partenariat avec les industriels du
                                        technopôle et du lycée professionnel Léonard-de-Vinci de Melun, l'Usine-Ecole
                                        4.0 continue de proposer un apprentissage flexible et adapté au parcours de
                                        chaque apprenant.</p>
                                </div>
                                <!-- Title & Description -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About home 2 -->
            <!-- About home 3 -->
            <div class="clearfix about-home-3 info-box pd-bottom-800">
                <div class="container">
                    <div class="info-box-container">
                        <div class="about-home-3-container info-box-content image-left">
                            <!-- Image -->
                            <figure class="image" data-aos-delay="300" data-aos="fade-in">
                                <img src="./assets/images/about/about-3.jpg" srcset="./assets/images/about/about-3@2x.jpg 2x" class="img-fluid" alt="">
                            </figure>
                            <!-- Image -->
                            <!-- Title & Description -->
                            <div class="content" data-aos-delay="800" data-aos="fade-in">
                                <div class="heading heading-sub">
                                    <span class="sub-title line-before line-before-50">03</span>
                                    <h3 class="title fw-light">Comment s'inscrire à
                                        l'Usine-Ecole ?</h3>
                                </div>
                                <div class="info-box-desc">
                                    <p>Il suffit de nous contacter par notre formulaire de contact puis nous vons
                                        contacterons dans les plus brefs délais pour vous inscrire au sein de
                                        l'Usine-Ecole 4.0.</p>
                                </div>
                                <div class="clearfix">
                                    <a href="contact" class="btn btn-lg btn-expand btn-ht-primary">
                                        <span>Contactez-nous</span>
                                        <i class="ficon ficon-plus-thin"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Title & Description -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- About home 3 -->
        </section>
        <!-- ABOUT -->

        <!-- ROOMS -->
        <section id="rooms" class="clearfix overflow-hidden room-home-box bg-light pd-bottom-1000">
            <!-- Title & Descriptio -->
            <div class="title-box mg-bottom-400">
                <div class="container">
                    <div class="pd-right-30pc">
                        <div class="heading heading-sub" data-aos="fade-in" data-aos-delay="300">
                            <span class="sub-title line-before" style="color: white;">S'inscrire à l'Usine-Ecole 4.0</span>
                            <h2 class="title title-lg fw-light " style="color: white;">Il vous suffit d'être passionné et autonome.</h2>
                        </div>
                        <div class="description" data-aos="fade-in" data-aos-delay="300">
                            <p style="color: white;">Votre parcours est strictement individuel et personnel. Un bilan de compétences des modules validés vous sera communiqué à tout moment de votre parcours.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title & Descriptio -->
            <!-- Rooms -->
            <div class="clearfix room-box-slider" data-aos-delay="800" data-aos="fade-in">
                <div class="container">
                    <div class="room-box-slider-container">
                        <!-- Room Slider -->
                        <div class="swiper rooms-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!-- Room -->
                                    <div class="info-box">
                                        <div class="info-box-container">
                                            <div class="info-box-content image-right h-indent-content-250px justify-content-end">
                                                <!-- Room Image -->
                                                <figure class="image image-rounded-right-0">
                                                    <img src="./assets/images/inscriptions/inscri-condi-1.jpg" srcset="./assets/images/inscriptions/r1@2x.jpg 2x" class="img-fluid" alt="">
                                                </figure>
                                                <!-- Room Image -->
                                                <!-- Room info -->
                                                <div class="content">
                                                    <div class="heading heading-sub">
                                                        <span class="sub-title line-before line-before-50">01</span>
                                                        <h3 class="title fw-light">Quelles sont les conditions d'inscriptions à l'Usine-Ecole 4.0 ?</h3>
                                                    </div>
                                                    <div class="info-box-desc mb-3">
                                                        <p>À partir de 18 ans et sans limite d'âge.</p>
                                                        <p>Gratuit pour les demandeurs d'emploi et les jeunes de moins de 26 ans.</p>
                                                        <p>Maintien de l'inscription à l'Usine-Ecole 4.0 en cas de retour à l'emploi.</p>
                                                        <p>Inscription tout au long de l'année pour 12 mois de date à date.</p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <a href="contact" class="btn btn-lg btn-expand btn-ht-primary">
                                                            <i class="ficon ficon-plus-thin"></i>
                                                            <span>Contactez-nous</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Room info -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Room -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- Room -->
                                    <div class="info-box">
                                        <div class="info-box-container">
                                            <div class="info-box-content image-right h-indent-content-250px justify-content-end">
                                                <!-- Room Image -->
                                                <figure class="image image-rounded-right-0">
                                                    <img src="./assets/images/inscriptions/inscri-condi-2.jpg" srcset="./assets/images/inscriptions/r2@2x.jpg 2x" class="img-fluid" alt="">
                                                </figure>
                                                <!-- Room Image -->
                                                <!-- Room Info -->
                                                <div class="content">
                                                    <div class="heading heading-sub">
                                                        <span class="sub-title line-before line-before-50">02</span>
                                                        <h3 class="title fw-light">Quel niveau d'études pour s'inscrire à l'Usine-Ecole 4.0 ?</h3>
                                                    </div>
                                                    <div class="info-box-desc mb-3">
                                                        <p>- Ouverture d'esprit</p>
                                                        <p>- Capacité à travailler</p>
                                                        <p>- Capacité à échanger</p>
                                                        <p>- Persévérance</p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <a href="contact" class="btn btn-lg btn-expand btn-ht-primary">
                                                            <i class="ficon ficon-plus-thin"></i>
                                                            <span>Contactez-nous</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Room Info -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Room -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- Room -->
                                    <div class="info-box">
                                        <div class="info-box-container">
                                            <div class="info-box-content image-right justify-content-end">
                                                <!-- Room Image -->
                                                <figure class="image image-rounded-right-0">
                                                    <img src="./assets/images/inscriptions/inscri-condi-3.jpg" srcset="./assets/images/inscriptions/inscri-condi-2.jpgr3@2x.jpg 2x" class="img-fluid" alt="">
                                                </figure>
                                                <!-- Room Image -->
                                                <!-- Room info -->
                                                <div class="content">
                                                    <div class="heading heading-sub">
                                                        <span class="sub-title line-before line-before-50">03</span>
                                                        <h3 class="title fw-light">Comment être pour s'inscrire à l'Usine-Ecole 4.0 ?</h3>
                                                    </div>
                                                    <div class="info-box-desc mb-3">
                                                        <p>- Être impliqué</p>
                                                        <p>- Être motivé</p>
                                                        <p>- Être à l'écoute</p>
                                                        <p>- Être disponible</p>
                                                    </div>
                                                    <div class="clearfix">
                                                        <a href="contact" class="btn btn-lg btn-expand btn-ht-primary">
                                                            <i class="ficon ficon-plus-thin"></i>
                                                            <span>Contactez-nous</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Room info -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Room -->
                                </div>
                            </div>
                            <div class="rooms-prev swiper-button-prev"></div>
                            <div class="rooms-next swiper-button-next"></div>
                            <div class="rooms-pagination swiper-pagination"></div>
                        </div>
                        <!-- Room Slider -->
                    </div>
                </div>
            </div>
            <!-- Rooms -->
        </section>
        <!-- ROOMS -->

        <!-- FACILITIES -->
        <section id="facilities" class="clearfix facilities-box pd-bottom-1000 bg-light overflow-hidden">
            <!-- Title & Description -->
            <div class="clearfix title-box mg-bottom-500 pd-bottom-1000">
                <div class="container">
                    <div class="pd-left-30pc">
                        <div class="heading heading-sub" data-aos-delay="300" data-aos="fade-in">
                            <span class="sub-title line-before" style="color: white;">Usine-Ecole 4.0</span>
                            <h2 class="title title-lg fw-light" style="color: white;">Nos Chiffres</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title & Description -->
            <!-- Facility box list -->
            <div class="clearfix facilities-box-list info-box bg-image bg-image-wrapper rounded-0" data-image-src="./assets/images/about/about-4.jpg">
                <div class="container">
                    <div class="facilities-box-list-container info-box-container pd-left-30pc" data-aos-delay="300" data-aos="fade-in">
                        <div class="info-box-content">
                            <div class="content content-absolute bg-content-white">
                                <!-- Facility list -->
                                <div class="row g-0 g-xl-5">
                                    <div class="col-12 col-lg-6">
                                        <!-- Facility item -->
                                        <div class="icon-box icon-box-left mb-5 mb-xl-0">
                                            <div class="icon-box-container">
                                                <div class="icon-box-img">
                                                    <span><i class="ficon ficon-24hour-frontdesk"></i></span>
                                                </div>
                                                <div class="icon-box-info">
                                                    <h3 class="icon-box-title">300</h3>
                                                    <p class="icon-box-desc">Personnes rencontrées (environ).</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Facility item -->
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Facility item -->
                                        <div class="icon-box icon-box-left mb-5 mb-xl-0">
                                            <div class="icon-box-container">
                                                <div class="icon-box-img">
                                                    <span><i class="ficon ficon-adults-line"></i></span>
                                                </div>
                                                <div class="icon-box-info">
                                                    <h3 class="icon-box-title">
                                                        2500
                                                    </h3>
                                                    <p class="icon-box-desc">Dont 1500 élèves reçus lors du FrenchFab Tour.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Facility item -->
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Facility item -->
                                        <div class="icon-box icon-box-left mb-5 mb-xl-0">
                                            <div class="icon-box-container">
                                                <div class="icon-box-img">
                                                    <span><i class="ficon ficon-city-view"></i></span>
                                                </div>
                                                <div class="icon-box-info">
                                                    <h3 class="icon-box-title">
                                                        48%
                                                    </h3>
                                                    <p class="icon-box-desc">De retour à l'emploi.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Facility item -->
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Facility item -->
                                        <div class="icon-box icon-box-left mb-5 mb-xl-0">
                                            <div class="icon-box-container">
                                                <div class="icon-box-img">
                                                    <span><i class="ficon ficon-group-travelers"></i></span>
                                                </div>
                                                <div class="icon-box-info">
                                                    <h3 class="icon-box-title">
                                                        13
                                                    </h3>
                                                    <p class="icon-box-desc">Dont 9 stagiaires et 4 alternants dans
                                                        l'équipe de l'Usine-Ecole 4.0</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Facility item -->
                                    </div>
                                </div>
                                <!-- Facility list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Facility box list -->
        </section>
        <!-- FACILITIES -->

        <!-- NEWS & EVENTS -->
        <section id="news" class="clearfix news-home-box pd-bottom-1000 bg-light">
            <!-- Title & Description -->
            <div class="title-box mg-bottom-400 ">
                <div class="container">
                    <div class="pd-right-95px">
                        <div class="heading heading-sub" data-aos-delay="300" data-aos="fade-in">
                            <span class="sub-title line-before" style="color: white;">ACTUALITÉS</span>
                            <h2 class="title title-lg fw-light" style="color: white;">Nos actualités du moment</h2>
                        </div>
                        <div class="description" data-aos-delay="300" data-aos="fade-in" style="color: white;">
                            <p>Découvrez toutes les actualités de l'Usine-Ecole 4.0 et de ses partenaires.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title & Description -->
            <!-- Post list -->
            <div class="news-list">
                <div class="container">
                    <div class="news-list-container" data-aos-delay="300" data-aos="fade-in">
                        <div class="swiper news-swiper">
                            <div class="swiper-wrapper">
                                <!-- Post -->
                                <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                                    <div class="swiper-slide">
                                        <a href="<?= ROOT_URL ?>post?id=<?= $post['id'] ?>" class="clearfix news-item">
                                            <div class="news-item-container">
                                                <div class="news-item-content">
                                                    <!-- Image -->
                                                    <figure class="image">
                                                        <img src="./assets/images/actu/<?= $post['thumbnail'] ?>" srcset="./assets/images/actu/<?= $post['thumbnail'] ?>@2x.jpg 2x" class="img-fluid" alt="">
                                                    </figure>
                                                    <!-- Image -->
                                                    <!-- Content -->
                                                    <div class="content">
                                                        <?php
                                                        //fetch category from categories table using category_id of post
                                                        $category_id = $post['category_id'];
                                                        $category_query = "SELECT * FROM categories WHERE id= $category_id";
                                                        $category_result = mysqli_query($connexion, $category_query);
                                                        $category = mysqli_fetch_assoc($category_result);
                                                        $category_title = $category['title'];

                                                        ?>

                                                        <div class="heading heading-sub">
                                                            <span class="sub-title line-before line-before-50"><?= $category['title'] ?></span>
                                                            <h3 class="title fw-light"><?= $post['title'] ?></h3>
                                                        </div>
                                                        <div class="description">
                                                            <p> <?= substr($post['body'], 0, 200) ?>...</p>
                                                        </div>
                                                        <div class="link">
                                                            <span class="">
                                                                <span>En savoir plus</span>
                                                                <i class="ficon ficon-thin-circle-arrow-left"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- Content -->
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile ?>
                                <!-- Post -->
                            </div>
                            <div class="news-prev swiper-button-prev"></div>
                            <div class="news-next swiper-button-next"></div>
                            <div class="news-pagination swiper-pagination"></div>
                        </div>
                        <div class="all-tour-link">
                            <a href="actu" class="btn btn-lg btn-expand btn-ht-primary">
                                <i class="ficon ficon-thin-circle-arrow-left"></i>
                                <span>Voir toutes les actualités</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post list -->
        </section>
        <!-- NEWS & EVENTS -->

    </main>

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
                                    <a href="mailto:trainingcenter@usinecole.com" class="k-hover">trainingcenter@usinecole.com
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
                                            <a href="soutenir" class="k-hover">Nous soutenir</a>
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
                                            <a href="https://www.paris-villaroche-training-center.parcours.pro/" class="k-hover" target="_blank">Plateforme</a>
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
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/bundle.js"></script>
</body>

</html>