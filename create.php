<?php
session_start();

require_once 'components/db_connect.php';
require_once './components/fileUpload.php';

$options = "";

$sql = "SELECT * FROM `animal`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
}

if (isset($_POST["submit"])) {
    $petname = $_POST["name"];
    $picture =fileUpload($_FILES["photo"]);
    $place = $_POST["location"];
    $description = $_POST["desctription"];
    $size = $_POST["size"];
    $age = $_POST["age"];
    $vaccine = $_POST["vaccinated"];
    $breed = $_POST["breed"];
    $position = $_POST["position"];
   
    
    $sql = "INSERT INTO `animal`(`name`, `photo`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `position`) VALUES ('$petname','$picture[0]','$place','$description','$size','$age','$vaccine','$breed','$position')";
    if(mysqli_query($conn, $sql)){
        echo"
        <div class = 'alert alert-success' role= 'alert'>
        All good, file was created !
        </div>
        ";
    }
    else{
        echo "
        <div class = 'alert alert-danger' role= 'alert'>
        Not good, file was not created !
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Create</title>
   
</head>
<body>
    <?php require_once 'components/navbar.php' ?>
    <div class="background-container bg-info text-white">
        <div class="container p-4">
            <form action="" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <h1 class="center-text">Add a new pet</h1>
                    <div class="col-md-6 offset-md-3 text-center">
                        <input type="text" name="name" placeholder="Write a pet name" class="form-control mb-3">
                        <input type="text" name="location" placeholder="Where is the Adress?" class="form-control mb-3">
                        <input type="text" name="desctription" placeholder="Write a short pet desctription" class="form-control mb-3">
                        <input type="text" name="size" placeholder="size?" class="form-control mb-3">
                        <input type="file" name="photo" placeholder="Add a pet picture" class="form-control mb-3">
                        <input type="text" name="age" placeholder="Add the age " class="form-control mb-3">
                        <input type="text" name="vaccinated" placeholder="vaccinated?" class="form-control mb-3">
                        <input type="text" name="breed" placeholder="breed?" class="form-control mb-3">
                        <input type="text" name="position" placeholder="position" class="form-control mb-3">

                        <input type="submit" name="submit" value="Create" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
