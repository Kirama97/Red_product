<?php

include_once "config.php";

$message = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $requete = mysqli_query($con, "SELECT * FROM hotels WHERE id = $id");
    $hotel = mysqli_fetch_assoc($requete);

    if (!$hotel) {
        die("Hôtel non trouvé");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);
    $nom_hotel = mysqli_real_escape_string($con, trim($_POST["nom_hotel"]));
    $adresse = mysqli_real_escape_string($con, trim($_POST["adresse"]));
    $email_hotel = mysqli_real_escape_string($con, trim($_POST["email_hotel"]));
    $telephone = mysqli_real_escape_string($con, trim($_POST["telephone"]));
    $tarif = floatval($_POST["tarif"]);
    $devise = mysqli_real_escape_string($con, trim($_POST["devise"]));
    $nouveau_nom_image = $hotel['photo'];

    if (!empty($nom_hotel) && !empty($adresse) && !empty($email_hotel) && !empty($telephone) && !empty($tarif) && !empty($devise)) {
        if (!filter_var($email_hotel, FILTER_VALIDATE_EMAIL)) {
            $message = '<p class="text-red-500 text-sm">Email invalide</p>';
        } else {
            if (!empty($_FILES['photo_hotel']['name']) && $_FILES['photo_hotel']['error'] === 0) {
                $img_nom = $_FILES['photo_hotel']['name'];
                $temporaire_nom = $_FILES['photo_hotel']['tmp_name'];
                $heure = time();
                $nouveau_nom_image = $heure . "_" . basename($img_nom);
                $dossier_images = "assiets/image_bd/";

                if (!is_dir($dossier_images)) {
                    mkdir($dossier_images, 0777, true);
                }

                $destination = $dossier_images . $nouveau_nom_image;

                if (!move_uploaded_file($temporaire_nom, $destination)) {
                    $message = '<p class="text-red-500 text-sm">Échec du téléchargement de l\'image</p>';
                    $nouveau_nom_image = $hotel['photo'];
                }
            }

            $requete2 = mysqli_query($con, "UPDATE hotels SET nom_hotel='$nom_hotel', adresse='$adresse', email_hotel='$email_hotel', telephone='$telephone', tarif=$tarif, devise='$devise', photo='$nouveau_nom_image' WHERE id=$id");

            if ($requete2) {
                $message = '<p class="text-green-600 text-sm">Hôtel mis à jour avec succès</p>';
            } else {
                echo "Erreur MySQL : " . mysqli_error($con);
            }
        }
    } else {
        $message = '<p class="text-red-500 text-sm">Veuillez remplir tous les champs</p>';
    }
}
?>
