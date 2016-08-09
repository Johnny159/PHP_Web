<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>越野机车后台管理系统</title>
    <!-- food icons -->
    <!--<link rel="stylesheet" type="text/css" href="css/organicfoodicons.css" />-->
    <!-- demo styles -->
    <link rel="stylesheet" type="text/css" href="./view/index_view/css/demo.css"/>
    <!-- menu styles -->
    <link rel="stylesheet" type="text/css" href="./view/index_view/css/component.css"/>
    <script src="./view/index_view/js/modernizr-custom.js"></script>
    <script src="./js/jquery-1.12.0.min.js"></script>
</head>

<body>
<!-- Main container -->
<div class="container">
    <!-- Blueprint header -->
    <header class="bp-header cf">
        <div class="dummy-logo">
            <div class="dummy-icon foodicon foodicon--coconut"></div>
            <h2 class="dummy-heading">
                <?php

                echo $_COOKIE['user']['username'], "，你好！";
                ?>
                <a class='dummy-heading' href=index.php?ctrl=Index&act=logout>注销</a>
            </h2>
        </div>
        <div class="bp-header__main">
            <span class="bp-header__present">HF160409 <span class="bp-tooltip bp-icon bp-icon--about"
                                                            data-content="作者：郑瀚林"></span></span>

            <h1 class="bp-header__title">越野机车后台管理系统</h1>

        </div>
    </header>
    <button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
    <nav id="ml-menu" class="menu">
        <button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
        <div class="menu__wrap">

            <?php
                $c = new Index_Control();
                echo $c -> menu();
            ?>


        </div>
    </nav>
    <div class="content">
        <!--<p class="info">Please choose a category</p>-->
        <!-- Ajax loaded content here -->

        <iframe id="_frame" width="100%" height="500px" src="fgh" ></iframe>
    </div>
</div>
<!-- /view -->
<script src="./view/index_view/js/classie.js"></script>
<!--<script src="./view/index_view/js/dummydata.js"></script>-->
<script src="./view/index_view/js/main.js"></script>
<script>
    (function () {
        var menuEl = document.getElementById('ml-menu'),
            mlmenu = new MLMenu(menuEl, {
                // breadcrumbsCtrl : true, // show breadcrumbs
                // initialBreadcrumb : 'all', // initial breadcrumb text
                backCtrl: false, // show back button
                // itemsDelayInterval : 60, // delay between each menu item sliding animation
                onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
            });

        // mobile menu toggle
        var openMenuCtrl = document.querySelector('.action--open'),
            closeMenuCtrl = document.querySelector('.action--close');

        openMenuCtrl.addEventListener('click', openMenu);
        closeMenuCtrl.addEventListener('click', closeMenu);

        function openMenu() {
            classie.add(menuEl, 'menu--open');
        }

        function closeMenu() {
            classie.remove(menuEl, 'menu--open');
        }

        // simulate grid content loading
        var gridWrapper = document.querySelector('.content');

        function loadDummyData(ev, itemName) {
            ev.preventDefault();

            closeMenu();
            gridWrapper.innerHTML = '';
            classie.add(gridWrapper, 'content--loading');
            setTimeout(function () {
                classie.remove(gridWrapper, 'content--loading');
//                gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
                gridWrapper.innerHTML = '<iframe id="frame" width="100%" height="500px" src="" ></iframe>';

                // todo 修改 iframe src
                $("#frame").attr("src", $(ev.target).attr("data-url"));

//                alert();


// todo 载入动画 700ms
            }, 0);
        }
    })();

    $(function(){
        $("ul[data-menu='main'] > .menu__item").click(function(){
//            var r = $(this).attr("data-submenu");
            var index = $(this).children("a").attr("data-submenu");
//            alert(index);
            setTimeout(function(){
                $("[data-menu="+index+"]").children("li:eq(0)").click();
            },1000);
        });







    })

</script>
</body>

</html>
