<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

$reg_successfully = false;
$error_messages_name = "Имя не прошло проверку!";
$error_messages_password = "Пароль не прошол проверку!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_handler = new post_handler();

    if (!$post_handler->check_user_name())
        failed_reg($error_messages_name);

    if (!$post_handler->check_user_password())
        failed_reg($error_messages_password);

    $data_base = data_base_helper();
    $data_base.add_new_user();

}

function failed_reg($error_messages = "Причина не известна.")
{
    echo "Регистрация не успешна." . $error_messages;
}

?>
</body>
</html>
