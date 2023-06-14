<?php
/********************************************************
 *  ©JEROME AVECILLA -> ICT 12 DIGNIFIED S.Y 2022-2023
 * ******************************************************/
require_once 'PHPMailer\PHPMailerAutoload.php';
require_once 'PHPMailer\credential.php';


    //check if open_ssl enabled in XAMPP config
    echo !extension_loaded('openssl')?"Not Available":"Available";
    
    //function to send email message(code) to the user
    function send_mail_code($to, $from, $subject, $body)
    {
        $mail = new PHPMailer();                // create a new object
        $mail->SMTPDebug = 2;                   // Enable verbose debug output
        $mail->Debugoutput = 'html';

        $mail->isSMTP();                        // enable SMTP
        //$mail->Mailer = "smtp";
        $mail->Host ="ssl://smtp.gmail.com";    // Specify main and backup SMTP servers
        $mail->Port = 465; //587//465           // TCP port to connect to server 465
        $mail->SMTPSecure = 'ssl'; //tls//ssl   // secure transfer enabled REQUIRED for GMail
        //$mail->SMTPAutoTLS = false;
        $mail->SMTPKeepAlive = true;
        $mail->SMTPAuth = true;                 // Enable SMTP authentication
        
        $mail->Username = EMAIL;                // SMTP username
        $mail->Password = PASS;                 // SMTP password              
                         
        $mail->setFrom(EMAIL, $from);           // Email Sender
        $mail->addAddress($to);                 // Reciever
        $mail->addReplyTo(EMAIL);

        $mail->ContentType = 'text/plain';
        $mail->CharSet ="utf-8";
        $mail->isHTML(true);                    // Set email format to HTML
        $mail->WordWrap = 50;

        //for debugging for purpose
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Subject = $subject;
        $mail->Body = $body;
        $content = $body;
        $mail->MsgHTML($content);
        //check if email sent successfully
        if(!$mail->Send()) {
            //echo "Error while sending email.";
            //echo "<pre>";
                //var_dump($mail);
            //echo "</pre>";
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        }
        else {
            //echo "Email sent successfully";
            return true;
        }
    }
?>