<?php
include_once '../services/user-services.php';

class UserController{
    private $services;
    public function __construct()
    {
        $this->services = new UserServices();
    }
    // public function postLogin($email, $password)
    // {
    //     if($_POST){
    //         return $this->services->login($email,$password);
    //     }
        
    // }

    // public function postSignup($fullname,$email,$password,$phonenumber){
    //     if($_POST){
    //         return $this->services->signup($fullname,$email,$password,$phonenumber);
    //     }
    // }
    public function getUserByEmail($email)
    {
        return $this->services->getUserByEmail($email);
    }

    public function checkLogin($email, $password)
    {
        $response = $this->services->getUserByEmail($email);
        if ($response->getError() === false) {
            if ($response->getData() !== null) {
                if (strcmp($password, $response->getData()[0]->getPassword()) == 0) {
                    $response->setResponeCode(1);
                    $response->setMessage("Login successfull");
                    $response->getData()[0]->setPassword(null);
                } else {
                    $response->setResponeCode(0);
                    $response->setMessage("Login failed");
                    $response->setData(null);
                }
            } else {
                $response->setResponeCode(0);
                $response->setMessage("Login failed");
            }
        } else {
            $response->setResponeCode(5);
            $response->setMessage("Server error");
        }
        return $response;
    }
}

?>