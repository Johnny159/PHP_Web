<?php

class Factory
{

    static $ins;

    static $class_dir = [
        './control/',
        './model/',
        './public/',
        './'
    ];


    function __construct()
    {



//		导入核心基类
        require './core/control.class.php';
        require './core/model.class.php';

//		导入控制器 模型
//      todo 使用spl_autoload_register() 时 Fatal error
//		spl_autoload_register(__CLASS__, 'load_control');
//		spl_autoload_register(__CLASS__, "load_model");
        function __autoload($class_name)
        {

            // todo 考虑写入 全局变量 config
            $class_dir = Factory::$class_dir;

            // 遍历载入模块
            foreach ($class_dir as $d) {
                $file_name = $d . $class_name . '.class.php';
                if (file_exists($file_name)) {
                    require_once $file_name;
//                    echo '__autoload() | 导入 {'.$file_name.'} 成功<br>';
                    error_log('__autoload() | 导入 {'.$file_name.'} 成功<br>');

                    $is_loaded = true;
                    break;
                }
            }

            // 错误处理
            if($is_loaded == null){
//                echo "__autoload() | {$class_name} 类无法导入";
                error_log("{$class_name} 类无法导入");
            }
        }

//      导入数据库
        require './database/database.class.php';


        error_log("Factory.__construct() |");

    }


    static function get_factory()
    {

        if (self::$ins == null) {
            self::$ins = new Factory();
        }
        return self::$ins;
    }


    function run()
    {

        error_log("Factory.run() |");
        $c = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Login';
        $control_name = $c . '_Control';

        $control = new $control_name();
        $control->do_action();
    }


}

?>