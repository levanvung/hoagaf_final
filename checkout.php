
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>HOAGAF Shoes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<h1><a class="navbar-brand" href="index.php"><span>HOAGAF</span> <i>Shoes</i></a></h1>
				</div>
				<?php
					include 'include/sidebar.php'
				?>
				<?php

					if(isset($_GET['cartid'])){
						$cartid = $_GET['cartid'];
						$deletecart = $cart->delete_product_cart($cartid);
					}
					if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
						$cart_id = $_POST['cart_id'];
						$quantity = $_POST['quantity'];
						$update_quantity = $cart->update_quantity($cart_id,$quantity);

					}
				?>
				<?php
					$user = new user();
					if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])){
						$insertUser = $user->insert_user($_POST);
					}
				?>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<form action="#" method="post" class="last">
							<button class="top_shoe_cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- //cart details -->
		<!-- search -->
		<div class="search_w3ls_agileinfo">
			<div class="cd-main-header">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul>
			</div>
			<div id="cd-search" class="cd-search">
				<form action="#" method="post">
					<input name="Search" type="search" placeholder="Click enter after typing...">
				</form>
			</div>
		</div>
		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Trang Chủ</a><i>|</i></li>
					<li>Kiểm Tra Giỏ Hàng</li>
				</ul>

			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Kiểm<span> Tra</span></h3>
				<?php
					if(isset($update_quantity)){
						echo $update_quantity;
					}
				?>

				<div class="checkout-right">
					<!-- <h4>Sản Phẩm của bạn: <span>3 sản phẩm</span></h4> -->
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th>Loại sản Phẩm</th>
								<th>Số Lượng</th>
								<th>Tên Sản Phẩn</th>
								<th>Size</th>
								<th>Giá Tiền</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_pr_cart = $cart->get_pr_cart();
								if($get_pr_cart){
									$subtotal = 0;
									$i=0;
									while($result = $get_pr_cart->fetch_assoc()){
										$i++;
										$subtotal = $result['quantity']*$result['product_price'];
							?>
							<tr class="rem1">
								<td class="invert"><?php echo $i; ?></td>
								<td class="invert-image"><a href="single.php"><img style="width:200px" src="admin/uploads/<?php echo $result['product_image']; ?>" alt=" " class="img-responsive"></a></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
										<form action="" method="post">
											<input type="hidden" name="cart_id" value="<?php echo $result['cart_id']; ?>">
											<input type="number" name="quantity" style="width:50px" value="<?php echo $result['quantity']; ?>">
											<input type="submit" name="update" style="width:90px " value="Cập Nhập">
										</form>

										</div>
									</div>
								</td>
								<td class="invert"><?php echo $result['product_name']; ?></td>
								<td class="invert"><?php echo $result['size']; ?></td>

								<td class="invert"><?php echo number_format($subtotal); ?></td>
								<td class="invert">
									<div class="rem">
										<a href="?cartid=<?php echo $result['cart_id']; ?>">Xóa</a>
									</div>
								</td>
							</tr>
							<?php
							    }
						    } 
							?>
						</tbody>
					</table>
				</div>
				<?php
					$get_pr_cart = $cart->get_pr_cart();
					if($get_pr_cart){
						$COD = 30000;
						$subtotal = 0;
						$Total = 0;
						$i=0;
				?>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<h4>Thanh Toán</h4>
						<ul>
							<?php
									while($result = $get_pr_cart->fetch_assoc()){
										$i++;
										$subtotal = $result['quantity']*$result['product_price'];
										
							?>
							<li><?php echo $result['product_name'] ?><i>-</i> <span><?php echo number_format($subtotal); ?></span></li>
							<?php
								$Total += $subtotal;
								$bill=$Total+$COD;
							    }
							?>							
							<li>Số tiền đơn hàng <i>-</i> <span><?php echo number_format($Total); ?></span></li>
							<li>Ship COD <i>-</i> <span><?php echo number_format($COD); ?></span></li>

							<li>Tổng tiền đơn hàng <i>-</i> <span><?php echo number_format($bill); ?></span></li>
							<a href ="payment.php?total=<?php echo $Total;?>">
							<button style="    background: #000000e0;width: 120px;margin: auto;padding: 7px;color: white;border: black;">Thanh Toán</button></a>
							<?php 
								}
							?>
						</ul>
					</div>
					<div class="col-md-8 address_form">
						<div class="checkout-right-basket">
							<a href="payment.php">Thay đổi phương thức thanh toán </a>
						</div>
					</div>

					<div class="clearfix"> </div>


					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //top products -->
		<div class="mid_slider_w3lsagile">
			<div class="col-md-3 mid_slider_text">
				<h5>Nhiều Giày hơn</h5>
			</div>
			<div class="col-md-9 mid_slider_info">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class=""></li>
						<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
						<li data-target="#myCarousel" data-slide-to="3" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item active">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g5.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g6.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g1.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g2.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g3.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 slidering">
									<div class="thumbnail"><img src="images/g4.jpg" alt="Image" style="max-width:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
					<!-- The Modal -->

				</div>
			</div>

			<div class="clearfix"> </div>
		</div>
		<!-- /newsletter-->
		<div class="newsletter_w3layouts_agile">
			<div class="col-sm-6 newsleft">
				<h3>Đăng kí để nhận thông báo !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form action="#" method="post">
					<input type="email" placeholder="Enter your email..." name="email" required="">
					<input type="submit" value="Submit">
				</form>
			</div>

			<div class="clearfix"></div>
		</div>
		<!-- //newsletter-->
		<!-- footer -->
		<?php
		include 'include/footer.php'
		?>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>

</html>