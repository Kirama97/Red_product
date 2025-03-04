<?php 

include_once "config.php";

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom_hotel = mysqli_real_escape_string($con, trim($_POST["nom_hotel"]));
    $adresse = mysqli_real_escape_string($con, trim($_POST["adresse"]));
    $email_hotel = mysqli_real_escape_string($con, trim($_POST["email_hotel"]));
    $telephone = mysqli_real_escape_string($con, trim($_POST["telephone"]));
    $tarif = floatval($_POST["tarif"]);  
    $devise = mysqli_real_escape_string($con, trim($_POST["devise"]));

    if (!empty($nom_hotel) && !empty($adresse) && !empty($email_hotel) && !empty($telephone) && !empty($tarif) && !empty($devise)) {

        if (!filter_var($email_hotel, FILTER_VALIDATE_EMAIL)) {
            $message = '<p class="add_message text-center text-red-500 text-sm">Email invalide</p>';
        } else {

            $requete1 = mysqli_query($con, "SELECT id FROM hotels WHERE nom_hotel = '$nom_hotel' AND adresse = '$adresse'");

            if (mysqli_num_rows($requete1) > 0) {

                $message = '<p class="add_message text-center text-red-500 text-sm">L\'hôtel existe déjà</p>';

            } else {
                $nouveau_nom_image = null;

  
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
                        $message = '<p class="add_message text-center text-red-500 text-sm">Échec du téléchargement de l\'image</p>';
                        $nouveau_nom_image = null;
                    }
                } else {
                    echo "Erreur de fichier : " . $_FILES['photo_hotel']['error'];
                }

                $requete2 = mysqli_query($con, "INSERT INTO hotels (nom_hotel, adresse, email_hotel, telephone, tarif, devise, photo) 
                VALUES ('$nom_hotel', '$adresse', '$email_hotel', '$telephone', $tarif, '$devise', '$nouveau_nom_image')");

                    if ($requete2) {
                        $message = '<p class="add_message text-center text-green-600 text-sm">Hotel ajouté avec succes</p>';
                    } else {
                    echo "Erreur MySQL : " . mysqli_error($con);
                    }

            }
        }
    } else {
        $message = '<p class="add_message text-center text-red-500 text-sm">Veuillez remplir tous les champs</p>';
    }
}

// echo $message;

?>
