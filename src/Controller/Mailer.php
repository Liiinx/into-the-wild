<?php
/**
 * Created by IntelliJ IDEA.
 * User: bobbywcs
 * Date: 05/11/18
 * Time: 10:16
 */

namespace Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    public function mailConfig ($email, $name, $message) {

        $mail = new PHPMailer(false);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'cdb2194f306e59';
            $mail->Password = 'b55f2f23597368';
            $mail->Port = 2525;


            $mail->setFrom('contact@localhost.com', 'WildBlog');
            $mail->addAddress($email, $name);
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Confirmation de votre compte';
            $mail->Body    = $message;

            $mail->send();
        } catch (Exception $e) {
            echo 'Erreur envoi message. Merci de prendre contact avec bobby. [CODE ERREUR : ', $mail->ErrorInfo . "]";
        }

    }


}