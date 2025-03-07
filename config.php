<?php

$con = mysqli_connect("localhost", "root", "", "bd_product_red");

if (!$con) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}


mysqli_set_charset($con, "utf8");










$result = mysqli_query($con, "SELECT COUNT(*) AS total FROM user");
$data = mysqli_fetch_assoc($result);
$nombre_user = $data['total'];


$result = mysqli_query($con, "SELECT COUNT(*) AS total FROM hotels");
$data = mysqli_fetch_assoc($result);
$nombre_hotels = $data['total'];

$result = mysqli_query($con, "SELECT COUNT(*) AS total FROM messages ");
$data = mysqli_fetch_assoc($result);
$nombre_message = $data['total'];




?>
