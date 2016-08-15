<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/9
 * Time: 16:34
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
                <th>id</th>
                <th>用户名</th>
                <th>充值金额</th>
                <th>充值时间</th>
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
    echo "<button><a href='index.php?ctrl=Index&act=player_charge&page_current=" . ($_GET['page_current'] - 1) . "'>上一页</a></button>";
}



// 下一页
if (!$_GET['page_current']) {
    echo "<button><a href='index.php?ctrl=Index&act=player_charge&page_current=" . (2) . "'>下一页</a></button>";
} else if ($_GET['page_current'] < $page->page_count) {
    echo "<button><a href='index.php?ctrl=Index&act=player_charge&page_current=" . ($_GET['page_current'] + 1) . "'>下一页</a></button>";
}
?>
<link rel="stylesheet" type="text/css" href="./view/_modal_window/css/style.css"/>
<style>
    a {
        text-decoration: none;
        color: #cecece;
        outline: none;
    }

    * {
        font-family: '微软雅黑 Light';
        text-align: center;
    }

    body {
        vertical-align: top;
    }

    div {
        display: inline-block;
    }

    #_iframe {
        width: 100%;
        height: 400px;
        color: #cecece;
        text-align: center;
    }

    #_iframe img {
        margin: 0 auto;
    }

    iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    table {

        margin: 20px auto;
    }

    table a {
        color: #333333;
        cursor: pointer;
    }

    table.gridtable {
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }

    table.gridtable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #cecece;
    }

    table.gridtable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>
