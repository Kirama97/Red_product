

<?php 

    $liste_hotel=true; 

    session_start();



    include_once("ajout_hotel.php");


    if(!isset($_SESSION['nom'])) {
        header("Location: connexion.php");
        exit(); 
    }

    $nom_utilisateur = $_SESSION['nom'];




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
              <div class="dash_bloc_titre flex justify-between items-center max-md:text-center h-[10vh] shadow-sm px-10 py-4">
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

                <div class="dash-contenu h-[82vh] overflow-y-scroll overflow-x-hidden bg-neutral-200 p-5 md:p-10 ">

                    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5 md:gap-y-10 max-md:max-auto">
           


                    <?php
        if (mysqli_num_rows($requete) > 0) {
            while ($row = mysqli_fetch_assoc($requete)) {
                ?>
                <div class="dash_contenu_item bg-white rounded-xl shadow-md overflow-hidden">
                    <img class="w-full h-50 object-cover" 
                        src="http://localhost/Red_product/assiets/image_bd/<?php echo htmlspecialchars($row['photo']); ?>" 
                        alt="Image de l'hôtel">
                    
                    <div class="py-5 px-3">
                        <p class="text-[12px] text-orange-500/70"><?php echo htmlspecialchars($row['adresse']); ?></p>
                        <h1 class="font-bold text-xl pt-2 pb-4"><?php echo htmlspecialchars($row['nom_hotel']); ?></h1>
                        <p class="text-sm"><?php echo number_format($row['tarif'], 0, ',', ' ') . ' ' . htmlspecialchars($row['devise']); ?> par nuit</p>
                        <a href="hotel_detail.php?id=<?php echo $row['id']; ?>" 
                            class="inline-block mt-3 px-4 py-2 bg-orange-500 text-white rounded-lg text-sm">
                            Voir plus
                        </a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="text-red-500 md:w-[75vw]  h-[70vh] flex justify-center items-center  text-xl">Aucun hôtel trouvé.</div>';
        }
        ?>
                                        
                        
                    </div>
                 
              </div>
          </div>
       
          
      </div>

      <div class="pop_up bg-black/50  ">
            
          <div class="modal  bg-white w-full md:w-[50%] max-md:m-[10%]  rounded-lg p-10 ">

              
              <div class="modal_top flex items-center gap-4 py-5 border-b-1 border-dashed border-neutral-400">
                  <button class="retour_add cursor-pointer "> 
                    <img class="w-7 " src="http://localhost/Red_product/assiets/icone/arrow-left_orange.svg" alt="" srcset="">
                  </button>
                  <h1 class="text-lg text-neutral-700 uppercase font-bold" >Créer un nouveau hôtel  </h1>
              </div>

              <div class="py-10">

                    <?php 

                     if(isset($message)){
                       echo $message ;
                     }
                    
                    ?>

                    <form action=""  method="post" class="" enctype="multipart/form-data">

                      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                          
                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700">Nom de l'hotel</label>
                            <input class="p-3 text-sm placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="text" placeholder="Hôtel" required name="nom_hotel">
                          </div>

                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700">Adresse</label>
                            <input class="p-3 text-sm placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="text" placeholder="Adresse" required name="adresse">
                          </div>

                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700">E-mail</label>
                            <input class="p-3 text-sm placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="email" placeholder="Mail de l'hotel" required name="email_hotel">
                          </div>
                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700">Numéro de téléphone</label>
                            <input class="p-3 text-sm placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="number" placeholder="+221............." required name="telephone">
                          </div>

                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700">Prix par nuit</label>
                            <input class="p-3 text-sm placeholder:text-[12px] placeholder:text-neutral-400 border-1 border-neutral-400 rounded-xl" type="number" placeholder="Tarif" required name="tarif">
                          </div>
                          <div class="box_input flex flex-col gap-y-3">
                            <label for="" class="text-neutral-700">Devise</label>
                            <select name="devise" id="" class="py-3 px-3 text-sm  border-1 border-neutral-400 rounded-xl text-black">
                            
                              <option value="XOF" class="text-neutral-700  bg-white">CFA (XOF)</option>
                              <option value="$" class="text-neutral-700 bg-white">EURO ($)</option>
                              <option value="€" class="text-neutral-700 bg-white">DOLLARD (€)</option>
                            </select>

                          
                          </div>
        
                      </div>

                      <div class="box_input flex flex-col gap-y-3 py-5">
                            <label for="" class="text-neutral-700">Ajouter une photo</label>
                            <input class="p-3 text-sm border-1 plac border-neutral-400 rounded-xl" type="file"  required name="photo_hotel">   


                      </div>

                      <button type="submit" name="enregistrer" class="bg-neutral-800 py-3 my-5 rounded-lg w-50 text-white cursor-pointer text-sm hover:bg-neutral-900 float-end">Enregistrer</button>
  



                    </form>
                  
              </div>

          </div>

      </div>


  </main>

     
 <script>

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
 </script>




 <script src="http://localhost/Red_product/assiets/lib/wow/wow.min.js"></script>
 <script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="/assiets/lib/counterup/counterup.min.js"></script>
 <script  src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>