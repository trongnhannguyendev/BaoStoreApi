<?php
include_once '../configs/dbconfig.php';
include_once '../models/respone.php';
include_once '../models/publishers.php';

    class PublishersService{
        public $connect;
        public function __construct()
        {
            $this->connect = (new DBConfig())->getConnect();
        }
        public function getAllPublishers(){
            $response = Response::getDefaultInstance();
        try {
            $query = "SELECT PUBLISHERID, PUBLISHERNAME FROM TBLPUBLISHERS";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listCates = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $cates = new Publishers($PUBLISHERID,$PUBLISHERNAME);
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