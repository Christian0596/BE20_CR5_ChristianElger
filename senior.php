<?php
session_start();
require_once 'components/db_connect.php';

$sql = "SELECT * FROM `animal` WHERE `age` > 8";


$result = mysqli_query($conn, $sql);

$cards = "";


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "
            <div class='p-4'>
                <div class='card w-175'>
                    <img src='$row[photo]' class='card-img-top' style='height: 12rem' alt=''>
                    <div class='card-body'>
                        <h5 class='card-title'>$row[name]</h5>
                        <hr>
                        <p class='card-text'> $row[location]</p>
                        <p class='card-text'> Vaccinated: $row[vaccinated]</p>
                        <p class='card-text'> Size: $row[size]</p>
                        <p class='card-text'> $row[description]</p>
                        <p class='card-text'> Age: $row[age]</p>
                        <p class='card-text'> Breed: $row[breed]</p>
                        <p class='card-text'> Status: $row[position]</p>
                    </div>
                </div>
            </div>
        ";
    }
} else {

    $cards = "No data found.";
}


mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="background">
    <?php require_once 'components/navbar.php' ?>
    <div class="container">
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?= $cards; ?>
        </div>
        <p class="text-white">In the heartwarming world of pet adoption, consider the often-overlooked joy of welcoming a sweet,
    old pet into your home. These gentle souls, filled with wisdom and unconditional love, offer a unique and heartening companionship.
    With their settled temperament and moderate energy levels, senior pets seamlessly adapt to their new homes, creating an instant bond.
    By adopting a sweet, old pet, you're not just providing a forever home 
    you're offering a deserving soul the chance to spend their golden years surrounded by love and warmth. Embrace the timeless love of a
    senior pet and discover the joy of making a difference in their life.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
