<?php
	include '../lib/session.php';
    Session :: checkSession();
	include '../class/category.php';
	include '../class/product.php';
    include '../class/order.php';
?>
<?php
	$order = new order();
    if(!isset($_GET['order_id']) || $_GET['order_id']==NULL){
        echo "<script>window.location='cart_list.php'</script>";
    }else{
        $id = $_GET['order_id'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $status=$_POST['status'];
        $updateStatus = $order->update_status($status,$id);
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
                            if(isset($updateStatus)){
                                echo $updateStatus;
                            }
                        ?>
                        <?php
                        $get_order = $order->get_order($id);
                        if($get_order){
                            while($result_order = $get_order->fetch_assoc()){
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="order_name" value="<?php echo $result_order['product_name']; ?>" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá tiền</label>
                                        <input type="text" class="form-control" name="order_price" value="<?php echo $result_order['price']; ?>"  id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="text" class="form-control" name="quantity" value="<?php echo $result_order['quantity']; ?>" id="exampleInputPassword1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select name="status" class="form-control input-sm m-bot15">
                                            <?php
                                                if ($result_order['status_order'] == 0){
                                            ?>
                                            <option value="1">Đã gửi hàng</option>
                                            <option selected value="0">Chờ xác nhận</option>
                                            <?php
                                            }else{
                                            ?>
                                            <option selected value="1">Đã gửi hàng</option>
                                            <option  value="0">Chờ xác nhận</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                            <?php
                                            
                                                }
                                            }
                                            ?>
                                    <button type="submit" name="submit" class="btn btn-info">Sửa</button>
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