<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/database.php');
    include_once ($filepath.'../../helper/formats.php');
?>
<?php

    class cart {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database;
            $this->fm = new Format;
        }
        public function add_to_cart($size,$quantity, $id){
            $quantity = $this->fm->validation($quantity);
            $size = $this->fm->validation($size);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $size = mysqli_real_escape_string($this->db->link,$size);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $session_id = session_id();

            $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $pr_name = $result['product_name'];
            $pr_id = $result['product_id'];
            $pr_price = $result['product_sale'];
            $pr_image = $result['product_image'];
            $query_cart = "INSERT INTO tbl_cart(product_name,product_price,product_id,product_image,ses_id,quantity,size) VALUES('$pr_name','$pr_price','$pr_id','$pr_image','$session_id','$quantity','$size')";
            $result_cart = $this->db->insert($query_cart);
            if($result_cart){
                header("Location:checkout.php");
            }else{
                header("Location:404.php");
            }
        }
        public function get_pr_cart(){
            $session_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE ses_id = '$session_id' ORDER BY cart_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity($cart_id, $quantity){
            $quantity = $this->fm->validation($quantity);
            $cart_id = mysqli_real_escape_string($this->db->link,$cart_id);
            $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class = 'success'>Sửa thành công </span>";
                return $alert;
            }else{
                $alert = "<span class = 'success'>Sửa thất bại</span>";
                return $alert;
            }
        }
        public function delete_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link,$cartid);
            $query = "DELETE FROM tbl_cart WHERE cart_id = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header("Location:checkout.php");
            }else{
                $msg ="<span class='thatbai'>San pham chua duoc xoa </span>";
                return $msg;
            }
        }
        public function delete_data(){
            $ses = session_id();
            $query = "DELETE FROM tbl_cart WHERE ses_id = '$ses'";
            $result = $this->db->delete($query);
            return $result;
        }  
        public function show_user(){
            $id = Session ::get('id');
            $query = "SELECT tbl_cart.*,tbl_custumer.* FROM tbl_cart INNER JOIN tbl_custumer ON tbl_cart.ses_id = tbl_custumer.ses_id WHERE tbl_custumer.id = '$id' AND tbl_custumer.ses_id=tbl_cart.ses_id LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }   
        public function insert_order($pay_id,$cus_id){
            $ses_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE ses_id = '$ses_id'";
            $get_pr = $this->db->select($query);
            if($get_pr){
                while($result = $get_pr->fetch_assoc()) {
                    $product_id = $result['product_id'];
                    $product_name = $result['product_name'];
                    $quantity = $result['quantity'];
                    $size = $result['size'];
                    $price = $result['product_price']*$quantity;
                    $cus_id = $cus_id;
                    $pay_id = $pay_id;
                    $query_order = "INSERT INTO tbl_offline_payment(product_name,price,product_id,quantity,cus_id,size,type_pay) VALUES('$product_name','$price','$product_id','$quantity','$cus_id','$size','$pay_id')";
                    $insert_order = $this->db->insert($query_order);
                }
            }
        }    
        public function get_amount($cus_id){
            $query = "SELECT price FROM tbl_order WHERE cus_id = '$cus_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }
        public function get_order($cus_id){
            $order = "SELECT * FROM tbl_offline_payment WHERE cus_id = '$cus_id'";
            $get_order = $this->db->select($order);
            return $get_order;
        }
        



        //BACKEND
    }
?>