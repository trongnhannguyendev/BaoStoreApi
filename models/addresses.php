<?php
    class Addresses{
        public $addressID;
        public $location;
        public $ward;
        public $district;
        public $city;
        public $addressName;
        public $isDefault;
        public $userID;

        public function __construct($addressID, $location,$ward,$district,$city,$addressName,$isDefault,$userID){
            $this->addressID = $addressID;
            $this->location = $location;
            $this->ward = $ward;
            $this->district = $district;
            $this->city = $city;
            $this->addressName = $addressName;
            $this->isDefault = $isDefault;
            $this->userID = $userID;
        }
        
        public function getAddressID()
        {
                return $this->addressID;
        }

        
        public function setAddressID($categoryID): self
        {
                $this->addressID = $categoryID;

                return $this;
        }

        public function getLocation()
        {
                return $this->location;
        }

        
        public function setLocation($location): self
        {
                $this->location = $location;

                return $this;
        }

        public function getWard()
        {
                return $this->ward;
        }

        
        public function setWard($ward): self
        {
                $this->ward = $ward;

                return $this;
        }

        public function getDistrict()
        {
                return $this->district;
        }

        
        public function setDistrict($district): self
        {
                $this->district = $district;

                return $this;
        }

        public function getCity()
        {
                return $this->city;
        }

        
        public function setCity($city): self
        {
                $this->city = $city;

                return $this;
        }

        public function getAddressName()
        {
                return $this->addressName;
        }

        
        public function setAddressName($addressName): self
        {
                $this->addressName = $addressName;

                return $this;
        }

        public function getIsDefault()
        {
                return $this->isDefault;
        }

        
        public function setIsDefault($isDefault): self
        {
                $this->isDefault = $isDefault;

                return $this;
        }


        public function getUserID()
        {
                return $this->userID;
        }

        
        public function setUserID($userID): self
        {
                $this->userID = $userID;

                return $this;
        }

    }