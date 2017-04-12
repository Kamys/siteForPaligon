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

/*logging('POST', $_POST);
logging('GET', $_GET);*/
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $post_handler = new post_handler();

    $check_user_password = $post_handler->check_user_password();
    $check_user_name = $post_handler->check_user_name();
    if ($check_user_name and $check_user_password) {
        $data_base = new data_base_helper();

        $user_name = $post_handler->get_user_name();
        $user_password = $post_handler->get_user_password();
        if ($data_base->check_exits_user($user_name, $user_password)) {
            successfully_login();
        } else {
            failed_login();
        }
    } else {
        failed_login();
    }
}

function successfully_login()
{
    echo "Вход выполнен успешно.<br>";
}

function failed_login()
{
    echo "Вход не выполнен.<br>";
}

function logging($messages, $args)
{
    echo $messages . " : ";
    print_r($args);
    echo "<br>";
}

?>
<a href="../index.html">На главную</a>
</body>
</html>
