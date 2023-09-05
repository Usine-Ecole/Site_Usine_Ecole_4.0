<?php
require './config/database.php';
// fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id ";
    $result = mysqli_query($connexion, $query);
    $avatar = mysqli_fetch_assoc($result);
}

//check login status
if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . 'signin');
}

// fecth current user's posts from database
$current_user_id = $_SESSION['user-id'];

$query = "SELECT posts.id, posts.title, posts.category_id FROM posts JOIN users ON posts.author_id = users.id WHERE posts.author_id=$current_user_id ORDER BY posts.id DESC";

$posts = mysqli_query($connexion, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4ERD0LRTX6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-4ERD0LRTX6');
    </script>
    <title>Usine-Ecole 4.0</title>
    <meta content="L'Usine-Ecole 4.0 accompagne depuis son inauguration une trentaine d’étudiants en alternance au brevet de techniciens supérieur CPRP en partenariat avec le lycée Leonard-de-Vinci de Melun et près de 200 demandeurs d'emploi." name="description">
    <meta content="Usine, école, usinage, mécanique, accompagnements, apprentissages, LMS" name="keywords">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/svg+xml">
    <!-- Bundle CSS file -->
    <link href="../assets/css/bundle.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
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
                            <img src="../assets/images/logo-1.png" srcset="../assets/images/logo-1@2x.png 2x" class="logo-dark" alt="">
                            <img src="../assets/images/logo-3.png" srcset="../assets/images/logo-3@2x.png 2x" class="logo-dark-2" alt="">
                            <h1 class="d-none">Usine-Ecole 4.0</h1>
                        </a>
                        <!-- Logo -->
                        <!-- Nav menu -->
                        <nav id="navbar" class="navbar">
                            <ul>
                                <?php if (isset($_SESSION['user-id'])) : ?>
                                    <li><a href="<?= ROOT_URL ?>admin/dashboard">Dashboard</a></li>
                                    <li><a href="<?= ROOT_URL ?>logout">Déconnexion</a></li>

                                <?php endif ?>
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
        <!-- HEADING PAGE -->
        <section id="heading-page" class="heading-page-box">
            <div class="heading-page-box-container">
                <div class="heading-page-swiper-box">
                    <!-- Swiper -->
                    <div class="swiper heading-page-swiper">
                        <!-- Title Breadcrumb -->
                        <div class="title-page title-page-absolute light-content">
                            <div class="container">
                                <div class="pd-left-right-50px" data-aos-delay="300" data-aos="fade-in">
                                    <div class="info-box-title heading heading-sub">
                                        <span class="sub-title line-before">Usine-Ecole 4.0</span>
                                        <h1 class="title title-lg fw-light">Liste des actualités</h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Title Breadcrumb -->
                        <!-- Room photo Slides -->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide heading-page-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="../assets/images/accompagnements/acc-home-1.jpg">
                                <a href="../assets/images/accompagnements/r1@2x.jpg"></a>
                            </div>
                            <div class="swiper-slide heading-page-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="../assets/images/accompagnements/acc-home-2.jpg">
                                <a href="../assets/images/accompagnements/r2@2x.jpg"></a>
                            </div>
                            <div class="swiper-slide heading-page-slide bg-image bg-image-wrapper bg-image-overlay" data-image-src="../assets/images/accompagnements/acc-home-3.jpg">
                                <a href="../assets/images/accompagnements/r3@2x.jpg"></a>
                            </div>
                        </div>
                        <!-- Room photo Slides -->
                        <!-- Nav / pagination -->
                        <div class="heading-page-prev swiper-button-prev k-hover"></div>
                        <div class="heading-page-next swiper-button-next k-hover"></div>
                        <div class="heading-page-pagination swiper-pagination"></div>
                        <!-- Nav / pagination -->
                    </div>
                    <!-- Swiper -->
                </div>
            </div>
        </section>
        <!--HEADING PAGE END-->
        <section id="news" class="dashboard clearfix news-home-box pd-bottom-1000 bg-light pd-left-right-50px">
            <?php if (isset($_SESSION['add-post-success'])) : ?>
                <div class="alert__message success row justify-content-center" style="width: 60%; margin: 30px auto;">
                    <p>
                        <?= $_SESSION['add-post-success'];
                        unset($_SESSION['add-post-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['edit-post-success'])) : ?>
                <div class="alert__message success row justify-content-center" style="width: 60%; margin: 30px auto;">
                    <p>
                        <?= $_SESSION['edit-post-success'];
                        unset($_SESSION['edit-post-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['edit-post'])) : ?>
                <div class="alert__message error row justify-content-center" style="width: 60%; margin: 30px auto;">
                    <p>
                        <?= $_SESSION['edit-post'];
                        unset($_SESSION['edit-post']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['delete-post-success'])) : ?>
                <div class="alert__message error row justify-content-center" style="width: 60%; margin: 30px auto;">
                    <p>
                        <?= $_SESSION['delete-post-success'];
                        unset($_SESSION['delete-post-success']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <br />
            <div class="container dashboard__container d-flex flex-wrap">
                <ul class="d-flex flex-wrap" style="list-style: none; margin:40px 0;">
                    <li ><a href="add-post">
                            <h5 style="margin: 0 5px; color: white; border: 1px solid var(--ht-color-primary); background: var(--ht-color-primary); padding: 8px; border-radius: 5px;">Ajouter une actualité</h5>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard" class="active">
                            <h5 style="margin: 0 5px; color: white; border: 1px solid var(--ht-color-primary); background: var(--ht-color-primary); padding: 8px; border-radius: 5px;">Liste des actualités</h5>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user_is_admin'])) : ?>
                        <li>
                            <a href="add-user">
                                <h5 style="margin: 0 5px; color: white; border: 1px solid var(--ht-color-primary); background: var(--ht-color-primary); padding: 8px; border-radius: 5px;">Ajouter un utilisateur</h5>
                            </a>
                        </li>
                        <li>
                            <a href="manage-users">
                                <h5 style="margin: 0 5px; color: white; border: 1px solid var(--ht-color-primary); background: var(--ht-color-primary); padding: 8px; border-radius: 5px;">Liste des utilisateurs</h5>
                            </a>
                        </li>
                        <li>
                            <a href="add-category">
                                <h5 style="margin: 0 5px; color: white; border: 1px solid var(--ht-color-primary); background: var(--ht-color-primary); padding: 8px; border-radius: 5px;">Ajouter une catégorie</h5>
                            </a>
                        </li>
                        <li>
                            <a href="manage-categories">
                                <h5 style="margin: 0 5px; color: white; border: 1px solid var(--ht-color-primary); background: var(--ht-color-primary); padding: 8px; border-radius: 5px;">Liste des catégories</h5>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
                <main class="container table-responsive">
                    <?php if (mysqli_num_rows($posts) > 0) : ?>
                        <table class="table table-bordered">
                            <thread>
                                <tr>
                                    <th>Titre</th>
                                    <th>Catégorie</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thread>
                            <tbody>
                                <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                                    <?php
                                    $category_id = $post['category_id'];
                                    $category_query = "SELECT title FROM categories WHERE id=$category_id";
                                    $category_result = mysqli_query($connexion, $category_query);
                                    $category = mysqli_fetch_assoc($category_result);
                                    ?>
                                    <tr>
                                        <td><?= $post['title'] ?></td>
                                        <td><?= $category['title'] ?></td>
                                        <td><a href="<?= ROOT_URL ?>admin/edit-post?id=<?= $post['id'] ?>" class="btn btn-success">Modifier</a></td>
                                        <td><a href="<?= ROOT_URL ?>admin/delete-post?id=<?= $post['id'] ?>" class="btn btn-danger">Supprimer</a></td>

                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert__message error row justify-content-center" style="width: 60%; margin: 30px auto;"><?= "Aucun posts " ?>
                        </div>
                    <?php endif ?>
                </main>
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
                                            <a href="../partenaires" class="k-hover">Partenaires</a>
                                        </li>
                                        <li>
                                            <a href="../soutenir" class="k-hover">Nous soutenir</a>
                                        </li>

                                        <li>
                                            <a href="../apprenti" class="k-hover">Accompagnement</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-unstyled footer-list">
                                        <li>
                                            <a href="../actu" class="k-hover">Actualités</a>
                                        </li>
                                        <li>
                                            <a href="https://www.paris-villaroche-training-center.parcours.pro/" class="k-hover" target="_blank">Plateforme</a>
                                        </li>
                                        <li>
                                            <a href="../register_soft" class="k-hover">Soft-Skills</a>
                                        </li>
                                        <li>
                                            <a href="../contact" class="k-hover">Contact</a>
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
                                    <a href="../mentions" target="_blank">Mentions légales</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="../politique" target="_blank">Politique de confidentialité</a>
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
    <script src="../assets/js/bundle.js"></script>

</body>

</html>