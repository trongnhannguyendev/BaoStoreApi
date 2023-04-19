<?php
class Categories
{
        public $categoryid;
        public $categoryname;
        public $state;


        public function __construct($categoryid, $categoryname, $state)
        {
                $this->categoryid = $categoryid;
                $this->categoryname = $categoryname;
                $this->state = $state;
        }

        

        /**
         * Get the value of categoryid
         */
        public function getCategoryid()
        {
                return $this->categoryid;
        }

        /**
         * Set the value of categoryid
         */
        public function setCategoryid($categoryid): self
        {
                $this->categoryid = $categoryid;

                return $this;
        }

        /**
         * Get the value of categoryname
         */
        public function getCategoryname()
        {
                return $this->categoryname;
        }

        /**
         * Set the value of categoryname
         */
        public function setCategoryname($categoryname): self
        {
                $this->categoryname = $categoryname;

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
