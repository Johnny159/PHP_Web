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
            <ul data-menu="main" class="menu__level">
                <li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">玩家管理</a></li>
                <li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">游戏设定</a></li>
                <li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">游戏过程 </a></li>
                <li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">运营统计</a></li>
            </ul>
            <!-- Submenu 1 -->
            <ul data-menu="submenu-1" class="menu__level">
                <li class="menu__item"><a class="menu__link" href="#">玩家管理</a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <!--<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="#"></a></li>-->
            </ul>
            <!-- Submenu 1-1 -->
            <!--				<ul data-menu="submenu-1-1" class="menu__level">-->
            <!--					<li class="menu__item"><a class="menu__link" href="#">Homemade</a></li>-->
            <!--				</ul>-->
            <!-- Submenu 2 -->
            <ul data-menu="submenu-2" class="menu__level">
                <li class="menu__item"><a class="menu__link" href="#">公告管理</a></li>
                <li class="menu__item"><a class="menu__link" href="#">VIP 规则</a></li>
                <!--<li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1" href="#">Special Selection</a></li>-->
                <li class="menu__item"><a class="menu__link" href="#">赛事管理</a></li>
                <li class="menu__item"><a class="menu__link" href="#">交易物品管理</a></li>
            </ul>
            <!-- Submenu 2-1 -->
            <!--				<ul data-menu="submenu-2-1" class="menu__level">-->
            <!--					<li class="menu__item"><a class="menu__link" href="#">Exotic Mixes</a></li>-->
            <!--				</ul>-->
            <!-- Submenu 3 -->
            <ul data-menu="submenu-3" class="menu__level">
                <li class="menu__item"><a class="menu__link" href="#">游戏过程</a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <li class="menu__item"><a class="menu__link" href="#"></a></li>
                <!--<li class="menu__item"><a class="menu__link" data-submenu="submenu-3-1" href="#">Promo Packs</a></li>-->
            </ul>
            <!-- Submenu 3-1 -->
            <!--				<ul data-menu="submenu-3-1" class="menu__level">-->
            <!--					<li class="menu__item"><a class="menu__link" href="#">Starter Kit</a></li>-->
            <!--				</ul>-->
            <!-- Submenu 4 -->
            <ul data-menu="submenu-4" class="menu__level">
                <li class="menu__item"><a class="menu__link" href="#">营收分析</a></li>
                <li class="menu__item"><a class="menu__link" href="#">玩家分析</a></li>
                <li class="menu__item"><a class="menu__link" href="#">交易分析</a></li>
                <li class="menu__item"><a class="menu__link" href="#">游戏分析</a></li>
                <!--<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>-->
            </ul>
            <!-- Submenu 4-1 -->
            <!--				<ul data-menu="submenu-4-1" class="menu__level">-->
            <!--					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>-->
            <!--				</ul>-->
        </div>
    </nav>
    <div class="content">
        <!--<p class="info">Please choose a category</p>-->
        <!-- Ajax loaded content here -->
        <iframe width="100%" height="350px" src=""></iframe>
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
                gridWrapper.innerHTML = '<p>'+ev.target+'</p>'+'<iframe width="100%" height="350px" src=""></iframe>';
                console.log(ev);
                console.log(ev.target);
                console.log($(ev.target).attr("class"));
            }, 700);
        }
    })();

    $(function(){
        $('.menu__item').click(function(){
//            alert()
        })

    })

</script>
</body>

</html>
