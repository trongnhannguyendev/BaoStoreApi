<?php
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../controllers/cart-controller.php';


$data = json_decode(file_get_contents("php://input"));

$response = null;

try {
    if (
        isset($data->userID)
    ) {
        $response = (new CartController())->getAllCartsByUserID($data->userID);
    } else {
        $response = new Response(3, true, "Client error" . " Not enough parameters", null);
    }
} catch (Exception $ex) {
    $response = new Response(4, true, "APi error" . "N ot enough parameters", null);
}

echo json_encode($response);
