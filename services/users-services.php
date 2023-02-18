<?php
include_once '../configs/dbconfig.php';
include_once '../models/users.php';
include_once '../models/respone.php';

class UserServices{
    public $connect;
    
    public function __construct()
    {
        $this->connect = (new DBConfig())->getConnect();
    }
    

    public function login($email, $password){
        try{
        $sql="SELECT userid, email, password,fullname, phonenumber FROM tblusers WHERE (email=:email) AND (password=:password)";
        $stmt = $this ->connect ->prepare($sql);
        $stmt->bindParam("email",$email,PDO::PARAM_STR);
        $stmt->bindParam("password",$password,PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        $userid = $data->userid;
        $fullname = $data->fullname;
        $phonenumber = $data->phonenumber;

        if($count){
            return $userid." ".$email." ".$fullname." ".$phonenumber;
        } else{
            return "User doesn't exist";
        }
    }
        catch(PDOException $e){
            echo '{"error":{"text":' .$e->getMessage().'}}';
        }
    }


    public function signup($fullname,$email,$password,$phonenumber){
        
        $fullname = $_POST['fullname']; 
        $email = $_POST['email']; 
        $password = ($_POST['password']);
        $phonenumber = $_POST['phonenumber']; 
        
        //checking if the user is already exist with this fullname or email
        //as the email and fullname should be unique for every user 
        $stmt = $this->connect->prepare("SELECT userid FROM tblusers WHERE phonenumber=:phonenumber OR email =:email");
        $stmt->bindParam("phonenumber", $phonenumber,PDO::PARAM_STR);
        $stmt->bindParam("email", $email,PDO::PARAM_STR);

        $stmt->execute();
        $count = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        if($count){
        $response['error'] = true;
        $response['message'] = 'User already registered';
        }else{
        
        //if user is new creating an insert query 
        $stmt = $this->connect->prepare("INSERT INTO tblusers (fullname, email, password, phonenumber,role,state) VALUES (:fullname,:email, :password, :phonenumber, 0, 1)");
        $stmt->bindParam("email", $email);
        $stmt->bindParam("fullname", $fullname);
        $stmt->bindParam("password", $password);
        $stmt->bindParam("phonenumber", $phonenumber);
        
        //if the user is successfully added to the database 
        if($stmt->execute()){
        
        //fetching the user back 
        $stmt = $this->connect->prepare("SELECT userid, fullname, email, phonenumber, role, state FROM tblusers WHERE email =:email"); 
        $stmt->bindParam("email",$email);
        $stmt->execute();
        $count = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        $userid = $data->userid;
        $fullname = $data->fullname;
        $phonenumber = $data->phonenumber;
        
        //adding the user data in response 
        echo $response['error'] = false; 
        echo $response['message'] = 'User registered successfully'; 
        echo $response['user'] = $userid." ".$fullname." ".$phonenumber; 
        }
        }
        
    }
}


