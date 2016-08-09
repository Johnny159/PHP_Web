<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/9
 * Time: 15:41
 */

$tr = "";
foreach($data as $item){
    $tr.= "<tr>";
    foreach($item as $key => $val){
        $tr.= "<td>";
        $tr.= $val;
        $tr.= "</td>";

    }
    $tr.= "</tr>";

}

$html = <<<EOD
        <table class='gridtable'>
            <tr>
                <th>用户名</th>
                <th>商品 id</th>
                <th>商品类型</th>
                <th>购买时间</th>
                <th>vip</th>
            </tr>
            {$tr}
        </table>
        <span>总计{$page -> row_count}条 共{$page -> page_count}页 当前第{$page -> page_current}页 </span>

EOD;

echo $html;


// 上一页
if (!$_GET['page_current'] or $_GET['page_current'] == 1) {
//            echo "<button><a href='index.php?ctrl=Index&act=player&page_current=" . (2) . "'>一页</a></button>";
} else if ($_GET['page_current'] > 1) {
    echo "<button><a href='index.php?ctrl=Index&act=player_equip&page_current=" . ($_GET['page_current'] - 1) . "'>上一页</a></button>";
}



// 下一页
if (!$_GET['page_current']) {
    echo "<button><a href='index.php?ctrl=Index&act=player_equip&page_current=" . (2) . "'>下一页</a></button>";
} else if ($_GET['page_current'] < $page->page_count) {
    echo "<button><a href='index.php?ctrl=Index&act=player_equip&page_current=" . ($_GET['page_current'] + 1) . "'>下一页</a></button>";
}
?>