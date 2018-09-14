<?php
/**
 * Created by PhpStorm.
 * User: Ace
 * Date: 13-Sep-18
 * Time: 9:55 PM
 */

class ShopCart
{
    /**
     * @var Product
     */
    protected $shopCartProduct;

    /**
     * @var number
     */
    protected $quantity;

    /**
     * @param Product $shopCartProduct
     */
    public function setProduct($shopCartProduct)
    {
        $this->shopCartProduct = $shopCartProduct;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->shopCartProduct;
    }

    /**
     * @param number $quantity
     */
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    /**
     * @return number
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}