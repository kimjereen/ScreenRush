<?php
    session_start();
    $driver = new mysqli_driver();
    $driver->report_mode = MYSQLI_REPORT_STRICT |MYSQLI_REPORT_ERROR;

    class DB {
        private $servername = "localhost:3307";
        private $username = "root";
        private $password = "";
        private $dbname = "screenrush_db";

        public $mysql;
        public $res;

        public function __construct(){
            try {
                if(!$this->mysql = new mysqli($this->servername, $this->username, $this->password, $this->dbname)) {
                    throw new Exception($this->mysql->connect_error);
                }
            } catch(Exception $e) {
                die("ERROR: Database connection Failure. $e");
            }
        }

        public function select($table, $row = "*", $where = null){
            $sql = "SELECT $row FROM $table";
            if ($where !== null) {
                $sql .= " WHERE $where";
            }

            $result = $this->mysql->query($sql);
            $this->fetchSelect($result);
        }

        public function filterRatings($table, $row = "*", $order = null){
            $sql = "SELECT $row FROM $table";
            if ($order !== null) {
                $sql .= " ORDER BY $order DESC";
            }
            $result = $this->mysql->query($sql);
            $this->fetchSelect($result);
        }

        public function fetchSelect($result){
            $records = array();
            while($row = $result->fetch_assoc()) {
                array_push($records, $row);
            }
            
            $this->res = $records;
        }

        //add
        public function insert($table, $data){
            $table_columns = implode(',', array_keys($data));
            $table_values = implode("','", $data);
            $sql = "INSERT INTO $table($table_columns) VALUES ('$table_values')";
            $result = $this->res = $this->mysql->query($sql);

            if($result) {
                return true;
            } else {
                return false;
            }
        }

        //update
        public function update($table, $data, $where){
            $set = array();
            foreach ($data as $key => $value) {
                $set[] = "$key = '$value'";
            }
            $set_str = implode(', ', $set);
    
            $sql = "UPDATE $table SET $set_str WHERE $where";
            $this->res = $this->mysql->query($sql);
        }
    
        //delete
        public function delete($table, $where){
            $sql = "DELETE FROM $table WHERE $where";
            $this->res = $this->mysql->query($sql);
        }

        public function __destruct(){
            if($this->mysql) {
                $this->mysql->close();
            }
        }

    }




    class USER extends DB {

        public function __construct() {
            parent::__construct(); 
        }

        public function register($username, $fullname, $user_email, $user_password) {
            $data = array(
                "username" => $username,
                "fullname" => $fullname,
                "user_email" => $user_email,
                "user_password" => $user_password
            );
            $register = $this->insert('users', $data);

            if($register) {
                return true;
            } else {
                return false;
            }
        }

        public function login($user_email, $user_password) {
            $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
            $result = $this->mysql->query($sql);
            $user = $result->fetch_assoc();

            if($user && $user['user_password'] === $user_password) {
                //session_start();

                $_SESSION['login'] = 'USER '.$user['user_id'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['user_email'] = $user['user_email'];

                echo "<script> alert('Login Successful'); </script>";
                echo "<script> window.location.href = 'profile.php'; </script>";
                exit();
            } else {
                echo "<script> alert('Incorrect EMAIL or PASSWORD!');</script>";
                echo "<script> window.location.href = 'signin.php'; </script>";
                echo "Error in logging in";
            }
        }

        public function review($movie_id, $movie_name, $user_id, $username, $stars, $date, $comment) {
            $data = array(
                "movie_id" => $movie_id,
                "movie_name" => $movie_name,
                "user_id" => $user_id,
                "username" => $username,
                "stars" => $stars,
                "date" => $date,
                "comment" => $comment
            );
            $review = $this->insert('user_review', $data);

            if($review) {
                echo "<script> alert('Review Sent!'); </script>";
            } else {
                echo "<script> alert('Review Unsuccessful'); </script>";
            }
        }
    }




    class ADMIN extends DB {

        public function __construct() {
            parent::__construct(); 
        }

        public function adLogin($admin_email, $admin_password) {
            $sql = "SELECT * FROM admin WHERE admin_email = '$admin_email'";
            $result = $this->mysql->query($sql);
            $admin = $result->fetch_assoc();

            if($admin && $admin['admin_password'] === $admin_password) {
                session_start();
                $_SESSION['admin_username'] = $admin['username'];

                return true;
                exit;
            } else {
                return false;
            }
        }
    }
?>