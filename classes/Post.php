<?php
    class Post {
        private $user_obj;
        private $connection;

        public function __construct($connection, $username) {
            $this->connection = $connection;
            $this->user_obj = new User($this->connection, $username);
        }
    }
?>