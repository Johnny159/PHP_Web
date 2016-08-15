<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/10
 * Time: 9:26
 */

?>

<div id="_stage">
    <button class="md-trigger" data-modal="modal-1">添加赛事</button>
    <br>
    <button class="md-trigger" data-modal="modal-2">添加赛段</button>
    <br>
    <button class="md-trigger" data-modal="modal-3">删除</button>
    <button class="" data-modal="modal-4">更改</button>
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


<!--添加赛事-->
<div class="md-modal md-effect-1" id="modal-1" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>添加赛事</h3>

        <div>
            <form action="./index.php?ctrl=index&act=setting_stage_insert_stage" enctype="multipart/form-data"
                  method="post" id="_stage_update">
                赛事名:
                <input type="text" name="vip" style="width:150px;"/><br><br>
                &nbsp;图片1:
                <input type="file" name="img_1" style="width:150px;"/><br>
                <img id="_pre_img_1" style="max-width:50px;"><br>
                &nbsp;图片2:
                <input type="file" name="img_2" style="width:150px;"/><br><br>
                <img id="_pre_img_2" style="max-width:50px;"><br>
                <!--                <input type="submit"  value="cc"/>-->
            </form>
            <button class="_confirm" data-modal="modal-4">确定</button>
            <button class="md-close">关闭</button>
        </div>
    </div>
</div>


<!--添加赛段-->
<div class="md-modal md-effect-1" id="modal-2" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>添加赛段</h3>

        <div>
            <form action="./index.php?ctrl=index&act=setting" enctype="multipart/form-data" method="post"
                  id="_map_update">
                赛事:
                <select name="stage_id" style="width:150px;">

                </select><br><br>
                赛段名:
                <input type="text" name="map" style="width:150px;"/><br><br>
                &nbsp;图片1:
                <input type="file" name="img_1" style="width:150px;"/><br>
                <img id="_pre_1" style="max-width:50px;"><br>
                &nbsp;图片2:
                <input type="file" name="img_2" style="width:150px;"/><br><br>
                <img id="_pre_2" style="max-width:50px;"><br>
                &nbsp;奖励经验:
                <input type="number" name="exp" min="0" style="width:150px;"/><br><br>
                &nbsp;奖励金币:
                <input type="number" name="coins" min="0" style="width:150px;"/><br><br>
                <!--                <input type="submit"  value="cc"/>-->
                <input type="hidden" name="map_id">
            </form>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div>
    </div>
</div>


<!--确认删除-->
<div class="md-modal md-effect-1" id="modal-3" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <div>
            <p>确认删除？</p>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div>
    </div>
</div>


<!--赛事更改-->
<div class="md-modal md-effect-1" id="modal-4" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>赛事更改</h3>

        <div>
        </div>
        <button class="md-close">关闭</button>
    </div>
</div>


<!--赛段更改-->
<button id="_map_change_button" class="md-trigger" data-modal="modal-7" style="display: none">确定</button>
<div class="md-modal md-effect-1" id="modal-7" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>赛段更改</h3>

        <div>
            <form action="./index.php?ctrl=index&act=setting" enctype="multipart/form-data" method="post"
                  id="_map_change">
                <!--                赛事:-->
                <!--                <select name="stage_id" style="width:150px;">-->
                <!--                </select><br><br>-->
                赛段名:
                <input type="text" name="name" style="width:150px;"/><br><br>
                &nbsp;图片1:
                <input type="file" name="img_1" style="width:150px;"/><br>
                <img class="_pre_1" style="max-width:50px;"><br>
                &nbsp;图片2:
                <input type="file" name="img_2" style="width:150px;"/><br><br>
                <img class="_pre_2" style="max-width:50px;"><br>
                &nbsp;奖励经验:
                <input type="number" name="exp" min="0" style="width:150px;"/><br><br>
                &nbsp;奖励金币:
                <input type="number" name="coins" min="0" style="width:150px;"/><br><br>
                <input type="hidden" name="id">
            </form>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div><br>

    </div>
</div>


