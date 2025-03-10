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
    }

    include_once("updade_profil.php");


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen p-6">
    <div class="bg-white/10 backdrop-blur-lg shadow-lg rounded-2xl p-8 w-full max-w-lg text-white relative">
        <div class="flex flex-col items-center">
            <div class="relative w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg">
                <?php $photo_profil = !empty($row['profil']) ? "assiets/image_profil/" . $row['profil'] : "assiets/images/default.jpg"; ?>
                <img class="w-full h-full object-cover" src="<?php echo $photo_profil; ?>" alt="Photo de profil">
                <label class="absolute bottom-2 right-2 bg-gray-800 p-2 rounded-full shadow-md cursor-pointer hover:bg-gray-700 transition">
                    <img class="w-5 h-5" src="http://localhost/Red_product/assiets/icone/camera.svg" alt="Modifier">
                </label>
            </div>
            <h1 class="text-2xl font-bold mt-4"><?php echo htmlspecialchars($row['nom']); ?></h1>
            <p class="text-gray-300 mt-1"><?php echo htmlspecialchars($row['email']); ?></p>
        </div>

        <div class="mt-6 border-t border-gray-700 pt-4">
            <h2 class="text-lg font-semibold">À propos</h2>
            <p class="text-gray-400 text-sm mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio earum harum similique illo ut.</p>
        </div>

        <div class="mt-6 border-t border-gray-700 pt-4">
            <h2 class="text-lg font-semibold">Modifier le profil</h2>
            <form class="mt-4 flex flex-col gap-4" method="post" action="update_profil.php" enctype="multipart/form-data">
                <input class="w-full py-2 px-4 bg-gray-800 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>" placeholder="Nom">
                <input class="w-full py-2 px-4 bg-gray-800 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" placeholder="Email">
                <input class="w-full py-2 px-4 bg-gray-800 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" name="old_password" placeholder="Ancien mot de passe">
                <input class="w-full py-2 px-4 bg-gray-800 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" name="new_password" placeholder="Nouveau mot de passe">
                <input class="w-full py-2 px-4 bg-gray-800 text-white rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="file" name="profil">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md transition hover:bg-blue-600" type="submit">Modifier</button>
            </form>
        </div>
    </div>
</body>
</html>

