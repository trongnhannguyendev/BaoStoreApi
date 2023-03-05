<?php
include_once '../services/addresses-services.php';

class AddressController
{
    private $services;
    public function __construct()
    {
        $this->services = new AddressServices();
    }

    public function getAllAddressesByUserID($userid)
    {
        return $this->services->getAllAddressesByUserID($userid);
    }
}
