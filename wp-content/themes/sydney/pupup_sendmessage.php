<?php
$sendto  = 'seo@makintour.com,  info@coralborispol.com'; //Адреса, куда будут приходить письма

$phone = $_POST['tel-564'];
$name = $_POST['your-name'];
$p = trim(strip_tags($_POST['target'], '<br>'))
    . trim(strip_tags($_POST['target-manager'], '<br>'))
    . trim(strip_tags($_POST['callback'], '<br>'));

// Формирование заголовка письма

$subject = '[Новая заявка - Coral Travel г. Борисполь]';

// Формирование тела письма

//$msg = "Новая заявка - Coral Travel г. Борисполь\r\n";
$msg = "Имя: " . $name . "\r\n";
$msg .= "Телефон: " . $phone . "\r\n";
$msg .= "Идентификатор формы: " . $p . "\r\n";

// отправка сообщения
if (mail($sendto, $subject, $msg)) {
    echo "<script>
    document.location.href='/thanks/';
    </script>";
} else {
   
}
?>
