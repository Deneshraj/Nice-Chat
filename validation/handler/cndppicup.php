<?php
    include "../../functions.php";

    $location = (string) $_POST['location'];
    $id = (int) $_POST['id'];
    
    $query_exec = mysqli_query($link, "UPDATE groups SET group_cover_pic = '{$location}' WHERE id = {$id}");
    if(!$query_exec) {
        echo "QUERY FAILED";
    }
    else {
        echo "Location: " . $location ;
    }

?>