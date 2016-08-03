<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Файл не изображение";
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) {
    echo "Файл с таким именем уже есть.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Ваш файл слишком большой";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Только JPG, JPEG, PNG и GIF разрешены";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Неудалось загрузить файл.";
//загрузка файла
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " загружен.";
    } else {
        echo "Неудалось загрузить файл.";
    }
}