<?php
    include '../class/category.php'
?>
<?php
	$cat = new category();
    if(!isset($_GET['cat_id']) || $_GET['cat_id']==NULL){
        echo "<script>window.location='cate_list.php'</script>";
    }else{
        $id = $_GET['cat_id'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cat_name = $_POST['cat_name']; 

        $updateCat = $cat->update_cate($cat_name,$id);
    }

?>
<?php
	include '../lib/session.php';
	Session :: checkSession();
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
    <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sửa thương hiệu sản phẩm</>
                    </header>
                    <?php
                        if(isset($updateCat)){
                            echo $updateCat;
                        }
                    ?>
                    <?php
                        $get_name = $cat->get_name($id);
                        if($get_name){
                            while($result = $get_name->fetch_assoc()){
                    ?>
                    <div class="panel-body">
                    <?php
                    ?>
                        <div class="position-center">
                            <form role="form" action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu sản phẩm</label>
                                <input type="text" class="form-control" name="cat_name" id="exampleInputEmail1" value="<?php echo $result['cat_name']; ?>">
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
