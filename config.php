<?php

$con = mysqli_connect("localhost", "root", "", "bd_product_red");

if (!$con) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}


mysqli_set_charset($con, "utf8");

?>
