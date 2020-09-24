<?php 

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

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.ukr.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lolkekcheburek1905@ukr.net';                 // Наш логин
$mail->Password = '9TSMdfSL76GWwyyl';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('lolkekcheburek1905@ukr.net', 'Sparcle Cleaning');   // От кого письмо 
$mail->addAddress('guidecco@ukr.net');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Письмо c Sparcle Cleaning';
$mail->Body    = '
	Пользователь тестового сайта <b>Sparcle Cleaning</b> оставил данные!<br><br> 
	Имя: ' . $name . ' <br>
	Адрес: ' . $address . '<br>
	Телефон: ' . $phone . ' <br>
	E-mail: ' . $email . '<br>
	Тип уборки: ' . $cleaningtype . ' <br>
	Количество комнат: ' . $roomamount . '<br>
	Количество ванных: ' . $bathroomamount . ' <br>
	Нужна ли переработка: ' . $recyclingtick . '<br>
	Нужна ли утилизация: ' . $disposaltick . '<br>
	Нужна ли установка: ' . $installtick . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>