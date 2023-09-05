<?php

require './admin/middlewares/data.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login_soft');
}

$query = "SELECT * FROM user_form WHERE user_type = 'user'";
$req = $connexion->prepare($query);
$req->execute();

$resultSet = $req->get_result();
$data = $resultSet->fetch_all(MYSQLI_ASSOC);



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
    <title>Profil de <?php echo $_SESSION['admin_name'] ?></title>
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
                                    <a href="admin_page" class="">
                                        <span>Accueil</span>
                                    </a>
                                </li>


                                <li class="dropdown has-icon">
                                    <a href="registerAdherant" class="k-hover">
                                        <span>Inscription Galerie/Projets</span>
                                    </a>
                                </li>

                                <li class="dropdown has-icon">
                                    <a href="logout_soft" class="k-hover">
                                        <span>Déconnexion</span>
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
        <section id="heading-page" class="heading-page-box">
            <div class="heading-page-box-container">
                <div class="heading-page-swiper-box">
                    <!-- Swiper -->
                    <div class="swiper heading-page-swiper">
                        <!-- Title Breadcrumb -->
                        <div class="title-page title-page-absolute light-content">
                            <div class="container">
                                <div class="" data-aos-delay="300" data-aos="fade-in">
                                    <div class="info-box-title heading heading-sub">
                                        <span class="sub-title line-before">Administration des softs-skills</span>
                                        <h1 class="title title-lg fw-light">Bonjour, <?php echo $_SESSION['admin_name']  ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Title Breadcrumb -->
                        <!-- Room photo Slides -->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide heading-page-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="./assets/images/learning/learning-home-1.jpg">
                                <a href="./assets/images/learning/learning-home-1.jpg" data-gallery="single-room"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper -->
                </div>
            </div>
        </section>

        <section id="soft-def" class="clearfix bg-transparent-top pd-top-1000 pd-bottom-1000">
            <!-- Title & Description -->
            <div class="title-box mg-bottom-400 pd-left-right-50px">
                <div class="container-fluid">
                    <div class="pd-left-30pc">
                        <div class="heading heading-sub" data-aos-delay="300" data-aos="fade-up">
                            <span class="sub-title line-before" style="color: white;">Découvrez,</span>
                            <h2 class="title title-lg fw-light" style="color: white;">La liste des utlisateurs
                            </h2>
                        </div>
                        <div class="description" data-aos-delay="500" data-aos="fade-up">
                            <div class="tab-container">

                                <br>

                                <table>
                                    <thead>

                                        <tr>
                                            <th>Id</th>
                                            <th>Nom/Prénom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Profil</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php

                                        foreach ($data as $rm) {

                                        ?>

                                            <tr>
                                                <td><?php echo '<p style="font-size: 1.2rem;">' . $rm['id']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($rm['user_type'] == 'user') {
                                                        echo '<p style="font-size: 1.2rem;">' . $rm['name'] . '</p>';
                                                    }
                                                    ?>

                                                </td>
                                                <td><?php echo '<p style="font-size: 1.2rem;">' . $rm['email']; ?></td>
                                                <td><?php echo '<p style="font-size: 1.2rem;">' . $rm['phone']; ?></td>
                                                <td>
                                                    <a href="voir_profil?id=<?= $rm['id'] ?>" class="btn btn-lg btn-ht-primary btn-send mb-3 k-hover" style="font-size: 1.2rem;" name="btn-admin">Voir les softs-skills</a>
                                                </td>
                                            </tr>

                                        <?php

                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                            <a href="index" class="k-hover">Accueil</a>
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