<?php

/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/8
 * Time: 11:34
 */
class Index_Model extends Model
{

    function menu()
    {
        $data = $this->db->select("*", "tb_menu");
        return $data;
    }

    function player()
    {
        if ($_COOKIE['player']['keyword']) {
            $keyword = $_COOKIE['player']['keyword'];
            $page = new Page(4, "select count(*) as count from tb_player where username like '%{$keyword}%';");
            $page_data = $page->select_data("select username,vip,coins,exp,sign_time,last_login_time,money_charged,locked from tb_player where username like '%{$keyword}%'");

        } else {
            $page = new Page(4, "select count(*) as count from tb_player;");
            $page_data = $page->select_data("select username,vip,coins,exp,sign_time,last_login_time,money_charged,locked from tb_player");
        }
        return [$page_data, $page];


    }

    function player_data($username)
    {
        $data = $this->db->select(
            "*",
            "tb_player",
            "username ='{$username}'"
        );
        return $data;
    }

    function player_equip($username)
    {
        $page = new Page(4, "select count(*) as count from tb_user_buy where username = '{$username}';");
        $page_data = $page->select_data("select * from tb_user_buy where username = '{$username}'");
        return [$page_data, $page];
    }

    function player_charge($username)
    {
        $page = new Page(4, "select count(*) as count from tb_user_charge where username = '{$username}';");
        $page_data = $page->select_data("select * from tb_user_charge where username = '{$username}'");
        return [$page_data, $page];
    }

    function player_exp($username)
    {
        $page = new Page(4, "select count(*) as count from tb_user_exp where username = '{$username}';");
        $page_data = $page->select_data("select * from tb_user_exp where username = '{$username}'");
        return [$page_data, $page];
    }

    function player_lock($username)
    {
        $data = $this->db->update(
            "tb_player",
            "locked = 1",
            "username ='{$username}'"
        );
        return $data;
    }

    function player_unlock($username)
    {
        $data = $this->db->update(
            "tb_player",
            "locked = 0",
            "username ='{$username}'"
        );
        return $data;
    }

    function setting()
    {
        if ($_COOKIE['setting']['keyword']) {
            $keyword = $_COOKIE['setting']['keyword'];
            $page = new Page(4, "select count(*) as count from tb_notice where content like '%{$keyword}%' or title like '%{$keyword}%' and deleted <> 1;");
            $page_data = $page->select_data("select id, title, content, publish_time, active_time, deleted from tb_notice where content like '%{$keyword}%' or title like '%{$keyword}%' and deleted <> 1 order by id desc");

        } else {
            $page = new Page(4, "select count(*) as count from tb_notice where deleted <> 1;");
            $page_data = $page->select_data("select id, title, content, publish_time, active_time, deleted from tb_notice where deleted <> 1 order by id desc ");
        }
        return [$page_data, $page];
    }

    function setting_notice_change($id, $title, $content, $active_time)
    {
        $data = $this->db->update(
            "tb_notice",
//            "active_time ='{$active_time}' ",
            "title ='{$title}', content ='{$content}', active_time='{$active_time}' ",
            "id = {$id} "
        );
        return $data;
    }

    function setting_notice_delete($id)
    {
        $data = $this->db->update(
            "tb_notice",
            "deleted = 1 ",
            "id = {$id}"
        );
        return $data;
    }

    function setting_notice_insert($title, $content, $active_time)
    {
        $data = $this->db->insert(
            "tb_notice",
//            "title, content, active_time",
            "title, content, publish_time, active_time, deleted",
            "'{$title}', '{$content}', now(), '{$active_time}', 0 "
        );
        return $data;
    }

    function setting_vip()
    {
        $page = new Page(4, "select count(*) as count from tb_vip where deleted <> 1;");
        $page_data = $page->select_data("select id, level, price, deleted from tb_vip where deleted <> 1 order by price");
        return [$page_data, $page];
    }

    function setting_vip_insert($vip, $price)
    {
        $data = $this->db->insert(
            "tb_vip",
            "level, price, deleted",
            "'{$vip}', {$price}, 0"
        );
        return $data;
    }

    function setting_vip_delete($id)
    {
        $data = $this->db->update(
            "tb_vip",
            "deleted = 1 ",
            "id = {$id}"
        );
        return $data;
    }

