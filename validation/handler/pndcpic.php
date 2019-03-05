<?php
    include "../../functions.php";
    
    $uploaded_file = "";

    if(!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../../images/group/profilepics/users" . $file_name;
            $targetPath1 = "../images/group/profilepics/users" . $file_name;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploaded_file = $targetPath1;
            }
        }
    }

    echo $uploaded_file;
?>