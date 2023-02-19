<?php
include_once '../services/books-services.php';

class BookController
{
    private $services;
    public function __construct()
    {
        $this->services = new BookServices();
    }
    public function getAllBooks()
    {
        return $this->services->getAllBooks();
    }
    public function getBooksByCategory($categoryID)
    {
        return $this->services->getBooksByCategory($categoryID);
    }
    public function getBooksBySearchKey($searchKey)
    {
        return $this->services->getBooksBySearchKey($searchKey);
    }
}
