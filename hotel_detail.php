<?php
include_once "config.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $requete = mysqli_query($con, "SELECT * FROM hotels WHERE id = $id");

    if (mysqli_num_rows($requete) > 0) {
        $row = mysqli_fetch_assoc($requete);
    } else {
        echo "<p class='text-red-500 text-xl'>Hôtel non trouvé.</p>";
        exit;
    }
} else {
    echo "<p class='text-red-500 text-xl'>ID d'hôtel invalide.</p>";
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
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-5">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <img class="w-full h-60 object-cover" 
                 src="http://localhost/Red_product/assiets/image_bd/<?php echo htmlspecialchars($row['photo']); ?>" 
                 alt="Image de l'hôtel">
            <div class="p-5">
                <h1 class="text-2xl font-bold"><?php echo htmlspecialchars($row['nom_hotel']); ?></h1>
                <p class="text-gray-500"><?php echo htmlspecialchars($row['adresse']); ?></p>
                <p class="text-lg font-semibold mt-2"><?php echo number_format($row['tarif'], 0, ',', ' ') . ' ' . htmlspecialchars($row['devise']); ?> par nuit</p>
                <p class="mt-3 text-gray-700"><?php echo nl2br(htmlspecialchars($row['email_hotel'])); ?></p>
                <a href="liste_hotel.php" class="inline-block mt-4 px-4 py-2 bg-orange-500 text-white rounded-lg text-sm">Retour</a>
            </div>
        </div>
    </div>
</body>
</html>
