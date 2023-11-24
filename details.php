<?php
session_start();
require_once 'components/db_connect.php';

if (isset($_GET['prodID']) && is_numeric($_GET['prodID'])) {
    $animalId = $_GET['prodID'];

    $sql = "SELECT * FROM `animal` WHERE animal_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $animalId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $card = "
                <div class='p-4'>
                    <div class='card w-175'>
                        <img src='{$row['photo']}' class='card-img-top' style='height: 12rem' alt=''>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['name']}</h5>
                            <hr>
                            <p class='card-text'> {$row['location']}</p>
                            <p class='card-text'> Vaccinated: {$row['vaccinated']}</p>
                            <p class='card-text'> Size: {$row['size']}</p>
                            <p class='card-text'> {$row['description']}</p>
                            <p class='card-text'> Age: {$row['age']}</p>
                            <p class='card-text'> Breed: {$row['breed']}</p>
                            <p class='card-text'> Status: {$row['position']}</p>
                            <form action='pet_adoption.php' method='post'>
                                <input type='hidden' name='adopt_me' value='{$row['animal_id']}'>
                                <button type='submit' class='btn btn-outline-primary'>Take me home</button>
                            </form>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            $card = "No data found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        die("SQL statement preparation failed.");
    }
} else {
    die("Invalid prodID.");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'components/navbar.php' ?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 p-4">
            <?= $card; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
