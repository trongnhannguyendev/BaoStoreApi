<?php

class Publishers
{
    public $publisherid;
    public $publishername;
    public $state;


    public function __construct($publisherid, $publishername, $state)
    {
        $this->publisherid = $publisherid;
        $this->publishername = $publishername;
        $this->state = $state;
    }

    

    /**
     * Get the value of publisherid
     */
    public function getPublisherid()
    {
        return $this->publisherid;
    }

    /**
     * Set the value of publisherid
     */
    public function setPublisherid($publisherid): self
    {
        $this->publisherid = $publisherid;

        return $this;
    }

    /**
     * Get the value of publishername
     */
    public function getPublishername()
    {
        return $this->publishername;
    }

    /**
     * Set the value of publishername
     */
    public function setPublishername($publishername): self
    {
        $this->publishername = $publishername;

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
