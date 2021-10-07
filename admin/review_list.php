
<?php
include '../lib/session.php';
include '../class/category.php';
include '../class/product.php';
include_once '../helper/formats.php';
include_once '../class/user.php';
?>
<?php
$user = new user();
if(isset($_GET['review_id'])){
    $id = $_GET['review_id'];
    $deleteUser = $user->delete_review($id);
}
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
<section class="wrapper">
<div class="w3layouts-glyphicon">		
        <div class="panel panel-default">
            <div class="panel-heading">
            Danh sách bình luận
            </div>
            <div class="table-responsive">
            <?php
                if(isset($deleteUser)){
                    echo $deleteUser;
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên bình luận</th>
                    <th>Bình luận</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $user = new user();
                    $fm = new Format();
                    $show_review = $user->show_admin_review();
                    if($show_review){
                        $i=0;
                        while($result = $show_review->fetch_assoc()){
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['tenbinhluan']; ?></td>
                    <td><?php echo $result['binhluan']; ?></td>
                    <td><?php echo $result['product_name']; ?></td>
                    <td><img style="width:100px;" src="uploads/<?php echo $result['product_image']; ?>"></td>
                    <td>

                    <a onclick="return confirm('Are you want to delete?')" href="?review_id=<?php echo $result['binhluan_id']?>" class="active edit_style" ui-toggle-class="">
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
