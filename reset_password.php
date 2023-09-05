<?php
session_start();
require './admin/middlewares/data.php';

// Fonction pour générer un jeton de réinitialisation unique
function generateUniqueToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

if (isset($_POST['submit_reset'])) {
    $reset_email = filter_var($_POST['reset_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$reset_email) {
        $_SESSION['reset_password_error'] = "Veuillez fournir une adresse e-mail valide.";
    } else {
        // Générez un jeton de réinitialisation unique
        $reset_token = generateUniqueToken(); 

        // Enregistrez le jeton de réinitialisation dans la base de données avec l'adresse e-mail associée
        $update_reset_token_query = "UPDATE user_form SET reset_token='$reset_token' WHERE email='$reset_email'";
        $update_reset_token_result = mysqli_query($connexion, $update_reset_token_query);

        if ($update_reset_token_result) {
            // Envoyez un e-mail à l'utilisateur avec un lien de réinitialisation
            $reset_link = ROOT_URL . "reset_password_form.php?token=" . $reset_token; // Assurez-vous d'ajuster le lien
            $email_subject = "Réinitialisation de mot de passe";
            $email_message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $reset_link";
            
            // Remplacez ces lignes avec la logique d'envoi d'e-mail de votre serveur
            $headers = "From: trainingcenter@usinecole.com\r\n";
            $headers .= "Reply-To: " . $reset_email . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            if (mail($reset_email, $email_subject, $email_message, $headers)) {
                $_SESSION['reset_password_success'] = "Un e-mail de réinitialisation de mot de passe a été envoyé à l'adresse $reset_email.";
            } else {
                $_SESSION['reset_password_error'] = "Une erreur est survenue lors de l'envoi de l'e-mail de réinitialisation. Veuillez réessayer.";
            }
        } else {
            $_SESSION['reset_password_error'] = "Une erreur est survenue lors de la réinitialisation du mot de passe. Veuillez réessayer.";
        }
    }

    header('location: ' . ROOT_URL . 'forgot_password');
    die();
} else {
    header('location: ' . ROOT_URL . 'forgot_password');
    die();
}
?>
