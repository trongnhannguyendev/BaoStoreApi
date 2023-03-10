<?php
class Carts
{
    public $userid;
    public $bookid;
    public $quantity;
    public $title;
    public $price;
    public $url;
    public $isdefault;

    public function __construct($userid, $bookid, $quantity, $title, $price, $url, $isdefault)
    {
        $this->userid = $userid;
        $this->bookid = $bookid;
        $this->quantity = $quantity;
        $this->title = $title;
        $this->price = $price;
        $this->url = $url;
        $this->isdefault = $isdefault;
    }

    /**
     * Get the value of userid
     */
    public function getUserID()
    {
        return $this->userid;
    }

    /**
     * Set the value of userid
     */
    public function setUserID($userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get the value of bookid
     */
    public function getBookID()
    {
        return $this->bookid;
    }

    /**
     * Set the value of bookid
     */
    public function setBookID($bookid): self
    {
        $this->bookid = $bookid;

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
