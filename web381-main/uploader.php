<?php
require 'connect.php';

function canUpload($file){
    $allowed = [
        'jpg' => 'image/jpeg',// image/jpeg
        'png' => 'image/png',
    ];

    $maxFileSize = 1024 * 1024;

    $fileMimeType = mime_content_type($file['tmp_name']);
    $fileSize = $file['size'];

    if(!in_array($fileMimeType, $allowed)){
        return'file type is not allowed';
    }

    if($fileSize > $maxFileSize){
        return'File size is not allowed';
    }
    return true;
}


if($_SERVER['REQUEST_METHOD'] = 'POST'){

    $name = $description = $price ='';

    if (empty($_POST['name'])) {
        $nameError = 'Service name should be filled';
    } else {
        $name = trim(htmlspecialchars($_POST['name']));
    }

    if (empty($_POST['description'])) {
        $desError = 'Service description should be filled';
    } else {
        $description = trim(htmlspecialchars($_POST['description']));
    }

    if (empty($_POST['price'])) {
        $priceError = 'Service price should be filled';
    } else {
        $price = trim(htmlspecialchars($_POST['price']));
    }

    if(isset($_FILES['image']) && $_FILES['image']['error'] ==0){
        $canUpload = canUpload($_FILES['image']);

        if($canUpload ===true){

            $fileName = time().$_FILES['image']['name'];
            move_uploaded_file($_FILES['document'],'/'.$fileName);
        }

    }

}
