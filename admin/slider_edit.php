<?php
	include '../lib/session.php';
    Session :: checkSession();
	include '../class/category.php';
	include '../class/product.php';
    include '../class/slider.php'
?>
<?php
	$slider = new slider();
    if(!isset($_GET['slider_id']) || $_GET['slider_id']==NULL){
        echo "<script>window.location='slider_list.php'</script>";
    }else{
        $id = $_GET['slider_id'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $updateSlider = $slider->update_slider($_POST,$_FILES,$id);
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
                            Sửa sản phẩm
                        </header>
                        <?php
                            if(isset($updateSlider)){
                                echo $updateSlider;
                            }
                        ?>
                        <?php
                        $get_slider = $slider->get_slider($id);
                        if($get_slider){
                            while($result_slider = $get_slider->fetch_assoc()){
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tiêu đề</label>
                                        <input type="text" class="form-control" name="slider_title" value="<?php echo $result_slider['slider_title']; ?>"id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung</label>
                                        <textarea style="resize: none;" rows="5" class="form-control"   name="slider_content" id="exampleInputPassword1" ><?php echo $result_slider['slider_content']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ảnh minh họa</label> <br>
                                        <div>
                                        <img src="uploads/<?php echo $result_slider['slider_image']; ?>" width="150">
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" value="<?php echo $result['slider_image']; ?>"  name="slider_image" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Type</label>
                                        <select name="slider_type" class="form-control input-sm m-bot15">
                                            <?php
                                                if ($result_slider['slider_type'] == 0){
                                            ?>
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option selected value="1">Hiển thị</option>
                                                <option  value="0">Ẩn</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-info">Sửa</button>
                                </form>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>
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
