<?php
class Carts
{
    public $userID;
    public $bookID;
    public $quantity;
    public $title;
    public $price;
    public $url;
    public $isdefault;

    public function __construct($userID, $bookID, $quantity, $title, $price, $url, $isdefault)
    {
        $this->userID = $userID;
        $this->bookID = $bookID;
        $this->quantity = $quantity;
        $this->title = $title;
        $this->price = $price;
        $this->url = $url;
        $this->isdefault = $isdefault;
    }

    /**
     * Get the value of userID
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set the value of userID
     */
    public function setUserID($userID): self
    {
        $this->userID = $userID;

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
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     */
    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice($price): self
    {
        $this->price = $price;

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
