<?php
class Images
{
    public $url;

    public function __construct($url)
    {

        $this->url = $url;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     */
    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }
}
