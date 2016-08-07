<?php



$config = [
	'name' => 'root',
	'password' => '1994180438',
	'server' => 'localhost',
	'port' => '3306' // todo ??
];

// todo 重构 config 类，可利用 autoload 自动载入 46783567
class Config {

    static $database = [
        'name' => 'root',
        'password' => '1994180438',
        'server' => 'localhost',
        'port' => '3306'
    ];

}

?>