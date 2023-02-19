<?php
    
    class User{
        public $userID;
        public $email;
        public $password;
        public $fullName;
        public $phoneNumber;
        public $role;
        public $state;

        function __construct($userID,$email,$password,$fullName,$phoneNumber,$role,$state)
        {
            $this -> userID = $userID;
            $this -> email = $email;
            $this -> password = $password;
            $this -> fullName = $fullName;
            $this -> phoneNumber = $phoneNumber;
            $this -> role = $role;
            $this -> state = $state;
        }

        public function getuserID(){
            return $this->userID;
        }

        public function setuserID($userID):self{
            $this ->userID = $userID;
            return $this;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email):self{
            $this ->email = $email;
            return $this;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password):self{
            $this ->password = $password;
            return $this;
        }

        public function getfullName(){
            return $this->fullName;
        }

        public function setfullName($fullName):self{
            $this ->fullName = $fullName;
            return $this;
        }

        public function getphoneNumber(){
            return $this->phoneNumber;
        }

        public function setphoneNumber($phoneNumber):self{
            $this ->phoneNumber = $phoneNumber;
            return $this;
        }

        public function getRole(){
            return $this->role;
        }

        public function setRole($role):self{
            $this ->role = $role;
            return $this;
        }

        public function getState(){
            return $this->state;
        }

        public function setState($state):self{
            $this ->state = $state;
            return $this;
        }
        
    }
