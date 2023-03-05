<?php
include_once '../services/carts-services.php';

class CartController
{
    private $services;
    public function __construct()
    {
        $this->services = new CartsServices();
    }
    public function getAllCartsByUserID($userid)
    {
        return $this->services->getAllCartsByUserID($userid);
    }
    public function insertCart($data)
    {
        return $this->services->insertCart($data);
    }
}
