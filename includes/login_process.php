<?php
    session_start();
    include("../classes/config.php");

    if(isset($_POST["email"]) && isset($_POST["password"])){
        $email = $_POST["email"];
        $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

        $sql = mysql_query("SELECT `user_id` FROM `h_usertb` WHERE `user_email`='$email' and `user_password`='$password' AND `user_activation` IS NULL LIMIT 1");

        $exist = mysql_num_rows($sql);
        if($exist == 1){
                while($row = mysql_fetch_array($sql)){
                        $id =$row["user_id"];
                }
                $_SESSION["user_id"] = $id;
                $_SESSION["user_email"] = $email;
                echo 'success';
                //header("Location: ../index.php");
                exit();
        }
        else{
                $_SESSION['msg'] = '<div style="color:red;" class="pull-left">Either Your Account is Inactive or Your Email/Password is Incorrect. Please Try Again</div>';
                //header("Location: ../signin.php");
                echo 'error';
        }
    }
?>