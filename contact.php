
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/responsive.css"> -->

<!-- ChatBot -->
		<link rel="stylesheet" type="text/css" href="css/jquery.convform.css">
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.convform.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
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
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
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
					<li>Liên Hệ</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- chatbot -->
	<div class="chatbot">
	<div class="chat_icon">
	<i class="fa fa-comments" aria-hidden="true"></i>
</div>

<div class="chat_box">
	<div class="my-conv-form-wrapper">
		<form action="" method="GET" class="hidden">

      <select data-conv-question="Xin chào! Hoagaf giúp gì được cho bạn nhỉ" name="category">
        <option value="WebDevelopment">Bạn cần trợ giúp ?</option>
        <option value="DigitalMarketing">Bạn cần tư vấn ?</option>
      </select>

      <div data-conv-fork="category">
        <div data-conv-case="WebDevelopment">
          <input type="text" name="domainName" data-conv-question="Hãy cho chúng tôi biết vấn đề của bạn">    
        </div>
        <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
          <input type="text" name="companyName" data-conv-question="Bạn muốn tư vấn gì có thể cho HoaGaf biết ,chúng tôi sẽ luôn đồng hành cùng bạn">
		 
        </div>
      </div>
	 

      <input type="text" name="name" data-conv-question="Cho Hoagaf biết tên của bạn nha !!">

      <input type="text" data-conv-question="chào {name}, <br> rất vui được gặp bạn bây giờ chúng tôi sẽ hỗ trợ bạn." data-no-answer="true">

      <input data-conv-question="Nhập Mail của bạn vào nhé " data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" name="email" required placeholder="What's your e-mail?">
	  
      <input type="text" data-conv-question="Điều này sẽ giúp Hoagaf liên lạc với bạn dễ hơn" data-no-answer="true">
	  <input type="text" name="name" data-conv-question="Ngây bây giờ chúng tôi sẽ hỗ trợ bạn!! Gõ phím bất kì đề tiếp tục nhé">
	
	  
      <select data-conv-question="Nhấn vào xác nhận để được xử lí ngay nha">
		 <option value="Yes">Xác Nhận</option></a>
      </select>
	  <div data-conv-fork="category">
        <div data-conv-case="WebDevelopment">

          <input type="text" name="domainName" data-conv-question="Vấn đề của bạn đã được tiếp nhận, nhấn vào đây để được hỗ trợ ">  
		  </div>
		  <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
          <input type="text" name="companyName" data-conv-question="Để ý điện thoại nhé nhân viên Hoagaf đang liên lạc với bạn đó">
		 
        </div> 
		  
       
	  </div>
	  
  	</form>
	</div>
</div>
	</div>
<!-- endchat -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Liên Hệ Chúng Tôi</h3>
			<p class="head_para">Thêm Mô Tả</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>Hãy Hoàn Thành Mục Này Để Giúp Chúng Tôi Liên Lạc Với Bạn.</h6>
					<form action="#" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Name" placeholder="Name" required="">
							<input type="email" name="Email" placeholder="Email" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Telephone" placeholder="Telephone" required="">
							<input type="text" name="Subject" placeholder="Subject" required="">
						</div>
						<div class="clearfix"> </div>
						<textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Gửi">
						<input style="text-align: center" type="reset" value="Xóa">
					</form>
				</div>
				<div class="col-md-5 contact-left">
					<h6>Thông Tin Liên Hệ</h6>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Chúng Tôi Ở Đâu</h4>
							<p>Hoàn Kiếm, Hà Nội</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="mail-us">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Mail </h4>
							<p><a href="mailto:info@example.com">info@example.com</a></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="call">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Gọi Chúng Tôi</h4>
							<p>+18044261149</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-fax" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Fax</h4>
							<p>+1804426349</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"> </div>

			</div>

			<div class="clearfix"></div>

		</div>
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


	<!-- <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script> -->


	<!-- //js -->
	<!-- cart-js -->
	<!-- <script src="js/minicart.js"></script> -->
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
	<script src="js/demo1.js"></script> -->
	<!-- //nav -->
	<!-- //script for responsive tabs  -->
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