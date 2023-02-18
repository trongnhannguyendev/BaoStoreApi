<?php
    
    class User{
        public $userid;
        public $email;
        public $password;
        public $fullname;
        public $phonenumber;
        public $role;
        public $state;

        function __construct($userid,$email,$password,$fullname,$phonenumber,$role,$state)
        {
            $this -> userid = $userid;
            $this -> email = $email;
            $this -> password = $password;
            $this -> fullname = $fullname;
            $this -> phonenumber = $phonenumber;
            $this -> role = $role;
            $this -> state = $state;
        }

        public function getUserid(){
            return $this->userid;
        }

        public function setUserid($userid):self{
            $this ->userid = $userid;
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

        public function getFullname(){
            return $this->fullname;
        }

        public function setFullname($fullname):self{
            $this ->fullname = $fullname;
            return $this;
        }

        public function getPhoneNumber(){
            return $this->phonenumber;
        }

        public function setPhoneNumber($phonenumber):self{
            $this ->phonenumber = $phonenumber;
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
