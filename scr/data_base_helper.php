<?php

/**
 * Created by PhpStorm.
 */
class data_base_helper
{

    private function create_data_base_connection() : mysqli{
        $mysqli = new mysqli("localhost", "root", "", "");
        $mysqli ->set_charset("utf8");
        return $mysqli;
    }

    /**
     * @param $user_name string
     * @param $user_password string
     */
    public function add_new_user($user_name,$user_password)
    {
        $mysqli = $this->create_data_base_connection();
        $mysqli->query("INSERT INTO data.users (name, password) VALUE ('$user_name','$user_password');");
    }
}