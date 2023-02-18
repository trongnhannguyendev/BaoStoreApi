<?php
include_once '../services/addresses-services.php';

class AddressController{
    private $services;
    public function __construct()
    {
        $this->services = new AddressServices();
    }
    public function getAllAddresses()
    {
        return $this->services->getAllAddresses();
    }
    public function getaddressesByUser($userID){
        return $this->services->getaddressesByUser($userID);
    }
}
