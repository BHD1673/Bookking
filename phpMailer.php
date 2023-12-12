<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//Hàm này 
function sendEmail($recipientEmail, $recipientName, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // Cài đặt biến server
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'banhaiduong167@gmail.com';
        $mail->Password   = 'hqyy knyy eeio irdj';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Phần in hóa đơn
        $mail->setFrom('banhaiduong167@gmail.com', 'Hải Dương');
        $mail->addAddress($recipientEmail, $recipientName);

        // Nội dung
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo 'Hóa đơn đã được gửi';
    } catch (Exception $e) {
        echo "Mail không thể gửi, lỗi File: {$mail->ErrorInfo}";
    }
}


function generateEmailBody() {
    ob_start();
    include "stearm/bill.php";
    return ob_get_clean();
}

$emailBody = generateEmailBody();
$userEmail = "fekoso9219@lanxi8.com";
// Now call your sendEmail function
sendEmail($userEmail = $recipientEmail, 'Recipient Name', 'Your Booking Details', $emailBody);
?>
