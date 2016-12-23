<?php

//$sendto  = 'seo@makintour.com, coralborispol@gmail.com'; //Адреса, куда будут приходить письма
$sendto  = 'malanchukdima@mail.ru'; //Адреса, куда будут приходить письма
//$sendto  = 'seo@makintour.com, shakrov@ukr.net'; //Адреса, куда будут приходить письма

$phone  = $_POST['tel-564'];
$name  = $_POST['your-name'];
$comment  = $_POST['your-message'];
$order  = $_POST['order'];
//$source = $_POST['source'];

// Формирование заголовка письма

$subject  = '[Новая заявка - Coral Travel Борисполь]';

// Формирование тела письма

$msg .= "Имя: ".$name."\r\n";
$msg .= "Телефон: ".$phone."\r\n";
$msg .= "Пожелания к туру: ".$comment."\r\n";
$msg .= "Идентификатор: ".$order."\r\n";

// отправка сообщения
if(mail($sendto, $subject, $msg, $headers)) {
	echo "true";
} else {
	echo "false";
}

?>