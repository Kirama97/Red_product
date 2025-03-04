
<?php 
$index = true; 

session_start();

if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
    exit();
}

  $nom_utilisateur = $_SESSION['nom'];

  $voir_bienvenue = isset($_SESSION['bienvenue']) && $_SESSION['bienvenue'] === true;
  unset($_SESSION['bienvenue']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="/Assiets/lib/animate/animate.min.css">


    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
    <link rel="shortcut icon" href="http://localhost/Red_product/assiets/icone/layout-dashboard_black.svg"  type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Red_product/assiets/css/style.css">
    <title>Dashboard</title>

   

</head>


<body >


  <main class="w-full h-screen flex">

          
      <?php include_once("slide.php")
      ?>



      <div class="dash w-full lg:w-5/6 h-full ">

          <?php include_once("header.php")
              ?>

      <?php if ($voir_bienvenue): ?>
            <div id="message_bienvenue" class="bg-green-500  text-center  left-[40%] text-white px-4 py-2 rounded-lg fixed top-5 transition-opacity duration-1000">
              Bienvenue, <?php echo htmlspecialchars($nom_utilisateur); ?> ! 😊 
              <p class="text-gray-700 mt-2">Vous êtes connecté sur votre compte admin.</p>

           </div>

       <?php endif; ?>
  


          <div class="dash_bloc ">
              <div class="dash_bloc_titre max-md:text-center h-[10vh] shadow-sm px-10 py-4">
                <h1 class="text-lg md:text-2xl text-neutral-700">Bienvenue sur RED Product</h1>
                <p class="text-[12px] text-neutral-400">Une visualisation plus poussée de notre business.</p>
              </div>

              <div class="dash-contenu h-[80vh] overflow-y-scroll bg-neutral-200 p-5 md:p-10 ">

                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-5 md:gap-y-10 max-md:max-auto">
                   

                    <div class="dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>

                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    
                </div>
                 
              </div>
          </div>
          <!-- <div class="dash_bloc ">
              <div class="dash_bloc_titre max-md:text-center h-[10vh] shadow-sm px-10 py-4">
                <h1 class="text-lg md:text-2xl text-neutral-700">Bienvenue sur RED Product</h1>
                <p class="text-[12px] text-neutral-400">Une visualisation plus poussée de notre business.</p>
              </div>

              <div class="dash-contenu h-[80vh] overflow-y-scroll bg-neutral-200 p-5 md:p-10 ">

                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-5 md:gap-y-10 max-md:max-auto">
                   

                    <div class="dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>

                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    <div class=" dash_contenu_item p-5 bg-white rounded-xl flex items-center gap-3">

                      <div class=" rounded-full p-3 flex justify-center items-center bg-amber-300 ">
                        <img class="w-5 invert " src="/assiets/icone/mail-open-outline.svg" alt="" srcset="">
                      </div>
                       
                      <div>
                         <p class="text-neutral-700 text-sm"><span class="text-neutral-700 text-lg">125</span> formulaires</p>
                         <p class="text-[12px] text-neutral-600">Information comptée au millimètre près.</p>
                      </div>

                    </div>
                    
                </div>
                 
              </div>
          </div> -->

          

          
      </div>


  </main>



  <script>
       
       setTimeout(() => {
            let message = document.getElementById("message_bienvenue");
            if (message) {
                message.classList.add("opacity-0");
            }
        }, 3000);
    </script>

     
 




 <script src="http://localhost/Red_product/assiets/lib/wow/wow.min.js"></script>
 <script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="/assiets/lib/counterup/counterup.min.js"></script>
 <script  src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>