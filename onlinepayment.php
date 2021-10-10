
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
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="css/checkout.css" rel="stylesheet">
	<link href="css/creditly.css" rel="stylesheet">
	<link href="css/easy-responsive-tabs.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
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
					<h1><a class="navbar-brand" href="index.php"><span>HOAGAF	</span> <i>Shoes</i></a></h1>
				</div>
				<?php
					include 'include/sidebar.php'
				?>
				<?php
					if(isset($_GET['order_id']) && $_GET['order_id']== 'order'){
						$pay_id = 2;
						$cus_id = Session :: get('id');
						$insert_order = $cart->insert_order($pay_id,$cus_id);
						$deletecart = $cart->delete_data();
						header('Location:list_order.php');
					}else{
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
					<li>Thanh toán</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div style="text-align:center" class="privacy about">
				<h3><span>Xác nhận đã thanh toán</span></h3>
                <br/>
               
                <div  style="width:50%;border:1px solid #666;padding:10px;margin:auto" class="box_center" >
                <div class="privacy about">
				<h4>Kiểm<span> Tra</span></h4>
				<?php
					if(isset($update_to_quantity)){
						echo $update_to_quantity;
					}
				 ?>
				 	<?php
					if(isset($deletecart)){
						echo $deletecart;
					}
				 ?>
				<div class="checkout-right">
					<!-- <h4>Sản Phẩm của bạn: <span>3 sản phẩm</span></h4> -->
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên Sản Phẩn</th>
								<th>Số Lượng</th>
								<th>Size</th>
								<th>Giá Tiền</th>
							
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
								<td class="invert"><?php echo $i?></td>
								<td class="invert"><?php echo $result['product_name']; ?></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											
											<?php echo $result['quantity']; ?>
									
										
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $result['size']; ?></td>
								

								<td class="invert"><?php echo number_format($subtotal); ?> VNĐ</td>
							
							</tr>
							<?php
							    }
						    } 
							?>         
						</tbody>
                        
					</table>
					</div>
                            
				</div>
                    <div> 
                        <ul style="list-style:none;">
							<?php
								$get_pr_cart = $cart->get_pr_cart();
								if($get_pr_cart){
									$COD = 30000;
									$subtotal = 0;
									$Total = 0;
									
									$i=0;

									while($result = $get_pr_cart->fetch_assoc()){
										$i++;
										$subtotal = $result['quantity']*$result['product_price'];
										
							?>
							<li>Tên Sản Phẩm:  <?php echo $result['product_name'] ?></li>
							<li>Size:  <?php echo $result['size'] ?></li>
							<li>Giá Sản Phẩm:  <?php echo number_format($result['product_price']); ?></li>
							<?php
								$Total += $subtotal;
								$bill=$Total+$COD;
							    }
							?>							
							<li>Số tiền đơn hàng : <span><?php echo number_format($Total); ?></span> VNĐ</li>

							<li>Tổng tiền đơn hàng :  <span><?php echo number_format($Total); ?></span> VNĐ</li>
							<?php 
								}
							?>
						</ul>
                    </div>
                </div>
               
                <br/>
                <div  style="width:40%;border:1px solid #666;padding:10px;margin:auto;"class=" box_right">

                <ul style="list-style:none;">
                    <?php
						$show_user = $cart->show_user();
						if($show_user){
							while($id_user = $show_user->fetch_assoc()){
					?>
                    <li>Tên khách hàng : <span><?php echo $id_user['cus_name']; ?></span></li>
                    <li>Số điện thoại : <span><?php echo $id_user['cus_phone']; ?></span></li>
                    <li>Số nhà : <span><?php echo $id_user['apartment_number']; ?></span></li>
                    <li>Địa chỉ : <span><?php echo $id_user['city']; ?></span></li>
					<?php
							}
						}
					?>
                </ul>
                   
            </div>
			<br>
			<div >
				<a href="?order_id=order" class="order-button">Xác nhận</a>
			</div>
			<br>
       
		<div class="clearfix"></div>
        <br>
	</div>
	<div class="contact-map">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3717.9748124001394!2d106.09912111484503!3d21.272464584789905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313513395534a3c3%3A0x7a5ac321972b6d33!2sHoagaf_Store!5e0!3m2!1svi!2s!4v1631599248441!5m2!1svi!2s"
		    class="map" style="border:0" allowfullscreen=""></iframe>
	</div>

	<!-- /newsletter-->
	<div class="newsletter_w3layouts_agile">
		<div class="col-sm-6 newsleft">
			<h3>Đăng Kí Để Nhận Thông Tin Mới Nhất !</h3>
		</div>
		<div class="col-sm-6 newsright">
			<form action="#" method="post">
				<input type="email" placeholder="Enter your email..." name="email" required="">
				<input type="submit" value="Gửi">
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
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
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