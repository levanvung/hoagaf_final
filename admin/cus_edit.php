<?php
    include_once '../class/category.php';
    include_once '../class/user.php';
?>
<?php
	$user = new user();
    if(!isset($_GET['cus_id']) || $_GET['cus_id']==NULL){
        echo "<script>window.location='customer_list.php'</script>";
    }else{
        $id_user = $_GET['cus_id'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateUser = $user->update_user($_POST,$id_user);
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
                        Sửa thông tin khách hàng
                    </header>
                    <?php
                        if(isset($updateUser)){
                            echo $updateUser;
                        }
                    ?>
                    <?php
                        $get_name = $user->get_user($id_user);
                        if($get_name){
                            while($result = $get_name->fetch_assoc()){
                    ?>
                    <div class="panel-body">
                    <?php
                    ?>
                        <div class="position-center">
                            <form role="form" action="" method="post">
                            <div class="form-group">
                                <label >Tên khách hàng</label>
                                <input type="text" class="form-control" name="cus_name" id="exampleInputEmail1" value="<?php echo $result['cus_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label >SĐT</label>
                                <input type="text" class="form-control" name="cus_phone" id="exampleInputEmail1" value="<?php echo $result['cus_phone']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="cus_email" id="exampleInputEmail1" value="<?php echo $result['cus_email']; ?>">
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ</label>
                                <input type="text" class="form-control" name="cus_address" id="exampleInputEmail1" value="<?php echo $result['cus_address']; ?>">
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
        </div>
</section>
 <!-- footer -->

  <!-- / footer -->
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
