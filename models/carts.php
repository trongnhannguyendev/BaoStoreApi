<?php
class Carts
{
    public $userID;
    public $bookID;
    public $quantity;

    public function __construct($userID, $bookID, $quantity)
    {
        $this->userID = $userID;
        $this->bookID = $bookID;
        $this->quantity = $quantity;
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
}
