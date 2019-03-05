<?php
    ob_start();
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "mail";

    $link = mysqli_connect($host, $user, $password, $db);

    function like($id, $like, $username) {
        global $link;
        $query = mysqli_query($link, "SELECT likes, unliked_by, liked_by, unlikes FROM group_posts WHERE id = $id");
        $row = mysqli_fetch_assoc($query);
        $result = 0;
        $likes = $row['likes'];
        $unlikes = $row['unlikes'];
        $liked_by = $row['liked_by'];
        $unliked_by = $row['unliked_by'];
        $liked_by_user = "," . $username . ",";
        if(strstr($liked_by, $liked_by_user)) {
            $new_likes = $likes - $like;
            $query = mysqli_query($link, "UPDATE group_posts SET likes = $new_likes WHERE id = $id");
            $liked_by_str = str_replace($liked_by_user, "", $liked_by);
            $query = mysqli_query($link, "UPDATE group_posts SET liked_by = '{$liked_by_str}' WHERE id = $id");
            $result = 2;
        }

        else {
            if(strstr($unliked_by, $liked_by_user)) {
                $new_unlikes = $unlikes - $like;
                $query = mysqli_query($link, "UPDATE group_posts SET unlikes = $new_unlikes WHERE id = $id");
                $unliked_by_str = str_replace($liked_by_user, "", $unliked_by);
                $query = mysqli_query($link, "UPDATE group_posts SET unliked_by = '{$unliked_by_str}' WHERE id = $id");
                
                $new_likes = $likes + $like;
                $query = mysqli_query($link, "UPDATE group_posts SET likes = $new_likes WHERE id = $id");
                $liked_by_str = $liked_by . $liked_by_user;
                $query = mysqli_query($link, "UPDATE group_posts SET liked_by = '{$liked_by_str}' WHERE id = $id");
                $result = 3;
            }
            else {
                $new_likes = $likes + $like;
                $query = mysqli_query($link, "UPDATE group_posts SET likes = $new_likes WHERE id = $id");
                $liked_by_str = $liked_by . $liked_by_user;
                $query = mysqli_query($link, "UPDATE group_posts SET liked_by = '{$liked_by_str}' WHERE id = $id");
                $result = 1;
            }
        }       

        if(!$query) {
            return $result;
        }
        else {
            return $result;
        }
    }

    function unlike($id, $unlike, $username) {
        global $link;
        $query = mysqli_query($link, "SELECT likes, unliked_by, liked_by, unlikes FROM group_posts WHERE id = $id");
        $row = mysqli_fetch_assoc($query);
        $result = 0;
        $likes = $row['likes'];
        $unlikes = $row['unlikes'];
        $liked_by = $row['liked_by'];
        $unliked_by = $row['unliked_by'];
        $unliked_by_user = "," . $username . ",";
        if(strstr($unliked_by, $unliked_by_user)) {
            $new_unlikes = $unlikes - $unlike;
            $query = mysqli_query($link, "UPDATE group_posts SET unlikes = $new_unlikes WHERE id = $id");
            $unliked_by_str = str_replace($unliked_by_user, "", $unliked_by);
            $query = mysqli_query($link, "UPDATE group_posts SET unliked_by = '{$unliked_by_str}' WHERE id = $id");
            $result = 2;
        }
        
        else {
            if(strstr($liked_by, $unliked_by_user)) {
                $new_likes = $likes - $unlike;
                $query = mysqli_query($link, "UPDATE group_posts SET likes = $new_likes WHERE id = $id");
                $liked_by_str = str_replace($unliked_by_user, "", $liked_by);
                $query = mysqli_query($link, "UPDATE group_posts SET liked_by = '{$liked_by_str}' WHERE id = $id");
                
                $new_unlikes = $unlikes + $unlike;
                $query = mysqli_query($link, "UPDATE group_posts SET unlikes = $new_unlikes WHERE id = $id");
                $unliked_by_str = $unliked_by . $unliked_by_user;
                $query = mysqli_query($link, "UPDATE group_posts SET unliked_by = '{$unliked_by_str}' WHERE id = $id");
                $result = 3;
            }
            else {
                $new_unlikes = $unlikes + $unlike;
                $query = mysqli_query($link, "UPDATE group_posts SET unlikes = $new_unlikes WHERE id = $id");
                $unliked_by_str = $unliked_by . $unliked_by_user;
                $query = mysqli_query($link, "UPDATE group_posts SET unliked_by = '{$unliked_by_str}' WHERE id = $id");
                $result = 1;
            }
        }       

        if(!$query) {
            return $result;
        }
        else {
            return $result;
        }
    }

    function follow_page($id, $like, $username) {
        global $link;
        $query = mysqli_query($link, "SELECT * FROM groups WHERE id = $id");
        $query1 = mysqli_query($link, "SELECT groups FROM users WHERE username = '{$username}'");
        $row = mysqli_fetch_assoc($query);
        $row1 = mysqli_fetch_assoc($query1);
        $username_to_check = "," . $username . ",";
        $group_name = "," . $row['group_name'] . ",";
        if(strstr($row['followers'], $username_to_check)) {
            $new_likes = $row['follows'] - $like;
            $new_followers = str_replace($username_to_check, '', $row['followers']);
            $query = mysqli_query($link, "UPDATE groups set follows = {$new_likes}  WHERE id = $id");
            $query = mysqli_query($link, "UPDATE groups set likes = {$new_likes} WHERE id = $id");
            $query = mysqli_query($link, "UPDATE groups set followers = '{$new_followers}' WHERE id = $id");
            $new_groups = str_replace($group_name, "", $row1['groups']);    
            $query1 = mysqli_query($link, "UPDATE users SET groups = '{$new_groups}' WHERE username = '{$username}'");
            return false;
        }
        else {
            $new_likes = $row['follows'] + $like;
            $new_followers = $row['followers'] . $username_to_check;
            $query = mysqli_query($link, "UPDATE groups set follows = {$new_likes}, likes = {$new_likes}, followers = '{$new_followers}' WHERE id = $id");
            $new_groups = $row1['groups'] . $group_name;
            $query1 = mysqli_query($link, "UPDATE users SET groups = '{$new_groups}' WHERE username = '{$username}'");
            return true;
        }
    }

    function check_followed_by($id, $username) {
        global $link;
        $query = mysqli_query($link, "SELECT follows, likes, followers FROM groups WHERE id = $id");
        $row = mysqli_fetch_assoc($query);
        $username_to_check = "," . $username . ",";
        if(strstr($row['followers'], $username_to_check)) {
            return true;
        }
        else {
            return false;
        }
    }

?>