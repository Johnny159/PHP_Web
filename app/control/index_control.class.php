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
        } else if ($action == 'player') {
            $this->player();
        } else if ($action) {
            $this->$action();
        }
    }

    function logout()
    {
        // todo 登出 删除 cookie
        setcookie('user', null, time() - 1);
        require './view/login_view.php';
    }

    function menu()
    {
        $m = new Index_Model();
        $data = $m->menu();


        // 目录root
        $menu = '<ul data-menu="main" class="menu__level">';
        foreach ($data as $menu_item) {
            if ($menu_item['fid'] == 0) {
                $menu .= '<li class="menu__item"><a class="menu__link" data-submenu="submenu-' . $menu_item['id'] . '" href="#" data-url="' . $menu_item['url'] . '">';
                $menu .= $menu_item['title'];
                $menu .= '</a></li>';
            }
        }
        $menu .= '</ul>';


        function create_menu($index, $data)
        {
            $menu = '<ul data-menu="submenu-' . $index . '" class="menu__level">';
            foreach ($data as $menu_item) {
                if ($menu_item['fid'] == $index) {
                    $menu .= '<li class="menu__item"  ><a class="menu__link"  href="#" data-url="' . $menu_item['url'] . '">';
                    $menu .= $menu_item['title'];
                    $menu .= '</a></li>';
                }
            }
            $menu .= '</ul>';
            return $menu;
        }

//        $menu .= create_menu(1, $data);
        $menu .= create_menu(2, $data);
        $menu .= create_menu(3, $data);
        $menu .= create_menu(4, $data);

        return $menu;
    }


    function player()
    {
        if($_GET['keyword']){
            $_COOKIE['player']['keyword'] = $_GET['keyword'];
            setcookie('player[keyword]', $_GET['keyword']);
        }
        $m = new Index_Model();
        $data = $m->player()[0];
        $page = $m->player()[1];
        require './view/_player.php';
    }

    function player_data(){
        $username = $_GET['username'];

        $m = new Index_Model();
        $data = $m -> player_data($username)[0];
//        var_dump($data);
        require './view/_player_data.php';
    }

    function player_equip(){
        if($_GET['username']){
            $username = $_GET['username'];
            setcookie('player[username]', $username);
        }else{
            $username = $_COOKIE['player']['username'];
        }
        $m = new Index_Model();
        $return = $m -> player_equip($username);
        $data = $return[0];
        $page = $return[1];

//        var_dump($data);
        require './view/_player_equip.php';

    }


    function player_charge(){
        if($_GET['username']){
            $username = $_GET['username'];
            setcookie('player[username]', $username);
        }else{
            $username = $_COOKIE['player']['username'];
        }
        $m = new Index_Model();
        $return = $m -> player_equip($username);
        $data = $return[0];
        $page = $return[1];

//        var_dump($data);
        require './view/_player_charge.php';
    }


    function player_exp(){
        if($_GET['username']){
            $username = $_GET['username'];
            setcookie('player[username]', $username);
        }else{
            $username = $_COOKIE['player']['username'];
        }
        $m = new Index_Model();
        $return = $m -> player_exp($username);
        $data = $return[0];
        $page = $return[1];

//        var_dump($data);
        require './view/_player_exp.php';
    }

    function player_lock(){
        error_log($_GET['lock']);

        if($_GET['lock']){
            $username = $_GET['lock'];
            $m = new Index_Model();
            $data = $m -> player_lock($username);
            var_dump($data);
        }
        else if($_GET['unlock']){
            $username = $_GET['unlock'];
            $m = new Index_Model();
            $data = $m -> player_unlock($username);
            var_dump($data);
        }
    }

    function setting(){

        if($_GET['keyword']){
            $_COOKIE['setting']['keyword'] = $_GET['keyword'];
            setcookie('setting[keyword]', $_GET['keyword']);
        }
        $m = new Index_Model();
        $data = $m->setting()[0];
        $page = $m->setting()[1];


        require './view/_setting_notice.php';
    }

}