<?php
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../controllers/user-controller.php';
include_once '../models/account.php';

$data = json_decode(file_get_contents("php://input"));

$response = null;

try {
    if (isset($data->userid) && isset($data->email)) {
        $response = (new UserController())->getUpdateEmail($data);
    } else {
        $response = new Response(3, true, "Client error" . "Not enough parameters", null);
    }
} catch (Exception $ex) {
    $response = new Response(4, true, "Api error" . "Not enough parameters", null);
}

echo json_encode($response);
