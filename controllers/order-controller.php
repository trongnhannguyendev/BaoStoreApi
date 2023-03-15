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
    public function getAllOrderByUserID($userid)
    {
        return $this->services->getAllOrderByUserID($userid);
    }

    public function getOrderDetailByOrderID($orderid)
    {
        return $this->services->getOrderDetailByOrderID($orderid);
    }
    public function getOrderStatusDelivery($data)
    {
        return $this->services->getOrderStatusDelivery($data);
    }
    public function getOrderStatusCancel($data)
    {
        return $this->services->getOrderStatusCancel($data);
    }
    public function getOrderStatusSuccess($data)
    {
        return $this->services->getOrderStatusSuccess($data);
    }
}
