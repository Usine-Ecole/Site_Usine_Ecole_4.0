<?php
require './admin/test/variablesIdent.php';

// get back from data if there was a registration error


$name = $_SESSION['signup-data']['name'] ?? null;
$phone = $_SESSION['signup-data']['phone'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
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
                        <a href="index" class="logo d-flex align-items-center">
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
        <!-- Register -->
        <section id="register" class="clearfix register-box bg-light pd-top-600 pd-bottom-600">
            <div class="register">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-8 col-lg-9 col-lg-10">
                            <div class="card">
                                <div class="card-body p-4">
                                    <!-- Register Form -->
                                    <form action="<?= ROOT_URL ?>registerAdherantlogic" class="contact-form needs-validation p-3" enctype="multipart/form-data" method="post" novalidate>
                                        <h1 class="h2">Inscription</h1>
                                        <hr>
                                        <p class="text-danger fst-italic fs-16">Les champs marqués d'un * sont obligatoires</p>
                                        <div class="invalid-feedback">
                                            <?php
                                            if (isset($_SESSION['signup'])) : ?>
                                                <div class="alert__message error">
                                                    <p>
                                                        <?= $_SESSION['signup'];
                                                        unset($_SESSION['signup']);
                                                        ?>
                                                    </p>
                                                </div>

                                            <?php endif ?>
                                        </div>
                                        
                                        <!-- Register -->
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtFirstName3" class="form-label">Nom/Prénom<span class="text-danger">*</span> </label>
                                                    <input  type="text" class="form-control form-control-lg" id="txtFirstName3" name="nom" value="<?= $name ?>" placeholder="Nom/Prénom" required>
                                                    <div class="invalid-feedback">
                                                        Entrer votre nom et prénom
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtLastName3" class="form-label">Téléphone<span class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control form-control-lg" id="txtLastName3" name="telephone" value="<?= $phone ?>" placeholder="Téléphone" required>
                                                    <div class="invalid-feedback">
                                                        Entrer votre numéro de téléphone
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtEmail3" class="form-label">Email<span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control form-control-lg" id="txtEmail3" name="email" value="<?= $email ?>" placeholder="Email" required>
                                                    <div class="invalid-feedback">
                                                        Entrer votre Email
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtPassword3" class="form-label">Mot de passe<span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control form-control-lg" id="txtPassword3" name="createpassword"  placeholder="Crée un mot de passe" value="<?= $createpassword ?>" required>
                                                    <div class="invalid-feedback">
                                                        Entrer votre mot de passe
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="txtRetypePassword3" class="form-label">Confirmation du mot de passe<span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-lg" id="txtRetypePassword3" name="confirmpassword" placeholder="Confirmez votre mot de passe" value="<?= $confirmpassword ?>" type="password" required>
                                                    <div class="invalid-feedback">
                                                        Valider votre mot de passe
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <p>Vous avez déjà un compte ?<a href="login_soft"> Connectez-vous</a></p>
                                        </div>
                                        <div>
                                            <button type="submit" name="submit" class="btn btn-lg btn-ht-primary btn-send mb-3 pe-4 ps-4" id="btnSubmit3">
                                                <i class="las la-lock"></i>
                                                <span>S'inscrire</span>
                                            </button>
                                        </div>
                                        <!-- Register -->
                                    </form>
                                    <!-- Register Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Register -->
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