<?php
    if(isset($request)) {
        if($request == true) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/reg.css?date=<?php echo date('Y-m-d H:i:s');?>">
    <link rel="stylesheet" href="../styles/main.css?date=<?php echo date('Y-m-d H:i:s');?>" />
    <link rel="stylesheet" href="stylesheet/main.css?date=<?php echo date('Y-m-d H:i:s');?>" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"> </script>
    <title>CAHCET Corner</title>
</head>
<body>
    <div class="mnds">
        <nav class="navbar navbar-fixed" id="nav">
            <li class="logo"><a href="../index.php">Nice Chat</a></li>
            <ul class="right">
                <form action="?source=group" autocomplete="off" method="GET" class="fle">
                    <div class="ip-gr">
                        <input type="text" name="group_name" id="search" placeholder="Search Group" />
                        <button type="submit" name="source" value="group"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <li><img src="../<?php echo $profile_pic?>" class="img" /></li>
                <li><a href="profile.php?id=<?php $logged_in_user_obj->getId(); ?>"><?php echo "$username";?></a></li>
                <li><a href="#"><i class="fas fa-home"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                <li><a href="#"><i class="fas fa-user-friends"></i></a></li>
                <li><a href="#"><i class="fas fa-cog"></i></a></li>
                <li><a href="../index.php?source=logout"><i class="fas fa-power-off" alt="logout"></i></a></li>
            </ul>
        </nav>

<?php
        }
    }
    else {
        header("Location: ../../index.php");
    }
?>