<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  // Specify your SMTP server
    $mail->SMTPAuth   = true;                 // Enable SMTP authentication
    $mail->Username   = 'banhaiduong167@gmail.com'; // SMTP username
    $mail->Password   = 'ngunguoi2004@gmail.com';           // SMTP password
    $mail->SMTPSecure = 'tls';                 // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Recipients
    $mail->setFrom('banhaiduong167@gmail.com', 'Hải Dương');
    $mail->addAddress('ladiga8557@lanxi8.com', 'Tên khách hàng'); // Add the recipient email address

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Test Subject';
    $mail->Body    = 'This is a test email';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
