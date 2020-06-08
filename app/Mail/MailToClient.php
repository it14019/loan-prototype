<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;

class MailToClient
{
    public static function send($email, $amount, $partner)
    {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '62f6a5466adb6c';
        $mail->Password = 'f6f08935e198c6';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->Subject = 'Offer';
        $mail->isHTML(true);
        $mailContent = "<h1>Response to Client</h1>
         <p>You asked for amount $amount. We can offer...</p>";

        $mail->Body = $mailContent;

        $mail->setFrom("partner$partner@info.com", "Partner $partner");
        $mail->addReplyTo($email, 'User Name');
        $mail->addAddress($email, "User Name");

        if ($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}