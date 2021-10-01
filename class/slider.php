<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/database.php');

    include_once ($filepath.'../../helper/formats.php');
    ?>
<?php

    class slider{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database;
            $this->fm = new Format;
        }
        public function insert_slider($data,$files){

            $slider_content = mysqli_real_escape_string($this->db->link,$data['slider_content']);
            $slider_type = mysqli_real_escape_string($this->db->link,$data['slider_type']);
            $slider_title = mysqli_real_escape_string($this->db->link,$data['slider_title']);


            $permited = array('jpg','png','gif','jpeg');
            $file_name = $_FILES['slider_image']['name'];
            $file_size = $_FILES['slider_image']['size'];
            $file_temp = $_FILES['slider_image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            if( $slider_content == "" || $slider_type == "" || $file_name == "" || $slider_title == "" ){
                $alert = "<span class = 'error'>Bạn phải điền đủ các trường</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_slider(slider_content,slider_type,slider_image,slider_title) VALUES('$slider_content','$slider_type','$unique_image','$slider_title') ";
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
        public function show_slide(){
            $query = "SELECT tbl_slider.* FROM tbl_slider ORDER BY slider_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_slider($id){
            $query = "SELECT * FROM tbl_slider WHERE slider_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_slider($data,$files,$id){
            $slider_content = mysqli_real_escape_string($this->db->link,$data['slider_content']);
            $slider_type = mysqli_real_escape_string($this->db->link,$data['slider_type']);
            $slider_title = mysqli_real_escape_string($this->db->link,$data['slider_title']);


            $permited = array('jpg','png','gif','jpeg');
            $file_name = $_FILES['slider_image']['name'];
            $file_size = $_FILES['slider_image']['size'];
            $file_temp = $_FILES['slider_image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if( $slider_content == "" || $slider_type == "" || $slider_title == "" ){
                $alert = "<span class = 'error'>Không thể bỏ trống các thuộc tính</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                if(!empty($file_name)){
                    if($file_size > 1045618){
                        $alert = "<span class = 'error'>Dung luong anh qua lon</span>";
                        return $alert;
                    }elseif(in_array($file_ext,$permited)===false){
                        $alert = "<span class = 'error'>Chi up dc cac file ". implode(', ',$permited)."</span>";
                        return $alert;
                    }
                    $query = "UPDATE tbl_slider SET slider_type = '$slider_type',slider_title = '$slider_title',slider_content = '$slider_content',slider_image = '$unique_image' WHERE slider_id = '$id'";
                }else{
                    $query = "UPDATE tbl_slider SET slider_type = '$slider_type',slider_title = '$slider_title',slider_content = '$slider_content' WHERE slider_id = '$id'";
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
        public function delete_slider($id){
            $query = "DELETE  FROM tbl_slider WHERE slider_id = '$id'";
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