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
    // DON'T USE THIS FUNCTION! WHY YOU WRITE THIS WHO'LL USE THIS FUNCTION?
    // public function getAllAddresses()
    // {
    //     $response = Response::getDefaultInstance();
    //     try {
    //         $query = "SELECT TBLADS.ADDRESSID, LOCATION, WARD, DISTRICT,CITY, ADDRESSNAME, ISDEFAULT, TBLADS.USERID
    //         FROM TBLADDRESSES TBLADS INNER JOIN tblusers TBLU ON TBLADS.USERID = TBLU.USERID";
    //         $stmt = $this->connect->prepare($query);
    //         $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //         $stmt->execute();
    //         $listAddress = [];
    //         while ($row = $stmt->fetch()) {
    //             extract($row);
    //             $addresses = new Addresses($ADDRESSID, $LOCATION, $WARD, $DISTRICT, $CITY, $ADDRESSNAME, $ISDEFAULT, $USERID);
    //             array_push($listAddress, $addresses);
    //         }
    //         $response->setMessage("get all addresses success");
    //         $response->setError(false);
    //         $response->setResponeCode(1);
    //         $response->setData($listAddress);
    //     } catch (Exception $e) {
    //         $response->setMessage($e->getMessage());
    //         $response->setError(true);
    //         $response->setResponeCode(0);
    //     }
    //     return $response;
    // }
    // wrong function on query 
    // public function getAddressesByUser($userID)
    // {
    //     $response = Response::getDefaultInstance();
    //     try {
    //         $query = "SELECT TBLADS.ADDRESSID, LOCATION, WARD, DISTRICT,CITY, ADDRESSNAME, ISDEFAULT, TBLADS.USERID
    //         FROM TBLADDRESSES TBLADS INNER JOIN tblusers TBLU ON TBLADS.USERID = TBLU.USERID HAVING USERID=?";
    //         $stmt = $this->connect->prepare($query);
    //         $stmt->bindParam(1, $userID);
    //         $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //         $stmt->execute();
    //         $listAddresss = [];
    //         while ($row = $stmt->fetch()) {
    //             extract($row);
    //             $addresses = new Addresses($ADDRESSID, $LOCATION, $WARD, $DISTRICT, $CITY, $ADDRESSNAME, $ISDEFAULT, $USERID);
    //             array_push($listAddresss, $addresses);
    //         }
    //         $response->setMessage("get addresses by category success");
    //         $response->setError(false);
    //         $response->setResponeCode(1);
    //         $response->setData($listAddresss);
    //     } catch (Exception $e) {
    //         $response->setMessage($e->getMessage());
    //         $response->setError(true);
    //         $response->setResponeCode(0);
    //     }
    //     return $response;
    // }

    public function getAllAddressesByUserID($userID)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT ADDRESSID, USERID, LOCATION, WARD, DISTRICT, CITY, ADDRESSNAME, ISDEFAULT FROM TBLADDRESSES
                WHERE USERID =?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $userID);
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
}
