<?php

/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/15
 * Time: 16:19
 */
class Game_Control extends Control
{

    function do_action()
    {
        $action = $_GET['act'];
        if ($action) {
            $this->$action();
        }
    }

    function test()
    {
        echo "123123";
        $m = new Game_Model();
        $data = $m->test();
        echo $data;
    }

    function sign_name_check()
    {
        $username = $_GET['username'];
        $m = new Game_Model();
        $data = $m->sign_name_check($username);
        if($data==0){
            echo 1;
        }else{
            echo '用户已存在';
        }

    }
}