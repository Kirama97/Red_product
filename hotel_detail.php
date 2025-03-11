<?php
include_once "config.php";

$hotel_detail = true;





if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $requete = mysqli_query($con, "SELECT * FROM hotels WHERE id = $id");

    if (mysqli_num_rows($requete) > 0) {
        $row = mysqli_fetch_assoc($requete);
    } else {
        echo "<p class='text-red-500 text-xl text-center mt-10'>Hôtel non trouvé.</p>";
        exit;
    }
} else {
    echo "<p class='text-red-500 text-xl text-center mt-10'>ID d'hôtel invalide.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://localhost/Red_product/assiets/icone/layout-dashboard_black.svg"  type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Red_product/assiets/css/style.css">
    <title><?php echo htmlspecialchars($row['nom_hotel']); ?> - Détails</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
</head>

<body class="h-screen overflow-hidden">

<?php 
$photoUrl = "http://localhost/Red_product/assiets/image_bd/" . htmlspecialchars($row['photo']); 
?>


<main class="w-full h-screen flex  ">

    
    <?php include_once("slide.php")?> ;






<!-- debut bloc -->




        <div class="dash w-full md:w-4/6 xl:w-5/6 h-full  ">

            <?php include_once("header.php")?>


            <div class="dash_bloc  h-full bg-no-repeat bg-cover w-full p-5">

                
                    <!-- contenu -->

                    <div class="dash-contenu h-[90vh] overflow-y-scroll p-5 md:p-0  ">

                        
                    
                        
                      <div class=" flex items-center justify-center mb-3 ">

                         <img  class="rounded-full h-30 w-30 shadow-md shadow-neutral-400" src="<?php echo $photoUrl; ?>" alt="" srcset="">
                    
                      </div> 

                      <h1 class="text-center py-2 text-lg text-neutral-600">Bienvenue Dans l'hotel  <strong class="text-orange-500"><?php echo htmlspecialchars($row['nom_hotel']); ?></strong></h1>
                      <p class=" text-center text-[12px] text-neutral-400"> Gérez vos informations, ainsi que la confidentialité et la sécurité de vos données pour profiter au mieux des services du plat-form. </p>

                      <div class="w-full grid grid-cols-1  md:grid-cols-2 lg:grid-cols-4 gap-5  py-10">

                         <div class="h-20 bg-[url('http://localhost/Red_product/assiets/images/Raod.jpg')] bg-cover  bg-center rounded-lg p-2 bg-linear-to-l from-black to-orange-500">

                         <p class="text-white text-center text-sm"><?php echo htmlspecialchars($row['adresse']); ?></p>

                         </div>
        

                      </div>
                    
                    


                        
                    </div>


                    <!-- fin contenu -->


                </div>

      




        </div>

 <!-- fin bloc -->



</main>

</body>
</html>
