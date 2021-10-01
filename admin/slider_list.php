
<?php
	include '../lib/session.php';
	// include '../class/category.php';
	// include '../class/product.php';
    include_once '../class/slider.php';
    include_once '../helper/formats.php';
?>
<?php
	$slide = new slider();
    if(isset($_GET['slider_id'])){
        $id = $_GET['slider_id'];
        $deleteSlider = $slide->delete_slider($id);
    }
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
	<section class="wrapper">
  <div class="w3layouts-glyphicon">		
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh sách slides 
                </div>
                <div class="table-responsive">
                <?php
                    if(isset($deleteSlider)){
                        echo $deleteSlider;
                    }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $slide = new slider();
                        $fm = new Format();
                        $show_slide = $slide->show_slide();
                        if($show_slide){
                            $i=0;
                            while($result = $show_slide->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['slider_title']; ?></td>
                        <td><?php echo $result['slider_content']; ?></td>
                        <td><img src="uploads/<?php echo $result['slider_image']; ?>" width="100"></td>
                        <td><?php 
                          if($result['slider_type'] == 0){
                            echo 'Ẩn';
                          }else{
                            echo 'Hiển thị';
                          }
                        ?></td>
                        <td>
                        <a href="slider_edit.php?slider_id=<?php echo $result['slider_id']; ?>" class="active edit_style" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a onclick="return confirm('Are you want to delete?')" href="?slider_id=<?php echo $result['slider_id']?>" class="active edit_style" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
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
