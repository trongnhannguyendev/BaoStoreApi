<?php
include_once '../configs/dbconfig.php';
include_once '../models/Books.php';
include_once '../models/respone.php';
include_once '../models/categories.php';
class BookServices
{
    public $connect;
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }

    public function getAllBooks()
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY,CATEGORYID, AUTHORID, PUBLISHERID, URL,
                 ISDEFAULT FROM TBLBOOKS TBLBS INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID HAVING ISDEFAULT = 1";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBook = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $URL);
                array_push($listBook, $books);
            }
            $response->setMessage("get all books success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBook);
        } catch (Exception $e) {
            $response->setMessage($e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }


    public function getBookDetail($bookId)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBook = [];
            $listImage = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $URL);
                array_push($listBook, $books);
            }
            $response->setMessage("get all books success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBook);
        } catch (Exception $e) {
            $response->setMessage($e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

    public function getBooksByCategory($categoryID)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY,CATEGORYID, AUTHORID, PUBLISHERID, URL,
            ISDEFAULT FROM TBLBOOKS TBLBS INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID HAVING ISDEFAULT = 1 AND CATEGORYID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $categoryID);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBooks = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $URL);
                array_push($listBooks, $books);
            }
            $response->setMessage("get books by category success");
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

    // fix
    public function getBooksBySearchKey($searchKey)
    {
        // $response = Response::getDefaultInstance();
        // try {
        //     $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY,CATEGORYID, AUTHORID, PUBLISHERID, URL,ISDEFAULT FROM 
        //         TBLBOOKS TBLBS INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID HAVING ISDEFAULT = 1 AND TITLE LIKE "."'"."?'".'%"''.'"';
        //     error_log($searchKey);
        //     $stmt = $this->connect->prepare($query);
        //     $stmt->bindParam(1, $searchKey);
        //     error_log(json_encode($stmt));
        //     $stmt->setFetchMode(PDO::FETCH_OBJ);
        //     $stmt->execute();
        //     $listBooks = [];
        //     while ($row = $stmt->fetch()) {
        //         extract($row);
        //         $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $URL);
        //         array_push($listBooks, $books);
        //     }
        //     $response->setMessage("get books by search keys success");
        //     $response->setError(false);
        //     $response->setResponeCode(1);
        //     $response->setData($listBooks);
        // } catch (Exception $e) {
        //     $response->setMessage($e->getMessage());
        //     $response->setError(true);
        //     $response->setResponeCode(0);
        // }
        // return $response;
    }

    public function getBooksByAuthor($authorID)
    {
        $response = Response::getDefaultInstance();
        try {
            //code...
        } catch (Exception $e) {
            //throw $th;
        }
    }
}
