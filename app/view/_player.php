<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/9
 * Time: 13:47
 */

$html = <<<EOD
        <input type='text' name='keyword'/>
        <button><a  id='_search' href='index.php?ctrl=Index&act=player'>搜索</a></button>
    <table class='gridtable'>
    <tr>
        <th>用户名</th>
        <th>VIP 等级</th>
        <th>金币</th>
        <th>经验</th>
        <th>注册时间</th>
        <th>最近一次登陆</th>
        <th>已充值</th>
        <th>状态</th>
        <th>管理</th>
    </tr>
EOD;

echo $html;

foreach ($data as $item) {
    echo "<tr>";
    foreach ($item as $kay => $val) {
        echo "<td>{$val}</td>";
    }
    echo "<td><button class=\"md-trigger\" data-modal=\"modal-1\">查看详情</button> | <button id='_lock'>锁定</button></td>";

    echo "</tr>";
}


echo "</table>";

echo "总计{$page -> row_count}条 共{$page -> page_count}页 当前第{$page -> page_current}页 ";

// 上一页
if (!$_GET['page_current'] or $_GET['page_current'] == 1) {
//            echo "<button><a href='index.php?ctrl=Index&act=player&page_current=" . (2) . "'>一页</a></button>";
} else if ($_GET['page_current'] > 1) {
    echo "<button><a href='index.php?ctrl=Index&act=player&page_current=" . ($_GET['page_current'] - 1) . "'>上一页</a></button>";
}


// 下一页
if (!$_GET['page_current']) {
    echo "<button><a href='index.php?ctrl=Index&act=player&page_current=" . (2) . "'>下一页</a></button>";
} else if ($_GET['page_current'] < $page->page_count) {
    echo "<button><a href='index.php?ctrl=Index&act=player&page_current=" . ($_GET['page_current'] + 1) . "'>下一页</a></button>";
}


echo '<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content">
				<h3>玩家详情</h3>
				<div>
				    <button>基本信息</button>
				    <button>拥有角色/装备</button>
				    <button>充值记录</button>
				    <button>经验记录</button>
                    <iframe width="100%" height="250px" id="player_window"></iframe><br>
					<button class="md-close">关闭</button>
				</div>
			</div>
		</div>

		';
?>


<script src="./js/jquery-1.12.0.min.js"></script>
<script>
    $(function () {

        // 玩家详情
        $("table button.md-trigger:contains('查看详情')").click(function () {
            var username = $(this).parent().parent().children("td:eq(0)").text();
            $("iframe#player_window").attr("src", "index.php?ctrl=index&act=player_data&username=" + username);

            $(".md-content button:contains('基本信息')").click(function () {
                $("iframe#player_window").attr("src", "index.php?ctrl=index&act=player_data&username=" + username);
            });

            $(".md-content button:contains('拥有角色/装备')").click(function () {
                $("iframe#player_window").attr("src", "index.php?ctrl=index&act=player_equip&username=" + username);
            });

            $(".md-content button:contains('充值记录')").click(function () {
                $("iframe#player_window").attr("src", "index.php?ctrl=index&act=player_charge&username=" + username);
            });

            $(".md-content button:contains('经验记录')").click(function () {
                $("iframe#player_window").attr("src", "index.php?ctrl=index&act=player_exp&username=" + username);
            })
        });

        // 搜索框
        $("input[name=keyword]").change(function () {
            $("#_search").attr("href", "index.php?ctrl=Index&act=player&keyword=" + $(this).val())
        });






        $("table button#_lock").click(function () {
            var username = $(this).parent().parent().children("td:eq(0)").text();
            var lock_val = $(this).parent().parent().children("td:eq(7)");
            var self = $(this);

            if ($(this).text() == '解锁') {
                $.ajax({
                    url: "index.php?ctrl=Index&act=player_lock&unlock=" + username,
                    type: 'get',
                    dataType: "text",
                    success: function () {
                        self.text('锁定');
                        self.parent().parent().children("td:eq(7)").text('0');
                    }
                });

            } else {
                $.ajax({
                    url: "index.php?ctrl=Index&act=player_lock&lock=" + username,
                    type: 'get',
                    dataType: "text",
                    success: function () {
                        self.text('解锁');
                        self.parent().parent().children("td:eq(7)").text('1');

                    }
                });
            }
        });


    })


</script>
