
<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ('lib/session.php');
    Session::init();
    include_once ('class/user.php');
    include_once ('class/product.php');
    include_once ('class/category.php');
    include_once ('class/slider.php');
	include_once ('lib/database.php');
	include_once ('class/cart.php');
	include_once ('helper/formats.php');
?>
<?php
	$fm = new Format();
	$cat = new category();
	$cart = new cart();
	$user = new user();
	$slider = new slider();
	$product = new product();
?>
<?php
	header('Cache-Control: no-cache , must-revalidate');
	header('Pragam: no-cache');
	header('Expires: Sat,26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: max-age=25920000');
?>

<div class="overlay overlay-contentpush" >
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
						<ul>
							<li><a href="index.php" class="active">Trang Chủ</a></li>
							<li><a href="about.php">Thông Tin </a></li>
							<li><a href="404.php">Team</a></li>
							<li><a href="shop.php">Mua Ngay</a></li>
							<li><a href="contact.php">Liên Hệ Chúng Tôi</a></li>
							<li><a href="list_order.php">Kiểm tra đơn hàng</a></li>
							<?php
								if(isset($_GET['action']) && $_GET['action']== 'logout'){
									Session ::destroy_user();
								}
							?>
							<li >
								<?php 
									$check_login = Session::get('user_login');
									if($check_login == true) {
										echo '<a href="?action=logout">Đăng xuất</a>';
									}else{
										echo '<a href="login.php">Đăng nhập</a>';
									}
								?>
							</li>
						</ul>
					</nav>
				</div>