<?php
include_once '../services/orders-services.php';

class OrderController
{
    private $services;
    public function __construct()
    {
        $this->services = new OrdersServices();
    }
    public function insertOrder($data)
    {
        return $this->services->insertOrder($data);
    }

    public function insertOrderDetail($data)
    {
        return $this->services->insertOrderDetail($data);
    }
}
