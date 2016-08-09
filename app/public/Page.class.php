<?php

// class Page1{

// 	private $page_current;
// 	private $page_size;
// 	private $page_count;
// 	private $row_count;

// 	function __construct($page_size, $sql){

// 		// 设置属性
// 		$this->page_size = $page_size;
// 		$this->page_current = $_GET['page_current']?$_GET['page_current']:1;

// 		// 查询数据条数
// 		$rs = mysql_query($sql);
// 		$arr = mysql_fetch_assoc($rs);
// 		$this->row_count = $arr['count'];
// 		print_r($arr['count']);

// 		// 计算分页数
// 		$this->page_count = ceil($this->row_count/$this->page_size);

// 	}

// 	function __destruct(){

// 	}

// 	function select_data($sql){

// 		$offset = ($this->page_current-1)*$this->page_size;
// 		// echo $this->page_current;

// 		$sql.=" limit {$this->page_size} offset {$offset};";
// 		$rs = mysql_query($sql);
// 		$rs_arr =[];
// 		while($arr = mysql_fetch_assoc($rs)){
// 			// print_r($arr);
// 			$rs_arr[] = $arr;
// 		}

// 		return $rs_arr;
// 	}

// 	function __get($item){
// 		return $this -> $item;
// 	}
// }


// ------------------------------------------------------------
class Page{

	private $page_count;	
	private $page_size;	
	private $page_current;	
	private $row_count;	


	function __construct($page_size, $sql){
		$this -> page_current = isset($_GET['page_current'])?$_GET['page_current']:1;
		$this -> page_size = $page_size;

		$rs = mysql_query($sql);
		$arr = mysql_fetch_assoc($rs);
		$this -> row_count = $arr['count'];

		$this -> page_count = ceil($this->row_count/$this->page_size);

	}

	function select_data($sql){

		$offset = ($this -> page_current - 1)*$this -> page_size;

		$sql .= " limit {$this->page_size} offset {$offset};";
		$rs = mysql_query($sql);
		// var_dump($sql);

		$rs_arr = [];
		while($arr = mysql_fetch_assoc($rs)){
			$rs_arr[] = $arr;
		}
		return $rs_arr;

	}
	function __get($item){
		return $this->$item;
	}


}

// ------------------------------------------------------------

//require 'config.php';
//require 'Database.class.php';
//
//// 数据库
//$db = Database::getinstance($config);
//
//// 分页
//$page = new Page(3, "select count(*) as count from tb_admin;");
//$page_data = $page -> select_data("select * from tb_admin");
//// print_r($page_data);
//
//// 数据显示
//foreach($page_data as $item){
//
//	echo '<table border=1>';
//	echo '<tr>';
//
//	foreach ($item as $key => $value) {
//		echo '<td>';
//		echo $value;
//		echo '</td>';
//	}
//
//	echo '</tr>';
//	echo '</table>';
//}
//// var_dump($page->page_count);
//// var_dump($page->page_current);
//echo "共{$page -> page_count}页 当前第{$page -> page_current}页";
//
//if(!$_GET['page_current']){
//	echo "<a href='page.class.php?page_current=".(2)."'>下一页</a>";
//}else if($_GET['page_current'] < $page -> page_count){
//	echo "<a href='page.class.php?page_current=".($_GET['page_current']+1)."'>下一页</a>";
//}

?>