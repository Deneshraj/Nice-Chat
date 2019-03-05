<?php

include "../../functions.php";

$unlike = $_REQUEST['unlike'];
$id = $_REQUEST['id'];
$username = $_REQUEST['username'];

$unlike_response = unlike($id, $unlike, $username);
echo $unlike_response;
?>