<!--赛事更改-->
<button id="_stage_change_button" class="md-trigger" data-modal="modal-8" style="display: none">确定</button>
<div class="md-modal md-effect-1" id="modal-8" style="width: 30%">
    <div class="md-content" style="width: 100%">
        <h3>赛事更改</h3>
        <div>
            <form action="./index.php?ctrl=index&act=setting" enctype="multipart/form-data" method="post"
                  id="_stage_change">

                赛事名:
                <input type="text" name="name" style="width:150px;"/><br><br>
                &nbsp;图片1:
                <input type="file" name="img_1" style="width:150px;"/><br>
                <img id="_pre_1" style="max-width:50px;"><br>
                &nbsp;图片2:
                <input type="file" name="img_2" style="width:150px;"/><br><br>
                <img id="_pre_2" style="max-width:50px;"><br>

                <input type="hidden" name="id">
            </form>
            <button class="_confirm">确定</button>
            <button class="md-close">关闭</button>
        </div><br>

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
            <button class="md-close"><a href="index.php?ctrl=Index&act=setting_stage">关闭</a></button>
        </div>
    </div>
</div>

<button id="_error_empty" class="md-trigger" data-modal="modal-5" style="display:none"></button>
<button id="_sure_back" class="md-trigger" data-modal="modal-6" style="display:none"></button>


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
<!--模态框-->
<link rel="stylesheet" type="text/css" href="./view/_modal_window/css/style.css"/>
<script src="./view/_modal_window/js/index.js"></script>


