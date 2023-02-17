<?php
include_once '../configs/dbconfig.php';
include_once '../models/respone.php';
include_once '../models/categories.php';

    class CategoriesService{
        public $connect;
        public function __construct()
        {
            $this->connect = (new DBConfig())->getConnect();
        }
        public function getAllCategories(){
            $response = Response::getDefaultInstance();
        try {
            $query = "SELECT CATEGORIYID, CATEGORIYNAME";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listCates = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $cates = new Categories($CATEGORIYID,$CATEGORIYNAME);
                array_push($listCates, $cates);
            }
            $response->setMessage("get all cate success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listCates);
        } catch (Exception $e) {
            $response->setMessage($e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

}