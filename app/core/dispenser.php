<?php

function __autoload($class_name){
	
	$file_name = '../'.$class_name.'.class.php';

	if(file_exists($file_name)){
		require_once $file_name;
	}

	$file_name = '../control/'.$class_name.'.class.php';

	if(file_exists($file_name)){
		require_once $file_name;
	}else{
		echo "导入 {$file_name} 出错!";
	}
}

// $n = new Captcha();
// $control_name = $_GET['ctrl'].'_control';
$control_name = 'Login'.'_control';
$control = new $control_name();
$control -> do_action();

?>