    function setting_vip_change($id, $vip, $price)
    {
        $data = $this->db->update(
            "tb_vip",
            "level ='{$vip}', price ={$price}",
            "id = {$id} "
        );
        return $data;
    }

    function setting_stage()
    {
        $data_1 = $this->db->select(
            "*",
            "tb_stage"
        );
        $data_2 = $this->db->select(
            "*",
            "tb_map"
        // 为了完整判断map_id的最大值 保留已删除项目

        );
        $data = array_merge($data_1, $data_2);
        return $data;
    }

    function setting_stage_search($id)
    {

        if ($id >= 1000) {
            $map_id = $id % 1000;
            $stage_id = floor($id / 1000);
            $data = $this->db->select(
                "*",
                "tb_map",
//                "map_id={$map_id} and stage_id={$stage_id} and deleted <> 1"
                "map_id={$map_id} and stage_id={$stage_id}"
            );
        } else {
            $data = $this->db->select(
                "*",
                "tb_stage",
//                "id={$id} and deleted <> 1"
                "id={$id}"
            );
        }
//        return $stage_id;
        return $data;

    }


    function setting_stage_insert_stage($level, $img_1, $img_2)
    {
        $data = $this->db->insert(
            "tb_stage",
            "name, img_1, img_2, deleted",
            "'{$level}', '{$img_1}', '{$img_2}', 0 "
        );
        return $data;
    }

    function setting_stage_insert_map($stage_id, $name, $img_1, $img_2, $exp, $coins, $map_id)
    {
        $data = $this->db->insert(
            "tb_map",
            "name, img_1, img_2, deleted, stage_id, exp, coins, map_id",
            "'{$name}', '{$img_1}', '{$img_2}', 0 ,{$stage_id}, {$exp}, {$coins}, {$map_id}"
        );
        return $data;
    }

    function setting_stage_delete_map($stage_id, $map_id)
    {
        $data = $this->db->update(
            "tb_map",
            "deleted = 1 ",
            "stage_id = {$stage_id} and map_id = {$map_id}"
        );
        return $data;
    }

    function setting_stage_delete_stage($id)
    {
        $data = $this->db->update(
            "tb_stage",
            "deleted = 1 ",
            "id = {$id}"
        );
        $data0 = $this->db->update(
            "tb_map",
            "deleted = 1 ",
            "stage_id = {$id}"
        );
        return $data;
    }

    function setting_stage_change_map($name, $img_1, $img_2, $exp, $coins, $stage_id, $map_id)
    {
        $data = $this->db->update(
            "tb_map",
            "name = '{$name}', exp = {$exp}, img_1 ='{$img_1}',img_2 ='{$img_2}', coins ={$coins}",
            "stage_id = {$stage_id} and map_id = {$map_id}"
        );
        return $data;
    }

    function setting_stage_change_stage($id, $name, $img_1, $img_2)
    {
        $data = $this->db->update(
            "tb_stage",
            "name = '{$name}', img_1 ='{$img_1}',img_2 ='{$img_2}'",
            "id = {$id} "
        );
        return $data;
    }

    function setting_item()
    {

        $data = $this->db->select(
            "*",
            "tb_equip"
        );
        return $data;
    }

    function setting_item_search($id)
    {
        $data = $this->db->select(
            "*",
            "tb_equip",
            "id = {$id}"
        );
        return $data;
    }

    function setting_item_insert($vip, $img_1, $img_2, $type, $func_value, $name)
    {
        $data = $this->db->insert(
            "tb_equip",
            "name, img_1, img_2, vip, type, func_value, deleted",
            "'{$name}', '{$img_1}', '{$img_2}',  '{$vip}', '{$type}', {$func_value}, 0"
        );
        return $data;
    }

    function setting_item_delete($id)
    {
        $data = $this->db->update(
            "tb_equip",
            "deleted = 1 ",
            "id = {$id}"
        );
        return $data;
    }

    function setting_item_update($name, $img_1, $img_2, $id, $func_value, $vip){
        $data = $this->db->update(
            "tb_equip",
            "name = '{$name}', img_1 ='{$img_1}',img_2 ='{$img_2}', func_value={$func_value}, vip='{$vip}'",
            "id = {$id} "
        );
        return $data;
    }


}