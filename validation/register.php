<?php
    if($request == true) {
        if(isset($_POST['register'])) {
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $uname = $_POST['username'];
            $em1 = $_POST['em'];
            $em2 = $_POST['confem'];
            $pass1 = $_POST['pass'];
            $pass2 = $_POST['confpass'];
            $err_array = array();
            
            if($em1 != $em2) {
                array_push($err_array, "Emails are not equal");
            }
            
            if($pass1 != $pass2) {
                array_push($err_array, "Passwords are not equal");
            }
    
            $query1 = "SELECT * FROM users WHERE email = '$em1'";
            $email_exec = mysqli_query($link, $query1);
            $num_email_exec = mysqli_num_rows($email_exec);
    
            if($num_email_exec > 0){
                array_push($err_array, "Email already in use");
            } 
            
            $query2 = "SELECT * FROM users WHERE username = '$uname'";
            $uname_exec = mysqli_query($link, $query1);
            $num_uname_exec = mysqli_num_rows($uname_exec);
            
            if($num_uname_exec > 0) {
                array_push($err_array, "Username already in use");
            }
    
            if(count($err_array) == 0) {
                $password = md5($pass1);
                $query = "INSERT INTO users VALUES('', '$fname', '$lname', '$uname', '$em1', '$password', 'CAHCET', '5106', '', '', 'yes', 'images/users/profilepics/default/default.png', 'images/users/coverpic/default/default.jpg', '', '')";
                $reg_query = mysqli_query($link, $query);
    
                if(!$reg_query) {
                    die("Query Failed !!! " . mysqli_error($link));
                }
                else {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $uname;
                    header("Location: index.php");
                }
            }
        }
    }
    else {
        header("Location: ../reg.php");
    }
?>