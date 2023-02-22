<?php
include_once '../services/publishers-services.php';

class CategoryController{
    private $services;
    public function __construct()
    {
        $this->services = new PublishersService();
    }
    // fix wrong function
    // public function getAllCategories()
    // {
    //     return $this->services->getAllPublishers();
    // }
    public function getAllPublishers(){
        return $this->services->getAllPublishers();
    }
   
}