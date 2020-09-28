<?php 

$cleaningdate = $_POST['customer_date'];
$name = $_POST['customer_name'];
$address = $_POST['customer_address'];
$phone = $_POST['customer_phone'];
$email = $_POST['customer_mail'];
$cleaningtype = $_POST['customer_type'];
$roomamount = $_POST['customer_room'];
$bathroomamount = $_POST['customer_bathroom'];
$recyclingtick = $_POST['customer_recycling'];
$disposaltick = $_POST['customer_disposal'];
$installtick = $_POST['customer_install'];
$consenttick = $_POST['customer_consent'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->isSMTP();
$mail->Host = 'smtp.ukr.net';
$mail->SMTPAuth = true;
$mail->Username = 'lolkekcheburek1905@ukr.net';
$mail->Password = '9TSMdfSL76GWwyyl';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('lolkekcheburek1905@ukr.net', 'Sparcle Cleaning');
$mail->addAddress('guidecco@ukr.net');
$mail->isHTML(true);
$mail->Subject = 'Письмо c Sparcle Cleaning';
$mail->Body    = '
	Пользователь тестового сайта <b>Sparcle Cleaning</b> оставил данные!<br><br>
	Желаемая дата: ' . $cleaningdate . ' <br>
	Имя: ' . $name . ' <br>
	Адрес: ' . $address . '<br>
	Телефон: ' . $phone . ' <br>
	E-mail: ' . $email . '<br>
	Тип уборки: ' . $cleaningtype . ' <br>
	Количество комнат: ' . $roomamount . '<br>
	Количество ванных: ' . $bathroomamount . ' <br>
	Нужна ли переработка: ' . $recyclingtick . '<br>
	Нужна ли утилизация: ' . $disposaltick . '<br>
	Нужна ли утилизация: ' . $installtick . '<br>
	Есть ли подтверждение ПД: ' . $consenttick . '';
if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>