<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/9
 * Time: 22:14
 */


$html = <<<EOD
        <input type='text' name='keyword'/>
        <button><a  id='_search' href='index.php?ctrl=Index&act=player'>搜索</a></button>
        <button><a>发布公告</a></button>
    <table class='gridtable'>
    <tr>
        <th>标题</th>
        <th>内容</th>
        <th>发布时间</th>
        <th>有效时间</th>
        <th>管理</th>
    </tr>
EOD;

echo $html;

foreach ($data as $item) {
    if($item['deleted'] == true){
        continue;
    }
    echo "<tr>";
    foreach ($item as $kay => $val) {
        if($kay == 'deleted'){
            continue;
        }
        echo "<td>{$val}</td>";
    }
    echo "<td><button class=\"md-trigger\" data-modal=\"modal-1\">更改</button> | <button id='_delete'>删除</button></td>";

    echo "</tr>";
}


echo "</table>";

echo "总计{$page -> row_count}条 共{$page -> page_count}页 当前第{$page -> page_current}页 ";

// 上一页
if (!$_GET['page_current'] or $_GET['page_current'] == 1) {
//            echo "<button><a href='index.php?ctrl=Index&act=player&page_current=" . (2) . "'>一页</a></button>";
} else if ($_GET['page_current'] > 1) {
    echo "<button><a href='index.php?ctrl=Index&act=setting&page_current=" . ($_GET['page_current'] - 1) . "'>上一页</a></button>";
}


// 下一页
if (!$_GET['page_current']) {
    echo "<button><a href='index.php?ctrl=Index&act=setting&page_current=" . (2) . "'>下一页</a></button>";
} else if ($_GET['page_current'] < $page->page_count) {
    echo "<button><a href='index.php?ctrl=Index&act=setting&page_current=" . ($_GET['page_current'] + 1) . "'>下一页</a></button>";
}


echo '<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3>公告更改</h3>
				<div>
                    <input type="text" name="title"/><br><br>
                    <textarea   name="content"></textarea><br><br>
					<button class="md-close">关闭</button>
				</div>
			</div>
		</div>

		';
?>


<script src="./js/jquery-1.12.0.min.js"></script>
<script>
    $(function () {



        // 搜索框
        $("input[name=keyword]").change(function () {
            $("#_search").attr("href", "index.php?ctrl=Index&act=setting&keyword=" + $(this).val())
        });


    });
