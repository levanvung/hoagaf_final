
<?php
include '../lib/session.php';
include '../class/category.php';
include '../class/product.php';
include_once '../helper/formats.php';
include_once '../class/user.php';
?>
<?php
$user = new user();
if(isset($_GET['cus_id'])){
    $id = $_GET['cus_id'];
    $deleteUser = $user->delete_user($id);
}
?>
<?php include 'inc/header.php'; ?>

<?php include 'inc/aside.php'; ?>
<section id="main-content">
<section class="wrapper">
<div class="w3layouts-glyphicon">		
        <div class="panel panel-default">
            <div class="panel-heading">
            Danh sách Khách hàng
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
                    <th>Tên khách hàng</th>
                    <th>SĐT</th>
                    <th>email</th>
                    <th>Địa chỉ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $user = new user();
                    $fm = new Format();
                    $show_customer = $user->show_user();
                    if($show_customer){
                        $i=0;
                        while($result_user = $show_customer->fetch_assoc()){
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result_user['cus_name']; ?></td>
                    <td><?php echo $result_user['cus_phone']; ?></td>
                    <td><?php echo $result_user['cus_email']; ?></td>
                    <td><?php echo $result_user['apartment_number']."-".$result_user['city']; ?></td>
                    <td>
                    <a href="cus_edit.php?cus_id=<?php echo $result_user['id']; ?>" class="active edit_style" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a onclick="return confirm('Are you want to delete?')" href="?cus_id=<?php echo $result_user['id']?>" class="active edit_style" ui-toggle-class="">
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
