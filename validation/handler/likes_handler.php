<?php

include "../../functions.php";

$like = $_REQUEST['like'];
$id = $_REQUEST['id'];
$username = $_REQUEST['username'];

$like_response = like($id, $like, $username);
echo $like_response;
?>