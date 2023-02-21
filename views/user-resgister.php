<?php
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../controllers/user-controllers.php';

$data = json_decode(file_get_contents("php://input"));

$response = null;

try {
    $fullName = $data -> fullname;
    $email = $data -> email;
    $password = $data -> password;
    $phoneNumber = $data -> phonenumber;

    if (isset($fullName, $email, $password, $phoneNumber)) {
        $response = (new UserController())->postSignup($fullName,$email, $password, $phoneNumber);
    } else {
        $response = new Response(3, true, "Can't load fields' datas", null);
    }
} catch (Exception $ex) {
    $response = new Response(4, true, "Server down", null);
}


echo json_encode($response);
?>