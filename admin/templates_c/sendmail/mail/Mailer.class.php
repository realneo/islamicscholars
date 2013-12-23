<?php
/**
 * @author: shwdai@gmail.com
 */
class Mailer {

	static private $from = null;
	function __construct()
	{
	}

	static private function EscapeHead($string, $encoding='GB2312')
	{
		$string	= mb_convert_encoding($string, $encoding, "UTF-8");
		return '=?' . $encoding . '?B?'. base64_Encode($string) .'?=';
	}

	static private function EscapePart($string, $encoding='GB2312')
	{
		$string = mb_convert_encoding($string, $encoding, 'UTF-8');
		return preg_replace_callback('/([\x80-\xFF]+.*[\x80-\xFF]+)/', create_function('$m','return "=?{'.$encoding.'}?B?".base64_encode($m[1])."?=";'), $string);
	}
	
	/*
	 *	发送邮件的最后一步
	 *	@param options	
			contentType		= true
			messageId		= null
			encoding		= 'UTF-8'
	 */
	static function SendMail($from, $to, $subject, $message, $options=null, $bcc=array())
	{
		if ( !isset($options['subjectenc']) )
			$options['subjectenc'] 	= 'UTF-8';

		if ( !isset($options['encoding']) )
			$options['encoding'] 	= 'UTF-8';

		if ( !isset($options['contentType']) )
			$options['contentType'] = 'text/plain';

		if ( 'UTF-8'!=$options['encoding'] )
			$message = mb_convert_encoding($message, $options['encoding'], 'UTF-8');

		$message = chunk_split(base64_encode($message));
		$subject = self::EscapeHead($subject, $options['subjectenc']);
		$from = self::EscapePart($from, $options['subjectenc']);
		$to = self::EscapePart($to, $options['subjectenc']);

		$headers = array(
				"Mime-Version: 1.0",
				"Content-Type: {$options['contentType']}; charset={$options['encoding']}",
				"Content-Transfer-Encoding: base64",
				"X-Mailer: ZTMailer/b3284c51aa030fa583750d75da2d8774/1.0",
				"From: {$from}",
				"Reply-To: {$from}",
				);
		if ($bcc) { 
			$bcc = join(', ', $bcc);
			$headers[] = "Bcc: {$bcc}";
		}
		$headers = join("\r\n", $headers);

		if ( isset($options['messageId']) )
			$headers["Message-Id"] = "<$options[messageId]>";

		return mail($to, $subject, $message, $headers);
	}

	static function SmtpMail($from, $to, $subject, $message, $options=null, $bcc=array())
	{
		/* settings */
		if ( !isset($options['subjectenc']) )
			$options['subjectenc'] 	= 'UTF-8';

		if ( !isset($options['encoding']) )
			$options['encoding'] 	= 'UTF-8';

		if ( !isset($options['contentType']) )
			$options['contentType'] = 'text/plain';

		if ( 'UTF-8'!=$options['encoding'] )
			$message = mb_convert_encoding($message, $options['encoding'], 'UTF-8');
		
		/* get from ini */

        $host = "smtp.googlemail.com";
		$port = "465";
		$ssl = "ssl";
		$user = "leiwang520ma@gmail.com";
		$pass = "wanglei888";
		$from = "leiwang520ma@gmail.com";
		$reply = "leiwang520ma@gmail.com";
		$site="机锋网";
		
		$body = $message;

		$ishtml = ($options['contentType']=='text/html');
		//begin
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->CharSet = $options['encoding'];
		$mail->SMTPAuth   = true; 
		$mail->Host = $host;
		$mail->Port = $port;
		if ( $ssl=='ssl' ) {
			$mail->SMTPSecure = "ssl"; 
		} else if ( $ssl == 'tls' ) {
			$mail->SMTPSecure = "tls"; 
		}
		$mail->Username = $user;
		$mail->Password = $pass;
		$mail->SetFrom($from, $site);
		$mail->AddReplyTo($reply, $site);
		foreach($bcc AS $bo) {
			$mail->AddBCC($bo);
		}
		$mail->Subject = $subject;
		if ( $ishtml ) {
			$mail->MsgHTML($body);
		} else {
			$mail->Body = $body;
		}
		$mail->AddAddress($to);
		return $mail->Send();
	}
}
?>
