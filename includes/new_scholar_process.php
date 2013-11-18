<?php
    $msg = "";
    if(isset($_POST['send'])){
        $ques = $_POST['ques'];
        if ($ques != "") {
            $sqlCommand = "INSERT INTO h_querytb VALUES('', '$id','$ques',now(),'','','','no')";  
            $query = mysql_query($sqlCommand) or die (mysql_error());
            $msg = "<span style='color:green;'>Jazakallahu Khairan for your contribution.</span>";
            header ("Location: questions.php");
        }
        else{
            $msg = "<span style='color:red;'>Please type in your Question.</span>";
        }
    }
    else{

    }
?>