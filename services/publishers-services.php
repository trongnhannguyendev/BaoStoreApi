<?php
include_once '../configs/dbconfig.php';
include_once '../models/respone.php';
include_once '../models/publishers.php';

class PublishersService
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }
    public function getAllPublishers()
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT PUBLISHERID, PUBLISHERNAME FROM TBLPUBLISHERS";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listPublishers = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $publisher = new Publishers($PUBLISHERID, $PUBLISHERNAME);
                array_push($listPublishers, $publisher);
            }
            $response->setMessage("get all publishers success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listPublishers);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }
    public function insertPublisher($data)
    {
    }
}
