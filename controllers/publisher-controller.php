<?php
include_once '../services/publishers-services.php';

class CategoryController{
    private $services;
    public function __construct()
    {
        $this->services = new PublishersService();
    }
    public function getAllCategories()
    {
        return $this->services->getAllPublishers();
    }
   
}