<?php
include_once("database.php");
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

    $id=$_POST['id'];
    $con_fname=$_POST['con_fname'];
    $con_lname=$_POST['con_lname'];
    $con_email=$_POST['con_email']; 
    $con_phone=$_POST['con_phone'];    
    $temp_img=$_FILES["fileToUpload"]["tmp_name"];
    DataBase::ExecuteQueryReturnID("update contact_tbl set con_fname='$con_fname',con_lname='$con_lname',con_email='$con_email',con_phone='$con_phone',con_image='$temp_img' 
    where id=$id ");
    


    $dir = "uploadImg/";
    $target_file = $dir . $id.".jpg";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        header("Location:listing.php");
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    
    // process the form
}

?>