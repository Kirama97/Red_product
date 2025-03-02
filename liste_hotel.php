

<?php 

 $liste_hotel=true; 

  session_start();

  if (!isset($_SESSION['nom'])) {
      header("Location: connexion.php");
      exit(); 
  }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="/Assiets/lib/animate/animate.min.css">

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
    <link rel="shortcut icon" href="http://localhost/Red_product/assiets/icone/wallpaper_black.svg" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Red_product/assiets/css/style.css">
    <title>Liste Hôtels</title>

   

</head>


<body >


  <main class="w-full h-screen flex">

    <?php include_once("slide.php")
        ?>



      <div class="dash w-full lg:w-5/6 h-full ">

          <?php include_once("header.php")
              ?>

          <div class="dash_bloc ">
              <div class="dash_bloc_titre flex justify-between items-center max-md:text-center h-[10vh] shadow-sm px-10 py-4">
                <div class="flex items-center gap-3">
                        <h1 class="text-lg md:text-2xl text-neutral-700">Hôtels</h1>
                        <p class="text-sm text-neutral-400 md:text-2xl">8</p>
                </div>
                <button class="new_hotel cursor-pointer flex items-center gap-3 shadow-sm border-1 border-neutral-300 py-2 px-4 rounded-lg">
                    <img class="w-4 sm:w-5" src="http://localhost/Red_product/assiets/icone/add-outline.svg" alt="" srcset="">
                    <p class="text-sm max-sm:hidden text-neutral-800">Créer un nouveau Hôtels  
                </button>
              </div>

              <div class="dash-contenu h-[80vh] overflow-y-scroll bg-neutral-200 p-5 md:p-10 ">

                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5 md:gap-y-10 max-md:max-auto">
                   

                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/terou_bi.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Boulevard Martin Luther King Dakar , 11500</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Hôtels Terrou-Bi</h1>
                        <p class="text-sm">25.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/king_fat.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Rte des Almadies, Dakar</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">King Fahd Palace</h1>
                        <p class="text-sm">20.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/radisson.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Rte de la Corniche O, Dakar 16868</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Radisson Blu Hotel</h1>
                        <p class="text-sm">22.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/pullman.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Place de l'independance, 10 Rue PL 29, Dakar</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Pullman Dakar Teranga</h1>
                        <p class="text-sm">30.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/lac_rose.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Lac Rose, Dakar</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Hôtel Lac Rose</h1>
                        <p class="text-sm">25.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/saly.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Mbour, Sénégal</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Hôtels Saly</h1>
                        <p class="text-sm">20.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/palm.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">BP64, Saly 23000</p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Palm Beatch Resort & Spa</h1>
                        <p class="text-sm">22.000 XOF par nuit</p>
                      </div>

                    </div>
                    <div class="dash_contenu_item  bg-white rounded-xl ">

                      <img class="w-full" src="http://localhost/Red_product/assiets/images/terou_bi.png" alt="" srcset="">
                      <div class=" p-5">
                        <p class="text-[12px] text-orange-500/70">Place de l'independance , 10 Rue PL 29, Dakar  </p>
                        <h1 class="font-bold text-xl pt-2 pb-4">Pullman Dakar Teranga</h1>
                        <p class="text-sm">30.000 XOF par nuit</p>
                      </div>

                    </div>
               
              
                    
                </div>
                 
              </div>
          </div>
       
          
      </div>


  </main>

     
 




 <script src="http://localhost/Red_product/assiets/lib/wow/wow.min.js"></script>
 <script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="/assiets/lib/counterup/counterup.min.js"></script>
 <script  src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>