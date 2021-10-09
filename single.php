
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"/>
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

					if(!isset($_GET['pro_id']) || $_GET['pro_id']==NULL){
						echo "<script>window.location='404.php'</script>";
					}else{
						$id = $_GET['pro_id'];
					}
					if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])){
						$quantity = $_POST['quantity'];
						$size = $_POST['size'];
						$check_user = Session :: get('user_login');
						$msg = $check_user;
						if($msg==true){
						$add_to_cart = $cart->add_to_cart($size,$quantity,$id);
						}else{
							echo "<script>
							window.alert('Bạn phải đăng nhập để thêm!');
							window.location='login.php';
							</script>";
						}
					}
					if(isset($_POST['binhluan_submit'])){
						$binhluan_insert = $user->insert_binhluan($id);
						
					}
				?>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<form action="checkout.php" method="post" class="last">
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
					<li>Chi Tiết Sản Phẩm</li>
				</ul>
			</div>
		</div>
		
	</div>

		<?php
		 	$get_product = $product->get_single($id);
			if($get_product){
			 while($chitiet = $get_product->fetch_assoc()){
		?>
	
	<div class="ads-grid_shop">
	
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">

						<ul class="slides">
							<li data-thumb="admin/uploads/<?php echo $chitiet['product_image'] ?>">
								<div class="thumb-image"> <img src="admin/uploads/<?php echo $chitiet['product_image'] ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
		
				<h3><?php echo $chitiet ['product_name']; ?></h3>
				<p><span class="item_price"><?php echo number_format( $chitiet['product_sale']); ?></span>
					<del><?php echo number_format( $chitiet['product_price']); ?></del>
				</p>
			
				<div class="rating1" style="width:300px; color: white;">
					<ul class="stars" >
						<li><a href="#"><i style="font-size:20px;color: gold;" class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i style="font-size:20px;color: gold;" class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i style="font-size:20px;color: gold;" class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i style="font-size:20px;color: gold;" class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
						<li><a href="#"><i style="font-size:20px;color: gold;" class="fa fa-star-o" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<br/>
				<div class="occasional">
											
				</div>
				<div class="occasion-cart">
					<div class="shoe single-item single_page_b">
						<form action="" method="post">
							<div class="color-quality">
								<div class="color-quality-right">
									<h5>Số Lượng :</h5>
									<input  style="width: 50px;" type="number" name="quantity" value="1" min="1" />
								</div>
							</div>
							<br>
							
							<div class="color-quality">
								<div class="color-quality-right">
									<h5>Size :</h5>
									<input  style="width: 50px;" type="number" name="size" value="36" />
								</div>
							</div>
							<br>
							<div class="occasional"></div>
							<input type="submit" name="add_to_cart" value="Thêm vào giỏ" class="button add">
							
		
						</form>
						<br/>
						<input style="background-color:pink;" type="submit" name="add_to_love" value="Yêu Thích " class="button add">
						<br/>
						<i style="font-size:16px" class="fa fa-envelope-square" ></i> 
						 <?php 
						
							if(isset($add_to_cart)){
								echo '<span style="color:Red;font-size:19px;">Thông Báo : Sản Phẩm Đã Được Thêm Vào Giỏ Hàng!!</span>';
							}
						 ?>


					</div>

				</div>
			
				<ul class="social-nav model-3d-0 footer-social social single_page">
					<li class="share">Share On : </li>
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
				
			</div>
			
			
			<div class="clearfix"> </div>		
			
			<!--/tabs-->
		
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<!-- <li>Reviews</li> -->
						<li>Bình Luận</li>
						<li>Thông Tin Về Sản Phẩm</li>
						
					</ul>
					<div class="resp-tabs-container">
						<!-- /tab_one-->
						
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="admin/uploads/<?php echo $chitiet['product_image'] ?>" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Đánh giá</a></li>
												<?php

													$review = $user->show_review($id);
													if($review){
														while($result_review=$review->fetch_assoc()){

												?>
												<div style="border:1px solid black; width: 600px; height:100px;">
													<p><?php echo $result_review['binhluan']; ?></p>
												</div>
												<?php
														}
													}
												?>
												<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
											</ul>
											
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="add-review">
										<h4>Thêm Đánh Giá</h4>
										<form action="" method="POST">
											<input type="text" placeholder="Điền tên" class="form-control" name="tennguoibinhluan">
											<textarea rows="5" style="resize: none;" placeholder="Bình luận...." class="form-control" name="binhluan"></textarea>
											<input type="submit" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận">
										</form>
									</div>
								</div>

							</div>
						</div> 
						<div class="tab3">

							<div class="single_page">
								<h6><?php echo $chitiet['product_name']; ?></h6>
								<p><?php echo $chitiet['product_desc']; ?></p>
								
							</div>
						</div>
						
					</div>
												</br>
													<h3 >Lựa Chọn Size Phù Hợp:</h3>
					<span><img  style ="width:900px;height:450px;padding-left:300px;" src="images/size.png"></span>
			
				</div>
			
			</div>
		
			<!--//tabs-->
			<!-- /new_arrivals -->
			
			 <div class="new_arrivals">
<!-- 			
				<h3>Featured Products</h3> -->
				
				<div class="col-md-3 product-men women_two">
					
				</div>
				

				
				<div class="clearfix"></div>
			</div> 
			<!--//new_arrivals-->


		</div>
			
	</div>
	
	<?php
			}
		}
	 ?>
	<!-- //top products -->
	<div class="mid_slider_w3lsagile">
		<div class="col-md-3 mid_slider_text">
			<h5>Nhiều Giày Hơn</h5>
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
			<h3>Đăng kí để nhận thêm thông tin !</h3>
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
	</div>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
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
	<!-- single -->
	<script src="js/imagezoom.js"></script>
	<!-- single -->
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
	<!-- FlexSlider -->
	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

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