<?php
    include_once 'config.php';
    class User{
        
        //Database connect 
        public function __construct(){
            $this->db = new DB_Class();
        }

        //Registration process 
        public function register_user($first_name, $last_name, $email, $password){
            $password = md5($password);
            $sql = mysql_query("SELECT * from users WHERE username = '$username' or email = '$email'");
            $no_rows = mysql_num_rows($sql);
            if ($no_rows == 0){
                $result = mysql_query("INSERT INTO users(first_name, last_name, email, password) values ('$first_name', '$last_name', '$email', '$password')") or die(mysql_error());
                return $result;
            }
            else{
                return FALSE;
            }
        }

        // Login process
        public function check_login($email, $password){
            $password = md5($password);
            $result = mysql_query("SELECT * from users WHERE email = '$email' and password = '$password'");
            $user_data = mysql_fetch_array($result);
            $no_rows = mysql_num_rows($result);
            if ($no_rows == 1){
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user_data['id'];
                return TRUE;
            }
            else{
                return FALSE;
                $_SESSION['login'] = false;
            }
        }

        // Getting First Name , Last Name
        public function get_fullname($user_id){
            $result = mysql_query("SELECT * FROM users WHERE id = $user_id");
            $user_data = mysql_fetch_array($result);
            $first_name = $user_data['first_name'];
            $last_name = $user_data['last_name'];
        }

        // Getting session 
        public function get_session(){
            return $_SESSION['login'];
        }

        // Logout 
        public function user_logout(){
            $_SESSION['login'] = FALSE;
            session_destroy();
        }

    }
?>