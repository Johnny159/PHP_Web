<?php

/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/7
 * Time: 14:45
 */
class Index_Control extends Control
{

    function do_action()
    {
        $action = $_GET['act'];
        if ($action == 'logout') {
            $this->logout();
        }
    }

    function logout()
    {
        // todo 登出 删除 cookie
        setcookie('user', null, time()-1);
        require './view/login_view.php';
    }

    function create_menu(){}
}