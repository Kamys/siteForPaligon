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
    /**
     * @var string
     */
    private $param_user_email = "user_email";

    function get_user_name(): string
    {
        return $_GET[$this->param_user_name];
    }

    function get_user_password(): string
    {
        return $_GET[$this->param_user_password];
    }



    function check_user_name(): bool
    {
        return array_key_exists($this->param_user_name, $_GET);
    }

    function check_user_password(): bool
    {
        return array_key_exists($this->param_user_password, $_GET);
    }

/*    function check_user_email(): bool
    {
        return array_key_exists($this->param_user_email, $_GET);
    }

    function get_user_email(): string
    {
        return $_GET[$this->param_user_email];
    }
*/
}