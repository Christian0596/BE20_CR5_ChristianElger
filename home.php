<?php
session_start();

require_once 'components/db_connect.php';

$sql = "SELECT * FROM `animal`";
$result = mysqli_query($conn, $sql);
$cards = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "
        <div class='p-4'>
            <div class='card w-175'>
                <img src='{$row['photo']}' class='card-img-top' style='height: 12rem' alt=''>
                <div class='card-body'>
                    <h5 class='card-title fw-bold'>{$row['name']}</h5>
                    <hr>
                    <p class='card-text fw-bold'> {$row['location']}</p>
                    <p class='card-text fw-bold'> Age: {$row['age']} years</p>
                    <p class='card-text fw-bold'> Breed: {$row['breed']}</p>
                    <hr>
                    <p class='card-text fw-bold text-warning'> Status: {$row['position']}</p>
                    <a href='details.php?prodID={$row['animal_id']}' class='btn btn-outline-success w-100'>Details</a>
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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require_once 'components/navbar.php' ?>
    <div class="background">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?= $cards; ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
