

<?php

include_once "config.php";


$page = basename($_SERVER['PHP_SELF']);
?>

<div class="dash_header border-1 h-[15vh] md:h-[10vh] border-neutral-100 flex flex-col md:flex-row gap-y-4 justify-between items-center px-5 lg:px-10 py-4 bg-white">
    

            <div>
                
            <?php
            if ($page == 'index.php') {
                echo '<h1 class="text-lg lg:text-xl font-bold ">Dashboard</h1>';
            } else {
                echo '<h1 class="text-lg lg:text-xl font-bold " >Liste des hôtels</h1>';
        
            }
            ?>
                  
            </div>  
     
            <div class=" flex items-center max-md:w-full justify-between md:gap-5 lg:gap-10">
               <div class=" bg-neutral-50 flex items-center gap-3  px-3 rounded-4xl">
                 <img class="w-4 " src="/assiets/icone/search.svg" alt="" srcset="">
                 <input class="text-sm py-2 outline-none placeholder:text-[12px] max-md:w-40 w-60 placeholder:text-neutral-400" type="text" placeholder="Recherche" required>
               </div>

               <div class="flex items-center gap-5 ">

                   <div class=" flex items-center">
                    <img class="w-4 md:w-5 cursor-pointer" src="http://localhost/Red_product/assiets/icone/notifications-outline.svg" alt="" srcset="">
                     <span class="px-2 block rounded-lg py-1 translate-y-[-10px] bg-amber-400  text-[10px] font-bold text-white">3</span>

                   </div>

                   <div class=" rounded-full   relative">
                    <img class="w-7 h-7 md:w-9 md:h-9  rounded-full" src="http://localhost/Red_product/assiets/images/profil.png" alt="" srcset="">
                    <span class="absolute bottom-0 border-1 border-white right-1 rounded-full block w-2 h-2  bg-green-300"></span>
                 </div>


                 <a href="deconnexion.php" class="block" titre="Deconnecter">
                  <img class="w-6 opacity-60 hover:opacity-100 " src="http://localhost/Red_product/assiets/icone/enter-outline.svg" alt="" srcset="">
                 </a>

                  
              

               </div>
            </div>
          </div>