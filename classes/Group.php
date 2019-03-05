<?php

    class CreateGroup {
        private $group_name;
        private $con;
        private $row;

        public function __construct($con, $group_name, $group_name_by_user, $group_type, $group_desc, $username, $uid, $groups) {
            $this->group_name = $group_name;
            $this->con = $con;
            $groups = '';
            $group_id = '';
            if($groups == '' || $groups == ',') {
                $groups = ',' . $this->group_name . ',';
            }

            else {
                $groups .= ',' . $this->group_name . ',';
            }

            $query = mysqli_query($this->con, "UPDATE users SET groups = '{$groups}' WHERE id = {$uid}");
            $query = "INSERT INTO groups VALUES('', '{$this->group_name}', '{$group_name_by_user}', '{$group_type}', '{$group_desc}', ',{$username},', ',{$username},', '../images/group/profilepics/default/default.jpg', '../images/group/cover_photo/defaults/default.jpg', '1', '1', ',{$username},')";
            $insert = mysqli_query($this->con, $query);
            if(!$insert) {
                die("Query Failed!!! " . mysqli_error($this->con));
            }
            $this->row = mysqli_fetch_assoc(mysqli_query($this->con, "SELECT * FROM groups WHERE group_name = '{$this->group_name}'"));
            if($this->row['group_id'] == '' || $$this->row['group_id'] == ',') {
                $group_id = ',' . $this->row['group_id'] . ',';
            }
            else {
                $group_id .= ',' . $this->row['group_id'] . ',';                
            }

            $query = mysqli_query($this->con, "UPDATE users SET group_id = '{$group_id}' WHERE id = {$uid}");
        }

        public function getId() {
            return $this->row['id'];
        }

        public function getGroupName() {
            return $this->row['group_name'];
        }

        public function getGroupType() {
            return $this->row['group_type'];
        }

        public function getGroupDesc() {
            return $this->row['group_desc'];
        }

        public function getGroupAdmin() {
            return $this->row['group_admin'];
        }

        public function getGroupMembers() {
            return $this->row['group_members'];
        }
        
        public function getGroupProfilePic() {
            return $this->row['group_profile_pic'];
        }


        public function getGroupCoverPic() {
            return $this->row['group_cover_pic'];
        }

        public function getFollows() {
            return $this->row['follows'];
        }

        public function getLikes() {
            return $this->row['likes'];
        }

        public function getFollowers() {
            return $this->row['followers'];
        }

        public function isAdmin($name) {
            $name = ',' . $name . ','; 
            if($this->row['group_admin'] == $name) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    class Group {
        private $con;
        private $group_id;
        private $row;
        private $username_obj;

        public function __construct($con, $group_id, $username) {
            $this->con  = $con;
            $this->group_id = $group_id;
            $this->row = mysqli_fetch_assoc(mysqli_query($this->con, "SELECT * FROM groups WHERE id = {$this->group_id}"));
            $this->username_obj = new User($this->con, $username);
        }

        public function getId() {
            return $this->row['id'];
        }

        public function getGroupName() {
            return $this->row['group_name'];
        }

        public function getGroupType() {
            return $this->row['group_type'];
        }

        public function getGroupDesc() {
            return $this->row['group_desc'];
        }

        public function getGroupAdmin() {
            return $this->row['group_admin'];
        }

        public function getGroupMembers() {
            return $this->row['group_members'];
        }

        public function getGroupProfilePic() {
            return $this->row['group_profile_pic'];
        }


        public function getGroupCoverPic() {
            return $this->row['group_cover_pic'];
        }

        public function getFollows() {
            return $this->row['follows'];
        }

        public function getLikes() {
            return $this->row['likes'];
        }

        public function getFollowers() {
            return $this->row['followers'];
        }

        public function isAdmin($name) {
            $name = ',' . $name . ','; 
            if($this->row['group_admin'] == $name) {
                return true;
            }
            else {
                return false;
            }
        }

        public function displayFollowers() {
            $followers = $this->getFollowers();
            $followersArray = explode(',', $followers);
            $str = "<div class='obvre'>
            ";
            foreach($followersArray as $i) {
                if($i == "") {
                    continue;
                }
                else {
                    $str .= " <div class='verkj'>
                        <a href='#'>" . $i . "</a>
                        <a href='#'><i class='fas fa-graduation-cap ciu'></i>Make group Admin</a>
                        <a href='#'><i class='fas fa-user-slash ciu'></i>Ban</i></a>
                    </div>";
                }
            }
            $str .= "</div>";

            return $str;
        }

        public function post($id, $group_post_body, $posted_by, $tags, $image_name) {
            $query = mysqli_query($this->con, "INSERT INTO group_posts VALUES('', '{$id}', '{$group_post_body}', '{$posted_by}', '{$tags}', '{$image_name}', '0', '0', '', '', '0')");
            if(!$query) {
                return false;
            }
            else {
                return true;
            }
        }

        public function displayGroupPosts() {
            $query = mysqli_query($this->con, "SELECT * FROM group_posts WHERE group_id = {$this->row['id']}");

            $str = "";
            while($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $comments = $row['comments'];
                $str_like = "";
                $username = $this->username_obj->getUserName();
                $liked_by = $row['liked_by'];
                $unliked_by = $row['unliked_by'];
                $liked_by_user = "," . $username . ",";
                $comments_str = "<a href = 'group_posts.php?post_id={$id}&id={$this->row['id']}' class='_cyv'>Comments($comments)</a>";
                if(strstr($liked_by, $liked_by_user)) {
                    $str_like = "<div class='mevih'>
                    <button onclick='lk($id)' class='slfn act' id='lkbtn$id'>Like <i class='far fa-heart'></i></button>
                    <button onclick='unlk($id)' class='slfn' id='unlkbtn$id'>UnLike <i class='fas fa-heart-broken'></i></button>
                    " . $comments_str . "
                    </div>";
                }
                else if(strstr($unliked_by, $liked_by_user)) {
                    $str_like = "<div class='mevih'>
                    <button onclick='lk($id)' class='slfn' id='lkbtn$id'>Like <i class='far fa-heart'></i></button>
                    <button onclick='unlk($id)' class='slfn act' id='unlkbtn$id'>UnLike <i class='fas fa-heart-broken'></i></button>
                    " . $comments_str . "
                    </div>";
                }
                else {
                    $str_like = "<div class='mevih'>
                    <button onclick='lk($id)' class='slfn' id='lkbtn$id'>Like <i class='far fa-heart'></i></button>
                    <button onclick='unlk($id)' class='slfn' id='unlkbtn$id'>UnLike <i class='fas fa-heart-broken'></i></button>
                    " . $comments_str . "
                    </div>";
                }

                $str .= "<div class='jksdn'>
                            <div class='skjb'>
                                <img src='{$this->getGroupProfilePic()}' class='kjbd' />
                                <a href='http://localhost/mail/assets/group.php?id={$this->row['id']}'>{$this->row['group_name']}</a>        
                            </div>
                            <div class='pstbdy'>
                                <p>{$row['group_post_body']}</p>
                                <img src='{$row['post_image']}' />
                            " . $str_like . "
                            </div>
                        </div>";
            }

            return $str;
        }

        public function displayGroupPost($post_id) {
            $post_query = mysqli_query($this->con, "SELECT * FROM group_posts WHERE id = {$post_id}");
            $row = mysqli_fetch_assoc($post_query);

            $str = "";
            $id = $row['id'];
            $comments = $row['comments'];
            $str_like = "";
            $username = $this->username_obj->getUserName();
            $liked_by = $row['liked_by'];
            $unliked_by = $row['unliked_by'];
            $liked_by_user = "," . $username . ",";
            $comments_str = "<a href = 'group_posts.php?post_id={$id}&id={$this->row['id']}' class='_cyv'>Comments($comments)</a>";
            if(strstr($liked_by, $liked_by_user)) {
                $str_like = "<div class='mevih'>
                <button onclick='lk($id)' class='slfn act' id='lkbtn$id'>Like <i class='far fa-heart'></i></button>
                <button onclick='unlk($id)' class='slfn' id='unlkbtn$id'>UnLike <i class='fas fa-heart-broken'></i></button>
                " . $comments_str . "
                </div>";
            }
            else if(strstr($unliked_by, $liked_by_user)) {
                $str_like = "<div class='mevih'>
                <button onclick='lk($id)' class='slfn' id='lkbtn$id'>Like <i class='far fa-heart'></i></button>
                <button onclick='unlk($id)' class='slfn act' id='unlkbtn$id'>UnLike <i class='fas fa-heart-broken'></i></button>
                " . $comments_str . "
                </div>";
            }
            else {
                $str_like = "<div class='mevih'>
                <button onclick='lk($id)' class='slfn' id='lkbtn$id'>Like <i class='far fa-heart'></i></button>
                <button onclick='unlk($id)' class='slfn' id='unlkbtn$id'>UnLike <i class='fas fa-heart-broken'></i></button>
                " . $comments_str . "
                </div>";
            }

            $str .= "<div class='jksdn'>
                        <div class='skjb'>
                            <img src='{$this->getGroupProfilePic()}' class='kjbd' />
                            <a href='http://localhost/mail/assets/group.php?id={$this->row['id']}'>{$this->row['group_name']}</a>        
                        </div>
                        <div class='pstbdy'>
                            <p>{$row['group_post_body']}</p>
                            <img src='{$row['post_image']}' />
                        " . $str_like . "
                        </div>
                    </div>";
            return $str;
        }
    }

    class GroupPostComments {
        private $con;
        private $post_id;
        private $comments_query;

        public function __construct($con, $post_id) {
            $this->con = $con;
            $this->post_id = $post_id;
            $comments_query = mysqli_query($this->con, "SELECT * FROM group_post_comments WHERE post_id = {$this->post_id} ORDER BY id DESC");
            $this->comments_query = $comments_query;
        }

        public function getComments() {
            $str = "";
            while($row = mysqli_fetch_assoc($this->comments_query)) {
                $commentor = $row['commentor_id'];
                $comments = $row['comment'];
                $query = mysqli_query($this->con, "SELECT profile_pic, username FROM users WHERE id = {$commentor}");
                $commentor_row = mysqli_fetch_assoc($query);
                $user_profile_pic = $commentor_row['profile_pic'];
                $commentor_user_name = $commentor_row['username'];

                $str .= "<div class='sjdvn'>
                    <div class='vsbu'>
                        <img src='../$user_profile_pic' alt='Profile Pic' />
                        <a href='#'>$commentor_user_name</a>
                    </div>
                    <div class='oivn'>
                        <p>$comments</p>
                    </div>
                </div>";
            }

            return $str;
        }

        public function postComment($commentor, $commentor_id, $tags, $comment_body) {
            $query = mysqli_query($this->con, "INSERT INTO group_post_comments VALUES('', {$this->post_id}, '{$commentor}', '{$commentor_id}', '{$tags}', '{$comment_body}')");

            if(!$query) {
                return false;
            }
            $query = mysqli_query($this->con, "SELECT * FROM group_posts WHERE id = {$this->post_id}");
            $row = mysqli_fetch_assoc($query);
            $comments = $row['comments'];
            $number_of_comments = $comments + 1;
            $query = mysqli_query($this->con, "UPDATE group_posts SET comments = {$number_of_comments} WHERE id = {$this->post_id}");
            return true; 
        }

        public function getNumberOfComments() {
            $query = mysqli_query($this->con, "SELECT * FROM group_post_comments WHERE post_id = {$this->post_id}");
            $number_of_comments = mysqli_num_rows($query);
            $query = mysqli_query($this->con, "UPDATE group_posts SET comments = {$number_of_comments} WHERE id = {$this->post_id}");
        }
    }
?>