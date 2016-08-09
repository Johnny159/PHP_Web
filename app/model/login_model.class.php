<?php

class Login_Model
{

    private $db;

    private $error_msg = [
        0 => ['msg' => '账号或密码为空'],
        1 => '账号不存在',
        2 => '密码错误'
    ];


    function __construct()
    {

        // todo 46783567
        include './database/config.php';
        $this->db = Database::getinstance($config);

        error_log("Login_Model.__construct() |");

    }


    function login($username, $password)
    {
        $error_msg = $this->error_msg;


        if (empty($username) or empty($password)) {

            // todo 账号密码不为空
            return $error_msg[0];
//            return false;

        } else {
            $data = $this->db->select(
                "password",
                "tb_admin",
                "username='{$username}'"
            );
//            return $data[0]['password'];


            if (count($data) == 0) {
                // todo 账号验证
                return false;

            } else if (count($data) > 0) {
                // todo 密码验证

                if ($data[0]['password'] == $password) {
//                    return $data[0]['password'];
                    return true;
                };
            }
        }

        error_log("Login_Model.login() |" . $php_errormsg);


    }
}

?>