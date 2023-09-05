<?php
require './admin/middlewares/data.php';

if (!isset($_SESSION['user-id'])) {
    header('location:login_soft');
} else {
    $user_id = $_SESSION['user-id'];

    // Exécuter une requête SQL pour sélectionner l'email de l'utilisateur
    $sql = "SELECT email FROM user_form WHERE id = '$user_id'";
    $result = mysqli_query($connexion, $sql);
    if ($result) {
        // Récupérer l'email de l'utilisateur
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];

        // Utiliser l'email pour effectuer une autre opération
        // ...
    } else {
        echo "Erreur lors de l'exécution de la requête SQL : " . mysqli_error($connexion);
    }
}

$acquis = 100;
$cours = 70;
$compliquer = 40;
$aide = 20;
$bar = "bar";
$apprenti = "Apprentissage";
$comp = "Compétences intrapersonnelles";
$ref =  "Réfléxion et imagination";
$com =  "Communication";
$comp2 = "Compétences interpersonnelles";
$lead =  "Leadership";

// Calcul de la moyenne des softs skills

if (isset($_POST['apprentissage'])) {
    $moyenneA = array_sum($_POST['apprentissage']) / count($_POST['apprentissage']);
    $resultA = (int)$moyenneA;
    // var_dump($resultA);
    // var_dump($_POST['apprentissage']);
}

if (isset($_POST['intrapersonnelles'])) {
    $moyenneIntra = array_sum($_POST['intrapersonnelles']) / count($_POST['intrapersonnelles']);
    $resultIntra = (int)$moyenneIntra;
    //var_dump($resultIntra);
    //var_dump($_POST['intrapersonnelles']);

}

if (isset($_POST['reflexion'])) {
    $moyenneR = array_sum($_POST['reflexion']) / count($_POST['reflexion']);
    $resultR = (int)$moyenneR;
    //var_dump($_POST['reflexion']);
}


if (isset($_POST['communication'])) {
    $moyenneC = array_sum($_POST['communication']) / count($_POST['communication']);
    $resultC = (int)$moyenneC;
    //var_dump($_POST['communication']);

}

if (isset($_POST['interpersonnelles'])) {
    $moyenneInter = array_sum($_POST['interpersonnelles']) / count($_POST['interpersonnelles']);
    $resultInter = (int)$moyenneInter;
    //  $resultInter = (int)$moyenneInter . " %";
    // var_dump($_POST['interpersonnelles']);


}

if (isset($_POST['leadership'])) {
    $moyenneL = array_sum($_POST['leadership']) / count($_POST['leadership']);
    $resultL = (int)$moyenneL;
    //var_dump($_POST['leadership'] );
}




// Validation du formulaire

