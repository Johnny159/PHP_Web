
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
    	* {
		    border: 0;
		    margin: 0;
		    padding: 0;
		    font-family: '微软雅黑 Light';
		}

		html {
		    font-size: 100px;
		}

		body {
		    width: 100%;
		    height: 100%;
		    font-size: 0;
		}

		a, li, button {
		    cursor: pointer;
		    text-decoration: none;
		}

		h1 {
		    font-size: .26rem;
		    font-weight: 500;
		    color: black;
		}

		h2 {
		    font-size: .20rem;
		    font-weight: 500;
		    color: #4f4f4f;
		}

		h3 {
		    font-size: .16rem;
		    font-weight: 500;
		    color: #4f4f4f;
		}

		p {
		    font-size: .14rem;
		}

		ul {
		    list-style: none;
		}
		
		.container{
			width: 100%;
			height: 100%;
			background: #1c1d22;
			position: fixed;
			text-align: center;
		}
		.empty{
			width: 0;
			height: 100%;
			display: inline-block;
			vertical-align: middle;
		}
		.login{
			width: 300px;
			height: 300px;
			background: #2a2b30;
			display: inline-block;
			vertical-align: middle;
			border-radius: 5px;
			/*border: solid 2px #5c5edc;*/

		}
		.login h1{
			/*color: #cecece;*/
			color: #5c5edc;
			margin-top: 30px;
		}
		.login input{
			display:inline-block;
			width: 200px;
			height: 25px;
			margin-top: 25px; 
			border-radius: 2px;
			color: #5c5edc;
			font-weight: 900;
			background: #cecece;



		}
		.login input[name='captcha']{
			width: 100px;
			position: relative;
			left: -50px;
		}

		form{
			position: relative;
		}
		form > img{
			position: absolute;
			top: 126px;
			left: 170px;
		}

    </style>
</head>
<body>
	<div class="container">
		<div class="empty"></div>
		<div class="login">
			<h1>登陆</h1>
			<form method='post' action='index.php?ctrl=Login&act=login'>
				<input type="text" name="username" placeholder=" 请输入账号"/>
				<input type="password" name="password" placeholder=" 请输入密码"/>
				<br>
				<input type="text" name="captcha" placeholder=" 请输入验证码"/>
<!--				todo -->
				<img src="./public/captcha/captcha.php" onclick = "this.src='./public/captcha/captcha.php?'+ Math.random()" />
				<br>

				<input type="submit" name="submit" value="登陆"/>
				<h1><?php
					session_start();
					// var_dump($_SESSION['captcha']);
					echo $_SESSION['captcha'];
				?></h1>
			</form>
		</div>
	</div>
</body>
</html>