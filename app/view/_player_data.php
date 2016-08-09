
<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/8/9
 * Time: 14:39
 */

$html = <<<EOD
        <ul>
            <li><strong>用户名:{$data['username']}</strong></li>
            <li><strong>VIP 等级:{$data['vip']}</strong></li>
            <li><strong>注册时间:{$data['sign_time']}</strong></li>
            <li><strong>上次登录:{$data['last_login_time']}</strong></li>
            <li><strong>经验:{$data['exp']}</strong></li>
            <li><strong>完至关卡:{$data['record_stage']}-{$data['record_map']}</strong></li>
        </ul>
EOD;

echo $html;



?>


