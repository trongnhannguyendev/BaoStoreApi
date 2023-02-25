<?php
include_once '../services/carts-services.php';

class CartController
{
    private $services;
    public function __construct()
    {
        $this->services = new CartsServices();
    }
    public function getAllCartsByUserID($userID)
    {
        return $this->services->getAllCartsByUserID($userID);
    }
}
