<?php
    
    include "config.php";
     
    $response = array();
 
 //if it is an api call 
 //that means a get parameter named api call is set in the URL 
 //and with this parameter we are concluding that it is an api call 
 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'signup':
 
    if(isTheseParametersAvailable(array('fullname','email','password','phonenumber'))){
 
        //getting the values 
        $fullname = $_POST['fullname']; 
        $email = $_POST['email']; 
        $password = ($_POST['password']);
        $phonenumber = $_POST['phonenumber']; 
        
        //checking if the user is already exist with this fullname or email
        //as the email and fullname should be unique for every user 
        $stmt = $conn->prepare("SELECT userid FROM tblusers WHERE phonenumber=? OR email = ?");
        $stmt->bind_param("ss", $phonenumber, $email);
        $stmt->execute();
        $stmt->store_result();
        
        //if the user already exist in the database 
        if($stmt->num_rows > 0){
        $response['error'] = true;
        $response['message'] = 'User already registered';
        $stmt->close();
        }else{
        
        //if user is new creating an insert query 
        $stmt = $conn->prepare("INSERT INTO tblusers (fullname, email, password, phonenumber,role,state) VALUES (?, ?, ?, ?, 0, 1)");
        $stmt->bind_param("ssssb", $fullname, $email, $password, $phonenumber);
        
        //if the user is successfully added to the database 
        if($stmt->execute()){
        
        //fetching the user back 
        $stmt = $conn->prepare("SELECT userid, fullname, email, phonenumber, role, state FROM tblusers WHERE fullname = ?"); 
        $stmt->bind_param("s",$fullname);
        $stmt->execute();
        $stmt->bind_result($userid, $fullname, $email, $phonenumber, $role, $state);
        $stmt->fetch();
        
        $user = array(
        'userid'=>$userid, 
        'fullname'=>$fullname, 
        'email'=>$email,
        'phonenumber'=>$phonenumber,
        'role'=>$role,
        'state'=>$state
        );
        
        $stmt->close();
        
        //adding the user data in response 
        $response['error'] = false; 
        $response['message'] = 'User registered successfully'; 
        $response['user'] = $user; 
        }
        }
        
        }else{
        $response['error'] = true; 
        $response['message'] = 'required parameters are not available'; 
        }
        
        break; 
 
 case 'login':
   if(isTheseParametersAvailable(array('email', 'password'))){
      //getting values 
      $email = $_POST['email'];
      $password = ($_POST['password']); 
      
      //creating the query 
      $stmt = $conn->prepare("SELECT userid, fullname, email, PHONENUMBER FROM tblusers WHERE email = ? AND password = ?");
      $stmt->bind_param("ss",$email, $password);
      
      $stmt->execute();
      
      $stmt->store_result();
      
      //if the user exist with given credentials 
      if($stmt->num_rows > 0){
      
      $stmt->bind_result($userid, $fullname, $email, $phonenumber);
      $stmt->fetch();
      
      $user = array(
      'userid'=>$userid, 
      'fullname'=>$fullname,
      'email'=>$email,
      'PHONENUMBER'=>$phonenumber
      );
      
      $response['error'] = false; 
      $response['message'] = 'Login successfull'; 
      $response['user'] = $user; 
      }else{
      //if the user not found 
      $response['error'] = true; 
      $response['message'] = 'Invalid username or password';
      }
      }
      break;
 
 //this part will handle the login 
 
 break; 
 
 default: 
 $response['error'] = true; 
 $response['message'] = 'Invalid Operation Called';
 }
 
 }else{
 //if it is not api call 
 //pushing appropriate values to response array 
 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }
 
 //displaying the response in json structure 
 echo json_encode($response);


 function isTheseParametersAvailable($params){
 
    //traversing through all the parameters 
    foreach($params as $param){
    //if the paramter is not available
    if(!isset($_POST[$param])){
    //return false 
    return false; 
    }
    }
    //return true if every param is available 
    return true; 
    }

    ?>