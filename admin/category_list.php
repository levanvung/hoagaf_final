<?php
    include '../class/category.php'
?>
<?php
	$cat = new category();
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $deleteCat = $cat->delete_cate($id);
    }
?>
<?php
	include '../lib/session.php';
	Session :: checkSession();
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
	<section class="wrapper">
		<div class="w3layouts-glyphicon">		
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh sách thương hiệu sản phẩm
                </div>
                <div class="table-responsive">
                <?php
                    if(isset($deleteCat)){
                        echo $deleteCat;
                    }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên thương hiệu </th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $show_cate = $cat->show_cate();
                        if($show_cate){
                            $i=0;
                            while($result = $show_cate->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['cat_name']; ?></td>
                        <td>
                        <a href="category_edit.php?cat_id=<?php echo $result['cat_id']; ?>" class="active edit_style" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a onclick="return confirm('Are you want to delete?')" href="?del_id=<?php echo $result['cat_id']?>" class="active edit_style" ui-toggle-class="">
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
