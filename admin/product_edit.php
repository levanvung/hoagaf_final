<?php
	include '../lib/session.php';
    Session :: checkSession();
	include '../class/category.php';
	include '../class/product.php';
?>
<?php
	$product = new product();
    if(!isset($_GET['product_id']) || $_GET['product_id']==NULL){
        echo "<script>window.location='product_list.php'</script>";
    }else{
        $id = $_GET['product_id'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']){
        $updateProduct = $product->update_product($_POST,$_FILES,$id);
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
                            if(isset($upadteProduct)){
                                echo $upadteProduct;
                            }
                        ?>
                        <?php
                        $get_product = $product->get_product($id);
                        if($get_product){
                            while($result_product = $get_product->fetch_assoc()){
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="product_name" value="<?php echo $result_product['product_name']; ?>" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá tiền</label>
                                        <input type="text" class="form-control" name="product_price" value="<?php echo $result_product['product_price']; ?>"  id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá khuyến mại</label>
                                        <input type="text" class="form-control" name="product_sale" value="<?php echo $result_product['product_sale']; ?>"  id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả</label>
                                        <textarea style="resize: none;" rows="5" class="form-control"   name="product_desc" id="exampleInputPassword1" ><?php echo $result_product['product_desc']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ảnh minh họa</label> <br>
                                        <div>
                                        <img src="uploads/<?php echo $result_product['product_image']; ?>" width="150">
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" value="<?php echo $result['product_image']; ?>"  name="product_image" id="exampleInputEmail1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Type</label>
                                        <select name="product_type" class="form-control input-sm m-bot15">
                                            <?php
                                                if ($result_product['product_type'] == 0){
                                            ?>
                                            <option value="1">Nổi bật</option>
                                            <option selected value="0">Không nổi bật</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option selected value="1">Nổi bật</option>
                                                <option  value="0">Không nổi bật</option>
                                            <?php
                                            }
                                            ?>
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
                                            <option <?php if($result['cat_id']==$result_product['cat_id']){echo 'selected';}?> value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                                            <?php
                                            
                                                }
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
