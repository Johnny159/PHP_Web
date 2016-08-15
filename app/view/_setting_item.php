<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/10
 * Time: 9:26
 */
?>
<!---->
<!--主样式-->
<link rel="stylesheet" type="text/css" href="./view/index_view/css/demo.css"/>
<!---->
<script src="./js/jquery-1.12.0.min.js"></script>
<!---->
<!--树形菜单-->
<script src="./js/jquery.ztree.core.js"></script>
<link rel="stylesheet" href="./css/metroStyle/metroStyle.css"/>
<!--<link rel="stylesheet" href="./css/demo.css"/>-->

<style>
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
    }

    #_stage {
        width: 15%;
        height: 400px;
        display: inline-block;
        position: absolute;
        top: 40px
    }

    #_stage_tree {
        width: 100%;
        height: 100%;
        z-index: 100;
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
<body>
<div id="_stage">
    <button class="md-trigger" data-modal="modal-1">添加</button>
    <br>
    <button class="md-trigger" data-modal="modal-2">删除</button>
    <br>
    <button class="md-trigger" data-modal="modal-3">更改</button>
    <br>
    <ul id="_stage_tree" class="ztree"></ul>
</div>

<div id="_iframe">

    <br><br>
    <table class="gridtable">
        <tr>
            <th>属性</th>
            <th>图片1</th>
            <th>图片2</th>
        </tr>
        <tr>
            <td>
                <p id="_name"></p>
            </td>
            <td>
                <img id="_img_1" style="max-width: 200px;max-height: 200px"/ >

            </td>
            <td>
                <img id="_img_2" style="max-width: 200px;max-height: 200px"/ >

            </td>
        </tr>
    </table>

    <!--    <iframe src="http://www.baidu.com/"></iframe>-->
</div>


<!--添加物品-->
<!--<button id="_map_change_button" class="md-trigger" data-modal="modal-7" style="display: none">确定</button>-->
<div class="md-modal md-effect-1" id="modal-1" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>添加物品</h3>

        <div>
            <form action="./index.php?ctrl=index&act=setting" enctype="multipart/form-data" method="post"
                  id="_item_insert">
                物品名:
                <input type="text" name="name" style="width:150px;"/><br><br>
                &nbsp;图片1:
                <input type="file" name="img_1" style="width:150px;"/><br><br>
                <img class="_pre_1" style="max-width:50px;"><br>
                &nbsp;图片2:
                <input type="file" name="img_2" style="width:150px;"/><br><br>
                <img class="_pre_2" style="max-width:50px;"><br>
                &nbsp;属性值:
                <input type="number" name="func_value" min="0" style="width:150px;"/><br><br>
                &nbsp;类别:
                <select name="type" style="width:150px;">
                    <option value="biker">biker</option>
                    <option value="moto">moto</option>
                    <option value="engine">engine</option>
                    <option value="wheel">wheel</option>
                </select>
                <br><br>
                VIP:
                <input type="text" name="vip" style="width:150px;"/><br><br>
            </form>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div>
        <br>

    </div>
</div>


<!--确认删除-->
<div class="md-modal md-effect-1" id="modal-2" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <div>
            <p>确认删除？</p>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div>
    </div>
</div>


<!--更改物品-->
<!--<button id="_map_change_button" class="md-trigger" data-modal="modal-7" style="display: none">确定</button>-->
<div class="md-modal md-effect-1" id="modal-3" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>更改物品</h3>

        <div>
            <form action="./index.php?ctrl=index&act=setting" enctype="multipart/form-data" method="post"
                  id="_item_update">
                物品名:
                <input type="text" name="name" style="width:150px;"/><br><br>
                &nbsp;图片1:
                <input type="file" name="img_1" style="width:150px;"/><br><br>
                <img class="_pre_1" style="max-width:50px;"><br>
                &nbsp;图片2:
                <input type="file" name="img_2" style="width:150px;"/><br><br>
                <img class="_pre_2" style="max-width:50px;"><br>
                &nbsp;属性值:
                <input type="number" name="func_value" min="0" style="width:150px;"/><br><br>
                VIP:
                <input type="text" name="vip" style="width:150px;"/><br><br>
                <input type="hidden" name="id">
            </form>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div>
        <br>

    </div>
</div>

<!--错误提示-->
<div class="md-modal md-effect-1" id="modal-5" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <div>
            <p>必填项内容不能为空</p>
            <button class="md-close">关闭</button>
        </div>
    </div>
</div>

<!--操作成功提示-->
<div class="md-modal md-effect-1" id="modal-6" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <div>
            <p>操作成功</p>
            <button class="md-close"><a href="index.php?ctrl=Index&act=setting_item">关闭</a></button>
        </div>
    </div>
</div>

<button id="_error_empty" class="md-trigger" data-modal="modal-5" style="display:none"></button>
<button id="_sure_back" class="md-trigger" data-modal="modal-6" style="display:none"></button>
</body>

<!--模态框-->
<link rel="stylesheet" type="text/css" href="./view/_modal_window/css/style.css"/>
<script src="./view/_modal_window/js/index.js"></script>

