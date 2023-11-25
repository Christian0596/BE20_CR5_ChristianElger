<?php
session_start();
require_once 'components/db_connect.php';

$card = '';

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
                $card .= "
                <div class='detail-card'>
                    <div>
                        <img src='{$row['photo']}' id='zoomImage'>
                        <div class='card-body'>
                            <h5 class='text-center'>{$row['name']}</h5>
                            <hr>
                            <p> {$row['location']}</p>
                            <p> Vaccinated: {$row['vaccinated']}</p>
                            <p> Size: {$row['size']}</p>
                            <p> {$row['description']}</p>
                            <p> Age: {$row['age']}</p>
                            <p> Breed: {$row['breed']}</p>
                            <p> Status: {$row['position']}</p>";

                if (isset($_SESSION['user']) || isset($_SESSION['adm'])) {
                    $card .= "
                            <form action='pet_adoption.php' method='post'>
                                <input type='hidden' name='adopt_me' value='{$row['animal_id']}'>
                                <button type='submit' class='btn btn-outline-primary w-100'>Take me home</button>
                            </form>";
                }

                $card .= "
                        </div>
                    </div>
                </div>";
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
    <link rel="stylesheet" href="style.css">
</head>
<body class="background">
    <?php require_once 'components/navbar.php' ?>
    <div class="container text-white">
        
            <?= $card; ?>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.getElementById('zoomImage').addEventListener('click', function () {
            this.style.transform = 'scale(1.5)';
        });
    </script>
</body>
</html>
