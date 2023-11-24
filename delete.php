<?php
session_start();

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: adminhome.php");
}

if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

require_once 'components/db_connect.php';

if (isset($_GET["prodID"]) && !empty($_GET["prodID"])) {
    $id = $_GET["prodID"];

    $sqlDeleteAdoptions = "DELETE FROM `pet_adoption` WHERE `pet_number` = $id";
    mysqli_query($conn, $sqlDeleteAdoptions);

    $sqlDeleteAnimal = "DELETE FROM `animal` WHERE `animal_id` = $id";
    mysqli_query($conn, $sqlDeleteAnimal);
}

mysqli_close($conn);
header("Location: adminhome.php");
?>

