<?php
	include '../lib/session.php';
    session::checkSession();
	// include '../class/category.php';
	// include '../class/product.php';
	include '../class/slider.php'
?>
<?php
	$slider = new slider();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $insertSlider = $slider->insert_slider($_POST,$_FILES);
    }
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
	<section class="wrapper">
    <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm slide
                        </header>
                        <?php
                            if(isset($insertSlider)){
                                echo $insertSlider;
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="slider_add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tiêu đề</label>
                                    <input type="text" class="form-control" name="slider_title" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung slide</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="slider_content" id="exampleInputPassword1" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh slider</label>
                                    <input type="file" class="form-control" name="slider_image" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Type</label>
                                    <select name="slider_type" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
    </section>
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
