<?php

class Login_Control extends Control
{

    function do_action()
    {

        $action = $_GET['act'];

        if ($action == 'login') {

            $this->login();
        } else {
            require "./view/login_view.php";
        }

        error_log("Login_Control.do_action() |" . $php_errormsg);

    }

    function login()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $captcha = strtoupper($_POST['captcha']);
        setcookie('user[username]', $username);
        $_COOKIE['user']['username'] = $username;


//      todo 验证码
        session_start();
//        echo "Login_Control.login() | 验证码: {$_SESSION['captcha']}<br>";


        if ($captcha === $_SESSION['captcha']) {
//        if(true){

//            echo "Login_Control.login() | 验证码正确<br>";

            $m = new Login_Model();

            // todo 返回错误编码与错误信息
            $data = $m->login($username, $password);

            if ($data == true) {

//              登陆成功
                require "./view/index_view/index.php";

            } else if ($data == false) {

//              登陆失败
//                require "./view/index_view/index.html";

                require "./view/login_view.php";
            }

            // 日志
            error_log("Login_Control.login() | " . $php_errormsg);

        } else {
            require "./view/login_view.php";
        }


    }


}

?>