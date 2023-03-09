<?php
include_once '../configs/dbconfig.php';
include_once '../models/respone.php';

class OrdersServices
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }
    public function insertOrder($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "INSERT INTO TBLORDERS SET STATE = 1, TOTAL = ?, NOTE= ?,
                 FULLNAME=?, PHONENUMBER = ?,ADDRESS =?, PAYMENT = ?, USERID = ? ";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $data->total);
            $stmt->bindParam(2, $data->note);
            $stmt->bindParam(3, $data->fullname);
            $stmt->bindParam(4, $data->phonenumber);
            $stmt->bindParam(5, $data->address);
            $stmt->bindParam(6, $data->payment);
            $stmt->bindParam(7, $data->userid);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Insert order success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Insert order failed");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
        return $response;
    }

    public function insertOrderDetail($data)
    {
        $response = Response::getDefaultInstance();
        try {

            $query2 = "INSERT INTO TBLORDERDETAILS SET ORDERID = (SELECT ORDERID FROM TBLORDERS WHERE USERID = ? ORDER BY CREATEDATE DESC LIMIT 1), QUANTITY = ?, BOOKID =?";
            $statement2 = $this->connect->prepare($query2);
            $statement2->bindParam(1, $data->userid);
            $statement2->bindParam(2, $data->quantity);
            $statement2->bindParam(3, $data->bookid);
            $statement2->setFetchMode(PDO::FETCH_ASSOC);
            $statement2->execute();
            $this->connect->beginTransaction();
            if ($statement2->execute()) {
                $this->connect->commit();
                $response->setMessage("Insert order detail success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Insert order detail fail");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
        return $response;
    }
}
