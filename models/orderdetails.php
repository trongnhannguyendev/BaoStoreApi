<?php
class OrderDetail
{
    public $orderdetailid;
    public $orderid;
    public $bookname;
    public $price;
    public $amount;
    public $total;

    public function __construct($orderdetailid, $orderid, $bookname, $price, $amount, $total)
    {
        $this->orderdetailid = $orderdetailid;
        $this->orderid = $orderid;
        $this->bookname = $bookname;
        $this->price = $price;
        $this->amount = $amount;
        $this->total = $total;
    }

    /**
     * Get the value of orderdetailid
     */
    public function getOrderdetailid()
    {
        return $this->orderdetailid;
    }

    /**
     * Set the value of orderdetailid
     */
    public function setOrderdetailid($orderdetailid): self
    {
        $this->orderdetailid = $orderdetailid;

        return $this;
    }

    /**
     * Get the value of orderid
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set the value of orderid
     */
    public function setOrderid($orderid): self
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get the value of bookname
     */
    public function getBookname()
    {
        return $this->bookname;
    }

    /**
     * Set the value of bookname
     */
    public function setBookname($bookname): self
    {
        $this->bookname = $bookname;

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
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }
}
