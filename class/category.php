<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/database.php');
    include_once ($filepath.'../../helper/formats.php');
?>
<?php

    class category {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database;
            $this->fm = new Format;
        }
        public function insert_cate($cat_name){
            $cat_name = $this->fm->validation($cat_name);

            $cat_name = mysqli_real_escape_string($this->db->link,$cat_name);

            if(empty($cat_name)){
                $alert = "This must be not empty";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_category(cat_name) VALUES('$cat_name') ";
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
        public function show_cate(){
            $query = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name($id){
            $query = "SELECT * FROM tbl_category WHERE cat_id = $id";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_cate($cat_name,$id){
            $cat_name = $this->fm->validation($cat_name);
            $cat_name = mysqli_real_escape_string($this->db->link,$cat_name);
            $id = mysqli_real_escape_string($this->db->link,$id);

            if(empty($cat_name)){
                $alert = "<span class = 'error'>Không được để trống </span>";
                return $alert;
            }else{
                $query = " UPDATE tbl_category SET cat_name = '$cat_name' WHERE cat_id = '$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class = 'success'>Sửa thành công </span>";
                    return $alert;
                }else{
                    $alert = "<span class = 'success'>Sửa thất bại</span>";
                    return $alert;
                }

            }
        }
        public function delete_cate($id){
            $query = "DELETE FROM tbl_category WHERE cat_id = $id";
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