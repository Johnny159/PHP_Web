<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/9
 * Time: 22:14
 */


$html = <<<EOD
        <input type='text' name='keyword'/>
        <button><a  id='_search' href='index.php?ctrl=Index&act=setting&undo=true'>搜索</a></button>
        <button class="md-trigger" data-modal="modal-2"><a>发布公告</a></button>
    <table class='gridtable'>
    <tr>
        <th>ID</th>
        <th>标题</th>
        <th>内容</th>
        <th>发布时间</th>
        <th>有效时间</th>
        <th>管理</th>
    </tr>
EOD;

echo $html;

foreach ($data as $item) {
    if ($item['deleted'] == true) {
        continue;
    }
    echo "<tr>";
    foreach ($item as $kay => $val) {
        if ($kay == 'deleted') {
            continue;
        }
        echo "<td>{$val}</td>";
    }
    echo "<td><button class=\"md-trigger\" data-modal=\"modal-1\">更改</button> | <button id='_delete' class=\"md-trigger\" data-modal=\"modal-3\">删除</button></td>";

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
if ((!$_GET['page_current']) and $page->page_count > 1) {
    echo "<button><a href='index.php?ctrl=Index&act=setting&page_current=" . (2) . "'>下一页</a></button>";
} else if ($_GET['page_current'] < $page->page_count and $page->page_count > 1) {
    echo "<button><a href='index.php?ctrl=Index&act=setting&page_current=" . ($_GET['page_current'] + 1) . "'>下一页</a></button>";
}


echo '
        <div class="md-modal md-effect-1" id="modal-1" style="width: 30%">
			<div class="md-content">
				<h3>公告更改</h3>
				<div>
                    标&nbsp;&nbsp;&nbsp;题:
                    <input type="text" name="title" style="width:200px;"/><br><br>
                    内&nbsp;&nbsp;&nbsp;容:
                    <textarea name="content" style="width:200px;height:100px;resize: none;text-align: left"></textarea><br><br>
                    有效期:
                    <input type="text" name="active_time" style="width:200px;"/><br><br>
					<button class="_confirm md-trigger" data-modal="modal-4">确定</button>
					<button class="md-close">关闭</button>
				</div>
			</div>
		</div>


		<div class="md-modal md-effect-1" id="modal-2" style="width: 30%">
			<div class="md-content">
				<h3>发布公告</h3>
				<div>
                    <div>
                    标&nbsp;&nbsp;&nbsp;题:
                    <input type="text" name="title" style="width:200px;"/><br><br>
                    内&nbsp;&nbsp;&nbsp;容:
                    <textarea name="content" style="width:200px;height:100px;resize: none;text-align: left"></textarea><br><br>
                    有效期:
                    <input type="text" name="active_time" style="width:200px;"/><br><br>
					<button class="_confirm" data-modal="modal-4">确定</button>
					<button class="md-close">关闭</button>
				</div>
				</div>
			</div>
		</div>


		<div class="md-modal md-effect-1" id="modal-3" style="width: 10%">
			<div class="md-content">
				<div>
				    <p>确认删除公告？</p><br>
					<button class="_confirm md-trigger" data-modal="modal-4">确定</button>
					<button class="md-close">取消</button>
				</div>
			</div>
		</div>


		<div class="md-modal md-effect-1" id="modal-4" style="width: 10%">
			<div class="md-content">
				<div>
				    <p>操作成功</p><br>
					<button class="md-close"><a href="index.php?ctrl=Index&act=setting&page_current='.($_GET[page_current]?$_GET[page_current]:1).'">关闭</a></button>
				</div>
			</div>
		</div>

		<div class="md-modal md-effect-1" id="modal-5" style="width: 10%">
			<div class="md-content">
				<div>
				    <p>必填项内容不能为空</p><br>
					<button class="md-close">关闭</button>
				</div>
			</div>
		</div>
		<button id="_error_empty" class="md-trigger" data-modal="modal-5" style="display:none"></button>
		<button id="_sure_back" class="md-trigger" data-modal="modal-4" style="display:none"></button>


		';
?>


<script src="./js/jquery-1.12.0.min.js"></script>
<script>
    $(function () {

        // 搜索框
        $("input[name=keyword]").change(function () {
            if ($(this).val()) {
                $("#_search").attr("href", "index.php?ctrl=Index&act=setting&keyword=" + $(this).val())
            } else {
                $("#_search").attr("href", "index.php?ctrl=Index&act=setting&undo=true")
            }
        });

        // 更改按钮
        $("table button:contains('更改')").click(function () {
            var row = $(this).parent().parent();
            $("#modal-1 input[name=title]").val(row.children("td:eq(1)").text());
            $("#modal-1 textarea[name=content]").val(row.children("td:eq(2)").text());
            $("#modal-1 input[name=active_time]").val(row.children("td:eq(4)").text());
            $("#modal-1").attr("data-id", row.children("td:eq(0)").text())
        });

        // 更改-确定
        $("#modal-1 button._confirm").click(function () {
            var id = $("#modal-1").attr("data-id");
            var title = $("#modal-1 input[name=title]").val();
            var content = $("#modal-1 textarea[name=content]").val();
            var active_time = $("#modal-1 input[name=active_time]").val();

            $.ajax({
                url: 'index.php?ctrl=index&act=setting_notice_change',
                type: 'post',
                data: {
                    id: id,
                    title: title,
                    content: content,
                    active_time: active_time
                },
                success: function (data) {
//                    alert(data);
                    $("#modal-1 button.md-close").click();
                }
            });
        });

        // 删除
        $("table button:contains('删除')").click(function () {
            var row = $(this).parent().parent();
            $("#modal-3").attr("data-id", row.children("td:eq(0)").text())
        });


        // 删除-确定
        $("#modal-3 button._confirm").click(function () {
            var id = $("#modal-3").attr("data-id");
            $.ajax({
                url: 'index.php?ctrl=index&act=setting_notice_delete',
                type: 'post',
                data: {
                    id: id
                },
                success: function (data) {
//                    alert(data);
                    $("#modal-3 button.md-close").click();
                }
            });
        });

        // 发布公告-确定
        $("#modal-2 button._confirm").click(function () {
            var title = $("#modal-2 input[name=title]").val();
            var content = $("#modal-2 textarea[name=content]").val();
            var active_time = $("#modal-2 input[name=active_time]").val();

            if (!title || !content || !active_time) {
                $("#_error_empty").click();

            } else {
                $.ajax({
                    url: 'index.php?ctrl=index&act=setting_notice_insert',
                    type: 'post',
                    data: {
                        title: title,
                        content: content,
                        active_time: active_time
                    },
                    success: function (data) {
//                        alert(data);
                        $("#modal-2 button.md-close").click();
                        $("#_sure_back").click();
                    }
                });
            }
        })
    });

</script>
<link rel="stylesheet" type="text/css" href="./view/index_view/css/demo.css"/>
<link rel="stylesheet" type="text/css" href="./view/index_view/css/component.css"/>
<link rel="stylesheet" type="text/css" href="./view/_modal_window/css/style.css"/>
<script src="./view/_modal_window/js/index.js"></script>
<style>

    *{
        text-align: center;
    }

    table{

        margin: 20px auto ;
    }
    table a{
        color:#333333;
        cursor: pointer;
    }

    table.gridtable {
        font-size:11px;
        color:#333333;
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
