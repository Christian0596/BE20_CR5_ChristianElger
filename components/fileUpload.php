<?php

function fileUpload($picture, $source = "user") {
    $uploadDirectory = "../assets/";

    if (!isset($picture) || $picture["error"] == 4) {
        $pictureName = "https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331256_1280.png";
        if ($source == "https://cdn.pixabay.com/photo/2017/11/10/05/46/group-2935521_1280.png") {
            $pictureName = "product.png";
        }
        $message = "No picture has been chosen, but you can upload an image later :)";
    } else {
        $checkIfImage = getimagesize($picture["tmp_name"]);
        $message = $checkIfImage ? "Ok" : "Not an image";
    }
   
    if ($message == "Ok") {
        $ext = strtolower(pathinfo($picture["name"], PATHINFO_EXTENSION));
        $pictureName = uniqid("") . "." . $ext; 
        $destination = $uploadDirectory . $pictureName;

      
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

      
        if (move_uploaded_file($picture["tmp_name"], $destination)) {
            $message = "Upload successful";
        } else {
            $message = "Failed to move the uploaded file";
        }
    }

    return [$pictureName ?? null, $message];
}

?>
