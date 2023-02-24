<?php
class Images
{
    public $imageID;
    public $bookID;
    public $url;
    public $isdefault;

    public function __construct($imageID, $bookID, $url, $isdefault)
    {
        $this->imageID = $imageID;
        $this->bookID = $bookID;
        $this->url = $url;
        $this->isdefault = $isdefault;
    }

    /**
     * Get the value of imageID
     */
    public function getImageID()
    {
        return $this->imageID;
    }

    /**
     * Set the value of imageID
     */
    public function setImageID($imageID): self
    {
        $this->imageID = $imageID;

        return $this;
    }

    /**
     * Get the value of bookID
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * Set the value of bookID
     */
    public function setBookID($bookID): self
    {
        $this->bookID = $bookID;

        return $this;
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

    /**
     * Get the value of isdefault
     */
    public function getIsdefault()
    {
        return $this->isdefault;
    }

    /**
     * Set the value of isdefault
     */
    public function setIsdefault($isdefault): self
    {
        $this->isdefault = $isdefault;

        return $this;
    }
}
