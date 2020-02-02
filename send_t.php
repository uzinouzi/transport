<?php
require_once __DIR__.'/vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;

var_dump($_GET);

error_reporting(E_ALL);
ini_set("display_errors", 1);

    function send_email($to,$theme,$message){   
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        //$uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['userfile']['name']));
        try {
            //Server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.mail.ru'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'send.mail.01@mail.ru'; // SMTP username
            $mail->Password = 'lololo228Aa'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );  
            //Recipients
            $mail->setFrom('send.mail.01@mail.ru', 'Грузчики Минск');
            $mail->addAddress('uzi.no.uzi.web@gmail.com', 'Грузчики Минск'); // Add a recipient
            
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Order грузчики Минск';
            $mail->Body = 'Name: '.$_GET['name'].'<br /> Phone: '.$_GET['phone'].'<br /> Message: '.$_GET['ms'].'<br /> E-mail: '.$_GET['mail'];
            //$mail->addAttachment($uploadfile, $_FILES['userfile']['name']);
            $mail->AltBody = 'Application';
            $mail->send();
            echo '+';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
                    

        
    } 
    
    if(send_email('uzi.no.uzi.web@gmail.com','Заказ', 'Имя:'.$_GET['name'].'. <br >Cообщение: '.$_GET['ms'].'. <br> Почта: '.$_GET['mail'])){
        //echo $_FILES['userfile']['tmp'];
        echo "+";
    }
?>