<?php
$id = $_POST['id'];
$basename = basename($id);
$filesize_kb = $_POST['filesize_kb'];

if($id != '') {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileUpload"]["size"] > 500000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";
            
            //lakukan upload ke database menggunakan $id
            

// tutup koneksi
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
//kembalikan ke halaman sebelumnya
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();

?>