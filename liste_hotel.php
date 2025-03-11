

<?php 

    $liste_hotel=true; 

    session_start();



    include_once("ajout_hotel.php");
   


    if(!isset($_SESSION['nom'])) {
        header("Location: connexion.php");
        exit(); 
    }

    $nom_utilisateur = $_SESSION['nom'];


    include_once("modifier_hotel.php");



    if (!isset($_SESSION['user_id'])) {
      header("Location: connexion.php");
      exit();
  }

  $id_utilisateur = $_SESSION['user_id'];


  $requete = mysqli_query($con, "SELECT * FROM user_admin WHERE id = $id_utilisateur");

  if (mysqli_num_rows($requete) > 0) {
      $row = mysqli_fetch_assoc($requete);
  } else {
     
      header("Location: connexion.php");
      exit();
      session_unset(); 
      session_destroy(); 

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


<body  class="h-screen overflow-hidden ">


  <main class="w-full h-screen flex ">

       <?php include_once("slide.php")

        ?>



      <div class="dash w-full md:w-4/6 xl:w-5/6 h-full ">

          <?php include_once("header.php")
              ?>


          <div class="dash_bloc ">
                        <?php 

              if(isset($message)){
                echo $message ;
              }

              ?>
              <div class="dash_bloc_titre flex justify-between items-center max-md:text-center h-[11vh] shadow-sm px-10 py-4">
                <div class="flex items-center gap-3 bg-white p-2 rounded-lg">
                        <p class="text-sm text-amber-500 font-bold md:text-xl"><?php echo $nombre_hotels; ?></p>
                        <h1 class="text-lg md:text-lg text-neutral-700">Hôtels</h1>
                     
                </div>
                <button class="nouveau_hotel cursor-pointer flex items-center gap-3 shadow-sm border-1 border-neutral-300 py-2 px-4 rounded-lg">
                    <img class="w-4 sm:w-4" src="http://localhost/Red_product/assiets/icone/add-outline.svg" alt="" srcset="">
                    <p class="text-sm max-sm:hidden  text-neutral-800">Créer un nouveau Hôtels  
                </button>
              </div>


           <?php
                include_once "config.php";

                $search = isset($_GET['recherche']) ? trim($_GET['recherche']) : '';

                // Construire la requête avec filtre
                $sql = "SELECT * FROM hotels";
                if (!empty($search)) {
                    $sql .= " WHERE nom_hotel LIKE '%$search%' OR adresse LIKE '%$search%'";
                }
                $sql .= " ORDER BY id DESC";

                $requete = mysqli_query($con, $sql);
                ?>

                <div class="dash-contenu h-[81vh] overflow-y-scroll overflow-x-hidden bg-neutral-200 p-5 md:p-5 ">

                    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5 md:gap-y-10 max-md:max-auto">
           


                                    <?php
                if (mysqli_num_rows($requete) > 0) {
                    while ($row = mysqli_fetch_assoc($requete)) {
                ?>
                    <div class="dash_contenu_item relative cursor-pointer bg-white rounded-xl shadow-md overflow-hidden">
                        <img class="w-full h-40 object-cover transition-transform duration-500 hover:scale-110 hover:shadow-md" 
                            src="http://localhost/Red_product/assiets/image_bd/<?php echo htmlspecialchars($row['photo']); ?>" 
                            alt="Image de l'hôtel">
                        
                        <div class="py-5 px-4">
                            <p class="text-[12px] text-orange-500/70"><?php echo htmlspecialchars($row['adresse']); ?></p>
                            <h1 class="font-bold text-lg pt-2 pb-3"><?php echo htmlspecialchars($row['nom_hotel']); ?></h1>
                            <div class="flex items-center justify-between">
                                <p class="text-[12px]"><?php echo number_format($row['tarif'], 0, ',', ' ') . ' ' . htmlspecialchars($row['devise']); ?> par nuit</p>
                                <a href="hotel_detail.php?id=<?php echo $row['id']; ?>" 
                                    class="inline-block px-4 py-1 bg-orange-500 text-white rounded-lg duration-500 hover:bg-orange-400 text-[12px]">
                                    Voir plus
                                </a>
                            </div>
                        </div>

                        <!-- OPTION -->
                        <div class="plus absolute top-2 right-2 p-2 rounded-full cursor-pointer bg-neutral-300/70 hover:bg-white transition">
                            <img class="w-5 md:w-3" src="http://localhost/Red_product/assiets/icone/plus.svg" alt="">
                        </div>

                        <div class="plus_option absolute right-15 md:right-10 hidden top-2 gap-10 md:gap-5 items-center bg-neutral-100 px-5 py-2 rounded-2xl opacity-0 transition-opacity duration-300 ease-in-out">
                        
                             
                                    <img   data-id="<?= $row['id'] ?>"  class="modif_hotel w-4  md:w-3 opacity-35 transition-transform duration-500 hover:scale-110 hover:opacity-70"  src="http://localhost/Red_product/assiets/icone/edite.svg" alt="">
                             
                          
                         
                           
                            
                            <!-- Bouton suppression -->
                            <img class="w-4  md:w-3 transition-transform duration-500 hover:scale-110 cursor-pointer delete-btn" 
                                src="http://localhost/Red_product/assiets/icone/trash.svg" 
                                data-id="<?= $row['id'] ?>" 
                                alt="Supprimer">
                        </div>
                    </div>

                    <!-- MODAL DE SUPPRESSION -->
                

                      
                       <div id="alert_<?= $row['id'] ?>" class="alert_delete   hidden   absolute h-[100vh] w-[100vw]  bg-black/40 z-100 top-0 left-0 ">
                            <div class=" p-5 md:p-4 rounded-lg shadow-lg w-90 md:w-120 mt-80 md:mt-10 bg-neutral-800 flex-col m-auto h-47 md:h-50 text-center flex items-center justify-center">
                                 <div class=" flex items-center justify-center rounded-full my-3 md:my-5 p-2  animate-ping  border-1 border-red-500/25">
                                    <img class="w-4 md:w-5" src="http://localhost/Red_product/assiets/icone/triangle-alert.svg" alt="" srcset="">
                                 </div>
                                <h1 class="text-[12px] md:text-sm font-semibold mb-3 md:mb-4 text-neutral-200">Êtes-vous sûr de vouloir supprimer cet hôtel ?</h1>
                                <div class="flex items-center justify-center gap-4 my-5">
                                     
                                    <a href="delete_hotel.php?id=<?= $row['id'] ?>" 
                                      class="px-6 py-2 bg-red-600 text-white rounded text-[12px] hover:bg-red-700">Oui</a>

                                    <button class="close-modal px-6 py-2 bg-gray-400 text-white text-[12px] rounded hover:bg-gray-500">Annuler</button>
                                </div>
                            </div>
                        </div>
          

                <?php
                    }
                } else {
                    echo '<div class="text-red-500 md:w-[75vw] h-[70vh] flex justify-center items-center text-xl">Aucun hôtel trouvé.</div>';
                }
                ?>
                                        
                        
                    </div>
                 
              </div>
          </div>
       
          
      </div>

      <!-- ajout hotel -->

      <div class="pop_up  bg-black/50 z-100 ">
            
          <div class="modal   max-md:relative    bg-white w-full max-md:overflow-scroll max-md:h-[100lvh] md:w-[50%]  rounded-lg max-md:pt-20 max-md:px-5 md:p-10 ">

              
              <div class="modal_top max-md:fixed max-md:top-0 z-80 max-md:w-full max-md:right-0 max-md:bg-white flex items-center max-md:shadow-md gap-4 py-5 max-md:px-5 md:border-b-1 md:border-dashed md:border-neutral-400">
                  <button class="retour_add cursor-pointer "> 
                    <img class="w-5 md:w-7 " src="http://localhost/Red_product/assiets/icone/arrow-left_orange.svg" alt="" srcset="">
                  </button>
                  <h1 class="text-sm md:text-lg text-neutral-700 uppercase font-bold" >Créer un nouveau hôtel  </h1>
              </div>

              <div class="py-10">
              <?php 

                    if(isset($message)){
                      echo $message ;
                    }

                    ?>

                  

                    <form action=""  method="post" class="" enctype="multipart/form-data">

                      <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-5">
                          
                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">Nom de l'hotel</label>
                            <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="text" placeholder="Hôtel" required name="nom_hotel">
                          </div>

                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">Adresse</label>
                            <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="text" placeholder="Adresse" required name="adresse">
                          </div>

                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">E-mail</label>
                            <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="email" placeholder="Mail de l'hotel" required name="email_hotel">
                          </div>
                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">Numéro de téléphone</label>
                            <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="number" placeholder="+221............." required name="telephone">
                          </div>

                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">Prix par nuit</label>
                            <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="number" placeholder="Tarif" required name="tarif">
                          </div>
                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">Devise</label>
                            <select name="devise" id="" class="py-3 px-3 text-[12px] md:text-sm  border-1 border-neutral-400 rounded-xl text-black">
                            
                              <option value="XOF" class="text-neutral-700 text-[12px] md:text-sm  bg-white">CFA (XOF)</option>
                              <option value="$" class="text-neutral-700 text-[12px] md:text-sm bg-white">EURO ($)</option>
                              <option value="€" class="text-neutral-700 text-[12px] md:text-sm bg-white">DOLLARD (€)</option>
                            </select>

                          
                          </div>
        
                      </div>

                      <div class="box_input flex flex-col gap-y-3 py-5">
                            <label for="" class="text-neutral-700 text-[12px] md:text-sm">Ajouter une photo</label>
                            <input class="p-3 text-sm border-1 placeholder:text-[10px] md:placeholder:text-[12px] border-neutral-400 rounded-xl" type="file"  required name="photo_hotel">   


                      </div>

                      <button type="submit" name="enregistrer" class="bg-neutral-800 py-3 my-5 rounded-lg w-50 text-white cursor-pointer text-sm hover:bg-neutral-900 max-md:block m-auto md:float-end">Enregistrer</button>
  



                    </form>
                  
              </div>

          </div>

      </div>

     
      <!-- modifier hotel -->

      <div  class="pop_up_modif hidden absolute   h-[100vh] w-[100vw] bg-black/50 z-100 ">
            
      <div class="modal_modif    max-md:relative m-auto md:mt-10  bg-white w-full max-md:overflow-scroll max-md:h-[100lvh] md:w-[50%]  rounded-lg max-md:pt-20 max-md:px-5 md:p-10 ">

              
      <div class="modal_top max-md:fixed max-md:top-0 z-80 max-md:w-full max-md:right-0 max-md:bg-white flex items-center max-md:shadow-md gap-4 py-5 max-md:px-5 md:border-b-1 md:border-dashed md:border-neutral-400">
          <button class="retour_modif cursor-pointer "> 
            <img class="w-5 md:w-7 " src="http://localhost/Red_product/assiets/icone/arrow-left_orange.svg" alt="" srcset="">
          </button>
          <h1 class="text-sm md:text-lg text-neutral-700 uppercase font-bold" >Modifier un  hôtel  </h1>
      </div>

      <div class="py-10">
      <?php 

            if(isset($message)){
              echo $message ;
            }

            ?>

          

            <form action=""  method="post" class="" enctype="multipart/form-data">

              <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-5">
                  
                  <div class="box_input flex flex-col gap-y-3">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Nom de l'hotel</label>
                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl"   type="text" placeholder="Hôtel" required name="nom_hotel">
                  </div>

                  <div class="box_input flex flex-col gap-y-3">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Adresse</label>
                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="text" placeholder="Adresse" required name="adresse">
                  </div>

                  <div class="box_input flex flex-col gap-y-3">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">E-mail</label>
                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="email" placeholder="Mail de l'hotel" required name="email_hotel">
                  </div>
                  <div class="box_input flex flex-col gap-y-3">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Numéro de téléphone</label>
                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="number" placeholder="+221............." required name="telephone">
                  </div>

                  <div class="box_input flex flex-col gap-y-3">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Prix par nuit</label>
                    <input class="p-3 text-sm placeholder:text-[10px] md:placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="number" placeholder="Tarif" required name="tarif">
                  </div>
                  <div class="box_input flex flex-col gap-y-3">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Devise</label>
                    <select name="devise" id="" class="py-3 px-3 text-[12px] md:text-sm  border-1 border-neutral-400 rounded-xl text-black">
                    
                      <option value="XOF" class="text-neutral-700 text-[12px] md:text-sm  bg-white">CFA (XOF)</option>
                      <option value="$" class="text-neutral-700 text-[12px] md:text-sm bg-white">EURO ($)</option>
                      <option value="€" class="text-neutral-700 text-[12px] md:text-sm bg-white">DOLLARD (€)</option>
                    </select>

                  
                  </div>

              </div>

              <div class="box_input flex flex-col gap-y-3 py-5">
                    <label for="" class="text-neutral-700 text-[12px] md:text-sm">Ajouter une photo</label>
                    <input class="p-3 text-sm border-1 placeholder:text-[10px] md:placeholder:text-[12px] border-neutral-400 rounded-xl" type="file"  required name="photo_hotel">   


              </div>

              <button type="submit" name="enregistrer" class="bg-neutral-800 py-3 my-5 rounded-lg w-50 text-white cursor-pointer text-sm hover:bg-neutral-900 max-md:block m-auto md:float-end">Modifier</button>




            </form>
          
      </div>

      </div>

      </div>


  </main>







<script>

 


// pop up pour add hotel

const nouveau_hotel = document.querySelector(".nouveau_hotel");
const pop_up = document.querySelector(".pop_up");
const retour_add = document.querySelector(".retour_add");
const modal = document.querySelector(".modal");

nouveau_hotel.addEventListener("click", () => {
  
   pop_up.classList.toggle("active");
  
   
});



retour_add.addEventListener("click", () => {
  
 pop_up.classList.toggle("active");

 });


 setTimeout(() => {
            let add_message = document.querySelector(".add_message");
            if (add_message) {
                add_message.classList.add("opacity-0");
            }
        }, 3000);



// pop up pour modif hotel


// modif modal

  document.querySelectorAll(".modif_hotel").forEach(button => {
        button.addEventListener("click", function () {

       
            // let id = this.dataset.id;
             document.querySelector(".pop_up_modif").classList.remove("hidden");
        });
    });



    document.querySelectorAll(".retour_modif").forEach(button => {
        button.addEventListener("click", function () {
            this.closest(".pop_up_modif").classList.add("hidden");
        });
    });





// option



const plus = document.querySelectorAll(".plus");
const plus_options = document.querySelectorAll(".plus_option");

plus.forEach((element, index) => {
    element.addEventListener("click", function (event) {
        event.stopPropagation(); 

        element.classList.toggle("active");
        const plus_option = plus_options[index];

        if (plus_option.classList.contains("hidden")) {
            plus_option.classList.remove("hidden");
            plus_option.classList.add("flex");
            setTimeout(() => {
                plus_option.classList.add("opacity-100");
                plus_option.classList.remove("opacity-0");
            }, 10);
        } else {
            plus_option.classList.remove("opacity-100");
            plus_option.classList.add("opacity-0");
            setTimeout(() => {
                plus_option.classList.remove("flex");
                plus_option.classList.add("hidden");
            }, 300);
        }
    });
});


document.addEventListener("click", function () {
    plus_options.forEach((plus_option) => {
        if (!plus_option.classList.contains("hidden")) {
            plus_option.classList.remove("opacity-100");
            plus_option.classList.add("opacity-0");
            setTimeout(() => {
                plus_option.classList.remove("flex");
                plus_option.classList.add("hidden");
            }, 300);
        }
    });
});

          

// suppression modal

document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function () {
            let id = this.dataset.id;
            document.getElementById("alert_" + id).classList.remove("hidden");
        });
    });

    document.querySelectorAll(".close-modal").forEach(button => {
        button.addEventListener("click", function () {
            this.closest(".alert_delete").classList.add("hidden");
        });
    });

 
    document.querySelectorAll(".alert_delete").forEach(modal => {
        modal.addEventListener("click", function (event) {
            if (event.target === this) {
                this.classList.add("hidden");
            }
        });
    });




 </script>




 <script src="http://localhost/Red_product/assiets/lib/wow/wow.min.js"></script>
 <script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="/assiets/lib/counterup/counterup.min.js"></script>
 <script  src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>