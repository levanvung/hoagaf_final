<?php
    include '../class/category.php'
?>
<?php
	$cat = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cat_name = $_POST['cat_name']; 

        $insertCat = $cat->insert_cate($cat_name);
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
		<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
                        </header>
                        <?php
                            if(isset($insertCat)){
                                echo $insertCat;
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="cat_add.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu sản phẩm</label>
                                    <input type="text" class="form-control" name="cat_name" id="exampleInputEmail1" placeholder="Category name">
                                </div>

                                <button type="submit" name="submit" class="btn btn-info">Nhập</button>
                            </form>
                            </div>

                        </div>
                    </section>
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
