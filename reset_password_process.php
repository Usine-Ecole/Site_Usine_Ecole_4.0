<?php
session_start();
require './admin/middlewares/data.php';

if (isset($_POST['submit_reset_password'])) {
    if (isset($_SESSION['reset_token'])) {
        $reset_token = $_SESSION['reset_token'];
        unset($_SESSION['reset_token']);

        $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!$new_password || !$confirm_password) {
            $_SESSION['reset_password_error'] = "Veuillez remplir tous les champs.";
        } elseif ($new_password !== $confirm_password) {
            $_SESSION['reset_password_error'] = "Les mots de passe ne correspondent pas. Veuillez réessayer.";
        } else {
            // Mettez à jour le mot de passe dans la base de données
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password_query = "UPDATE user_form SET password='$hashed_password', reset_token=NULL WHERE reset_token='$reset_token'";
            $update_password_result = mysqli_query($connexion, $update_password_query);

            if ($update_password_result) {
                $_SESSION['reset_password_success'] = "Votre mot de passe a été réinitialisé avec succès.";
            } else {
                $_SESSION['reset_password_error'] = "Une erreur est survenue lors de la réinitialisation du mot de passe. Veuillez réessayer.";
            }
        }
    } else {
        // $_SESSION['reset_password_error'] = "Jeton de réinitialisation manquant. Veuillez réessayer.";
    }
} else {
    $_SESSION['reset_password_error'] = "Requête invalide. Veuillez réessayer.";
}

header('location: ' . ROOT_URL . 'forgot_password.php');
die();
?>
