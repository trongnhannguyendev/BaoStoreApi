<?php
include_once '../models/authors.php';

class AuthorsService
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }

    public function getAllAuthors()
    {
    }
    public function insertAuthor($data)
    {
    }
    public function updateAuthor($data)
    {
    }
}
