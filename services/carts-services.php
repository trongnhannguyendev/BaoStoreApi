<?php
include_once '../configs/dbconfig.php';
include_once '../models/carts.php';
class CartsServices
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }
    public function getAllCartsByUserID($userID)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT USERID, BOOKID, QUANTITY FROM TBLCARTS WHERE USERID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $userID);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listCarts = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $cart = new Carts($USERID, $BOOKID, $QUANTITY);
                array_push($listCarts, $cart);
            }
            $response->setMessage("get carts by userID success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBooks);
        } catch (Exception $e) {
            $response->setMessage($e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }
    public function insertCart($data)
    {
        $response = Response::getDefaultInstance();
        try {
            //code...
        } catch (Exception $e) {
            //throw $th;
        }
    }
}
