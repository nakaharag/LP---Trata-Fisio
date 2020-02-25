<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include('PHPMailer-master/src/PHPMailer.php');
include('PHPMailer-master/src/Exception.php');
include('PHPMailer-master/src/SMTP.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'trata.fisio.mail@gmail.com';           // SMTP username
    $mail->Password   = 'abacaxi1';                             // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
     )
    );

    $mail->setFrom('trata.fisio.mail@gmail.com', 'Mailer');
    //$mail->addAddress('ro2cal@gmail.com', 'Lead Trata Fisio');
    $mail->addAddress('barueri@itcvertebral.com.br', 'Lead Trata Fisio');     // Add a recipient
    $mail->addAddress('atendimento.alwayson@gmail.com', 'Atendimento');               // Name is optional

    $email = $_POST['email'];
    $nome = $_POST['name'];
    $telefone = $_POST['phone'];

    $body = "<!doctype html><html> <head> <meta name='viewport' content='width=device-width'> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'> <title>Instituto Trata - Agendamento</title> <style>@media only screen and (max-width: 620px){table[class=body] h1{font-size: 28px !important; margin-bottom: 10px !important;}table[class=body] p, table[class=body] ul, table[class=body] ol, table[class=body] td, table[class=body] span, table[class=body] a{font-size: 16px !important;}table[class=body] .wrapper, table[class=body] .article{padding: 10px !important;}table[class=body] .content{padding: 0 !important;}table[class=body] .container{padding: 0 !important; width: 100% !important;}table[class=body] .main{border-left-width: 0 !important; border-radius: 0 !important; border-right-width: 0 !important;}table[class=body] .btn table{width: 100% !important;}table[class=body] .btn a{width: 100% !important;}table[class=body] .img-responsive{height: auto !important; max-width: 100% !important; width: auto !important;}} @media all{.ExternalClass{width: 100%;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}.apple-link a{color: inherit !important; font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; text-decoration: none !important;}#MessageViewBody a{color: inherit; text-decoration: none; font-size: inherit; font-family: inherit; font-weight: inherit; line-height: inherit;}.btn-primary table td:hover{background-color: #34495e !important;}.btn-primary a:hover{background-color: #34495e !important; border-color: #34495e !important;}}</style> </head> <body class='' style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'> <table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;'> <tr> <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td><td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;'> <div class='content' style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;'> <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span> <table class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;'> <tr> <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;'> <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;'> <tr> <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>  <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Ol&aacute;,</p><p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Foi solicitado um novo agendamento via landing page:</p><table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;'> <tbody> <tr> <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;'> <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'> <tbody> <tr> <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px; font-weight: bold;'> Nome: </td><td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px; padding-left: 15px;'> $nome: </td></tr><tr> <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px; font-weight: bold;'> Telefone: </td><td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px; padding-left: 15px;'> $telefone: </td></tr><tr> <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px; font-weight: bold;'> E-mail: </td><td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px; padding-left: 15px;'> $email: </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></table> </td></tr></table> </div></td><td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td></tr></table> </body></html>";

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitacao de agendamento';
    $mail->Body    = $body;
    $mail->AltBody = 'Nova solicitacao de agendamento! Nome: $nome Telefone: $phone';

    $mail->send();

    echo '<script> location.replace("/obrigado.html"); </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}