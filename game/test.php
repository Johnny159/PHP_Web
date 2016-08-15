<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/15
 * Time: 15:51
 */
?>
<script src="./app/static/js/jquery-1.12.0.min.js"></script>
<script>

$(function(){
//    alert();

    $.ajax({
        url:"../app/index.php?ctrl=game&act=test",
        type:'get',
        dataType:'text',
        success:function(data){
            alert(data);
            console.log(data)
        },
        error:function(data){
            alert(data)
        }

    })
})
</script>
