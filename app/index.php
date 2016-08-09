 <?php


require './core/factory.class.php';
$factory = Factory::get_factory();
$factory -> run();

?>
 <script>

 </script>

 <link rel="stylesheet" type="text/css" href="./view/index_view/css/demo.css"/>
 <link rel="stylesheet" type="text/css" href="./view/index_view/css/component.css"/>
 <link rel="stylesheet" type="text/css" href="./view/_modal_window/css/style.css"/>
 <script src="./view/_modal_window/js/index.js"></script>
<style>

    iframe {
        border: none;
    }

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