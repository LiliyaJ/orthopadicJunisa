<?php
header("Content-Type: text/html; charset=utf-8");


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['tel'];
$message_from = $_POST['message'];
$message = "<b>Имя</b>: ".$name."<br>";
$message .= "<b>E-mail</b>: ".$email."<br>";
$message .= "<b>Телефон</b>: ".$phone."<br>";
$message .= "<b>Сообщение или вопрос</b>: ".$message_from."<br>";
send_form($message);

if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR !filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
    header("Location: http://grizhi.johannesbad-germany.ru/index.php?success=-1#form");
    exit;
}

function send_form($message) {
$mail_to = "info@junisa.de"; // Адрес, куда отправляем письма
$subject = "Новый контакт на лечение грыжи ".$name; // Тема письма
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: ".$subject." <no-reply@".$_SERVER['HTTP_HOST'].">\r\n";
mail($mail_to, $subject, $message, $headers);
}   
header("Location: http://grizhi.johannesbad-germany.ru/index.php?success=1#form");
?>