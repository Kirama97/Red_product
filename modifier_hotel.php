<?php

include_once "config.php";

if (isset($_POST['enregistrer']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $nom_hotel = mysqli_real_escape_string($con, $_POST['nom_hotel']);
    $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
    $email_hotel = mysqli_real_escape_string($con, $_POST['email_hotel']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $tarif = mysqli_real_escape_string($con, $_POST['tarif']);
    $devise = mysqli_real_escape_string($con, $_POST['devise']);

    if (!empty($_FILES['photo_hotel']['name'])) {
        $photo = $_FILES['photo_hotel']['name'];
        $target_dir = "assiets/image_bd/";
        $target_file = $target_dir . basename($photo);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

 
        $check = getimagesize($_FILES["photo_hotel"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["photo_hotel"]["tmp_name"], $target_file)) {
              
                $sql = "UPDATE hotels SET 
                        nom_hotel = '$nom_hotel',
                        adresse = '$adresse',
                        email_hotel = '$email_hotel',
                        telephone = '$telephone',
                        tarif = '$tarif',
                        devise = '$devise',
                        photo = '$photo'
                        WHERE id = $id";
            } else {
                $_SESSION['message'] = "<p class='text-red-500 alert text-[12px]  text-center'>Erreur lors de l'upload de l'image.</p>";
                header("Location: hotel_detail.php?id=$id");
                exit;
            }
        } else {
            $_SESSION['message'] = "<p class='text-red-500 alert text-[12px]  text-center'>Le fichier sélectionné n'est pas une image valide.</p>";
            header("Location: hotel_detail.php?id=$id");
            exit;
        }
    } else {
       
        $sql = "UPDATE hotels SET 
                nom_hotel = '$nom_hotel',
                adresse = '$adresse',
                email_hotel = '$email_hotel',
                telephone = '$telephone',
                tarif = '$tarif',
                devise = '$devise'
                WHERE id = $id";
    }

   
    if (mysqli_query($con, $sql)) {
        $_SESSION['message'] = "<p class='alert text-neutral-100 alert  text-[12px]  bg-green-400 p-3  block w-full  text-center'>Hôtel mis à jour avec succès.</p>";
        header("Location: hotel_detail.php?id=$id"); 
        exit;
    } else {
        $_SESSION['message'] = "<p class= 'alert text-neutral-100 text-[12px]  p-3 block w-full  bg-red-500 text-center'>Erreur de mise à jour : " . mysqli_error($con) . "</p>";
        header("Location: hotel_detail.php?id=$id");
        exit;
    }
}
?>
