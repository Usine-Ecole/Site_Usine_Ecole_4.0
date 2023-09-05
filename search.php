<?php 
require './admin/config/database.php';

if(isset($_GET['search']) && isset($_GET ['submit'])){
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query($connexion, $query);
} else {
    header('location: ' .ROOT_URL . '/');
    die();
}

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
    <meta
        content="L'Usine-Ecole 4.0 accompagne depuis son inauguration une trentaine d’étudiants en alternance au brevet de techniciens supérieur CPRP en partenariat avec le lycée Leonard-de-Vinci de Melun et près de 200 demandeurs d'emploi."
        name="description">
    <meta content="Usine, école, usinage, mécanique, accompagnements, apprentissages, LMS" name="keywords">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/svg+xml">
    <!-- Bundle CSS file -->
    <link href="./assets/css/bundle.css" rel="stylesheet" />
    <!-- font awesome icons -->
    <link rel="stylesheet" href="./assets/css/font-awesome.css">
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
                                        <li><a href="#" class="k-hover">Nos projets</a></li>
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
       <!-- TOURS -->
       <section id="news-events" class="clearfix news-events-box pd-left-right-50px bg-transparent-top pd-top-600 pd-bottom-1000">
        <!-- Title, Breadcrumb & Description -->
        <div class="title-box mg-bottom-400">
            <div class="container-fluid">
                <div class="pd-right-30pc mb-5" data-aos-delay="300" data-aos="fade-up">
                    <div class="clearfix">
                        <div class="heading heading-sub">
                            <span class="sub-title line-before">Actualités</span>
                            <h1 class="title title-lg fw-light" style="color: #fff">Recherche Actualités</h1>
                        </div>
                        <div class="breadcrumb-box">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/" class="k-hover">Accueil</a></li>
                                    <li class="breadcrumb-item" aria-current="page"  style="color: #fff">Actualités</li>
                                    <li class="breadcrumb-item active" aria-current="page"  style="color: #fff">Recherche</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Title, Breadcrumb & Description -->
        <!-- News list -->
        <div class="news-list">
            <div class="container-fluid">
                <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                    <div class="news-list-container">
                        <div class="clearfix mg-bottom-400">
                            <!-- Article -->
                            <a href="<?= ROOT_URL ?>post?id=<?= $post['id'] ?>" class="clearfix news-item k-hover" data-aos-delay="300" data-aos="fade-up">
                                <div class="news-item-container">
                                    <div class="news-item-content">
                                        <!-- Image -->
                                        <figure class="image">
                                            <img src="./assets/images/actu/<?= $post['thumbnail'] ?>" srcset="./assets/images/actu/n1@2x.jpg 2x" class="img-fluid" alt="">
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
                                                <span class="sub-title line-before line-before-50" style="color:#24262b;"><?= $category['title'] ?></span>
                                                <h3 class="title fw-light" style="color:#24262b;"><?= $post['title'] ?></h3>
                                            </div>
                                            <div class="description">
                                                <p><?= substr($post['body'], 0, 200) ?>... </p>
                                            </div>
                                            <div class="link">
                                                <span class="k-hover">
                                                    <span><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></span>
                                                    <i class="ficon ficon-thin-circle-arrow-left"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Content -->
                                    </div>
                                </div>
                            </a>
                            <!-- Article -->
                        </div>
                        
                    </div>
                <?php endwhile ?>
            </div>
        </div>
        <!-- News list -->
    </section>
    <!-- TOURS -->
    </main>

    <!-- MAIN -->
    <!-- FOOTER -->
    <footer id="footer" class="footer pd-left-right-50px">
        <div class="container-fluid">
            <!-- Block -->
            <!-- Footer top -->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-xl-3 col-lg-12 col-md-6">
                        <!-- Brand -->
                        <div class="footer-widget">
                            <h4 class="widget-title">Usine-Ecole 4.0</h4>
                            <p>
                                Pôle de ressources et d'accompagnement vers les métiers mécaniques aéronautiques et
                                industriels soutenu par l'Europe.
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
                                    <span>
                                        Aérodrome de Melun Villaroche <br> 77950 Montereau-sur-le-Jard
                                    </span>
                                </p>
                                <p>
                                    <span> <a href="tel:+330160681144"></a> 01 60 68 11 44</span>
                                </p>
                                <p>
                                    <a href="mailto:trainingcenter@parisvillaroche.com"
                                        class="k-hover">trainingcenter@parisvillaroche.com
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- Contact Info -->
                    </div>
                    <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                        <!-- Quick Links -->
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
                                            <a href="https://www.paris-villaroche-training-center.parcours.pro/"
                                                class="k-hover">Plateforme</a>
                                        </li>
                                     <!-- <li class="dropdown">
                                    <a href="soft" class="k-hover"><span>Soft-Skills</span></a>
                                </li> -->
                                        <li>
                                            <a href="contact" class="k-hover">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Quick Links -->
                    </div>
                    <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                        <!-- Subscribe & Social -->
                        <div class="footer-widget">
                            <div class="footer-social">
                                <!-- Social -->
                                <h5 class="social-title">Réseaux-Sociaux</h5>
                                <div class="social-list">
                                    <a href="https://m.facebook.com/trainingcentersympav/"
                                        class="btn-social btn-facebook k-hover"><i class="pe-so-facebook"></i></a>
                                    <a href="https://twitter.com/TCenter4_0/" class="btn-social btn-twitter k-hover"><i
                                            class="pe-so-twitter"></i></a>
                                    <a href="https://www.instagram.com/trainingcenter4.0/"
                                        class="btn-social btn-youtube-1 k-hover"><i class="pe-so-youtube-1"></i></a>
                                    <a href="https://www.youtube.com/channel/UCqan073e4fkLA_HtG_uWk8Q"
                                        class="btn-social btn-vimeo k-hover"><i class="pe-so-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/tcenter-sympav-28bb571a3/"
                                        class="btn-social btn-linkedin k-hover"><i class="pe-so-linkedin"></i></a>
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
                                <li class="list-inline-item me-4 k-hover">
                                    <a href="mentions" target="_blank">Mentions légales</a>
                                </li>
                                <li class="list-inline-item k-hover">
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
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center k-hover"><i
            class="ficon ficon-thin-arrow-up"></i></a>

    <div id="preloader"></div>

    <!-- Bundle JS Files -->
    <script src="./assets/js/bundle.js"></script>

</body>

</html>