<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/database.php');

    include_once ($filepath.'../../helper/formats.php'); 
?>
<?php

    class product {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database;
            $this->fm = new Format;
        }
        public function insert_product($data,$files){

            $product_name = mysqli_real_escape_string($this->db->link,$data['product_name']);
            $product_price = mysqli_real_escape_string($this->db->link,$data['product_price']); 
            $product_brand = mysqli_real_escape_string($this->db->link,$data['product_brand']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $product_type = mysqli_real_escape_string($this->db->link,$data['product_type']);
            $product_sale = mysqli_real_escape_string($this->db->link,$data['product_sale']);



            $permited = array('jpg','png','gif','jpeg');
            $file_name = $_FILES['product_image']['name'];
            $file_size = $_FILES['product_image']['size'];
            $file_temp = $_FILES['product_image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            if($product_name == "" || $product_price == "" || $product_brand == "" || $product_desc == "" || $product_type == "" || $file_name ==""
            || $product_sale == ""){
                $alert = "<span class = 'error'>Bạn phải điền đủ các trường</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(product_name,product_price,cat_id,product_desc,product_type,product_image,product_sale) VALUES('$product_name','$product_price','$product_brand','$product_desc','$product_type','$unique_image','$product_sale') ";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class = 'success'>Thêm thành công </span>";
                    return $alert;
                }else{
                    $alert = "<span class = 'success'>Thêm thất bại</span>";
                    return $alert;
                }

            }

        }
        public function show_product(){
            $query = "SELECT tbl_product.*,tbl_category.cat_name FROM tbl_product INNER JOIN tbl_category ON tbl_product.cat_id = tbl_category.cat_id ORDER BY tbl_product.product_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product($id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            $product_name = mysqli_real_escape_string($this->db->link,$data['product_name']);
            $product_price = mysqli_real_escape_string($this->db->link,$data['product_price']);
            $product_brand = mysqli_real_escape_string($this->db->link,$data['product_brand']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $product_type = mysqli_real_escape_string($this->db->link,$data['product_type']);

            $permited = array('jpg','png','gif','jpeg');
            $file_name = $_FILES['product_image']['name'];
            $file_size = $_FILES['product_image']['size'];
            $file_temp = $_FILES['product_image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($product_name == "" || $product_price == "" || $product_brand == "" || $product_desc == "" || $product_type == "" ){
                $alert = "<span class = 'error'>Không thể bỏ trống các thuộc tính</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                if(!empty($file_name)){
                    if($file_size > 1045618){
                        $alert = "<span class = 'error'>Dung luong qua lon</span>";
                        return $alert;
                    }elseif(in_array($file_ext,$permited)===false){
                        $alert = "<span class = 'error'>Chi up dc cac file ". implode(', ',$permited)."</span>";
                        return $alert;
                    }
                    $query = "UPDATE tbl_product SET product_name = '$product_name',product_type = '$product_type',product_desc = '$product_desc',product_price='$product_price',cat_id = '$product_brand',product_image = '$unique_image' WHERE product_id = '$id'";
                }else{
                    $query = "UPDATE tbl_product SET product_name = '$product_name',product_type = '$product_type',product_desc = '$product_desc',product_price='$product_price',cat_id = '$product_brand' WHERE product_id = '$id'";
                }
            }
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class = 'success'>Sửa thành công </span>";
                return $alert;
            }else{
                $alert = "<span class = 'success'>Sửa thất bại</span>";
                return $alert;
            }
        }
        public function delete_product($id){
            $query = "DELETE  FROM tbl_product WHERE product_id = '$id'";
            $result = $this->db->DELETE($query);
            if($result){
                $alert = "<span class = 'success'>Xóa thành công </span>";
                return $alert;
            }else{
                $alert = "<span class = 'unsuccess'>Xóa thất bại</span>";
                return $alert;
            }   
        }
        public function get_single($id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
            $result = $this->db->select($query);
            return $result;

        }
        public function show_product_user(){
            $query = "SELECT tbl_product.*,tbl_category.cat_name FROM tbl_product INNER JOIN tbl_category ON tbl_product.cat_id = tbl_category.cat_id ORDER BY tbl_product.product_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_product_user_cate($id_cat){
            $query = "SELECT tbl_product.*,tbl_category.cat_name FROM tbl_product INNER JOIN tbl_category ON tbl_product.cat_id = tbl_category.cat_id WHERE tbl_product.cat_id = '$id_cat' ORDER BY tbl_product.product_id DESC ";
            $result = $this->db->select($query);
            return $result;
        }

    } 
?>