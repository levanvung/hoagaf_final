<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/session.php');
    Session::checkLogin();
    include_once ($filepath.'../../lib/database.php');
    include_once ($filepath.'../../helper/formats.php');
?>
<?php

    class adminlogin {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database;
            $this->fm = new Format;
        }
        public function login_admin($admin_user,$admin_pass) {
            $admin_user = $this->fm->validation($admin_user);
            $admin_pass = $this->fm->validation($admin_pass);

            $admin_user = mysqli_real_escape_string($this->db->link,$admin_user);
            $admin_pass = mysqli_real_escape_string($this->db->link,$admin_pass);

            if(empty($admin_pass)||empty($admin_user)){
                $alert = "Please enter your user or pass";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass' ";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('admin_login',true);
                    Session::set('admin_id',$value['admin_id']);
                    Session::set('admin_user',$value['admin_user']);
                    Session::set('admin_name',$value['admin_name']);
                    header('Location:index.php');
                }else{
                    $alert = "Your User or Pass not match";
                    return $alert;
                }
            }

        }
    } 
?>