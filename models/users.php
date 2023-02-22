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

       
        

        /**
         * Get the value of userID
         */
        public function getUserID()
        {
                return $this->userID;
        }

        /**
         * Set the value of userID
         */
        public function setUserID($userID): self
        {
                $this->userID = $userID;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         */
        public function setPassword($password): self
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of fullName
         */
        public function getFullName()
        {
                return $this->fullName;
        }

        /**
         * Set the value of fullName
         */
        public function setFullName($fullName): self
        {
                $this->fullName = $fullName;

                return $this;
        }

        /**
         * Get the value of phoneNumber
         */
        public function getPhoneNumber()
        {
                return $this->phoneNumber;
        }

        /**
         * Set the value of phoneNumber
         */
        public function setPhoneNumber($phoneNumber): self
        {
                $this->phoneNumber = $phoneNumber;

                return $this;
        }

        /**
         * Get the value of role
         */
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         */
        public function setRole($role): self
        {
                $this->role = $role;

                return $this;
        }

        /**
         * Get the value of state
         */
        public function getState()
        {
                return $this->state;
        }

        /**
         * Set the value of state
         */
        public function setState($state): self
        {
                $this->state = $state;

                return $this;
        }
    }
