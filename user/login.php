<?php
    session_start();

    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){
        header("Location: home.php");
    }

    require_once '../components/db_connect.php';
    require_once '../components/clean.php';

    $emailError = "";
    $passError = "";

    if(isset($_POST["login"])){
        $email = clean($_POST["email"]);
        $pass = clean($_POST["password"]);
        $error = false;

        if(empty($email)){
            $error = true;
            $emailError = "Email cannot be empty.";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Email has the wrong format.";
        }

        if(empty($pass)){
            $error = true;
            $passError = "Password cannot be empty.";
        }

        if(!$error){
            $pass = hash("sha256", $pass);

            $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row["status"] === "user"){
                    $_SESSION["user"] = $row["user_id"];
                    header("Location: ../home.php");
                }
                elseif($row["status"] === "adm"){
                    $_SESSION["adm"] = $row["user_id"];
                    header("Location: ../home.php");
                }
            }
            else{
                echo "
                <div class='alert alert-danger' role='alert'>
                    Either Username or password is wrong!
                </div>";
            }
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php require_once '../components/navbar.php' ?>

    <div class="container">
        <form action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
            <label>
                Email:
                <input type="email" name="email" class="form-control" value="<?= $email??""; ?>">
                <span><?= $emailError; ?></span>
            </label>
            <label>
                Password:
                <input type="password" name="password" class="form-control">
                <span><?= $passError; ?></span>
            </label>
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>