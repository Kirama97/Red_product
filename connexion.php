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
    <title>Connexion</title>
</head>

<body class="bg-[url(http://localhost/Red_product/assiets/images/red-bg.png)] bg-no-repeat bg-center flex items-center justify-center bg-cover w-full h-screen">

<?php
    session_start();
    include_once "config.php";

    $erreur = "";

    if (isset($_POST['bt_valider'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = $_POST['password'];

           
            $req = mysqli_query($con, "SELECT * FROM user_admin WHERE email = '$email'") or die(mysqli_error($con));

            if (mysqli_num_rows($req) > 0) {
                $row = mysqli_fetch_assoc($req);

               
                if (password_verify($password, $row['password'])) {
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['bienvenue'] = true;
                    $_SESSION['profil'] = $row['profil'] ?? '';
                   

                    header("Location: index.php");
                    exit(); 
                } else {
                    $erreur = "Adresse e-mail ou mot de passe incorrect.";
                }
            } else {
                $erreur = "Aucun compte trouvé avec cet e-mail.";
            }
        } else {
            $erreur = "Veuillez remplir tous les champs.";
        }
    }
?>

<div class="w-80">
    <div class="flex gap-3 justify-center items-center pb-10">
        <img src="http://localhost/Red_product/assiets/icone/Link → SVG.png" alt="Logo">
        <h1 class="text-white text-2xl font-bold">RED PRODUCT</h1> 
    </div>

    <div class="w-full bg-white px-7 py-10 rounded-sm">
        <p class="text-sm text-neutral-700 font-semibold">Connectez-vous en tant qu'Admin</p>

        <?php if (!empty($erreur)): ?>
            <p class="text-red-600 text-sm mt-3"><?php echo $erreur; ?></p>
        <?php endif; ?>

        <form method="post" class="flex flex-col gap-3 py-5">
            <input class="w-full outline-none text-sm py-2 placeholder:text-[12px] placeholder:text-neutral-400 border-b-1 border-neutral-300" type="email" name="email" placeholder="E-mail" required>
            <input class="w-full outline-none py-2 placeholder:text-[12px] placeholder:text-neutral-400 border-b-1 border-neutral-300" type="password" name="password" placeholder="Mot de passe" required>
            
            <div class="flex gap-3 mt-5">
                <input type="checkbox">
                <p class="text-sm text-neutral-700">Gardez-moi connecté</p>
            </div>

            <button type="submit" name="bt_valider" class="bg-neutral-800 py-3 rounded-lg mt-5 text-white cursor-pointer text-sm hover:bg-neutral-900">Se connecter</button>
        </form>
    </div>

    <div class="w-full text-white text-center py-3">
        <a href="pass_oublie.php" class="text-[14px] text-yellow-300">Mot de passe oublié ?</a>
        <p class="text-[14px] mt-3">Vous n'avez pas de compte ? <a href="inscription.php" class="text-yellow-300">S'inscrire</a></p>
    </div>
</div>

<script src="http://localhost/Red_product/assiets/js/main.js" defer></script>
<script src="https://kit.fontawesome.com/34c2ea8006.js" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
