<?php
include_once '../services/images-services.php';

class ImagesController
{
    private $services;
    public function __construct()
    {
        $this->services = new ImagesServices();
    }
}
