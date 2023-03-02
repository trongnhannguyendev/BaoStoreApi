<?php
include_once '../configs/dbconfig.php';
include_once '../models/carts.php';
include_once '../models/respone.php';
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
            $query = " SELECT USERID, TBLCS.BOOKID, TBLCS.QUANTITY,TITLE, PRICE, URL,ISDEFAULT FROM TBLCARTS TBLCS
                    INNER JOIN TBLBOOKS TBLBS ON TBLCS.BOOKID = TBLBS.BOOKID
                    INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID HAVING ISDEFAULT = 1 AND USERID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $userID);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listCarts = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $cart = new Carts($USERID, $BOOKID, $QUANTITY, $TITLE, $PRICE, $URL, $ISDEFAULT);
                array_push($listCarts, $cart);
            }
            $response->setMessage("get carts by userID success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listCarts);
        } catch (Exception $e) {
            $response->setMessage($e->getMessage("get carts by userID fail"));
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }
    public function insertCart($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "INSERT INTO TBLCARTS SET USERID =?, BOOKID = ?, QUANTITY = ? ";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $data->userID);
            $stmt->bindParam(2, $data->bookID);
            $stmt->bindParam(3, $data->quantity);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Insert cart success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Insert cart fail");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Already have that book in your cart " . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
        return $response;
    }
}
