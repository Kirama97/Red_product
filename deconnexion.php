
<?php
session_start();

if (!isset($_SESSION['nom'])) {
    header("Location: connexion.php");
    exit();
}


session_unset(); 
session_destroy(); 

header("Location: connexion.php");
exit();
?>
