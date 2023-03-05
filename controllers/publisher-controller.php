<?php
include_once '../services/publishers-services.php';

class PublisherController
{
    private $services;
    public function __construct()
    {
        $this->services = new PublishersService();
    }
    public function getAllPublishers()
    {
        return $this->services->getAllPublishers();
    }
}
