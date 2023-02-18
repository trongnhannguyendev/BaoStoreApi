<?php

use PgSql\Lob;

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Content-Type: application/json; charset=UTF-8");

include_once '../user-controllers.php';

$data = json_decode(file_get_contents("php://input"));

$response = null;

if(isset($_GET['apicall'])){
    switch($_GET['apicall']){
        case 'login':
            try {
                $email = $_POST['email'];
                $password = ($_POST['password']); 
                $response = (new UserController())->postLogin($email, $password);
        
        } catch (Exception $e) {
            $response = new Response(4, true, "Server down" . $e->getMessage(), null);
        }
        break;

        case 'signup':
            try{
            $fullname= $_POST['fullname'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $phonenumber= $_POST['phonenumber'];
            $response = (new UserController())->postSignup($fullname,$email,$password,$phonenumber);
            }catch (Exception $e) {
                $response = new Response(4, true, "Server down" . $e->getMessage(), null);
            }
            break;
    }
}



echo json_encode($response);


