
<?php
 
 session_start();

 if (!isset($_SESSION['nom'])) {
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
    <title>profil <?php echo htmlspecialchars($nom_utilisateur); ?></title>
</head>
<body>


    <?php include_once("header.php") ?>


  



    <script src="http://localhost/Red_product/assiets/lib/wow/wow.min.js"></script>
 <script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="/assiets/lib/counterup/counterup.min.js"></script>
 <script  src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    
</body>
</html>