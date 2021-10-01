<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ('class/user.php');

	include_once ('lib/session.php');
?>
<?php
	$user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])){
        $insertUser = $user->insert_user($_POST);
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title> HOAGAF Shoes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css_user_login/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<!-- Custom Theme files -->
<link href="css_user_login/css/style.css" rel='stylesheet' type='text/css' />
<link href="css_user_login/css/font-awesome.css" rel="stylesheet"> 
<script src="css_user_login/js/jquery.min.js"> </script>
<script src="css_user_login/js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="signup.php">Đăng ký </a></h1>
		<div class="login-bottom">
			<h2>Đăng ký tài khoản</h2>
			<?php
				if(isset($insertUser)){
					echo $insertUser;
				}
			?>
			<form action="" method="post">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Email" name="cus_email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Tên người dùng" name="cus_name" required="">
					<i class="fas fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Mật khẩu" name="cus_pass" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Lặp lại mật khẩu" name="cus_pass" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Số nhà" name="apartment_number" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Địa chỉ giao hàng của bạn" name="city" required="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Số điện thoại" name="cus_phone" required="">
					<i class="fa fa-lock"></i>
				</div>
			</div>

			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="signup" value="Đăng ký">
					</label>
					<p>Already register</p>
				<a href="login.php" class="hvr-shutter-in-horizontal">Đăng nhập</a>
			</div>			
		</form>
			<div class="clearfix"> </div>
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

