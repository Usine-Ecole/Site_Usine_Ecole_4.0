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

$queryPosts = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connexion, $queryPosts);


?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                                        <li><a href="/#rooms" class="k-hover">Inscription</a></li>
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

    <main id="main">
        <!-- TOURS -->
        <section id="news-events" class="clearfix news-events-box  bg-transparent-top pd-top-600 pd-bottom-1000">
            <!-- Title, Breadcrumb & Description -->
            <div class="title-box mg-bottom-400">
                <div class="container">
                    <div class="pd-right-30pc mb-5" data-aos-delay="300" data-aos="fade-in">
                        <div class="clearfix">
                            <div class="heading heading-sub">
                                <span class="sub-title line-before" style="color: white;">ACTUALITÉS</span>
                                <h1 class="title title-lg fw-light" style="color: white;">Voici toutes nos actualités</h1>
                            </div>
                            <div class="breadcrumb-box">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/" class="">Accueil</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Actualités</li>
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
                <div class="container">
                    <div class="col-12 col-xl-4">
                        <div id="sidebar">
                            <div class="sidebar-box">
                                <!-- Search -->
                                <div class="side-widget pb-3" data-aos-delay="300" data-aos="fade-up">
                                    <form class="input-group input-group-lg" action="<?= ROOT_URL ?>search" method="GET">
                                        <input id="search" type="search" name="search" class="form-control" placeholder="Rechercher">
                                        <button class="btn btn-ht-primary" type="submit" name="submit" id="btnSearch">
                                            <i class="ficon ficon-search-box"></i>
                                        </button>
                                    </form>
                                </div>
                                <!-- Search -->

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                        <div class="news-list-container">
                            <div class="clearfix mg-bottom-400">
                                <!-- Article -->
                                <a href="<?= ROOT_URL ?>post?id=<?= $post['id'] ?>" class="clearfix news-item" data-aos-delay="300" data-aos="fade-in">
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
                                                    <span class="sub-title line-before line-before-50"><?= $category['title'] ?></span>
                                                    <h3 class="title fw-light"><?= $post['title'] ?></h3>
                                                </div>
                                                <div class="description">
                                                    <p><?= substr($post['body'], 0, 200) ?>...</p>
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
                                <!-- Article -->
                            </div>
                            <!-- View all -->
                            <!-- View all -->
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
            <!-- News list -->
        </section>
        <!-- TOURS -->
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
</body>

</html>