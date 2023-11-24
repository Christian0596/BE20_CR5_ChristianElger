<?php
session_start();

if ((!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) || isset($_SESSION["user"])) {
    header("Location: home.php");
}

require_once 'components/db_connect.php';
require_once 'components/fileUpload.php';

$sql = "SELECT * FROM `animal` WHERE animal_id = $_GET[prodID]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])) {
        $petname = $_POST["name"];
        $picture =fileUpload($_FILES["photo"]);
        $place = $_POST["location"];
        $description = $_POST["description"];
        $size = $_POST["size"];
        $age = $_POST["age"];
        $vaccine = $_POST["vaccinated"];
        $breed = $_POST["breed"];
        $position = $_POST["position"];
    
    $sql = "UPDATE `animal` SET `name`='$petname',`photo`='$picture[0]',`location`='$place',`description`='$description',`size`='$size',`age`='$age',`vaccinated`='$vaccine',`breed`='$breed',`position`='$position'WHERE `animal_id` = $_GET[prodID]";
    if(mysqli_query($conn, $sql)){
        echo"
        <div class = 'alert alert-success' role= 'alert'>
        All good, file was updated!
        </div>
        ";
    }
    else{
        echo "
        <div class = 'alert alert-danger' role= 'alert'>
        Not good, file was not updated !
        </div>
        ";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php require_once 'components/navbar.php' ?>
    <div class="background-container">
        <div class="container p-4">
            <form action="" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <h1 class="center-text">Add a file</h1>
                    <div class="col-md-6 offset-md-3 text-center">
                        <input type="text" name="name" placeholder="Write a pet name" class="form-control mb-3" value="<?= $row["name"]; ?>">
                        <input type="text" name="location" placeholder="Where is the Adress?" class="form-control mb-3"value="<?= $row["location"]; ?>">
                        <input type="text" name="description" placeholder="Write a short pet description" class="form-control mb-3" value="<?= $row["description"]; ?>">
                        <input type="text" name="size" placeholder="size?" class="form-control mb-3"value="<?= $row["size"]; ?>">
                        <input type="file" name="photo" placeholder="Add a pet picture" class="form-control mb-3"value="<?= $row["photo"]; ?>">
                        <input type="text" name="age" placeholder="Add the age " class="form-control mb-3"value="<?= $row["age"]; ?>">
                        <input type="text" name="vaccinated" placeholder="vaccinated?" class="form-control mb-3"value="<?= $row["vaccinated"]; ?>">
                        <input type="text" name="breed" placeholder="breed?" class="form-control mb-3"value="<?= $row["breed"]; ?>">
                        <input type="text" name="position" placeholder="position" class="form-control mb-3"value="<?= $row["position"]; ?>">

                        <input type="submit" name="submit" value="create" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
