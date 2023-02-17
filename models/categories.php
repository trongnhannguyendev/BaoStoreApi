<?php
    class Categories{
        public $categoryID;
        public $categoryName;

        public function __construct($categoryID, $categoryName){
            $this->categoryID = $categoryID;
            $this->categoryName = $categoryName;
        }
        

        /**
         * Get the value of categoryID
         */
        public function getCategoryID()
        {
                return $this->categoryID;
        }

        /**
         * Set the value of categoryID
         */
        public function setCategoryID($categoryID): self
        {
                $this->categoryID = $categoryID;

                return $this;
        }

        /**
         * Get the value of categoryName
         */
        public function getCategoryName()
        {
                return $this->categoryName;
        }

        /**
         * Set the value of categoryName
         */
        public function setCategoryName($categoryName): self
        {
                $this->categoryName = $categoryName;

                return $this;
        }
    }