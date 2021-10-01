<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ('class/user.php');

	include_once ('lib/session.php');
?>
<?php
	$user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){
        $loginUser = $user->login_user($_POST);
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>HOAGAF Shoes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css_user_login/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css_user_login/css/style.css" rel='stylesheet' type='text/css' />
<link href="css_user_login/css/font-awesome.css" rel="stylesheet"> 
<script src="css_user_login/js/jquery.min.js"> </script>
<script src="css_user_login/js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="index.php">Đăng nhập </a></h1>
		<div class="login-bottom">
			<h2><?php if(isset($loginUser)){
					echo $loginUser;	
			}
				?></h2>
			<form action="" method="post">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Email" name="cus_email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="cus_pass" required="">
					<i class="fa fa-lock"></i>
				</div>
			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="signin" value="login" >
					</label>
					<p>Bạn chưa có tài khoản?</p>
				<a href="signup.php" class="hvr-shutter-in-horizontal">Đăng ký</a>
				</label>
					<p>Bạn muốn tiếp tục xem sản phẩm?</p>
				<a href="shop.php" class="hvr-shutter-in-horizontal">Quay lại cửa hàng</a>
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->

<!---->
<!--scrolling js-->
	<script src="css_user_login/js/jquery.nicescroll.js"></script>
	<script src="css_user_login/js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

