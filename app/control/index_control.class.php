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
        if ($_GET['keyword']) {
            $_COOKIE['player']['keyword'] = $_GET['keyword'];
            setcookie('player[keyword]', $_GET['keyword']);
        }
        if ($_GET['undo'] == 'true') {
            $_COOKIE['player']['keyword'] = null;
            setcookie('player[keyword]', null, time() - 1);
        }
        $m = new Index_Model();
        $data = $m->player()[0];
        $page = $m->player()[1];
        require './view/_player.php';
    }


    function player_data()
    {
        $username = $_GET['username'];

        $m = new Index_Model();
        $data = $m->player_data($username)[0];
//        var_dump($data);
        require './view/_player_data.php';
    }


    function player_equip()
    {
        if ($_GET['username']) {
            $username = $_GET['username'];
            setcookie('player[username]', $username);
        } else {
            $username = $_COOKIE['player']['username'];
        }
        $m = new Index_Model();
        $return = $m->player_equip($username);
        $data = $return[0];
        $page = $return[1];

//        var_dump($data);
        require './view/_player_equip.php';

    }


    function player_charge()
    {
        if ($_GET['username']) {
            $username = $_GET['username'];
            setcookie('player[username]', $username);
        } else {
            $username = $_COOKIE['player']['username'];
        }
        $m = new Index_Model();
        $return = $m->player_equip($username);
        $data = $return[0];
        $page = $return[1];

//        var_dump($data);
        require './view/_player_charge.php';
    }


    function player_exp()
    {
        if ($_GET['username']) {
            $username = $_GET['username'];
            setcookie('player[username]', $username);
        } else {
            $username = $_COOKIE['player']['username'];
        }
        $m = new Index_Model();
        $return = $m->player_exp($username);
        $data = $return[0];
        $page = $return[1];

//        var_dump($data);
        require './view/_player_exp.php';
    }


    function player_lock()
    {
        error_log($_GET['lock']);

        if ($_GET['lock']) {
            $username = $_GET['lock'];
            $m = new Index_Model();
            $data = $m->player_lock($username);
            var_dump($data);
        } else if ($_GET['unlock']) {
            $username = $_GET['unlock'];
            $m = new Index_Model();
            $data = $m->player_unlock($username);
            var_dump($data);
        }
    }


    function setting()
    {

        if ($_GET['keyword']) {
            $_COOKIE['setting']['keyword'] = $_GET['keyword'];
            setcookie('setting[keyword]', $_GET['keyword']);
        }

        if ($_GET['undo'] == 'true') {
            $_COOKIE['setting']['keyword'] = null;
            setcookie('setting[keyword]', null, time() - 1);
        }
        $m = new Index_Model();
        $data = $m->setting()[0];
        $page = $m->setting()[1];


        require './view/_setting_notice.php';
    }


    function setting_notice_change()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $active_time = $_POST['active_time'];
//        var_dump($_POST) ;
        $m = new Index_Model();
        $data = $m->setting_notice_change($id, $title, $content, $active_time);
