<?php
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../controllers/book-controller.php';


$data = json_decode(file_get_contents("php://input"));

$response = null;

try {
    $response = (new BookController())->getAllBooks();
} catch (Exception $e) {
    $response = new Response(4, true, "Server down" . $e->getMessage(), null);
}

echo json_encode($response);