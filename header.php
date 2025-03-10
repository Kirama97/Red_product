

<?php

include_once "config.php";


$page = basename($_SERVER['PHP_SELF']);








?>

<div class="dash_header relative  border-1 h-[15vh] md:h-[8vh] border-neutral-100 flex flex-col md:flex-row gap-y-4 justify-between items-center px-5 lg:px-10 py-4 bg-white">
                     
         <button class="volet   bg-yellow-500 p-2 h-8  shadow-sm rounded-rt rounded-lg ">
               <img class="w-4 md:w-4 cursor-pointer " src="http://localhost/Red_product/assiets/icone/burguer.svg" alt="" srcset="">
         </button>

            <div>
                
            <?php
            if ($page == 'index.php') {
                echo '<h1 class="text-md lg:text-md font-bold ">Dashboard</h1>';
            } elseif  ($page == 'liste_hotel.php')  {
                echo '<h1 class="text-md lg:text-md font-bold " >Liste des hôtels</h1>';
        
            } else {
              echo '<a href="index.php" class="text-md lg:text-md font-bold " >Administrateur</a>';
            }
            ?>
                  
            </div>  
     
            <div class="  flex items-center max-md:w-full justify-between md:gap-5 lg:gap-10">
        
             


              <div class=" bg-neutral-50 flex items-center gap-3 max-md:ml-5 px-3 rounded-4xl">
                 <img class="w-4 " src="http://localhost/Red_product/assiets/icone/search.svg" alt="" srcset="">
                <form action="" method="get">
                   <input class="text-sm py-2 outline-none placeholder:text-[12px] max-md:w-40 w-60 placeholder:text-neutral-400" value="<?= isset($_GET['recherche']) ? htmlspecialchars($_GET['recherche']) : '' ?>" name="recherche" type="text" placeholder="Recherche" >

                </form>
               </div>

               <div class="flex items-center gap-5 ">

                   <div class=" flex items-center">
                    <img class="w-4 md:w-4 cursor-pointer" src="http://localhost/Red_product/assiets/icone/notifications-outline.svg" alt="" srcset="">
                     <span class="px-2 block rounded-lg py-1 translate-y-[-10px] bg-amber-400  text-[9px] font-bold text-white"><?php echo  $nombre_message; ?></span>

                   </div>

                   <a href="profil_admin.php" class=" rounded-full   relative">

                   <?php
                      $photo_profil = !empty($_SESSION['profil']) ? "assiets/image_profil/" . $_SESSION['profil'] : "assiets/image_profil/default.jpg";
                    ?>
          
                    <img class="w-7 h-7 md:w-8 md:h-8 object-cover rounded-full"  src="<?php echo $photo_profil; ?>" alt="Photo de profil">

                    <span class="absolute bottom-0 border-1 border-white right-1 rounded-full block w-2 h-2  bg-green-300"></span>
                   </a>


                 <a href="deconnexion.php" class="  hidden md:block " titre="Deconnecter">
                  <img class="w-5 opacity-60 hover:opacity-100 " src="http://localhost/Red_product/assiets/icone/enter-outline.svg" alt="" srcset="">
                 </a>

                  
              
                
               </div>


            </div>

          </div>


          <script>
            


            const slideBarre = document.querySelector(".slide_barre");
            const volet = document.querySelector(".volet");

          volet.addEventListener("click", function () {

            volet.classList.toggle('active');
           
              if (slideBarre.classList.contains("active")) {
                  slideBarre.style.opacity = "0"; 
                  slideBarre.style.left = "-40%"; 
                  setTimeout(() => {
                      slideBarre.classList.remove("active");
                      slideBarre.style.visibility = "hidden"; 
                  }, 300); 
              } else {
                  slideBarre.classList.add("active");
                  slideBarre.style.visibility = "visible"; 
                  setTimeout(() => {
                      slideBarre.style.opacity = "1";
                      slideBarre.style.left = "0%";
                  }, 10); 
              }
          });


              


          </script>