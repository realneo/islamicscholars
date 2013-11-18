<?php
    session_start();
    
    $user_id = $_SESSION['user_id'];
    $question = $_POST['question'];
    if ($question != "") {
        $q = "INSERT INTO h_querytb VALUES('', '$user_id','$question',now(),'','','','no')";  
        $query = mysql_query($q) or die (mysql_error());
        echo 'success';
    }
    else{
        echo 'error';
    }
?>