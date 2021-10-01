
<?php
	include '../lib/session.php';
	include '../class/category.php';
	include '../class/product.php';
	include '../class/order.php';
	include_once '../helper/formats.php';
?>
<?php
	$order = new order();
    if(isset($_GET['order_id'])){
        $id_order = $_GET['order_id'];
        $deleteOrder = $order->delete_order($id_order);
    }
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
	<section class="wrapper">
  <div class="w3layouts-glyphicon">		
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh sách đặt hàng
                </div>
                <div class="table-responsive">
                <?php
                    if(isset($deleteOrder)){
                        echo $deleteOrder;
                    }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $order = new order();
                        $fm = new Format();
                        $show_order = $order->show_order();
                        if($show_order){
                            $i=0;
                            while($result = $show_order->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo number_format($result['price']); ?></td>
                        <td><?php echo $result['quantity']; ?></td>
                        <td><?php echo $result['day_order']; ?></td>
                        <td>
                        <?php 
						switch($result['status_order']) {
							case '0':
								echo 'Đơn hàng chờ xác nhận';
								break;
							case '1':
								echo 'Đã nhận được hàng';
								break;
						}
						?>
                        </td>
                        <td>
                        <a href="cart_edit.php?order_id=<?php echo $result['order_id']; ?>" class="active edit_style" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a onclick="return confirm('Are you want to delete?')" href="?order_id=<?php echo $result['order_id']?>" class="active edit_style" ui-toggle-class="">
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
