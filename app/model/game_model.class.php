<?php

/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/15
 * Time: 16:20
 */
class Game_Model extends Model
{

    function test()
    {
        return 'qweqwe';
    }

    function sign_name_check($username)
    {
        $data = $this->db->select(
            "*",
            "tb_player",
            "username = '{$username}'"
        );
        return count($data);
    }

}