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
            $page = new Page(4, "select count(*) as count from tb_notice where content like '%{$keyword}%';");
            $page_data = $page->select_data("select title, content, publish_time, active_time, deleted from tb_notice where content like '%{$keyword}%'");

        } else {
            $page = new Page(4, "select count(*) as count from tb_notice;");
            $page_data = $page->select_data("select title, content, publish_time, active_time, deleted from tb_notice");
        }
        return [$page_data, $page];
    }


}