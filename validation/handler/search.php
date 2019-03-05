<?php
    include "../../functions.php";
    
    if(isset($_POST['query']) && isset($_POST['val'])) {
        $query = $_POST['query'];
        $val = $_POST['val'];

        $val = strtolower($val);
        $sql = mysqli_query($link, "SELECT * FROM table WHERE LOWER(group_name) LIKE '{$val}%'");

    }

    echo json_encode($a_json);    
?>
