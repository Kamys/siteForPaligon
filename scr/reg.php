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
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "This post<br>";
    $post_handler = new post_handler();

    $check_user_password = $post_handler->check_user_password();
    $check_user_name = $post_handler->check_user_name();
    if ($check_user_name and $check_user_password) {
        $data_base = new data_base_helper();

        $user_name = $post_handler->get_user_name();
        $user_password = $post_handler->get_user_password();
        $data_base->add_new_user($user_name, $user_password);
        successfully_reg();
    } else {
        failed_reg();
    }


}
function failed_reg($error_messages = "Причина не известна.")
{
    echo "Регистрация не успешна." . $error_messages;
}

function successfully_reg(){
    echo "Регистрация успешна!!!!";
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