<script>

    $(function () {
        // 点击菜单回调
        function zTreeBeforeClick(treeId, treeNode, clickFlag) {

//            alert(treeNode.id);

            // 标记选中的标签
            $("#_stage_tree").attr("data-choose", treeNode.id);
//            localStorage._stage_tree_current = JSON.stringify(treeNode);

            // 刷新数据
            $.ajax({
                url: 'index.php?ctrl=index&act=setting_stage_search',
                type: 'post',
                data: {
                    id: treeNode.id
                },
                dataType: 'json',
                success: function (data) {
//                    alert(data);
                    console.log(data);
                    data = data[0];
                    if (data['stage_id']) {
                        $("#_name").html("<b>赛段名：</b>" + data['name'] + "<br><br><b>奖励经验：</b>" + data['exp'] + "<br><br><b>奖励金币：</b>" + data['coins'])
                    } else {
                        $("#_name").html("<b>赛事名：</b>" + data['name'])
                    }
                    $("#_img_1").attr("src", data['img_1']);
                    $("#_img_2").attr("src", data['img_2']);
                }
            })
        }

        var zTreeObj;
        var setting = {
            data: {
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "stage_id",
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

        $.ajax({
            url: 'index.php?ctrl=index&act=setting_stage',
            type: 'post',
            data: {
                get_data: 1
            },
            dataType: 'json',
            success: function (data) {
//                alert(data);
                var new_data = [];
                localStorage.stage_data = JSON.stringify(data);

                for (var i in data) {
//                    console.log(data[i]);

                    if (data[i]['deleted'] == 1) {
                        continue;
                    }

                    if (data[i]['stage_id']) {
                        // 赛道
                        new_data.push({
                            id: data[i]['stage_id'] * 1000 - (-data[i]['map_id']),
                            name: data[i]['name'],
                            stage_id: data[i]['stage_id']
                        })
                    } else {
                        // 赛事
                        new_data.push({
                            id: data[i]['id'],
                            name: data[i]['name']
                        })
                    }
                }

                zTreeObj = $.fn.zTree.init($("#_stage_tree"), setting, new_data);
                $("#_stage_tree a:eq(0)").click();
            }
        });


        // 添加赛事-确定
        $("#modal-1 button._confirm").click(function () {
            var vip = $("#modal-1 input[name=vip]").val();
            var img_1 = $("#modal-1 input[name=img_1]").val();
            var img_2 = $("#modal-1 input[name=img_2]").val();

            if (!vip || !img_1 || !img_2) {
//                alert();
                $("#_error_empty").click();
                return;
            }

            var formData = new FormData($("#_stage_update")[0]);
            $.ajax({
                url: 'index.php?ctrl=Index&act=setting_stage_insert_stage',
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

        // 添加赛段
        $("button:contains('添加赛段')").click(function () {

            var data = JSON.parse(localStorage.stage_data);
            console.log(data);
            var option = "<option></option>";
            for (var i in data) {
                // 挑选赛事
                if (!data[i]['stage_id'] && data[i]['deleted'] != 1) {
                    option += "<option value='" + data[i]['id'] + "'>" + data[i]['name'] + "</option>"
                }

//
            }
            $("#modal-2 select").html(option);
        });

        // 添加赛段-选择赛事
        $("#modal-2 select").change(function () {
//            alert();
            var data = JSON.parse(localStorage.stage_data);
            var stage_id = $(this).val();
            var map_max = 0;

            // 赛事下赛道id最大值
            for (var i in data) {
                if (data[i]['stage_id'] == stage_id) {
                    if (data[i]['map_id'] > map_max) {
                        map_max = data[i]['map_id'];


                    }
                }
            }
//            alert(map_max-(-1));
            $("#modal-2").attr("data-map_id", map_max - (-1))

        });

        // 添加赛段-确定
        $("#modal-2 button._confirm").click(function () {
//            alert()
            var stage_id = $("#modal-2 select[name=stage_id]").val();
            var name = $("#modal-2 input[name=map]").val();
            var img_1 = $("#modal-2 input[name=img_1]").val();
            var img_2 = $("#modal-2 input[name=img_2]").val();
            var exp = $("#modal-2 input[name=exp]").val();
            var coins = $("#modal-2 input[name=coins]").val();
            var map_id = $("#modal-2").attr("data-map_id");


            // 隐藏域 赋值 map_id
            $("#modal-2 input[name=map_id]").val(map_id);

            if (!stage_id || !name || !img_1 || !img_2 || !exp || !coins) {
                $("#_error_empty").click();
                return false;
            }

            var formData = new FormData($("#_map_update")[0]);


            $.ajax({
                url: 'index.php?ctrl=Index&act=setting_stage_insert_map',
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
                    $("#modal-2 button.md-close").click();
                },
                error: function (data) {
//                    alert(data);
                    $("#_error_empty").click();

                }
            });


        });


        //  删除-确定
        $("#modal-3 button._confirm").click(function () {
            var id = $("#_stage_tree").attr("data-choose");

            $.ajax({
                url: 'index.php?ctrl=index&act=setting_stage_delete',
                type: 'post',
                data: {
                    id: id
                },
                success: function (data) {
//                    alert(data)
                    $("#_sure_back").click();
                    $("#modal-3 button.md-close").click();
                },
                error: function (data) {
                    alert(data)
                }
            })
        });


        // todo 更改
        $("#_stage button:contains('更改')").click(function () {
//            alert();
            var id = $("#_stage_tree").attr("data-choose");

            if (id > 1000) {
                // 赛段
                $("#_map_change_button").click();
            }
            else if (id <= 1000) {
//              赛事
                $("#_stage_change_button").click();

            }
        });


        // 赛段更改-确定
        $("#modal-7 button._confirm").click(function () {

            var name = $("#modal-7 input[name=name]").val();
            var img_1 = $("#modal-7 input[name=img_1]").val();
            var img_2 = $("#modal-7 input[name=img_2]").val();
            var exp = $("#modal-7 input[name=exp]").val();
            var coins = $("#modal-7 input[name=coins]").val();

            if ( !name || !img_1 || !img_2 || !exp || !coins) {
                $("#_error_empty").click();
                return false;
            }

            var id = $("#_stage_tree").attr("data-choose");
            $("#modal-7 input[name=id]").val(id);

            var formData = new FormData($("#_map_change")[0]);


            $.ajax({
                url: 'index.php?ctrl=Index&act=setting_stage_change_map',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
                    alert(data);
                    $("#_sure_back").click();
                    $("#modal-7 button.md-close").click();
                },
                error: function (data) {
//                    alert(data);
//                    $("#_error_empty").click();
                }
            });
        });


        // todo 赛事更改-确定
        $("#modal-8 button._confirm").click(function () {
            var name = $("#modal-8 input[name=name]").val();
            var img_1 = $("#modal-8 input[name=img_1]").val();
            var img_2 = $("#modal-8 input[name=img_2]").val();

            if ( !name || !img_1 || !img_2) {
                $("#_error_empty").click();
                return false;
            }

            var id = $("#_stage_tree").attr("data-choose");
            $("#modal-8 input[name=id]").val(id);

            var formData = new FormData($("#_stage_change")[0]);


            $.ajax({
                url: 'index.php?ctrl=Index&act=setting_stage_change_stage',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function (data) {
                    alert(data);
                    $("#_sure_back").click();
                    $("#modal-8 button.md-close").click();
                },
                error: function (data) {
//                    alert(data);
//                    $("#_error_empty").click();
                }
            });
        });




            // 图片预览
        $("#modal-1 input[name=img_1]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#_pre_img_1").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-1 input[name=img_2]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#_pre_img_2").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-2 input[name=img_1]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#_pre_1").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-2 input[name=img_2]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#_pre_2").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-7 input[name=img_1]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#modal-7 ._pre_1").attr('src', this.result)
            }
        });


        // 图片预览
        $("#modal-7 input[name=img_2]").change(function () {
            var img = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(img);
            reader.onload = function (e) {
                $("#modal-7 ._pre_2").attr('src', this.result)
            }
        });

    })
</script>
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