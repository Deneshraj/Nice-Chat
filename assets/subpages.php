<?php 
    include "../classes/User.php";
    include "../classes/Post.php";
    require "../functions.php";
    include "../classes/Group.php";
?>
<?php $request = true;?>
<?php include("../includes/main_config.php");?>
<?php include "includes/header.php";?>
<?php
    if(isset($_GET['task']) && isset($_GET['source'])) {
        if($_GET['source'] == 'group') {
            $task = $_GET['task'];
            switch($task) {
                case 'create_group':
                    include "includes/creategroup.php";
                    break;
                case 'view_users_group':
                    include "includes/viewusersgroup.php";
                    break;
                default:
                    include "includes/default.php";
                    break;
            }
        }
    }
    else {
        if(isset($_GET['source'])) {
            if($_GET['source'] == 'group') {
                include "includes/default.php";
            }
            if(isset($_GET['group_name'])) {
                $query = mysqli_query($link, "SELECT id FROM groups WHERE group_name = '{$_GET['group_name']}'");
                $row = mysqli_fetch_assoc($query);
                header("Location: group.php?id={$row['id']}");
            }
        }
    }

    include "includes/footer.php";
?>