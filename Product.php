<?php
/**
 * Created by PhpStorm.
 * User: Ace
 * Date: 13-Sep-18
 * Time: 5:38 PM
 */

class Product
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $price;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param string $email
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}