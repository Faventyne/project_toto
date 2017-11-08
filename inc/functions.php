<?php
function getSympathieLabel($friendliness) {
	$sympathieList = getSympathieList();
	if (array_key_exists($friendliness, $sympathieList)) {
		return $sympathieList[$friendliness];
	}
}
function getSympathieList() {
	return array(
		1 => 'Pas sympa',
		2 => 'Assez sympa',
		3 => 'Sympa',
		4 => 'Très sympa',
		5 => 'Génial',
	);
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to,$subject,$hmtlContent,$textContent=''){
	global $config;

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 4;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $config['MAIL_HOST'];                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $config['MAIL_USERNAME'];                 // SMTP username
        $mail->Password = $config['MAIL_PASSWORD'];
        print_r($mail->Password);                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to


        $mail->SMTPOptions = array('ssl' =>
            array('verify_peer'=> false,
                  'verify_peer_name'=>false,
                  'allow_self_signed'=>true)
              );

        //Recipients
        $mail->setFrom('guitchat@gmail.com', 'Guillaume');
        $mail->addAddress('guillaume.chatelain@outlook.com', 'Gui');     // Add a recipient
                  // Name is optional

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
