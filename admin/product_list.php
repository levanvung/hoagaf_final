
<?php
	include '../lib/session.php';
	include '../class/category.php';
	include '../class/product.php';
	include_once '../helper/formats.php';
?>
<?php
	$product = new product();
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
        $deleteProduct = $product->delete_product($id);
    }
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
	<section class="wrapper">
  <div class="w3layouts-glyphicon">		
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh sách sản phẩm
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
                        <th>Tên sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Giá tiền</th>
                        <th>Giá khuyến mại</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $product = new product();
                        $fm = new Format();
                        $show_product = $product->show_product();
                        if($show_product){
                            $i=0;
                            while($result = $show_product->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['cat_name']; ?></td>
                        <td><?php echo $result['product_price']; ?></td>
                        <td><?php echo $result['product_sale']; ?></td>
                        <td><?php echo $fm->textShorten($result['product_desc'],20); ?></td>
                        <td><img src="uploads/<?php echo $result['product_image']; ?>" width="50"></td>
                        <td><?php 
                          if($result['product_type'] == 0){
                            echo 'Không nổi bật';
                          }else{
                            echo 'Nổi bật';
                          }
                        ?></td>
                        <td>
                        <a href="product_edit.php?product_id=<?php echo $result['product_id']; ?>" class="active edit_style" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a onclick="return confirm('Are you want to delete?')" href="?product_id=<?php echo $result['product_id']?>" class="active edit_style" ui-toggle-class="">
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
