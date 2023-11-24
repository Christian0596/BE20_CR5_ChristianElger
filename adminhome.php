<?php
session_start();

require_once 'components/db_connect.php';

$sql = "SELECT * FROM `animal`";
$result = mysqli_query($conn, $sql);
$cards = "";
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $cards .= "
        <div class='p-4'>
        <div class='card w-175'>
        
          <img src='$row[photo]' class='card-img-top' style='height: 12rem' alt=''>
          <div class='card-body'>
            <h5 class='card-title'>$row[name]</h5>
            <hr>
            <p class='card-text'> $row[location]
            <p class='card-text'> Vaccinated: $row[vaccinated]</p>
            <p class='card-text'> Size: $row[size]</p>
            <p class='card-text'> $row[description]</p>
            <p class='card-text'> Age: $row[age]</p>
            <p class='card-text'> Bread: $row[breed]</p>
            <p class='card-text'> Status: $row[position]</p>
            <a href='cardupdate.php?prodID=$row[animal_id]' class='btn btn-outline-dark'>Update</a>
            <a href='delete.php?prodID=$row[animal_id]' class='btn btn-outline-dark'>Delete</a>
          </div>
          </div>
          </div>
            ";
        }
    }
    else{
        $cards = "no data found.";
    }
    mysqli_close($conn);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body>
  
<?php require_once 'components/navbar.php' ?>
<div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?= $cards; ?>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>