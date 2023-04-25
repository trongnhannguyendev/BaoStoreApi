<?php
include_once '../configs/dbconfig.php';
include_once '../models/books.php';
include_once '../models/book-detail.php';
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
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY ,CATEGORYID, AUTHORID, PUBLISHERID,RELEASEDATE, DESCRIPTION, URL, STATE, ISDEFAULT FROM TBLBOOKS TBLBS 
INNER JOIN TBLIMAGES TBLIS ON TBLBS.BOOKID = TBLIS.BOOKID
 HAVING ISDEFAULT = 1";
            $stmt = $this->connect->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBook = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $RELEASEDATE, $DESCRIPTION, $URL, $STATE);
                array_push($listBook, $books);
            }
            $response->setMessage("get all books success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBook);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

    public function getImagesByBookID($bookid)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT  URL FROM TBLIMAGES WHERE BOOKID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $bookid);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listImages = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $image = new Images($URL);
                array_push($listImages, $image);
            }
            $response->setMessage("get all books success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listImages);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

//     public function getBookDetail($bookid)
//     {
//         $response = Response::getDefaultInstance();
//         try {
//             $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY,TBLCS.CATEGORYNAME, TBLAS.AUTHORNAME ,TBLPS.PUBLISHERNAME, URL,ISDEFAULT, RELEASEDATE, TBLBS.DESCRIPTION FROM TBLBOOKS TBLBS 
// INNER JOIN TBLIMAGES TBLIMG ON TBLBS.BOOKID = TBLIMG.BOOKID
// INNER JOIN TBLAUTHORS TBLAS ON TBLBS.AUTHORID = TBLAS.AUTHORID
// INNER JOIN TBLPUBLISHERS TBLPS ON TBLBS.PUBLISHERID = TBLPS.PUBLISHERID 
// INNER JOIN TBLCATEGORIES TBLCS ON TBLBS.CATEGORYID = TBLCS.CATEGORYID
// HAVING ISDEFAULT = 1 AND BOOKID = ?";
//             $stmt = $this->connect->prepare($query);
//             $stmt->bindParam(1, $bookid);
//             $stmt->setFetchMode(PDO::FETCH_ASSOC);
//             $stmt->execute();
//             $listBook = [];
//             if ($stmt->rowCount() > 0) {
//                 $row = $stmt->fetch();
//                 extract($row);
//                 $books = new BookDetail($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYNAME, $AUTHORNAME, $PUBLISHERNAME, $RELEASEDATE, $DESCRIPTION);
//                 array_push($listBook, $books);
//             }
//             $response->setMessage("get detail book success");
//             $response->setError(false);
//             $response->setResponeCode(1);
//             $response->setData($listBook);
//         } catch (Exception $e) {
//             $response->setMessage("Have issue with DB" . $e->getMessage());
//             $response->setError(true);
//             $response->setResponeCode(0);
//         }
//         return $response;
//     }

    public function getBooksByCategory($categoryid)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY ,CATEGORYID, AUTHORID, PUBLISHERID, RELEASEDATE, DESCRIPTION, URL, STATE, ISDEFAULT FROM TBLBOOKS TBLBS 
            INNER JOIN TBLIMAGES TBLIS ON TBLBS.BOOKID = TBLIS.BOOKID
             HAVING ISDEFAULT = 1 AND CATEGORYID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $categoryid);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBooks = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $RELEASEDATE, $DESCRIPTION , $URL, $STATE);
                array_push($listBooks, $books);
            }
            $response->setMessage("get books by category success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBooks);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

    public function getBooksBySearchKey($searchkey)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY ,CATEGORYID, AUTHORID, PUBLISHERID,RELEASEDATE, DESCRIPTION, URL, STATE, ISDEFAULT FROM TBLBOOKS TBLBS 
            INNER JOIN TBLIMAGES TBLIS ON TBLBS.BOOKID = TBLIS.BOOKID
             HAVING ISDEFAULT = 1 AND TITLE LIKE ?";
            $searchkey = '%' . $searchkey . '%';
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $searchkey);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBooks = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $RELEASEDATE,$DESCRIPTION , $URL, $STATE);
                array_push($listBooks, $books);
            }
            $response->setMessage("get books by search key success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBooks);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

    public function getBooksByAuthorID($authorid)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "SELECT TBLBS.BOOKID, TITLE, PRICE, QUANTITY ,CATEGORYID, AUTHORID, PUBLISHERID,RELEASEDATE, DESCRIPTION, URL, STATE, ISDEFAULT FROM TBLBOOKS TBLBS 
            INNER JOIN TBLIMAGES TBLIS ON TBLBS.BOOKID = TBLIS.BOOKID
             HAVING ISDEFAULT = 1 AND AUTHORID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $authorid);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $listBooks = [];
            while ($row = $stmt->fetch()) {
                extract($row);
                $books = new Book($BOOKID, $TITLE, $PRICE, $QUANTITY, $CATEGORYID, $AUTHORID, $PUBLISHERID, $RELEASEDATE,$DESCRIPTION , $URL, $STATE);
                array_push($listBooks, $books);
            }
            $response->setMessage("get books by category success");
            $response->setError(false);
            $response->setResponeCode(1);
            $response->setData($listBooks);
        } catch (Exception $e) {
            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(0);
        }
        return $response;
    }

    public function insertBook($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "INSERT INTO TBLBOOKS SET BOOKID = NULL, TITLE = ?, PRICE = ?, QUANTITY =?, CATEGORYID =?, AUTHORID =?, PUBLISHERID =?, RELEASEDATE = ?, STATE = 1";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $data->title);
            $stmt->bindParam(2, $data->price);
            $stmt->bindParam(3, $data->quantity);
            $stmt->bindParam(4, $data->categoryid);
            $stmt->bindParam(5, $data->authorid);
            $stmt->bindParam(6, $data->publisherid);
            $stmt->bindParam(7, $data->RELEASEDATE);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Insert book success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Insert book failed");
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

    public function updateInformationBook($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "UPDATE TBLBOOKS SET TITLE = ?, PRICE = ?, QUANTITY =?, CATEGORYID =?, AUTHORID =?, PUBLISHERID =?, RELEASEDATE = ? WHERE BOOKID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $data->title);
            $stmt->bindParam(2, $data->price);
            $stmt->bindParam(3, $data->quantity);
            $stmt->bindParam(4, $data->categoryid);
            $stmt->bindParam(5, $data->authorid);
            $stmt->bindParam(6, $data->publisherid);
            $stmt->bindParam(7, $data->RELEASEDATE);
            $stmt->bindParam(8, $data->bookid);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Update book success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Update book failed");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
    }

    public function updateQuantityBook($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "UPDATE TBLBOOKS SET QUANTITY =? WHERE BOOKID = ?";
            $stmt = $this->connect->prepare($query);

            $stmt->bindParam(1, $data->quantity);
            $stmt->bindParam(2, $data->bookid);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Update quantity book success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Update quantity book failed");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
    }

    public function changStateBookAllow($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "UPDATE TBLBOOKS SET STATE = 1 WHERE BOOKID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $data->state);
            $stmt->bindParam(2, $data->bookid);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Update state success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Update state failed");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
    }
    public function changStateBookDeny($data)
    {
        $response = Response::getDefaultInstance();
        try {
            $query = "UPDATE TBLBOOKS SET STATE = 0 WHERE BOOKID = ?";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(1, $data->state);
            $stmt->bindParam(2, $data->bookid);
            $this->connect->beginTransaction();

            if ($stmt->execute()) {
                $this->connect->commit();
                $response->setMessage("Update state success");
                $response->setError(false);
                $response->setResponeCode(1);
            } else {
                $this->connect->rollBack();
                $response->setMessage("Update state failed");
                $response->setError(true);
                $response->setResponeCode(0);
            }
        } catch (Exception $e) {

            $response->setMessage("Have issue with DB" . $e->getMessage());
            $response->setError(true);
            $response->setResponeCode(5);
        }
    }
}
