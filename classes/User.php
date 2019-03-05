<?php
    class User {
        private $username;
        private $connection;
        public $row;

        public function __construct($connection, $username) {
            $this->connection = $connection;
            $this->username = $username;
            $query = mysqli_query($this->connection, "SELECT * FROM users WHERE username = '$this->username'");
            $this->row = mysqli_fetch_assoc($query);
        }

        public function getId() {
            return $this->row['id'];
        }

        public function getFirstName() {
            return $this->row['first_name'];
        }

        public function getLastName() {
            return $this->row['last_name'];
        }
        
        public function getUserName() {
            return $this->row['username'];
        }
        
        public function getEmail() {
            return $this->row['email'];
        }
        
        public function getCollegeName() {
            return $this->row['college_name'];
        }
        
        public function getCollegeId() {
            return $this->row['college_id'];
        }
        
        public function getDept() {
            return $this->row['dept '];
        }
        
        public function getRollNo() {
            return $this->row['roll_no'];
        }
        
        public function getLogin() {
            return $this->row['login'];
        }
        
        public function getProfilePic() {
            return $this->row['profile_pic'];
        }
        
        public function getCoverPic() {
            return $this->row['cover_pic'];
        }

        public function getPassword() {
            return $this->row['password'];
        }

        public function getGroupName() {
            return $this->row['groups'];
        }

        public function getGroupId() {
            return $this->row['group_id'];
        }

        public function getFriends() {
            return $this->row['friends'];
        }

        public function displayGroups() {
            $group_id = $this->getGroupId();
            $group_id_array = explode(',', $group_id);
            $str = "";

            foreach($group_id_array as $i) {
                if($i == "") {
                    continue;
                }

                else {
                    $id = (int) $i;
                    $row = mysqli_fetch_assoc(mysqli_query($this->connection, "SELECT * FROM groups WHERE id = {$id}"));
                    $str .= "<div class='cl'>
                    <a href='group.php?id=$id'>
                        <img src='{$row['group_profile_pic']}' alt='{$row['group_name_by_user']}' />
                        <p>{$row['group_name_by_user']}</p>
                    </a>
                </div>";
                }
            }

            return $str;
        }
    }
?>