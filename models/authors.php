<?php
class Authors
{
        public $authorid;
        public $authorname;
        public $dob;
        public $description;
        public $state;


        public function __construct($authorid, $authorname, $dob, $description, $state)
        {
                $this->authorid = $authorid;
                $this->authorname = $authorname;
                $this->dob = $dob;
                $this->description = $description;
                $this->state = $state;
        }

       

        /**
         * Get the value of authorid
         */
        public function getAuthorid()
        {
                return $this->authorid;
        }

        /**
         * Set the value of authorid
         */
        public function setAuthorid($authorid): self
        {
                $this->authorid = $authorid;

                return $this;
        }

        /**
         * Get the value of authorname
         */
        public function getAuthorname()
        {
                return $this->authorname;
        }

        /**
         * Set the value of authorname
         */
        public function setAuthorname($authorname): self
        {
                $this->authorname = $authorname;

                return $this;
        }

        /**
         * Get the value of dob
         */
        public function getDob()
        {
                return $this->dob;
        }

        /**
         * Set the value of dob
         */
        public function setDob($dob): self
        {
                $this->dob = $dob;

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
