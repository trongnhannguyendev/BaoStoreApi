<?php
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../controllers/user-controllers.php';

$data = json_decode(file_get_contents("php://input"));

$response = null;

try {
    $email = $data->email;
    $password = $data->password;
    if (isset($email, $password)) {
        $response = (new UserController())->postLogin($email, $password);
    } else {
        $response = new Response(3, true, "Can't load email and password", null);
    }
} catch (Exception $ex) {
    $response = new Response(4, true, "Server down", null);
}


echo json_encode($response);
?>