<?php
/**
 * Created by PhpStorm.
 * User: Ace
 * Date: 14-Sep-18
 * Time: 1:26 PM
 */

include "User.php";
include "Product.php";
include "ShopCart.php";

class UserTest extends \PHPUnit\Framework\TestCase
{

    public function createData(){
        $user = new User();
        $user->setName("John Doe");
        $user->setEmail("john.doe@example.com");

        $productApple = new Product();
        $productApple->setName("Apple");
        $productApple->setPrice("4.95");

        $productOrange = new Product();
        $productOrange->setName("Orange");
        $productOrange->setPrice("3.99");

    }

    public function createUser(){
        $user = new User();
        $user->setName("John Doe");
        $user->setEmail("john.doe@example.com");
        return $user;

    }


//    public function testGetShopCart()
//    {
//
//    }
//

    public function testRemoveItemToShopCart()
    {
        $user = new User();
        $user->setName("John Doe");
        $user->setEmail("john.doe@example.com");

        $productApple = new Product();
        $productApple->setName("Apple");
        $productApple->setPrice("4.95");

        $shopCartApple = new ShopCart();
        $shopCartApple->setQuantity(3);
        $shopCartApple->setProduct($productApple);

        $user->addItemToShopCart($shopCartApple);
        $this->assertSame(14.85, $user->getTotalPrice());

        $shopCartAppleRemove = new ShopCart();
        $shopCartAppleRemove->setQuantity(1);
        $shopCartAppleRemove->setProduct($productApple);

        $user->removeItemToShopCart($shopCartAppleRemove);
        $this->assertSame(9.9, $user->getTotalPrice());
    }
//
//    public function testGetTotalPrice()
//    {
//
//    }

    public function testCreateUser(){
        $user = new User();
        $user->setName("John Doe");
        $user->setEmail("john.doe@example.com");

        $this->assertSame("John Doe",$user->getName());
        $this->assertSame("john.doe@example.com",$user->getEmail());

    }


    public function testAddItemToShopCart()
    {
        $user = new User();
        $user->setName("John Doe");
        $user->setEmail("john.doe@example.com");

        $productApple = new Product();
        $productApple->setName("Apple");
        $productApple->setPrice("4.95");

        $productOrange = new Product();
        $productOrange->setName("Orange");
        $productOrange->setPrice("3.99");

        $shopCartApple = new ShopCart();
        $shopCartApple->setQuantity(2);
        $shopCartApple->setProduct($productApple);

        $shopCartOrange = new ShopCart();
        $shopCartOrange->setProduct($productOrange);
        $shopCartOrange->setQuantity(1);

        $user->addItemToShopCart($shopCartOrange);
        $user->addItemToShopCart($shopCartApple);

        $this->assertSame(13.89,$user->getTotalPrice());
    }
}
