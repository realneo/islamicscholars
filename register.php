<?php include("template/header.php"); ?> 
<?php
    if (!isset($_SESSION["userlogin"])) {
        echo "";
    }else{
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";	
    }
?>  
<title>Sign Up</title>
<div class='row'>
    <div class='span8'>
        <div id="advertising_spot">
            <div class='title_bar_brown'>Advertise with Us</div><!-- title_bar_brown -->
            <div class="msg_body">
                <h1 align="center" style="padding:207px 0">Advertise Here</h1>
            </div>
        </div><!-- advertising_spot -->
    </div>
    <div class='span4'>
        <div id="msg_body">
            <div class='title_bar_brown'>Please fill in the form to Register</div><!-- title_bar_brown -->
            <div class='msg_body'>
                <form name='register_form' action='register.php' method='post'>
                <h2>Sign Up</h2>
                    <?php
                        $fname="";
                        $lname="";
                        $email= "";
                        if(@$_POST['formsubmitted'] == '1'){
                            $fname="";
                            $lname="";
                            $email= "";
                            $password= "";
                            $repassword= "";
                            $error = array();
                            if (empty($_POST['fname'])) {
                                $error[] = 'Please Enter Your First Name ';
                            } else {
                                $fname = strip_tags(@$_POST['fname']);
                            }
                            if (empty($_POST['lname'])) {
                                $error[] = 'Please Enter Your Last Name ';
                            } else {
                                $lname = strip_tags(@$_POST['lname']);
                            }
                            if (empty($_POST['password'])) {
                                $error[] = 'Please Enter Your Password ';
                            } else {
                                $password = strip_tags(@$_POST['password']);
                            }
                            if (empty($_POST['repassword'])) {
                                $error[] = 'Please Enter Your Re-Password ';
                            } else {
                                $repassword = strip_tags(@$_POST['repassword']);
                            }
                            if($password != $repassword)
                            {
                                    $error[] = 'Your Password does not match ';
                            }
                            if (empty($_POST['email'])) {
                                    $error[] = 'Please Enter Your Email ';
                            } else {	 
                                if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
                                    $email = strip_tags(@$_POST['email']);
                                } else {
                                    $error[] = 'Your EMail Address is invalid  ';
                                }
                            }
                            if (empty($error)) {          
                                $activation = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                                $insert_user = "INSERT INTO h_usertb VALUES ('', '$fname', '$lname', '$email', '$password', '$activation',now())";
                                if (!mysql_query($insert_user)) {
                                    die('Error: ' . mysql_error());
                                }
                                $message = "Email: $email \nPassword: $password \n\n To activate your account, please click on this link:\n\n";
                                $message .= "http://localhost/islamicscholars/activate.php?email=" . urlencode($email) . "&key=$activation";
                                mail( "$email", "Activation",$message, "From: info@islamicscholars.com" );
                                echo "<div class='success'>Shukran. An Email has been sent to your Email Account (<i>$email</i>) for Activation. Please check your Email to complete your Registration.<br><a href='signin.php' class='btn btn-primary btn-small'>Click Here to Login</a></div>";
                                //header( "Location: register.php" );
                            }else {
                                echo '<div style="width:250px;color:red;"> <ul>';
                                foreach ($error as $key => $values) {
                                    echo ' <li>' . $values . '</li>';
                                }
                                echo '</ul></div>';
                            }
                            mysql_close(); 
                        }
                    ?>
                    <label>First Name</label>
                    <input type="text" name="fname" class="span3" value="<?php echo $fname; ?>" >
                    <label>Last Name</label>
                    <input type="text" name="lname" class="span3" value="<?php echo $lname; ?>" >
                    <label>Email Address</label>
                    <input type="email" name="email" class="span3" value="<?php echo $email; ?>" >
                    <label>Password</label>
                    <input type="password" name="password" class="span3">
                    <label>Re-Enter Password</label>
                    <input type="password" name="repassword" class="span3">
                    <label><input type="checkbox" name="terms"> I agree with the <a href="#" style="color:blue;">Terms and Conditions</a>.</label>
                                        <input type="hidden" name="formsubmitted" value="1">
                    <input type="submit" value="Sign up" class="btn btn-success pull-right">
                    <div class="clearfix"></div>
                                        <p style="color:#000;">Already have an Account? <a href="signin.php" class='btn btn-inverse btn-small'>Login</a></p>
                </form>
            </div><!-- msg_body --> 
        </div><!-- #msg_body -->
    </div>
</div>


<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>