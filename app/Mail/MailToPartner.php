<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;

class MailToPartner
{
    public static function send(string $partner)
    {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '62f6a5466adb6c';
        $mail->Password = 'f6f08935e198c6';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->Subject = 'Application from Client';
        $mail->isHTML(true);
        $mailContent = "<h1>Application for Partner $partner</h1>
         <p>User with e-mail {$_POST['email']} asked for amount {$_POST['amount']}.</p>";

        $mail->Body = $mailContent;

        $mail->setFrom($_POST['email'], 'User Name');
        $mail->addReplyTo($_POST['email'], 'User Name');
        $mail->addAddress("partner$partner@info.com", "Partner $partner");

        if ($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}