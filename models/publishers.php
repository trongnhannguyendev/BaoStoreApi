<?php

class Publishers
{
    public $publisherID;
    public $publisherName;


    function __construct($publisherID, $publisherName)
    {
        $this->publisherID = $publisherID;
        $this->publisherName = $publisherName;
    }

    /**
     * Get the value of publisherID
     */
    public function getPublisherID()
    {
        return $this->publisherID;
    }

    /**
     * Set the value of publisherID
     */
    public function setPublisherID($publisherID): self
    {
        $this->publisherID = $publisherID;

        return $this;
    }

    /**
     * Get the value of publisherName
     */
    public function getPublisherName()
    {
        return $this->publisherName;
    }

    /**
     * Set the value of publisherName
     */
    public function setPublisherName($publisherName): self
    {
        $this->publisherName = $publisherName;

        return $this;
    }
}
