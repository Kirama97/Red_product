<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="/Assiets/lib/animate/animate.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="http://localhost/Red_product/assiets/icone/Link → SVG.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Red_product/assiets/css/style.css">
    <title>Inscription</title>
</head>

<body class="bg-[url(http://localhost/Red_product/assiets/images/red-bg.png)] bg-no-repeat bg-center flex items-center justify-center bg-cover w-full h-screen">

<?php 
    session_start();
    include_once "config.php";

    $error_ajout = "";

    if (isset($_POST['bt_inscription'])) {
       
        if (!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            
            $nom = mysqli_real_escape_string($con, $_POST["nom"]);
            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            
          
            $req = mysqli_query($con, "SELECT * FROM user_admin WHERE email = '$email'");
            
            if (mysqli_num_rows($req) == 0) {
               
                $insert = mysqli_query($con, "INSERT INTO user_admin(nom, email, password) VALUES ('$nom', '$email', '$password')");

                if ($insert) {
                    $user_id = mysqli_insert_id($con);

                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['bienvenue'] = true;
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Erreur lors de l'inscription. Veuillez réessayer.";
                }
            } else {
                $error = "Cet email est déjà utilisé !";
            }
        } else {
            $error = "Veuillez remplir tous les champs.";
        }
    }
?>

<div class="w-80">
    <div class="flex gap-3 justify-center items-center pb-10">
        <img src="http://localhost/Red_product/assiets/icone/Link → SVG.png" alt="Logo">
        <h1 class="text-white text-2xl font-bold">RED PRODUCT</h1> 
    </div>

    <div class="w-full bg-white px-7 py-10 rounded-sm">
        <p class="text-sm text-neutral-700 font-semibold">Inscrivez-vous en tant qu'Admin</p>

        <?php if (!empty($error)): ?>
            <p class="text-red-600 text-sm mt-3"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" class="flex flex-col gap-3 py-5">
            <input class="w-full outline-none text-sm py-2 placeholder:text-[12px] placeholder:text-neutral-400 border-b-1 border-neutral-300" type="text" name="nom" placeholder="Nom" required>
            <input class="w-full outline-none py-2 placeholder:text-[12px] placeholder:text-neutral-400 border-b-1 border-neutral-300" type="email" name="email" placeholder="E-mail" required>
            <input class="w-full outline-none py-2 placeholder:text-[12px] placeholder:text-neutral-400 border-b-1 border-neutral-300" type="password" name="password" placeholder="Mot de passe" required>
            
            <div class="flex gap-3 mt-5">
                <input type="checkbox" required>
                <p class="text-sm text-neutral-700">Accepter les termes et la politique</p>
            </div>

            <button type="submit" name="bt_inscription" class="bg-neutral-800 py-3 rounded-lg mt-5 text-white cursor-pointer text-sm hover:bg-neutral-900">S'inscrire</button>
        </form>
    </div>

    <div class="w-full text-white text-center py-3">
        <p class="text-[14px] mt-3">Vous avez déjà un compte ? <a href="connexion.php" class="text-yellow-300">Se connecter</a></p>
    </div>
</div>

<script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