<script>
    $(function () {


        // 点击菜单回调
        function zTreeBeforeClick(treeId, treeNode, clickFlag) {


            // 标记选中的标签
            $("#_stage_tree").attr("data-choose", treeNode.id);

//            if(treeNode.id>1000)
//            {
//                return false;
//            }
            // 刷新数据
            $.ajax({
                url: 'index.php?ctrl=index&act=setting_item_search',
                type: 'post',
                data: {
                    id: treeNode.id
                },
                dataType: 'json',
                success: function (data) {
//                    alert(data);
                    console.log(data);
                    data = data[0];

                    $("#_name").html(
                        "<b>物品名：</b>"
                        + data['name']
                        + "<br><br><b>属性值：</b>"
                        + data['func_value']
                        + "<br><br><b>类别：</b>"
                        + data['type']
                        + "<br><br><b>VIP：</b>"
                        + data['vip']
                    );

                    $("#_img_1").attr("src", data['img_1']);
                    $("#_img_2").attr("src", data['img_2']);
                },
                error: function () {
                }
            })
        }

        var zTreeObj;
        var setting = {
            data: {
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "fid",
                    rootPId: 0
                }
            },
            view: {
                showIcon: false,
                fontCss: {
                    color: '#cecece'
                }
            },
            callback: {
                beforeClick: zTreeBeforeClick
            }
        };


        // 树形菜单
        $.ajax({
            url: 'index.php?ctrl=index&act=setting_item',
            type: 'post',
            data: {
                get_data: 1
            },
            dataType: 'json',
            success: function (data) {
//                alert(data);
                console.log(data);
                var new_data = [
                    {id: 1001, fid: 0, name: '车手'},
                    {id: 1002, fid: 0, name: '车身'},
                    {id: 1003, fid: 0, name: '引擎'},
                    {id: 1004, fid: 0, name: '车轮'}
                ];
                localStorage.stage_data = JSON.stringify(data);

                for (var i in data) {
                    console.log(data[i]);
//
                    if (data[i]['deleted'] == 1) {
                        continue;
                    }
//
                    if (data[i]['type'] == 'biker') {
                        fid = 1001
                    }
                    else if (data[i]['type'] == 'moto') {
                        fid = 1002
                    }
                    else if (data[i]['type'] == 'engine') {
                        fid = 1003
                    }
                    else if (data[i]['type'] == 'wheel') {
                        fid = 1004
                    }

                    new_data.push({
                        id: data[i]['id'],
                        name: data[i]['name'],
                        fid: fid
                    });
                }
//
                zTreeObj = $.fn.zTree.init($("#_stage_tree"), setting, new_data);
//                $("#_stage_tree  a:eq(0)").click();
                $("#_stage_tree_1_switch").click();
                $("#_stage_tree_2_span").click();
            },
            error: function (data) {
//                alert(data)
            }
        });

        // 添加物品-确定
        $("#modal-1 button._confirm").click(function () {
            var name = $("#modal-1 input[name=vip]").val();
            var img_1 = $("#modal-1 input[name=img_1]").val();
            var img_2 = $("#modal-1 input[name=img_2]").val();
            var func_value = $("#modal-1 input[name=func_value]").val();
            var type = $("#modal-1 select[name=type]").val();
            var vip = $("#modal-1 input[name=vip]").val();

            if (!vip || !img_1 || !img_2 || !name || !func_value || !type) {
//                alert();
                $("#_error_empty").click();
                return;
            }

            var formData = new FormData($("#_item_insert")[0]);
            $.ajax({
                url: 'index.php?ctrl=Index&act=setting_item_insert',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
//                    alert(data);
                    $("#_sure_back").click();
                    $("#modal-1 button.md-close").click();
                },
                error: function (data) {
//                    alert(data);
                    $("#_error_empty").click();
                }
            });
        });


        // 删除物品-确定
        $("#modal-2 button._confirm").click(function () {
            var id = $("#_stage_tree").attr("data-choose");
//            alert(id);
            if (id < 1000) {
                $.ajax({
                    url: 'index.php?ctrl=Index&act=setting_item_delete',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'text',
                    success: function (data) {
//                        alert(data);
                        $("#_sure_back").click();
                        $("#modal-2 button.md-close").click();
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            } else {
                alert("请先选中要删除物品")
            }


        });

        // 更改物品-确定
        $("#modal-3 button._confirm").click(function () {
            var name = $("#modal-3 input[name=vip]").val();
            var img_1 = $("#modal-3 input[name=img_1]").val();
            var img_2 = $("#modal-3 input[name=img_2]").val();
            var func_value = $("#modal-3 input[name=func_value]").val();
            var vip = $("#modal-3 input[name=vip]").val();
            var id = $("#_stage_tree").attr("data-choose");
            $("#modal-3 input[name=id]").val(id);


            if (id > 1000) {
                alert('请先选中要修改物品');
                return false;
            }

            if (!vip || !img_1 || !img_2 || !name || !func_value) {
//                alert();
                $("#_error_empty").click();
                return;
            }


            var formData = new FormData($("#_item_update")[0]);
            $.ajax({
                url: 'index.php?ctrl=Index&act=setting_item_update',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
//                    alert(data);
                    $("#_sure_back").click();
                    $("#modal-3 button.md-close").click();
                },
                error: function (data) {
//                    alert(data);
                    $("#_error_empty").click();
                }
            });
        });

        // 图片预览
        $("#modal-1 input[name=img_1]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#modal-1 ._pre_1").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-1 input[name=img_2]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#modal-1 ._pre_2").attr('src', this.result)
            }
        });

        // 图片预览
        $("#modal-3 input[name=img_1]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#modal-3 ._pre_1").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-3 input[name=img_2]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#modal-3 ._pre_2").attr('src', this.result)
            }
        });


    })


</script>

