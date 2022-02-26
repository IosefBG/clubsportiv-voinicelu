<?php

$actual_link = "/home/clubvoin/public_html/";

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

//require_once '../php/Mail.php';
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\SMTP;

require $actual_link . 'PHPMailer/src/Exception.php';

require $actual_link . 'PHPMailer/src/PHPMailer.php';

require $actual_link . 'PHPMailer/src/SMTP.php';

function sendemail_survey($email, $option, $code){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {

        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 's8.webindex.ro';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@clubvoinicelu.ro';                     //SMTP username
        $mail->Password   = ')-laD0?SNw~d';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have

        $mail->setFrom('no-reply@clubvoinicelu.ro', 'ClubulVoinicelul');          //This is the email your form sends From

        $mail->addAddress($email); // Add a recipient address

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Surveye ClubulVoinicelul';

        $mail->Body = '

        <table align="center" bgcolor="#fffafa" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">

            <tr>

                <td align="center">

                    <p style="margin: 0;">

                        Buna ziua, <br>

                        Bazat pe ultima dumneavoastra experienta la clubul nostru cu antrenorul ' . $option . '<br>
                        
                        Lasati o recenzie <a href="http://clubvoinicelu.ro/survey.php?code=' . $code . '">aici</a><br>                        

                    </p>

                </td>

            </tr>

        </table>';

        $mail->send();

        stats_emails();

    } catch (Exception $e) {

        echo 'Mailer Error: ' . $mail->ErrorInfo;

    }



}




function sendrezerv($email, $nume, $data, $time){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {

        $mail->setFrom('no-reply@clubvoinicelu.ro', 'ClubulVoinicelul');          //This is the email your form sends From

        $mail->addAddress($email); // Add a recipient address

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Rezervare ClubulVoinicelul';

        $mail->Body = '

        <table align="center" bgcolor="#fffafa" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">

            <tr>

                <td align="center">

                    <p style="margin: 0;">

                        Buna ziua, ' . $nume . '<br>

                        Multumim pentru rezervarea facuta pe data ' . $data . ' la ora ' . $time . '<br>                        

                        Veti primi in scurt timp un mesaj de confirmare. 

                    </p>

                </td>

            </tr>

        </table>';

        $mail->send();

        stats_emails();

    } catch (Exception $e) {

        echo 'Mailer Error: ' . $mail->ErrorInfo;

    }



}



function accrezv($email, $nume, $data, $time){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {

        $mail->setFrom('no-reply@clubvoinicelu.ro', 'ClubulVoinicelul');          //This is the email your form sends From

        $mail->addAddress($email); // Add a recipient address

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Rezervare ClubulVoinicelul';

        $mail->Body = '

        <table align="center" bgcolor="#fffafa" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">

            <tr>

                <td align="center">

                    <p style="margin: 0;">

                        Buna ziua, ' . $nume . '<br>

                        Rezervarea dumneavoastra a fost acceptata ' . $data . ' la ora ' . $time . '<br>                        

                        Va asteptam!

                    </p>

                </td>

            </tr>

        </table>';

        $mail->send();

        stats_emails();

    } catch (Exception $e) {

        echo 'Mailer Error: ' . $mail->ErrorInfo;

    }

}



function refrezv($email, $nume){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {

        $mail->setFrom('no-reply@clubvoinicelu.ro', 'ClubulVoinicelul');          //This is the email your form sends From

        $mail->addAddress($email); // Add a recipient address

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Rezervare ClubulVoinicelul';

        $mail->Body = '

        <table align="center" bgcolor="#fffafa" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">

            <tr>

                <td align="center">

                    <p style="margin: 0;">

                        Buna ziua, ' . $nume . '<br>

                        Rezervarea dumneavoastra a fost refuzata, o sa va contactam in scurt timp pentru o reprogramare.                        

                    </p>

                </td>

            </tr>

        </table>';

        $mail->send();

        stats_emails();

    } catch (Exception $e) {

        echo 'Mailer Error: ' . $mail->ErrorInfo;

    }

}
