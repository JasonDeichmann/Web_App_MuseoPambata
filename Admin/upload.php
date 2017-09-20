<?php

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0 AND isset($_FILES["artPhoto"]) && $_FILES["artPhoto"]["error"] == 0  ){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "pdf" => "application/pdf", "png" => "image/png");
        $filename1 = $_FILES["photo"]["name"];
        $filetype1 = $_FILES["photo"]["type"];
        $filesize1 = $_FILES["photo"]["size"];
        $filename2 = $_FILES["artPhoto"]["name"];
        $filetype2 = $_FILES["artPhoto"]["type"];
        $filesize2 = $_FILES["artPhoto"]["size"];


        if(in_array($filetype1, $allowed) AND in_array($filetype2, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $_FILES["photo"]["name"]) OR file_exists("uploads/" . $_FILES["artPhoto"]["name"])){
            } else{

                $image1 = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                $image_name1 = addslashes($_FILES['photo']['name']);

                $image2 = addslashes(file_get_contents($_FILES['artPhoto']['tmp_name']));
                $image_name2 = addslashes($_FILES['artPhoto']['name']);

                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $_FILES["photo"]["name"]);
                move_uploaded_file($_FILES["artPhoto"]["tmp_name"], "uploads/" . $_FILES["artPhoto"]["name"]);
                return 1;
            }
        } else{
            return 0;
        }
    } else{
        return 0;
    }
}
?>