if (isset($_POST['valider-form'])) {
    $user_id = $_SESSION['user-id'];
    $name_user = $_SESSION['user_name'];
    $email_user = $email;


    $chart_data = "https://quickchart.io/chart?bkg=white&c={ type: 'radar', data: { labels: ['Apprentissage', 'Compétences intrapersonnelles','Reflexion',
        'Communication','Compétences interpersonnelles','Leadership'], datasets: [{ label: 'Moyenne de vos résultats sur %20100%25', fill: true, data: [$resultA, $resultIntra, $resultR, $resultC, $resultInter,  $resultL], backgroundColor: 'rgba(237, 0, 140, 0.2)', borderColor: 'rgb(237, 0, 140)', pointBackgroundColor: 'rgb(237, 0, 140)',pointBorderColor: 'white', pointHoverBackgroundColor: 'white', pointHoverBorderColor: 'rgb(237, 0, 140)'}]}, options: { scale: { ticks: { beginAtZero: true, min: 0, max: 100, stepSize: 20 }}}}";

    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= 'From:trainingcenter@parisvillaroche.com' . "\r\n";

    $entete2  = 'MIME-Version: 1.0' . "\r\n";
    $entete2 .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete2 .= 'From:' . $email . "\r\n";
    $entete2 .= 'Reply-to: ' . $email . "\r\n";



    $message = '
    <html>
    <head>
    
    <style type="text/css">
        body {
            margin: 0;
            background-color: #cccccc;
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
            
        }
        .wrapper{
            width: 100%;
            table-layout: fixed;
            background-color: #f1f1f1;
            padding-bottom: 40px;
        }

        .main{
            background-color: #fff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: sans-serif;
            color: #4a4a4a;
        }

        .two-columns{
            text-align: center;
            font-size: 0;
            padding: 40px 0;
        }

        .two-columns .column{
            width: 100%;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
        }

        .two-columns .padding{
            padding: 20px;
        }

        .two-columns .content{
            text-align: left;
            font-size: 15px;
            line-height: 20px;
        }

        .icons{
            letter-spacing: 15px;
        }

        a{
            text-decoration: none;
            color: #273c75;
        }



        @media screen and (max-width: 600px) { 
            .two-columns .content img{
                width: 300px!important;
                max-width: 300px!important;
            }

            .padding{
                padding-right: 0!important;
                padding-left: 0!important;
            }
            
        }
    </style>
    </head>
    <body>
        <center class="wrapper">
            <table class="main" width="100%">

                


    <!-- SOCIAL MEDIA ICONS -->
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td class="icons" style="background-color: #273c75;padding: 8px 0 5px;text-align: center;">
                                    <a href="https://m.facebook.com/trainingcentersympav/"><img src="https://i.ibb.co/L9sHFmR/facebook.png" alt="Logo" width="30"></a>

                                    <a href="https://www.instagram.com/trainingcenter4.0/"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Logo" width="30"></a>

                                    <a href="https://twitter.com/TCenter4_0/"><img src="https://i.ibb.co/JdSrFBW/twitter.png" alt="Logo" width="30"></a>

                                    <a href="https://www.youtube.com/channel/UCqan073e4fkLA_HtG_uWk8Q"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="Logo" width="30"></a>

                                    <a href="https://www.linkedin.com/in/tcenter-sympav-28bb571a3/"><img src="https://i.ibb.co/JRCM0mn/linkedin.png" alt="Logo" width="30"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            


    <!-- LOGO SECTION -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="text-align: center;padding: 10px;">
                                <a href="https://usinecole.com/"><img src="https://i.ibb.co/dkbLV1S/logo-modifiable-1-removebg-preview.png" alt="logo-modifiable-1-removebg-preview" border="0" width="200"></a>
                            </td>
                            <hr>
                        </tr>
                    </table>
                </td>
            </tr>


    
    <!-- TITLE, TEXT & BUTTON -->
            <tr>
                <td style="padding-bottom: 40px;">
                    <table width="100%">
                        <tr>
                            <td style="text-align: center;padding: 15px;">
                                <p style="font-size: 20px;font-weight: bold;color: #273c75;">Merci '  .  $name_user . '</p>
                                <p style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Veuillez trouver ci-joint le graphique radar des compétences :</p>
                                <br> 
                                <img src="' . $chart_data . '" alt="Chart" width=600 />
                               
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <hr>
            <tr>
            <hr>
            <tr>
            <td style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Apprentissage: ' . $resultA . ' %</td>
            </tr>
            <tr>
            <td style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Compétences intrapersonnelles: ' . $resultIntra . ' %</td>
            
            </tr>
            <tr>
            <td style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Réflexion et imagination: ' . $resultR . ' %</td>
            
            </tr>
            <tr>
            <td style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Communication: ' . $resultC . ' %</td>
            
            </tr>
            <tr>
            <td style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Compétences interpersonnelles: ' . $resultInter . ' %</td>
            
            </tr>
            <tr>
            <td style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75;">Leadership: ' . $resultL . ' %</td>
            
            </tr>

           
    <!-- BLUE BACKGROUND QUOTE -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="text-align: center;background-color: #273c75;padding: 15px;color: #ffffff;font-size: 18px;">
                                <p style="font-weight: bold;" style="color: #fff;">"Ce message vous a été envoyé via les soft-skills du site <a href="https://usinecole.com/" style="color: rgb(237, 0, 140);">Usine-Ecole 4.0</a>"</p>
                                <p style="color: #fff;font-weight:600;">Aérodrome de Melun Villaroche 77950 Montereau-sur-le-Jard</p>
                                <p style="color: #fff;"><a href="mailto:trainingcenter@parisvillaroche.com" style="color: #fff;">trainingcenter@parisvillaroche.com</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            </table>
        </center>

    </body>
    </html>';

    $message2 = '<html>

    <head>
    
        <style type="text/css">
            body {
                margin: 0;
                background-color: #cccccc;
            }
    
            table {
                border-spacing: 0;
            }
    
            td {
                padding: 0;
            }
    
            img {
                border: 0;
    
            }
    
            .wrapper {
                width: 100%;
                table-layout: fixed;
                background-color: #cccccc;
                padding-bottom: 40px;
            }
    
            .main {
                background-color: #fff;
                margin: 0 auto;
                width: 100%;
                max-width: 600px;
                border-spacing: 0;
                font-family: sans-serif;
                color: #4a4a4a;
            }
    
            .two-columns {
                text-align: center;
                font-size: 0;
                padding: 40px 0;
            }
    
            .two-columns .column {
                width: 100%;
                max-width: 300px;
                display: inline-block;
                vertical-align: top;
            }
    
            .two-columns .padding {
                padding: 20px;
            }
    
            .two-columns .content {
                text-align: left;
                font-size: 15px;
                line-height: 20px;
            }
    
            .icons {
                letter-spacing: 15px;
            }
    
            a {
                text-decoration: none;
                color: #273c75
            }
    
    
    
            @media screen and (max-width: 600px) {
                .two-columns .content img {
                    width: 300px !important;
                    max-width: 300px !important;
                }
    
                .padding {
                    padding-right: 0 !important;
                    padding-left: 0 !important;
                }
    
            }
        </style>
    </head>
    
    <body>
        <center class="wrapper">
            <table class="main" width="100%">
    
    
                <!-- BLUE BORDER -->
                <tr>
                    <td height="45" style="background-color: #273c75"></td>
                </tr>
    
    
    
    
    
                <!-- LOGO SECTION -->
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td style="text-align: center;padding: 10px;">
                                <a href="https://usinecole.com/"><img src="https://i.ibb.co/dkbLV1S/logo-modifiable-1-removebg-preview.png" alt="logo-modifiable-1-removebg-preview" border="0" width="200"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
    
                <!-- TITLE, TEXT & BUTTON -->
                <tr>
                    <td style="padding-bottom: 40px;">
                        <table width="100%">
                            <tr>
                                <td style="text-align: center;padding: 15px;">
                                    <p style="font-size: 20px;font-weight: bold;color: #273c75">' . $name_user . ' a rempli le tableau des softs-skills sur le site Usine-Ecole 4.0 !</p>
                                    <p style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75">
                                    <br>
                                    Cet utilisateur recevra ses résultats sous 48 heures !
                                    </p>
                                    <p style="text-align: center;font-size: 15px; line-height: 23px; padding: 5px 0 15px;color: #273c75">
                                    <br>
                                    Pour voir le détail de ses résultats, connectez-vous sur votre espace administrateur sur : <a href="https://usinecole.com/"> Usine-Ecole 4.0 </a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
    
    
    
   
    
    
    
            </table>
        </center>
    
    </body>
    
    </html>';

    $retour = mail($email_user, 'Usine-Ecole 4.0', $message, $entete);
    $retour2 = mail('trainingcenter@parisvillaroche.com', 'Usine-Ecole 4.0', $message2, $entete2);



    if (isset($_GET[$user_id])) {
        // Mise à jour des données de la roue

        $selectUpdRoue = "SELECT apprentissage, competenceIntra, reflexion,communication, competenceInter, leadership FROM roue WHERE id=$user_id";
        $resultUdp_Roue = mysqli_query($connexion, $selectUpdRoue);

        $updRoue = "UPDATE roue SET apprentissage='$resultA', competenceIntra='$resultIntra', reflexion='$resultR', communication='$resultC', competenceInter='$resultInter', leadership='$resultL' WHERE id=$user_id LIMIT 1";

        $resultUpdRoue  = mysqli_query($connexion, $updRoue);
        header('location:roue');

        // Mise à jour des données de la famille Apprentissage

        $selectUpdApp = "SELECT Volonte, Apprendre, evaluation, Controle, Autonomie, Esprit, Curiosite, Methodologie FROM apprentissage WHERE id=$user_id";
        $resultUdp_App = mysqli_query($connexion, $selectUpdApp);

        $updApp = "UPDATE apprentissage SET Volonte='$volonte', Apprendre='$apprendre', evaluation='$evaluation', Controle='$controle', Autonomie='$autonomie', Esprit='$esprit', Curiosite='$curiosite', Methodologie='$methodologie' WHERE id=$user_id LIMIT 1";

        $resultUpdApp  = mysqli_query($connexion, $updApp);
        header('location:roue');

        // Mise à jour des données de la famille Compétences intrapersonnelles

        $selectUpdIntra = "SELECT positive, ethique, temps, pression, stress, presence, motivation, faire_confiance, confiance_soi,resilience FROM intrapersonnelles WHERE id=$user_id";
        $resultUdp_Intra = mysqli_query($connexion, $selectUpdIntra);

        $updIntra = "UPDATE intrapersonnelles SET positive='$positive',  ethique='$ethique', temps='$temps', pression='$pression', stress='$stress', presence='$presence', motivation='$motivation', faire_confiance='$faire_confiance', confiance_soi='$confiance_soi', resilience='$resilience' WHERE id=$user_id LIMIT 1";

        $resultUpdIntra  = mysqli_query($connexion, $updIntra);
        header('location:roue');

        // Mise à jour des données de la famille Réflexion et Imagination

        $selectUpdRef = "SELECT resolution, analytique, temps, critique, creativite, ouverture, intuition FROM reflexion WHERE id=$user_id";
        $resultUdp_Ref = mysqli_query($connexion, $selectUpdRef);

        $updReflexion  = "UPDATE reflexion SET resolution='$resolution', analytique='$analytique', critique='$critique', creativite='$creativite', ouverture='$ouverture', intuition='$intuition' WHERE id=$user_id LIMIT 1";

        $resultUpdReflexion  = mysqli_query($connexion, $updReflexion);
        header('location:roue');

        // Mise à jour des données de la famille Communication

        $selectUpdComm = "SELECT orale, ecrite, nonverbale, active FROM communication WHERE id=$user_id";
        $resultUdp_Comm = mysqli_query($connexion, $selectUpdComm);

        $updComm = "UPDATE communication SET orale='$orale', ecrite='$ecrite', nonverbale='$nonverbale', active='$active' WHERE id=$user_id LIMIT 1";

        $resultUpdComm  = mysqli_query($connexion, $updComm);
        header('location:roue');

        // Mise à jour des données de la famille Compétences interpersonnelles

        $selectUpdInter = "SELECT travailequipe, collectif, coordination, conflit, fiabilite, flexibilite, respect, assertivite, feedback, politesse FROM interpersonnelles WHERE id=$user_id";
        $resultUdp_Inter = mysqli_query($connexion, $selectUpdInter);

        $updInter = "UPDATE interpersonnelles SET travailequipe='$travailequipe', collectif='$collectif', coordination='$coordination', conflit='$conflit',fiabilite='$fiabilite', flexibilite='$flexibilite', respect='$respect', assertivite='$assertivite', feedback='$feedback', politesse='$politesse' WHERE id=$user_id LIMIT 1";

        $resultUpdInter  = mysqli_query($connexion, $updInter);
        header('location:roue');

        // Mise à jour des données de la famille Leadership

        $selectUpdLead = "SELECT responsabilite, incertitude, vision, strategique, decision, integrite, audace, negociation, emotionnelle, professionnalisme FROM leadership WHERE id=$user_id";
        $resultUdp_Lead = mysqli_query($connexion, $selectUpdLead);

        $updLead = "UPDATE leadership SET responsabilite='$responsabilite', incertitude='$incertitude', vision='$vision', strategique='$strategique', decision='$decision', integrite='$integrite', audace='$audace', negociation='$negociation', emotionnelle='$emotionnelle', professionnalisme='$professionnalisme' WHERE id=$user_id LIMIT 1";

        $resultUpdLead  = mysqli_query($connexion, $updLead);
        header('location:roue');
    } else {
        // Insertion de la roue

        $select = " SELECT * FROM roue";

        $result = mysqli_query($connexion, $select);

        $insert = "INSERT INTO roue(name_user, apprentissage, competenceIntra, reflexion, communication, competenceInter,leadership,id) VALUES('$name_user','$resultA',' $resultIntra','$resultR','$resultC',' $resultInter','$resultL', $user_id)";
        mysqli_query($connexion, $insert);
        header('location:roue');

        // Insertion Apprentissage

        $volonte = $_POST['apprentissage'][0];
        $apprendre = $_POST['apprentissage'][1];
        $evaluation = $_POST['apprentissage'][2];
        $controle = $_POST['apprentissage'][3];
        $autonomie = $_POST['apprentissage'][4];
        $esprit = $_POST['apprentissage'][5];
        $curiosite = $_POST['apprentissage'][6];
        $methodologie = $_POST['apprentissage'][7];

        $selectApp = "SELECT * FROM apprentissage ";
        $resultApp = mysqli_query($connexion, $selectApp);

        $insertApp = "INSERT INTO apprentissage(name_user, Volonte, Apprendre, evaluation, Controle, Autonomie, Esprit, Curiosite, Methodologie, id) VALUES('$name_user','$volonte',' $apprendre ','$evaluation','$controle',' $autonomie','$esprit','$curiosite','$methodologie', $user_id)";

        mysqli_query($connexion, $insertApp);
        header('location:roue');

        // Insertion Compétences intrapersonnelles

        $positive = $_POST['intrapersonnelles'][0];
        $ethique = $_POST['intrapersonnelles'][1];
        $temps = $_POST['intrapersonnelles'][2];
        $pression = $_POST['intrapersonnelles'][3];
        $stress = $_POST['intrapersonnelles'][4];
        $presence = $_POST['intrapersonnelles'][5];
        $motivation = $_POST['intrapersonnelles'][6];
        $faire_confiance = $_POST['intrapersonnelles'][7];
        $confiance_soi = $_POST['intrapersonnelles'][8];
        $resilience = $_POST['intrapersonnelles'][9];

        $selectIntra = "SELECT * FROM intrapersonnelles";
        $resultIntra = mysqli_query($connexion, $selectIntra);

        $insertIntra = "INSERT INTO intrapersonnelles(name_user, positive, ethique, temps, pression, stress, presence, motivation, faire_confiance,confiance_soi, resilience, id) VALUES('$name_user',' $positive',' $ethique','$temps','$pression','$stress','$presence','$motivation','$faire_confiance','$confiance_soi','$resilience', $user_id)";

        mysqli_query($connexion, $insertIntra);
        header('location:roue');

        // Insertion Réflexion et Imagination

        $resolution = $_POST['reflexion'][0];
        $analytique = $_POST['reflexion'][1];
        $critique = $_POST['reflexion'][2];
        $creativite = $_POST['reflexion'][3];
        $ouverture = $_POST['reflexion'][4];
        $intuition = $_POST['reflexion'][5];

        $selectReflexion = "SELECT * FROM reflexion";
        $resultReflexion = mysqli_query($connexion, $selectReflexion);

        $insertReflexion = "INSERT INTO reflexion(resolution, analytique, critique, creativite, ouverture, intuition, name_user, id) VALUES('$resolution','$analytique','  $critique ','$creativite',' $ouverture',' $intuition','$name_user', $user_id)";

        mysqli_query($connexion, $insertReflexion);
        header('location:roue');

        // Insertion Communication

        $orale = $_POST['communication'][0];
        $ecrite = $_POST['communication'][1];
        $nonverbale = $_POST['communication'][2];
        $active = $_POST['communication'][3];

        $selectComm = "SELECT * FROM communication";
        $resultComm = mysqli_query($connexion, $selectComm);

        $insertComm = "INSERT INTO communication(orale, ecrite, nonverbale, active, name_user, id) VALUES('$orale','$ecrite',' $nonverbale ','$active','$name_user', $user_id)";

        mysqli_query($connexion, $insertComm);
        header('location:roue');

        // Insertion Compétences interpersonnelles

        $travailequipe = $_POST['interpersonnelles'][0];
        $collectif = $_POST['interpersonnelles'][1];
        $coordination = $_POST['interpersonnelles'][2];
        $conflit = $_POST['interpersonnelles'][3];
        $fiabilite = $_POST['interpersonnelles'][4];
        $flexibilite = $_POST['interpersonnelles'][5];
        $respect = $_POST['interpersonnelles'][6];
        $assertivite = $_POST['interpersonnelles'][7];
        $feedback = $_POST['interpersonnelles'][8];
        $politesse = $_POST['interpersonnelles'][9];

        $selectInter = "SELECT * FROM interpersonnelles";
        $resultInter = mysqli_query($connexion, $selectInter);

        $insertInter = "INSERT INTO interpersonnelles(travailequipe, collectif, coordination, conflit, fiabilite, flexibilite, respect, assertivite, feedback,politesse, name_user, id) VALUES('$travailequipe',' $collectif',' $coordination','$conflit','$fiabilite','$flexibilite','$respect','$assertivite','$feedback','$politesse','$name_user', $user_id)";

        mysqli_query($connexion, $insertInter);
        header('location:roue');

        // Insertion Leadership

        $responsabilite = $_POST['leadership'][0];
        $incertitude = $_POST['leadership'][1];
        $vision = $_POST['leadership'][2];
        $strategique = $_POST['leadership'][3];
        $decision = $_POST['leadership'][4];
        $integrite = $_POST['leadership'][5];
        $audace = $_POST['leadership'][6];
        $negociation = $_POST['leadership'][7];
        $emotionnelle = $_POST['leadership'][8];
        $professionnalisme = $_POST['leadership'][9];

        $selectLead = "SELECT * FROM leadership";
        $resultLead = mysqli_query($connexion, $selectLead);

        $insertLead = "INSERT INTO leadership(responsabilite, incertitude, vision, strategique, decision, integrite, audace, negociation, emotionnelle,professionnalisme , name_user, id) VALUES('$responsabilite',' $incertitude',' $vision','$strategique','$decision','$integrite','$audace','$negociation','$emotionnelle','$professionnalisme ','$name_user', $user_id)";

        mysqli_query($connexion, $insertLead);
        header('location:roue');
    }
}

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
    <title>Profil de <?php echo $_SESSION['user_name'] ?></title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/svg+xml">
    <!-- Bundle CSS file -->
    <link href="./assets/css/bundle.css" rel="stylesheet" />
    <!--SWiper-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

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
                                    <a href="user_page" class="">
                                        <span>Accueil</span>
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

    <section class="hard clearfix news-home-box pd-bottom-1000 bg-light pd-left-right-50px">
        <div class="title-box mg-400">
            <div class="container">
                <div class="pd-right-95px">
                    <div class="heading heading-sub" data-aos-delay="300" data-aos="fade-up">
                        <br><br>
                        <span class="sub-title d-flex justify-content-center" style="color: #fff;"><?php echo $_SESSION['user_name'] ?></span>
                        <h2 class="title title-lg fw-light d-flex justify-content-center" style="color: #fff;">Testez vos hard-skills</h2>
                    </div>
                    <br>
                    <div class="description d-flex justify-content-center" data-aos="fade-up" data-aos-delay="500">
                        <p style="color: white;">Attention, pour un résultat pertinent, vous devez choisir votre niveau pour chaque item dans le menu déroulant.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="news-list">
            <div class="container">
                <div class="tab-container d-flex justify-content-center">
                    <form action="" class="quiz" method="post">
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Familles</th>
                                    <th>Items</th>
                                    <th>Niveaux</th>
                                </tr>
                            </thead>
                            <div>
                                <tbody>
                                    <!--Apprentissage-->

                                    <div data-question="1" class="quiz__step--1 quiz__step--current quiz__step">
                                        <tr>
                                            <td class="status status-apprentissage" rowspan="8" class="quiz__question"> Compétences en lecture et compréhension</td>
                                            <td>Lecture de plans
                                            <td class="answer" class="label-check">
                                                <select id="app" class="answer__label" name="apprentissage[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option class="option" value="<?php echo $acquis ?>">Acquis</option>
                                                    <option class="option" value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option class="option" value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option class="option" value="<?php echo $aide  ?>">Besoin d'aide</option>

                                                </select>
                                            </td>
                                            </td>
                                        </tr>

                                        <br>

                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </div>
                                    <!-- Compétences en utilisation d'outils et de machines-->

                                    <div data-question="2" class="quiz__step--2 quiz__step">
                                        <tr>
                                            <td class="status status-intrapersonnelles" rowspan="11" class="quiz__question"> Compétences en utilisation d'outils et de machines </td>
                                            <td>Utilisation d'outils de mesure
                                            <td class="answer" class="label-check">
                                                <select id="intra" class="answer__label" name="intrapersonnelles[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option class="option" value="<?php echo $acquis ?>">Acquis</option>
                                                    <option class="option" value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option class="option" value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option class="option" value="<?php echo $aide  ?>">Besoin d'aide</option>

                                                </select>
                                            </td>
                                            </td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td> <a data-bs-toggle="modal" data-bs-target="#mdlDetail6" style="color: #0984e3; cursor: pointer;">Connaissances en usinage</a></td>

                                            <td class="label-check">
                                                <select id="intra" class="answer__label" name="intrapersonnelles[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option value="<?php echo $acquis ?>">Acquis</option>
                                                    <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Programmation CNC </td>
                                            <td class="label-check">
                                                <select id="intra" class="answer__label" name="intrapersonnelles[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option value="<?php echo $acquis ?>">Acquis</option>
                                                    <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                           
                                        </tr>
                                        <tr>
                                           
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>

                                    </div>

                                    <!-- Compétences en conception et modélisation -->
                                    <div data-question="3" class="quiz__step--3 quiz__step">
                                        <tr>
                                            <td class="status status-reflexion" rowspan="6" class="quiz__question"> Compétences en conception et modélisation</td>
                                            <td>Connaissances en matériaux
                                            <td class="answer" class="label-check">
                                                <select id="ref" class="answer__label" name="reflexion[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option class="option" value="<?php echo $acquis ?>">Acquis</option>
                                                    <option class="option" value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option class="option" value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option class="option" value="<?php echo $aide  ?>">Besoin d'aide</option>

                                                </select>
                                            </td>
                                            </td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td> Conception assistée par ordinateur (CAO)</td>
                                            <td class="label-check">
                                                <select id="ref" class="answer__label" name="reflexion[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option value="<?php echo $acquis ?>">Acquis</option>
                                                    <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                        <tr>
                                            
                                        </tr>

                                    </div>

                                    <!-- Compétences en qualité et résolution de problèmes   -->
                                    <div data-question="4" class="quiz__step--4 quiz__step">
                                        <tr>
                                            <td class="status status-communication" rowspan="4" class="quiz__question"> Compétences en qualité et résolution de problèmes  </td>
                                            <td>Connaissance des normes de qualité
                                            <td class="answer" class="label-check">
                                                <select id="comm" class="answer__label" name="communication[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option class="option" value="<?php echo $acquis ?>">Acquis</option>
                                                    <option class="option" value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option class="option" value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option class="option" value="<?php echo $aide  ?>">Besoin d'aide</option>

                                                </select>
                                            </td>
                                            </td>
                                        </tr>

                                        <br>

                                        <tr>
                                            <td> Résolution de problèmes techniques </td>
                                            <td class="label-check">
                                                <select id="comm" class="answer__label" name="communication[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option value="<?php echo $acquis ?>">Acquis</option>
                                                    <option value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option value="<?php echo $aide  ?>">Besoin d'aide</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                           
                                        </tr>
                                        <tr>
                                            
                                        </tr>

                                    </div>

                                    <!-- Compétences en précision -->

                                    <div data-question="5" class="quiz__step--5 quiz__step">
                                        <tr>
                                            <td class="status status-interpersonnelles" rowspan="11" class="quiz__question"> Compétences en précision</td>
                                            <td>Capacité à travailler avec précision
                                            <td class="answer" class="label-check">
                                                <select id="inter" class="answer__label" name="interpersonnelles[]" required>
                                                    <option value="" disabled selected>Choisir</option>
                                                    <option class="option" value="<?php echo $acquis ?>">Acquis</option>
                                                    <option class="option" value="<?php echo $cours ?>">En cours d'acquisition</option>
                                                    <option class="option" value="<?php echo $compliquer  ?>">Compliqué pour moi</option>
                                                    <option class="option" value="<?php echo $aide  ?>">Besoin d'aide</option>

                                                </select>
                                            </td>
                                            </td>
                                        </tr>

                                        <br>

                                        
                                        
                                        

                                    </div>




                                    <br><br>

                                </tbody>
                            </div>
                        </table>
                        <br><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" id="bt-sub" class="btn btn-lg btn-ht-primary btn-send mb-3 k-hover" name="valider-form">Valider</button>
                        </div>
                    </form>
                    <!-- Detail service modal-->
                    <div class="modal fade" id="mdlDetail4" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <button type="button" class="btn-close btn-close-right" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <h3>Apprendre à apprendre</h3>
                                    <hr>
                                    <p>
                                        Se réfère à la capacité d'une personne à acquérir de nouvelles connaissances et compétences de manière autonome et efficace.
                                    </p>
                                    <p>Cela implique de comprendre comment apprendre de manière optimale, en identifiant ses propres styles d'apprentissage, en établissant des objectifs d'apprentissage clairs, en utilisant des stratégies efficaces de traitement de l'information, en prenant des notes, en organisant les informations et en développant des compétences d'auto-évaluation pour mesurer sa propre compréhension. </p>
                                    <p>En apprenant à apprendre, on devient plus conscient de ses propres méthodes d'apprentissage, ce qui peut conduire à une amélioration de la qualité de l'apprentissage et une plus grande capacité à apprendre de manière autonome tout au long de la vie.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="mdlDetail5" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <button type="button" class="btn-close btn-close-right" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <h3>Contrôle de qualité</h3>
                                    <hr>
                                    <p>
                                        Capacité à auto-contrôler la qualité de son travail en toute objectivité.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="mdlDetail6" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <button type="button" class="btn-close btn-close-right" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <h3>L'éthique </h3>
                                    <hr>
                                    <p>
                                        Implique l'examen critique des concepts tels que le bien et le mal, le juste et l'injuste, la vertu et le vice, et la responsabilité personnelle et sociale.
                                    </p>
                                    <p>L'éthique peut également se référer à des codes de conduite professionnels qui régissent les comportements et les pratiques de diverses professions. </p>
                                    <p>En somme, l'éthique vise à promouvoir des comportements et des actions qui sont considérés comme moralement justes, responsables et acceptables dans une société donnée.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="mdlDetail7" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <button type="button" class="btn-close btn-close-right" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <h3>Motivation intrinsèque</h3>
                                    <hr>
                                    <p>
                                        Capacité à s'impliquer dans une activité qui fait sens pour soi ; avoir une attitude positif vis-à-vis de son travail sans avoir besoin de supervision constante.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="mdlDetail8" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <button type="button" class="btn-close btn-close-right" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <h3>Assertivité</h3>
                                    <hr>
                                    <p>
                                        Capacité à s'exprimer et à défendre ses droits en ses besoins sans empiéter sur ceux des autres.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detail service modal-->

                    <!-- Modale -->

                </div>
            </div>
        </div>
    </section>

</body>

</html>