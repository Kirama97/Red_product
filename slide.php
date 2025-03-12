



<div class="slide_barre z-40   md:flex  md:w-2/6 xl:w-1/6 md:h-screen  flex-col justify-between bg-[url(http://localhost/Red_product/assiets/images/red-bg.png)] bg-no-repeate bg-center">
      
    <div class="slide_top ">
        <div class="flex gap-3 items-center p-5">
            <img class="w-3 xl:w-4" src="http://localhost/Red_product/assiets/icone/Link → SVG.png" alt="" srcset="">
            <h1 class="text-white text-[10px]  sm:text-[12px] font-bold">RED PRODUCT</h1> 
        </div>

        <div>
            <p class="p-4 text-neutral-400 text-[12px] md:text-sm ">Principal</p>

            <nav>
                <a href="index.php" class="flex gap-3 px-5 py-3 w-full 
        
                    <?php echo !empty($index)? "bg-white text-neutral-600  " : 'bg-transparent text-neutral-400 hover:text-neutral-300 '; ?>">
                    <img class="w-4   <?php echo !empty($index)?  'invert  ' : 'no-invert '; ?>" src="http://localhost/Red_product/assiets/icone/layout-dashboard.svg" alt="" srcset="">
                    <span class="text-[12px] md:text-[12px]">Dashboard</span>
                </a>

                <a href="liste_hotel.php" class="flex gap-3 px-4 py-3 w-full 
                    <?php echo !empty($liste_hotel)? "bg-white text-neutral-600 " : 'bg-transparent text-neutral-400  hover:text-neutral-300 '; ?>">
                    <img class="w-4  <?php echo !empty($liste_hotel)? 'invert ' : 'no-invert'; ?> " src="http://localhost/Red_product/assiets/icone/liste_hotel_icone.svg" alt="" srcset="">
                    <span class="text-[12px] md:text-[12px]">Liste des hôtels</span>
                </a>
            </nav>

        </div>

      
    </div>


    <div class="slide_bottom px-5 md:px-3 pb-20 md:pb-15 pt-7 md:pt-4 border-t-1 border-neutral-500  h-50 md:h-10">

             <div class="flex items-center  gap-5 ">

                
                  <a href="profil_admin.php" class=" rounded-full   relative">

                        <?php
                        $photo_profil = !empty($_SESSION['profil']) ? "assiets/image_profil/" . $_SESSION['profil'] : "assiets/images/default.jpg";
                        ?>

                        <img class="w-8 h-8 md:w-8 md:h-8 object-cover rounded-full"  src="<?php echo $photo_profil; ?>" alt="Photo de profil">

                    </a>
                    <div class=" ">

                    <p class="text-[12px] text-neutral-200 ">
                    <?php echo $_SESSION['nom']; ?>
                    </p> 
                    
                    <p class="flex gap-2 items-center text-[10px]  text-neutral-400"> <span class="rounded-full block w-2 h-2  bg-green-600"></span>en ligne </p>

                    </div>



             </div>

            

            <a href="deconnexion.php" class="bg-red-500 text-white p-2 rounded-xl shadow-lg shadow-neutral-700 my-10 flex justify-center w-full gap-2 text-sm min-md:invisible" titre="Deconnecter">
                 Deconnexion <img class="w-5 opacity-60 invert hover:opacity-100 " src="http://localhost/Red_product/assiets/icone/enter-outline.svg" alt="" srcset="">
            </a>

          
            




    </div>

  
    


</div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
