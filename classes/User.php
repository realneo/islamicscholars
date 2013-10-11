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
            $sql = mysql_query("SELECT * from h_usertb WHERE username = '$username' or email = '$email'");
            $no_rows = mysql_num_rows($sql);
            if ($no_rows == 0){
                $result = mysql_query("INSERT INTO h_usertb(user_last_name, user_first_name, user_email, user_pwd) values ('$last_name', '$first_name', '$email', '$password')") or die(mysql_error());
                return $result;
            }
            else{
                return FALSE;
            }
        }

        // Login process
        public function check_login($email, $password){
            $password = md5($password);
            $result = mysql_query("SELECT * from h_usertb WHERE user_email = '$email' and user_pwd = '$password'");
            $user_data = mysql_fetch_array($result);
            $no_rows = mysql_num_rows($result);
            if ($no_rows == 1){
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user_data['user_id'];
                return TRUE;
            }
            else{
                return FALSE;
                $_SESSION['login'] = false;
            }
        }

        // Getting First Name , Last Name
        public function get_fullname($user_id){
            $result = mysql_query("SELECT * FROM h_usertb WHERE user_id = $user_id");
            $user_data = mysql_fetch_array($result);
            $first_name = $user_data['user_first_name'];
            $last_name = $user_data['user_last_name'];
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