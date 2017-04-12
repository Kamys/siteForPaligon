<?php

/**
 * Created by PhpStorm.
 */
class data_base_helper
{

    private function create_data_base_connection(): mysqli
    {
        $mysqli = new mysqli("localhost", "root", "", "");
        return $mysqli;
    }

    /**
     * @param $user_name string
     * @param $user_password string
     */
    public function add_new_user($user_name, $user_password)
    {
        $mysqli = $this->create_data_base_connection();
        $query = "INSERT INTO data.users (name, password) VALUE ('$user_name','$user_password')";
        $mysqli->query($query);
    }

    public function check_exits_user($user_name, $user_password): bool
    {
        $mysqli = $this->create_data_base_connection();
        $query = "SELECT * FROM data.users WHERE name = '$user_name' and password = '$user_password'";
        $result = $mysqli->query($query);
        if ($result == null) {
            return false;
        }
        return $result->num_rows == 1;
    }
}