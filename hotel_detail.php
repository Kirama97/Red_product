<?php
include_once "config.php";

session_start();

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


include_once "modifier_hotel.php";

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



 <style>

.dash-contenu::-webkit-scrollbar{
    color: black;
    width: 1px;
 }
 
 .dash-contenu::-webkit-scrollbar-track {
     background-color: rgba(255, 255, 255, 0.349);
    
 }
 
 .dash-contenu::-webkit-scrollbar-thumb  {
    background-color: #de8912;
    width: 5px;
    border-radius: 5px;
 }


 </style>   
  
</head>

<body class="h-screen overflow-hidden">

<?php

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Supprime le message après affichage
}
?>




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

                    <div class="dash-contenu h-[90vh] overflow-y-scroll p-0 sm:p-5 md:p-0  ">

                        
                    
                        
                      <div class=" flex items-center justify-center mb-3 ">

                         <img  class="rounded-full h-30 w-30 shadow-md shadow-neutral-400" src="<?php echo $photoUrl; ?>" alt="" srcset="">
                    
                      </div> 

                      <h1 class="text-center py-2 text-lg text-neutral-600">Bienvenue Dans l'hotel  <strong class="text-orange-500"><?php echo htmlspecialchars($row['nom_hotel']); ?></strong></h1>
                      <p class=" text-center text-[12px] text-neutral-400"> Gérez vos informations, ainsi que la confidentialité et la sécurité de vos données pour profiter au mieux des services du plat-form. </p>

                      <div class="w-full grid grid-cols-2  md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5  py-15">

                            <div class="h-20 bg-[url('http://localhost/Red_product/assiets/images/Raod.jpg')] bg-cover  bg-center rounded-lg p-2 flex gap-3 flex-col items-center">

                                <img class="w-7" src="http://localhost/Red_product/assiets\icone\map-pinned.svg" alt="" srcset="">

                                <p class="text-white text-center text-[12px] md:text-sm"><?php echo htmlspecialchars($row['adresse']); ?></p>

                            </div>


                            <div class="h-20 bg-[url('http://localhost/Red_product/assiets/images/boite_lettre.jpeg')] bg-cover  bg-center rounded-lg p-2 flex gap-3 flex-col items-center">

                                <img class="w-7" src="http://localhost/Red_product/assiets\icone\mail_detail.svg" alt="" srcset="">

                                <p class="text-white text-center text-[12px] md:text-sm"><?php echo htmlspecialchars($row['email_hotel']); ?></p>

                            </div>


                            <div class="h-20 bg-[url('http://localhost/Red_product/assiets/images/cabine_telephone.jpg')] bg-cover  bg-center rounded-lg p-2 flex gap-3 flex-col items-center">

                                <img class="w-7" src="http://localhost/Red_product/assiets\icone\telephone.svg" alt="" srcset="">

                                <p class="text-white text-center text-[12px] md:text-sm"><?php echo htmlspecialchars($row['telephone']); ?></p>

                            </div>


                            <div class="h-20 bg-[url('http://localhost/Red_product/assiets/images/argent.png')] bg-cover  bg-center rounded-lg p-2 flex gap-3 flex-col items-center">

                                <img class="w-7" src="http://localhost/Red_product/assiets\icone\argent.svg" alt="" srcset="">

                                <p class="text-white text-center text-[12px] md:text-sm"><?php echo htmlspecialchars($row['tarif']); ?> <?php echo htmlspecialchars($row['devise']); ?></p>

                            </div>
        

                      </div>


                      <div class="formulaire_edite  mb-50">
                                
                                <div class="  p-2 md:p-10  m-auto  bg-white w-full    rounded-lg  ">

                                            
                                        <div class="  w-full  flex items-center  py-5  border-b-1 border-dashed border-neutral-400">
                                           
                                            <h1 class="text-sm md:text-lg text-neutral-700 uppercase font-bold" >Modifier <strong class="text-orange-500"><?php echo htmlspecialchars($row['nom_hotel']); ?></strong> </h1>
                                        </div>

                                        <div class="py-10">
                                      
                                            

                                            <form action="" id="edite_section"  method="post" class="" enctype="multipart/form-data">

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-5">
                                                    
                                                    <div class="box_input flex flex-col gap-y-3">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Nom de l'hotel</label>
                                                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" value="<?php echo htmlspecialchars($row['nom_hotel']); ?>"   type="text" placeholder="Hôtel" required name="nom_hotel">
                                                    </div>

                                                    <div class="box_input flex flex-col gap-y-3">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Adresse</label>
                                                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" value="<?php echo htmlspecialchars($row['adresse']); ?>" type="text" placeholder="Adresse"  name="adresse">
                                                    </div>

                                                    <div class="box_input flex flex-col gap-y-3">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">E-mail</label>
                                                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" value="<?php echo htmlspecialchars($row['email_hotel']); ?>" type="email" placeholder="Mail de l'hotel"  name="email_hotel">
                                                    </div>
                                                    <div class="box_input flex flex-col gap-y-3">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Numéro de téléphone</label>
                                                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" value="<?php echo htmlspecialchars($row['telephone']); ?>" type="number" placeholder="+221............." name="telephone">
                                                    </div>

                                                    <div class="box_input flex flex-col gap-y-3">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Prix par nuit</label>
                                                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" value="<?php echo htmlspecialchars($row['tarif']); ?>" type="number" placeholder="Tarif"  name="tarif">
                                                    </div>
                                                    <div class="box_input flex flex-col gap-y-3">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Devise</label>
                                                    <select name="devise" id="" value="<?php echo htmlspecialchars($row['tarif']); ?>" class="py-3 px-3 text-[12px]   border-1 border-neutral-400 rounded-xl text-black">
                                                    
                                                        <option value="XOF" class="text-neutral-700 text-[12px]   bg-white">CFA (XOF)</option>
                                                        <option value="$" class="text-neutral-700 text-[12px]  bg-white">EURO ($)</option>
                                                        <option value="€" class="text-neutral-700 text-[12px]  bg-white">DOLLARD (€)</option>
                                                    </select>

                                                    
                                                    </div>

                                                </div>

                                                <div class="box_input flex flex-col gap-y-3 py-5">
                                                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Ajouter une photo</label>
                                                    <input class="p-3 text-sm border-1 placeholder:text-[10px] md:placeholder:text-[12px] border-neutral-400 rounded-xl" type="file"   name="photo_hotel">   


                                                </div>

                                                <button type="submit" name="enregistrer" class="bg-neutral-800 py-3 my-5 rounded-lg w-50 text-white cursor-pointer text-sm hover:bg-neutral-900 max-md:block m-auto md:float-end">Modifier</button>




                                            </form>
                                            
                                        </div>

                                </div>
                         
                      </div>
                    
                    


                        
                    </div>


                    <!-- fin contenu -->


                </div>

      




        </div>

 <!-- fin bloc -->





</main>


<script>
    
     
    setTimeout(() => {
               let alert = document.querySelector(".alert");
               if (alert) {
                  alert.classList.add("hidden");
               }
           }, 3000);
   
      </script> 

</body>
</html>
