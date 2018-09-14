<?php
/**
 * Created by PhpStorm.
 * User: Ace
 * Date: 13-Sep-18
 * Time: 5:31 PM
 */

class User
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var ShopCart[]
     */
    protected $shopCart = array();

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
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return ShopCart[]
     */
    public function getShopCart()
    {
        return $this->shopCart;
    }

    /**
     * @param ShopCart $shopCartItem
     */
    public function addItemToShopCart($shopCartItem){
        $key = $shopCartItem->getProduct()->getName();
        if (array_key_exists($key,$this->shopCart)){
            $quantity = $this->shopCart[$key]->getQuantity();
            $quantity += $shopCartItem->getQuantity();
            $shopCartItem->setQuantity($quantity);
        }
            $this->shopCart[$key] =  $shopCartItem;
    }

    /**
     * @param ShopCart $shopCartItem
     * @return boolean
     */
    public function removeItemToShopCart($shopCartItem){
        $key = $shopCartItem->getProduct()->getName();
        if (array_key_exists($key,$this->shopCart)){
            $quantity = $this->shopCart[$key]->getQuantity();
            if ($quantity < $shopCartItem->getQuantity()){
                return false;
            }
            $quantity -= $shopCartItem->getQuantity();
            $shopCartItem->setQuantity($quantity);
            $this->shopCart[$key] =  $shopCartItem;
            return true;
        }
        return false;
    }

    /**
     * @return number
     */
    public function getTotalPrice(){
        if (count($this->getShopCart()) <= 0){
            return 0;
        }
        $totalPrice = 0;
        foreach ($this->getShopCart() as $itemShopCart){
            $totalPrice += $itemShopCart->getQuantity() * $itemShopCart->getProduct()->getPrice();
        }
        return $totalPrice;
    }
}