//        var_dump($data);

    }


    function setting_notice_delete()
    {
        $id = $_POST['id'];
        $m = new Index_Model();
        $data = $m->setting_notice_delete($id);
        var_dump($data);
    }


    function setting_notice_insert()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $active_time = $_POST['active_time'];
        $m = new Index_Model();
        $data = $m->setting_notice_insert($title, $content, $active_time);
        var_dump($data);
    }


    function setting_vip()
    {
        $m = new Index_Model();
        $data = $m->setting_vip()[0];
        $page = $m->setting_vip()[1];

        require './view/_setting_vip.php';
    }


    function setting_vip_insert()
    {
        $vip = $_POST['vip'];
        $price = $_POST['price'];
        $m = new Index_Model();
        $data = $m->setting_vip_insert($vip, $price);
        var_dump($data);
    }


    function setting_vip_delete()
    {
        $id = $_POST['id'];
        $m = new Index_Model();
        $data = $m->setting_vip_delete($id);
        var_dump($data);
    }


    function setting_vip_change()
    {
        $id = $_POST['id'];
        $vip = $_POST['vip'];
        $price = $_POST['price'];
        $m = new Index_Model();
        $data = $m->setting_vip_change($id, $vip, $price);
        var_dump($data);
    }


    function setting_stage()
    {

        if ($_POST['get_data'] == 1) {
            $m = new Index_Model();
            $data = $m->setting_stage();
            echo json_encode($data);
        } else {
            require './view/_setting_stage.php';
        }
    }


    function setting_stage_search()
    {

        if ($id = $_POST['id']) {
            $m = new Index_Model();
            $data = $m->setting_stage_search($id);
            echo json_encode($data);
        }
    }


    function setting_stage_insert_stage()
    {

        var_dump($_POST);
        var_dump($_FILES);

        $filename_1 = $_FILES['img_1']['tmp_name'];
        $destination_1 = '../game/upload/' . $_FILES['img_1']['name'];
        move_uploaded_file($filename_1, $destination_1);

        $filename_2 = $_FILES['img_2']['tmp_name'];
        $destination_2 = '../game/upload/' . $_FILES['img_2']['name'];
        move_uploaded_file($filename_2, $destination_2);

        // todo 写入数据库
        $level = $_POST['vip'];
        $img_1 = $destination_1;
        $img_2 = $destination_2;
//        var_dump([$level, $img_1, $img_2]);

        $m = new Index_Model();
        $data = $m->setting_stage_insert_stage($level, $img_1, $img_2);
        echo $data;
    }

    function setting_stage_insert_map()
    {

        $filename_1 = $_FILES['img_1']['tmp_name'];
        $destination_1 = '../game/upload/' . $_FILES['img_1']['name'];
        move_uploaded_file($filename_1, $destination_1);

        $filename_2 = $_FILES['img_2']['tmp_name'];
        $destination_2 = '../game/upload/' . $_FILES['img_2']['name'];
        move_uploaded_file($filename_2, $destination_2);

        $stage_id = $_POST['stage_id'];
        $name = $_POST['map'];
        $img_1 = $destination_1;
        $img_2 = $destination_2;
        $exp = $_POST['exp'];
        $coins = $_POST['coins'];
        $map_id = $_POST['map_id'];

        $m = new Index_Model();
        $data = $m->setting_stage_insert_map($stage_id, $name, $img_1, $img_2, $exp, $coins, $map_id);
        echo $data;
    }

    function setting_stage_delete()
    {
        $id = $_POST['id'];
        $m = new Index_Model();
        echo $id;

        if ($id > 1000) {
            $stage_id = floor($id / 1000);
            $map_id = $id % 1000;
            $data = $m->setting_stage_delete_map($stage_id, $map_id);
        } elseif ($id <= 1000) {
            $data = $m->setting_stage_delete_stage($id);

        }
    }

    function setting_stage_change_map()
    {
        var_dump($_FILES);

        $filename_1 = $_FILES['img_1']['tmp_name'];
        $destination_1 = '../game/upload/' . $_FILES['img_1']['name'];
        move_uploaded_file($filename_1, $destination_1);

        $filename_2 = $_FILES['img_2']['tmp_name'];
        $destination_2 = '../game/upload/' . $_FILES['img_2']['name'];
        move_uploaded_file($filename_2, $destination_2);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $img_1 = $destination_1;
        $img_2 = $destination_2;
        $exp = $_POST['exp'];
        $coins = $_POST['coins'];
        $stage_id = floor($id / 1000);
        $map_id = $id % 1000;

        $m = new Index_Model();
        $data = $m->setting_stage_change_map($name, $img_1, $img_2, $exp, $coins, $stage_id, $map_id);
        var_dump($data);
    }

    function setting_stage_change_stage()
    {
        $filename_1 = $_FILES['img_1']['tmp_name'];
        $destination_1 = '../game/upload/' . $_FILES['img_1']['name'];
        move_uploaded_file($filename_1, $destination_1);

        $filename_2 = $_FILES['img_2']['tmp_name'];
        $destination_2 = '../game/upload/' . $_FILES['img_2']['name'];
        move_uploaded_file($filename_2, $destination_2);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $img_1 = $destination_1;
        $img_2 = $destination_2;

        $m = new Index_Model();
        $data = $m->setting_stage_change_stage($id, $name, $img_1, $img_2);
        var_dump($data);
    }

    function setting_item()
    {
        if ($_POST['get_data'] == 1) {
            $m = new Index_Model();
            $data = $m->setting_item();
            echo json_encode($data);
        } else {
            require './view/_setting_item.php';
        }
    }

    function setting_item_search()
    {

        if ($id = $_POST['id']) {
            $m = new Index_Model();
            $data = $m->setting_item_search($id);
            echo json_encode($data);
        }
    }

    function setting_item_insert()
    {

        $filename_1 = $_FILES['img_1']['tmp_name'];
        $destination_1 = '../game/upload/' . $_FILES['img_1']['name'];
        move_uploaded_file($filename_1, $destination_1);

        $filename_2 = $_FILES['img_2']['tmp_name'];
        $destination_2 = '../game/upload/' . $_FILES['img_2']['name'];
        move_uploaded_file($filename_2, $destination_2);

        // todo 写入数据库
        $vip = $_POST['vip'];
        $name = $_POST['name'];
        $func_value = $_POST['func_value'];
        $type = $_POST['type'];

        $img_1 = $destination_1;
        $img_2 = $destination_2;
//        var_dump([$level, $img_1, $img_2]);

        $m = new Index_Model();
        $data = $m->setting_item_insert($vip, $img_1, $img_2, $type, $func_value, $name);
        echo $data;
    }

    function setting_item_delete()
    {
        $id = $_POST['id'];
        $m = new Index_Model();

        $data = $m->setting_item_delete($id);
        echo $data;

    }

    function setting_item_update(){

        $filename_1 = $_FILES['img_1']['tmp_name'];
        $destination_1 = '../game/upload/' . $_FILES['img_1']['name'];
        move_uploaded_file($filename_1, $destination_1);

        $filename_2 = $_FILES['img_2']['tmp_name'];
        $destination_2 = '../game/upload/' . $_FILES['img_2']['name'];
        move_uploaded_file($filename_2, $destination_2);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $img_1 = $destination_1;
        $img_2 = $destination_2;
        $func_value = $_POST['func_value'];
        $vip = $_POST['vip'];


        $m = new Index_Model();
        $data = $m->setting_item_update($name, $img_1, $img_2, $id, $func_value, $vip);
        var_dump($data);
    }


}