<?php
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["FileToUpload"]["name"]);
    $uploadOk = 1;
error_log(print_r($_FILES, true), 0);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Sprawdzenie czy plik jest rzeczywiscie obrazem
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["FileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Plik nie jest obrazem.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Plik o tej nazwie już istnieje.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["FileToUpload"]["size"] > 500000) {
        echo "Blad, plik ma zbyt duzy rozmiar.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Blad, tylko pliki o formatach JPG, JPEG, PNG & GIF sa dozwolone.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Blad, nie udalo sie wyslac obrazu.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $target_file)) {
            echo "Plik ". basename( $_FILES["FileToUpload"]["name"]). " zostal wyslany.";
        } else {
            echo "Blad, wystapil blad podczas przesylania pliku.";
        }
    }
?>