<?php
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/respone.php';
include_once '../models/verification-code.php';

use PHPMailer\PHPMailer\PHPMailer;



require_once '../vendor/autoload.php';
require '../vendor/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/src/Exception.php';

$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
// $mail->SetLanguage("vi", "phpmailer/language");
// $mail->Encoding="base64";
$data = json_decode(file_get_contents("php://input"));
$response = Response::getDefaultInstance();

if (isset($data->email)) {
    $listCodes = [];

    $rand_code = random_int(1000, 9999);

    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = 'd661433d20cd95';
    $mail->Password = '9be21f7e199414';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;
    $mail->setFrom('info@mailtrap.io', 'Mailtrap');
    $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
    $mail->addAddress($data->email);
    $userMail = $data->email;
    $mail->addAddress('info@mailtrap.io');
    $mail->isHTML(true);
    $mail->Subject = 'Xác nhận email của bạn trên BaoStore';
    $mailContent = "<p>Xin chào $userMail ,</p>
    <p>Vui lòng nhập mã ở bên dưới để xác nhận địa chỉ email $userMail  và đăng ký nhận bản tin
    từ BaoStore để cập nhật thông tin mới nhất, các trạng thái liên quan đến bảo mật tài khoản!</p>
    <p>Verification code: $rand_code</p>
    <p> Trân trọng,</p>
    <p> Đội ngũ BaoStore</p>";
    $mail->Body = $mailContent;
    $mail->AltBody = 'Đây là email tự động. Vui lòng không trả lời email này. Thêm info@mailtrap.io vào danh bạ email của bạn để đảm bảo bạn luôn nhận được email từ chúng tôi.
    Toà nhà Innovation lô E4 - QTSC, Công viên phần mêm Quang Trung, Phường Tân Chánh Hiệp, Quận 12, TP HCM';

    if (!$mail->send()) {
        $response->setMessage("Message could not be sent: " . $mail->ErrorInfo);
        $response->setError(true);
        $response->setResponeCode(6);
    } else {
        $verificationcode = new Verification($rand_code);
        array_push($listCodes, $verificationcode);
        $response->setMessage("Message sent successfully");
        $response->setError(false);
        $response->setResponeCode(1);
        $response->setData($verificationcode);
    }
    echo json_encode($response);
}
