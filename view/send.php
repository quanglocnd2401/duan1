<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth= true;
    $mail->Username = 'quanglocnd2401@gmail.com';
    $mail->Password = 'ibtn saah zamb mhnb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('quanglocnd2401@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "RECOVER PASSWORD";

    $mail->Body = "Mật khẩu của bạn là :".$password;
    $mail->send();

    echo
    "
    <script>
    alert('Send Successfully');
    document.location.href = 'index.php?act=login';
</script>
    ";

   
}
?>