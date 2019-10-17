<?php
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	function sendAuthMessage($man_email, $man_ID){
		// Load Composer's autoloader
		require_once 'vendor/autoload.php';

		$mail = new PHPMailer(true);
		try{
			// SMTP Server opcache_get_configuration
			$mail->isSMTP();
			$mail->Host = 'smtp.googlemail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'global.247superstore@gmail.com';
			$mail->Password = 'qwzXhs8+82Y"X@D!';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;

			// Recipients
			$mail->setFrom('globalsuperstore@gmail.com', 'Admin');
			$mail->addAddress($man_email);
			// $mail->addReplyTo('leburutlj24.mt@gmail.com');

			// content
			$mail->isHTML(true);
			$mail->Subject = 'Manager ID';
			$mail->Body = 'Your Manager ID is '. $man_ID .". Please use this to Login.";

			$mail->send();
			$msgResponse = 'Email has been sent';
		}
		catch(Exception $e){
			$msgResponse = 'Email could not be sent : Error '. $mail->ErrorInfo;
		}
		return $msgResponse;
	}
?>
