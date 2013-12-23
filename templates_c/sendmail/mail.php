<?php
set_time_limit(0);
ini_set('memory_limit', '3000M');
require_once('mail/PHPMailer.class.php');
require_once('mail/Mailer.class.php');
require_once('mail/SMTP.class.php');

dosendto();

function dosendto(){
		$subject         = "邮件发送测试"; 
		$message         = "这是一个测试，也仅仅是一个测试";
		
		$from            = "694360965@qq.com";
		$getmail         = "694360965@qq.com";


		$options = array(
		'contentType' => 'text/html',
		'encoding' => 'UTF-8',
		);
		

$to=$getmail;  
//				Mailer::SendMail($from, $to, $subject, $message, $options);
              $t=  Mailer::SmtpMail($from, $to, $subject, $message, $options);
			  var_dump($t);
			  echo "________________________________________";
	}