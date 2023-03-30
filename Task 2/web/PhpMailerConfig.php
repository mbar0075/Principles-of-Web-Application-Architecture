<?php

//function used to clean the data and remove any would be harmful characters
function clean_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$config = parse_ini_file('Config.ini');

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Signify that the message sent should be treated as HTML
$mail->isHTML(true);

//Enable SMTP debugging
$mail->SMTPDebug = $config['debug'];

//Set the hostname of the mail server
$mail->Host = $config['smtpServer'];

//Set the SMTP port number:
$mail->Port = $config['port'];

//Set the encryption mechanism to use:
$mail->SMTPSecure = $config['EncryptionMechanism'];

//Whether to use SMTP authentication
$mail->SMTPAuth = $config['DoAuthentication'];

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $config['username'];

//Password to use for SMTP authentication
$mail->Password = $config['password'];

//Set who the message is to be sent from
$mail->setFrom($config['fromEmail'], $config['fromAlias']);

//Set an alternative reply-to address
$mail->addReplyTo($config['replyToEmail'],$config['replyToAlias']);

$mail->SMTPOptions = array(
       'ssl' => array(
                'verify_peer' => $config['verify_peer'],
                'verify_peer_name' => $config['verify_peer_name'],
                'allow_self_signed' => $config['allow_self_signed']
            )
        );
?>
