<?php
include_once '../services/user-services.php';

class UserController{
    private $services;
    public function __construct()
    {
        $this->services = new UserServices();
    }
    public function postLogin($email, $password)
    {
        if($_POST){
            return $this->services->login($email,$password);
        }
        
    }

    public function postSignup($fullname,$email,$password,$phonenumber){
        if($_POST){
            return $this->services->signup($fullname,$email,$password,$phonenumber);
        }
    }
}

?>