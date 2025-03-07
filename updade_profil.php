<?php

include_once "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$id_utilisateur = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $nouvelle_photo = '';
    $_SESSION['errors'] = []; 


    if (!empty($_FILES['profil']['name'])) {
        $photo = $_FILES['profil'];
        $photo_nom = basename($photo['name']);
        $extension = strtolower(pathinfo($photo_nom, PATHINFO_EXTENSION));
        $extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $extensions_autorisees)) {
            $nouveau_nom_photo = "profil_" . time() . "." . $extension;
            $chemin_upload = "assiets/image_profil/" . $nouveau_nom_photo;

            if (!is_dir("assiets/image_profil/")) {
                mkdir("assiets/image_profil/", 0755, true);
            }

            if (move_uploaded_file($photo['tmp_name'], $chemin_upload)) {
                $nouvelle_photo = $nouveau_nom_photo;
            } else {
                $_SESSION['errors'][] = "Erreur lors de l'upload de la photo.";
            }
        } else {
            $_SESSION['errors'][] = "Format de fichier non autorisé. Seuls JPG, PNG et GIF sont acceptés.";
        }
    }

    $requete = mysqli_query($con, "SELECT * FROM user_admin WHERE id = $id_utilisateur");
    $row = mysqli_fetch_assoc($requete);

    if (!empty($old_password) && !empty($new_password)) {
        if (password_verify($old_password, $row['password'])) {
            $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);
            $update_password = ", password='$new_password_hashed'";
        } else {
            $_SESSION['errors'][] = "L'ancien mot de passe est incorrect.";
        }
    } else {
        $update_password = "";
    }

 
    if (empty($_SESSION['errors'])) {
        $update_photo = $nouvelle_photo ? ", profil='$nouvelle_photo'" : "";
        $update_query = "UPDATE user_admin SET nom='$nom', email='$email' $update_password $update_photo WHERE id=$id_utilisateur";

        if (mysqli_query($con, $update_query)) {
            $_SESSION['nom'] = $nom;
            $_SESSION['email'] = $email;
            if ($nouvelle_photo) {
                $_SESSION['profil'] = $nouvelle_photo;
            }

            $_SESSION['message'] = "Profil mis à jour avec succès !";
        } else {
            $_SESSION['errors'][] = "Erreur lors de la mise à jour.";
        }
    }

    header("Location: profil_admin.php");
    exit();
}
?>
