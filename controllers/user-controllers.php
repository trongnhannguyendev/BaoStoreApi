<?php
include_once '../services/users-services.php';

class UserController{
    private $services;
    public function __construct()
    {
        $this->services = new UserServices();
    }
    public function postLogin($email, $password)
    {
            return $this->services->login($email,$password);
        
    }

    public function postSignup($fullname,$email,$password,$phonenumber){
            return $this->services->signup($fullname,$email,$password,$phonenumber);
    }
}

?>