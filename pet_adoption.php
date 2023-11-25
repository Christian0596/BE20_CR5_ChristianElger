<?php
session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION["user"])) {

    if (isset($_POST["adopt_me"])) {
        $date = date("Y-m-d");
        $animal_id = $_POST["adopt_me"];
        $user_id = $_SESSION["user"];

        $sql = "INSERT INTO `pet_adoption` (`user_number`, `pet_number`, `adoption_date`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "iss", $user_id, $animal_id, $date);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            echo "<html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Congratulations</title>
                <style>
                    body {
                        background-color: green;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100vh;
                        margin: 0;
                    }
                    h1 {
                        color: white;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <h1>Congratulations! You've helped give an animal a happy life!</h1>
            </body>
        </html>";
    header("refresh:4;url=/home.php");

    exit();

        } else {
            echo "Error: Please connect with our customer service." . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM `animal` LEFT JOIN `pet_adoption` ON animal.animal_id = pet_adoption.pet_number AND pet_adoption.user_number = {$_SESSION['user']} LEFT JOIN `users` ON pet_adoption.user_number = users.user_id";
    $result = mysqli_query($conn, $sql);
    $card = "";

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $card .= "
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
                            <form method='post'>
                                <input type='hidden' name='adopt_me' value='{$row['animal_id']}'>
                                <input type='submit' name='adopt' value='Bring at Home' class='btn btn-outline-primary'>
                            </form>
                        </div>
                    </div>
                </div>
            ";
        }
    } else {
        $card = "No data found.";
    }

    mysqli_free_result($result);
} else {
    header("Location: /home.php");
    die();
}

mysqli_close($conn);
?>