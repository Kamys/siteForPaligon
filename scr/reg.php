<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Title</title>
</head>
<body>
<?php
include "data_base_helper.php";
include "post_handler.php";
$reg_successfully = false;
$error_messages_name = "Имя не прошло проверку!";
$error_messages_password = "Пароль не прошол проверку!";

logging('POST', $_POST);
logging('GET', $_GET);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_handler = new post_handler();

    if (!$post_handler->check_user_name())
        failed_reg($error_messages_name);

    if (!$post_handler->check_user_password())
        failed_reg($error_messages_password);

}

$data_base = new data_base_helper();
$data_base->add_new_user("Никита", "00934п");
function failed_reg($error_messages = "Причина не известна.")
{
    echo "Регистрация не успешна." . $error_messages;
}

function logging($messages, $args)
{
    echo $messages . " : ";
    print_r($args);
    echo "<br>";
}
?>
</body>
</html>
