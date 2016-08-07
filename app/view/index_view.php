<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="./css/index.css" rel="stylesheet">
</head>
<script src="./js/jquery-1.12.0.min.js"></script>
<script>
    // history.go(0);
    $(function(){

        $(".content_menu")
            .children("[data-fid]")
            .hide();

        $(".content_menu")
            .children("[data-id]")
            .click(function(){

                $(".content_menu")
                    .children("[data-fid="+$(this).attr("data-id")+"]")
                    .toggle();
            });

        $(".content_menu")
            .children("[data-fid]")
            .click(function(){
                alert($(this).attr("data-url"));
            });

        // timer = window.setInterval(function(){
        //     $(".header").children("span").html();
        // }, 1000)


            
    })
</script>
<body>
    <div class="container">
        <div class="header">
        	<h1>越野机车后台管理系统</h1>
            <span><?php
                echo $_COOKIE['username'],"，你好！";
                echo "<a href=index.php?ctrl=Index&act=logout>注销</a>"
            ?></span>
        </div>
        <div class="content">
        	<div class="content_menu">
             
                <?php
//                    create_menu($content_menu_data);

                ?>
            
        	</div>
        	<div class="content_main">
                
        	</div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>