<?php
	include '../lib/session.php';
    session::checkSession();
	include '../class/category.php';
	include '../class/product.php';
?>
<?php
	$product = new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])){
        $insertProduct = $product->insert_product($_POST,$_FILES);
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
                            Thêm sản phẩm
                        </header>
                        <?php
                            if(isset($insertProduct)){
                                echo $insertProduct;
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="product_add.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá tiền</label>
                                    <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Khuyến mại</label>
                                    <input type="text" class="form-control" name="product_sale" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="exampleInputPassword1" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh minh họa</label>
                                    <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Type</label>
                                    <select name="product_type" class="form-control input-sm m-bot15">
                                        <option value="1">Nổi bật</option>
                                        <option value="0">Không nổi bật</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        <?php
                                            $cat = new Category();
                                            $cat_list = $cat->show_cate();
                                            if($cat_list){
                                                while($result = $cat_list->fetch_assoc()){

                                        ?>
                                        <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                                        <?php
                                        
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Submit</button>
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
