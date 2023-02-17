<?php
    class Authors{
        public $authorID;
        public $authorName;
        public $DOB;
        public $description;

        function __construct($authorID, $authorName, $DOB, $description){
            $this->authorID = $authorID;
            $this->authorName = $authorName;
            $this->DOB = $DOB;
            $this->description = $description;
        }
        
        

        /**
         * Get the value of authorID
         */
        public function getAuthorID()
        {
                return $this->authorID;
        }

        /**
         * Set the value of authorID
         */
        public function setAuthorID($authorID): self
        {
                $this->authorID = $authorID;

                return $this;
        }

        /**
         * Get the value of authorName
         */
        public function getAuthorName()
        {
                return $this->authorName;
        }

        /**
         * Set the value of authorName
         */
        public function setAuthorName($authorName): self
        {
                $this->authorName = $authorName;

                return $this;
        }

        /**
         * Get the value of DOB
         */
        public function getDOB()
        {
                return $this->DOB;
        }

        /**
         * Set the value of DOB
         */
        public function setDOB($DOB): self
        {
                $this->DOB = $DOB;

                return $this;
        }

        /**
         * Get the value of description
         */
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         */
        public function setDescription($description): self
        {
                $this->description = $description;

                return $this;
        }
    }

       