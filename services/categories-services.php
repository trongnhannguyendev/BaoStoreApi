<?php
include_once '../configs/dbconfig.php';
include_once '../models/respone.php';
include_once '../models/categories.php';

class CategoriesService
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }
    public function getAllCategories()
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT CATEGORYID, CATEGORYNAME FROM TBLCATEGORIES";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listCates = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $cates = new Categories($CATEGORYID, $CATEGORYNAME);
                array_push($listCates, $cates);
            }
            $response->setMessage("get all cate success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listCates);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }
    public function getInsertCategory()
    {
    }
}
