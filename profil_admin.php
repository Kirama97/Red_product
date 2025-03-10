<?php
    session_start();

    include_once "config.php";


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


     include_once("updade_profil.php");




?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="/Assiets/lib/animate/animate.min.css">



    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
    <link rel="shortcut icon" href="http://localhost/Red_product/assiets/icone/wallpaper_black.svg" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Red_product/assiets/css/style.css">
    <title>Profil de <?php echo htmlspecialchars($row['nom']); ?></title>
</head>


 <style>
    .volet {
        display:none ;
    }

 </style>
<body class="bg-gray-100">


        <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
            <div class="alert flex gap-3 text-[12px] text-md  w-full items-center justify-center bg-red-500 border  border-red-400 text-white px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Erreurs</strong>
                <ul class="list-disc list-inside">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['message'])): ?>
            <div class=" alert bg-green-500 border text-center text-[12px] text-md border-green-400 text-white px-4 py-3 rounded relative mb-4">
                <strong class="font-bold "><?php echo $_SESSION['message']; ?></strong>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>



       <?php include_once("header.php"); ?>
    

    <main>
        <section class="w-full  lg:h-screen justify-between items-center flex flex-col lg:flex-row  bg-[url(http://localhost/Red_product/assiets/images/red-bg.png)] bg-no-repeat bg-cover bg-center">
            
       
            <div class="w-full  lg:w-2/3 p-5 md:p-10">
                <div class="w-full rounded-2xl bg-neutral-50/90 p-5 md:p-6">
                    <div class="w-full bg-white rounded-xl py-5 md:py-10 mb-5 md:mb-6 text-center">
                            <div class="w-20 md:w-25 h-20 md:h-25 mx-auto relative"> 
                            <?php
                             $photo_profil = !empty($_SESSION['profil']) ? "assiets/image_profil/" . $_SESSION['profil'] : "assiets/images/default.jpg";
                            ?>
          
                            <img class=" rounded-full w-full h-full object-cover"  src="<?php echo $photo_profil; ?>" alt="Photo de profil">
                            <a class="absolute bottom-2 md:bottom-0 right-0 w-5 md:w-10 h-5 md:h-10 bg-white rounded-full flex items-center justify-center cursor-pointer hover:bg-neutral-800 transition">
                                <img src="http://localhost/Red_product/assiets/icone/camera.svg" alt="Modifier">
                            </a>
                        </div>
                        <h3 class="text-neutral-600 text-md md:text-md font-bold mt-5">Photo de profil</h3>
                    </div>

                    <div class="bg-white w-full p-5 rounded-2xl">
                        <h1 class="uppercase text-center font-bold text-md md:text-xl"><?php echo htmlspecialchars($row['nom']); ?></h1>
                        <p class="text-center my-5 flex items-center justify-center gap-3">
                            <img class="w-4 md:w-8" src="http://localhost/Red_product/assiets/icone/mail_orange.svg" alt="">
                            <span><?php echo htmlspecialchars($row['email']); ?></span>
                        </p>

                        <div class="">
                            <p class="text-neutral-700 text-sm/5  md:text-md/10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aliquid? Aliquid in rerum odit consequuntur et, earum nesciunt minus, porro aliquam error cum vel, voluptatem perspiciatis aperiam tenetur maxime atque.
                            Distinctio earum harum similique illo ut. Impedit inventore numquam necessitatibus perspiciatis aut nostrum nisi accusantium minus distinctio totam fugit ut voluptatibus architecto, doloribus id dolores aspernatur, voluptas a vero hic.
                            Perferendis reprehenderit non, aspernatur alias optio facere quos amet eveniet soluta error incidunt iste. Error odit repellendus magnam earum quae nesciunt perspiciatis recusandae, debitis dolore deleniti distinctio quam natus ab.
                            Voluptatum porro est ex temporibus quos quidem sequi, odit iusto maxime harum error ipsum veniam </p>
                          </div>
                    </div>
                </div>
            </div>

            <div class="w-full  lg:w-1/3 flex items-center justify-center max-lg:p-5">

             

                <div class="w-full lg:w-[80%] bg-white rounded-2xl shadow-lg p-5 md:p-10">
                    <h1 class=" text-md md:text-md font-bold max-md:text-center">Modifier son profil</h1>
                    <form method="post"  class="flex flex-col gap-3 py-5"  enctype="multipart/form-data">
                        <input class="w-full py-2 border-b  text-sm outline-none max-md:placeholder:text-sm placeholder:text-[12px]  border-neutral-300"  value="<?php echo htmlspecialchars($row['nom']); ?>" type="text" name="nom" placeholder="nom" >
                        <input class="w-full py-2 border-b text-sm outline-none max-md:placeholder:text-sm placeholder:text-[12px]  border-neutral-300" value="<?php echo htmlspecialchars($row['email']); ?>" type="email" name="email" placeholder="email" >
                        <input class="w-full py-2 border-b text-sm outline-none max-md:placeholder:text-sm placeholder:text-[12px]  border-neutral-300" type="password" name="old_password" placeholder="Ancien mot de passe">
                        <input class="w-full py-2 border-b text-sm outline-none max-md:placeholder:text-sm placeholder:text-[12px]  border-neutral-300" type="password" name="new_password" placeholder="Nouveau mot de passe">
                        <div class="box_input flex flex-col gap-y-3 py-5">

                            <label for="" class="text-neutral-700 text-sm md:text-md">Ajouter une photo</label>
                            <input class="p-3 text-[12px] border-1  border-neutral-400 rounded-xl" type="file"   name="profil">   


                      </div>
                        <button type="submit" class="bg-neutral-800 py-3 text-sm md:text-md rounded-lg text-white hover:bg-neutral-900">Modifier</button>
                    </form>
                </div>
            </div>

        </section>
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
