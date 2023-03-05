<?php
include_once '../configs/dbconfig.php';
include_once '../models/addresses.php';
include_once '../models/respone.php';
include_once '../models/users.php';
class AddressServices
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }
    public function getAllAddressesByUserID($userid)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT ADDRESSID, USERID, LOCATION, WARD, DISTRICT, CITY, ADDRESSNAME, ISDEFAULT FROM TBLADDRESSES
                WHERE USERID =?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $userid);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listAddresss = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $addresses = new Addresses($ADDRESSID, $USERID, $LOCATION, $WARD, $DISTRICT, $CITY, $ADDRESSNAME, $ISDEFAULT);
                array_push($listAddresss, $addresses);
            }
            $response->setMessage("get addresses by category success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listAddresss);
        } catch (Exception $e) {
            $response->setMessage($e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }
    public function insertAdress($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "INSERT INTO TBLADDRESSES SET ADDRESSID = NULL, 
                USERID =?, LOCATION =? , WARD =?, DISTRICT =?, CITY =?, ADDRESSNAME =?, ISDEFAULT 0 ";
        } catch (Exception) {
        }
    }
}
