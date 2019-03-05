<?php
    if($request == true) {
        if(isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $error_arr = array();

            $query = "SELECT * FROM users WHERE email = '$email'";
            $selection_query = mysqli_query($link, $query);
            $username = "";

            if(mysqli_num_rows($selection_query) > 0) {
                $row = mysqli_fetch_assoc($selection_query);
                $pass = md5($password);

                if($pass != $row['password']) {
                    array_push($error_arr, "Incorrect Email or Password");
                }
                else {
                    $username = $row['username'];
                }
            }
            else {
                array_push($error_arr, "No users found with this email");   
            }

            if(count($error_arr) == 0) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
                header("Location: index.php");
            }

        }          
    }
    else {
        header("Location: ../reg.php");
    }
?>