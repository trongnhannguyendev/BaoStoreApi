<?php
include_once '../configs/dbconfig.php';
include_once '../models/books.php';
include_once '../models/respone.php';
include_once '../models/categories.php';
include_once '../models/images.php';
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
    public function getImagesByBookID($bookID)
    {
        $response2 = Response::getDefaultInstance();
        try {
            $query = "SELECT IMAGEID, BOOKID, URL FROM TBLIMAGES WHERE BOOKID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $listImages = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $image = new Images($IMAGEID, $BOOKID, $URL, $ISDEFAULT);
                array_push($listImages, $image);
            }
            $response2->setMessage("get all books success");
            $response2->setError(false);
            $response2->setResponeCode(1);
            $response2->setData($listImages);
        } catch (Exception $e) {
            $response2->setMessage($e->getMessage());
            $response2->setError(true);
            $response->setResponeCode(0);
        }
        return $response2;
    }

    public function getBookDetail($bookID)
    {
        $response = Response::getDefaultInstance();

        try {
            $query = "SELECT BOOKID, TITLE, PRICE, QUANTITY,CATEGORYID, AUTHORID, PUBLISHERID,
                FROM TBLBOOKS WHERE BOOKID = ? ";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $bookID);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBook = [];
            if ($stmt->rowCount() > 0) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $URL);
                array_push($listBook, $books);
            }
            $response->setMessage("get detail book success");
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


    public function getBooksBySearchKey($searchKey)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY,CATEGORYID, AUTHORID, PUBLISHERID, URL,ISDEFAULT FROM 
                TBLBOOKS TBLBS INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID HAVING ISDEFAULT = 1 AND TITLE LIKE ?";
            $searchKey = '%' . $searchKey . '%';
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $searchKey);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBooks = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $URL);
                array_push($listBooks, $books);
            }
            $response->setMessage("get books by search key success");
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

    public function getBooksByAuthor($authorID)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY,CATEGORYID, AUTHORID, PUBLISHERID, URL,
            ISDEFAULT FROM TBLBOOKS TBLBS INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID HAVING ISDEFAULT = 1 AND AUTHORID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $authorID);
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
}
