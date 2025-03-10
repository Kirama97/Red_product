<?php
include_once "config.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $requete = mysqli_query($con, "SELECT * FROM hotels WHERE id = $id");

    if (mysqli_num_rows($requete) > 0) {
        $row = mysqli_fetch_assoc($requete);
    } else {
        echo "<p class='text-red-500 text-xl text-center mt-10'>Hôtel non trouvé.</p>";
        exit;
    }
} else {
    echo "<p class='text-red-500 text-xl text-center mt-10'>ID d'hôtel invalide.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['nom_hotel']); ?> - Détails</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

  
    <div class="relative h-screen">
        <img class="absolute inset-0 w-full h-full object-cover brightness-75"
             src="http://localhost/Red_product/assiets/image_bd/<?php echo htmlspecialchars($row['photo']); ?>" 
             alt="Image de l'hôtel">

     
        <div class="absolute inset-0 flex items-center justify-center p-6">
            <div class="bg-white bg-opacity-90 rounded-2xl shadow-2xl max-w-4xl w-full p-8 text-gray-900">
                <h1 class="text-3xl font-bold text-center mb-4"><?php echo htmlspecialchars($row['nom_hotel']); ?></h1>
                
                <p class="text-gray-500 text-center mb-4"><?php echo htmlspecialchars($row['adresse']); ?></p>
                
                <div class="flex justify-center space-x-4 mb-6">
                    <span class="bg-orange-500 text-white px-4 py-2 rounded-lg text-lg font-semibold">
                        <?php echo number_format($row['tarif'], 0, ',', ' ') . ' ' . htmlspecialchars($row['devise']); ?> / nuit
                    </span>
                </div>

                <p class="text-gray-700 text-lg text-center"><?php echo nl2br(htmlspecialchars($row['email_hotel'])); ?></p>

           
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-3">Équipements & Services :</h2>
                    <div class="grid grid-cols-2 gap-4 text-gray-700">
                        <div class="flex items-center space-x-2">
                            <span>🛏️</span> <span>Chambres de luxe</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>🍽️</span> <span>Restaurant gastronomique</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>🏊</span> <span>Piscine & Spa</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>📶</span> <span>Wi-Fi haut débit</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>🚗</span> <span>Parking gratuit</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>🛎️</span> <span>Service 24/7</span>
                        </div>
                    </div>
                </div>

               
                <div class="mt-8 text-center">
                    <a href="liste_hotel.php" class="px-5 py-3 bg-orange-500 text-white rounded-lg text-lg font-semibold transition duration-300 hover:bg-orange-600">
                        ⬅ Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
