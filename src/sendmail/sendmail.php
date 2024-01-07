<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/srs/Exception.php';
    require 'phpmailer/srs/PHPMailer.php';
    require 'phpmailer/srs/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('en', 'ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ivansychevskyi42@gmail.com';
    $mail->Password = 'friymbcjgprocxgu';
    $mail->Port = '587';
    $mail->SMPTSecure = 'TLS';

    $mail->setFrom('ivansychevskyi42@gmail.com', 'Ivan');

    $mail->addAdress('sychevskyi42box@gmail.com');

    $mail->Subject = 'E-mail from Sychevskyi';

    $body = '<h1>Hi! It`s Sychevskyi!</h1>';

    if(trim(!empty($_POST['name']))){
        $body .= "<p>Name: <strong>.$_POST['name'].</strong></p>";
    }
    if(trim(!empty($_POST['email']))){
        $body .= "<p>E-mail: <strong>.$_POST['email'].</strong></p>";
    }
    if(trim(!empty($_POST['message']))){
        $body .= "<p>Message: <strong>.$_POST['message'].</strong></p>";
    }
    if(trim(!empty($_POST['like']))){
        $body .= "<p>Do you want to work with me: <strong>.$_POST['like'].</strong></p>";
    }
    if(trim(!empty($_POST['thebest']))){
        $body .= "<p>I agree to easy and productive work!: <strong>.$_POST['thebest'].</strong></p>";
    }

    if(trim(!empty($_FILES['image']['tmp_name']))){
        $fileTmpName = $FILES['image']['tmp_name'];
        $fileName = $FILES['image']['name'];
        $mail->addAttachment($fileTmpName, $fileName);
    }

    $mail->Body = $body;

    $mail->send();
    $mail->smtpClose();
?>