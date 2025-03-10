<?php

  include_once "connexion.php";

  $id= $_GET['id'];

  $req = mysqli_query($con , "DELETE FROM hotels WHERE id = $id");

  header("Location:liste_hotel.php")
?>