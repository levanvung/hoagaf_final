<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/database.php');
    include_once ($filepath.'../../helper/formats.php');
?>
<?php

    class order {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database;
            $this->fm = new Format;
        }
        public function insert_order($status,$ses_id){
            $status = mysqli_real_escape_string($this->db->link,$status);
            $ses_id = mysqli_real_escape_string($this->db->link,$ses_id);
            $session_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE ses_id = '$ses_id'";
            $result = $this->db->select($query)->fetch_assoc();
            $quantity = $result['quantity'];
            $price = $result['product_price'];
            $subtotal = $quantity*$price+30000;
            $query_cart = "INSERT INTO tbl_offline_payment(status_order,ses_id,subtotal) VALUES('$status','$session_id','$subtotal') ";
            $result_cart = $this->db->insert($query_cart);
            if($result_cart){
                header("Location:list_order.php");
            }else{
                header("Location:404.php");
            }
        }
        public function get_order($id){
            $query_order = "SELECT * FROM tbl_offline_payment WHERE order_id = '$id'";
            $result_order = $this->db->select($query_order);
            return $result_order;
        }
        public function update_status($status,$id){
            $status = mysqli_real_escape_string($this->db->link,$status);
            $query = "UPDATE tbl_offline_payment SET status_order = '$status' WHERE order_id = '$id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class = 'success'>Cập nhật trạng thái thành công</span>";
                return $alert;
            }else{
                $alert = "<span class = 'success'>Cập nhật trạng thái thất bại</span>";
                return $alert;
            }
        }
        public function show_order(){
            $query = "SELECT * FROM tbl_offline_payment ORDER BY order_id";
            $result = $this->db->select($query);
            return $result;
        }
        public function delete_order($id_order){
            $query = "DELETE FROM tbl_offline_payment WHERE order_id = '$id_order'";
            $result = $this->db->DELETE($query);
            if($result){
                $alert = "<span class = 'success'>Xóa thành công </span>";
                return $alert;
            }else{
                $alert = "<span class = 'unsuccess'>Xóa thất bại</span>";
                return $alert;
            }   
        }
    }
?>