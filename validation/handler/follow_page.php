<?php
    include "../../functions.php";

    $like = $_REQUEST['like'];
    $id = $_REQUEST['id'];
    $username = $_REQUEST['username'];
    $check = $_REQUEST['check'];
    
    if($check == 'false') {
        $follow_response = follow_page($id, $like, $username);
    }
    else if($check == 'true') {
        $follow_response = check_followed_by($id, $username);
    }

    echo $follow_response;
?>