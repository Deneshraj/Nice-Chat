<?php
    session_start();
    if(isset($_SESSION['login'])) {
        if($_SESSION['login'] != true) {
            header("Location: reg.php?source=login");
        }
        else {
            $username = $_SESSION['username'];
            $user = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
            setcookie('user', $username, time() + (86400 * 30), '/');
            $logged_in_user_obj = new User($link, $username);
            $logged_in_user_obj_post = new Post($link, $username);
            if($logged_in_user_obj->getLogin() != 'yes') {
                $updation = mysqli_query($link, "UPDATE users SET `login` = 'yes' WHERE username = '$username'");
            }

            $profile_pic = $logged_in_user_obj->getProfilePic();
        }
    }
    else {
        $updation = mysqli_query($link, "UPDATE users SET `login` = 'no' WHERE username = '$username'");
        header("Location: reg.php?source=login");
    }

    if(isset($_GET['source'])) {
        if(($_GET['source'] == 'logout') && ($_SESSION['login'] == true)){
            setcookie("user", "", time() - 3600, '/');
            session_unset();
            session_destroy();
            $updation = mysqli_query($link, "UPDATE users SET `login` = 'no' WHERE username = '$username'");
            header("Location: reg.php?source=login");
        }
    }
?>