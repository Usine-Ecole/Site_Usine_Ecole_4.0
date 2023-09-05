<?php
require './config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch user from database
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connexion, $query);
    $user = mysqli_fetch_assoc($result);

    // make sure we got back only one user
    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../assets/images/actu/' . $avatar_name;
        // delete image if available
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }

    // FOR LATER
    // fetch all thumbnails of user's posts and delete them
    $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnails_result = mysqli_query($connexion, $thumbnails_query);
    if (mysqli_num_rows($thumbnails_result) > 0) {
        while($thumbnail = mysqli_fetch_assoc($thumbnails_result)){
            $thumbnail_path = '../assets/images/actu/' . $thumbnail['thumbnail'];
            // delete thumbnail from images folder is exist
            if ($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }

    // delete user from database
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connexion, $delete_user_query);

    if (mysqli_errno($connexion)) {
        $_SESSION['delete-user'] = "Impossible'{$user['nom']} {$user['prenom']}'";
    } else {
        $_SESSION['delete-user-success'] = "'{$user['nom']} {$user['prenom']}' supprimé avec succès !";
    }
}

header('location: ' .ROOT_URL . 'admin/manage-users');