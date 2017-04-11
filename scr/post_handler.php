<?php

/**
 * Created by PhpStorm.
 */
class post_handler
{
    /**
     * Name parameter user password.
     * @var string
     */
    private $param_user_name = "user_name";
    /**
     * Name parameter user name.
     * @var string
     */
    private $param_user_password = "user_password";

    function get_user_name(): string
    {
        return $_POST[$this->param_user_name];
    }

    function get_user_password(): string
    {
        return $_POST[$this->param_user_password];
    }

    function check_user_name(): bool
    {
        return array_key_exists($this->param_user_name, $_POST);
    }

    function check_user_password(): bool
    {
        return array_key_exists($this->param_user_password, $_POST);
    }
}