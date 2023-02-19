<?php
    
    class Publishers{
        public $publisherID;
        public $publisherName;
        

        function __construct($publisherID,$publisherName)
        {
            $this -> publisherID = $publisherID;
            $this -> publisherName = $publisherName;
            
        }

        public function getPublisherID(){
            return $this->publisherID;
        }

        public function setPublisherID($publisherID):self{
            $this ->publisherID = $publisherID;
            return $this;
        }

        public function getPublisherName(){
            return $this->publisherName;
        }

        public function setPublisherName($publisherName):self{
            $this ->publisherName = $publisherName;
            return $this;
        }
        
    }
