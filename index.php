<?php
include "Product.php";
include "User.php";

$user = new User();

$appleProduct = new Product();
$appleProduct->setName("Apple");
$appleProduct->setPrice("4.95");

$orangeProduct = new Product();
$orangeProduct->setName("Orange");
$orangeProduct->setPrice("3.99");

$products = array($appleProduct,$orangeProduct);

error_reporting(0);

$total=0;
//get action string
$action = isset($_GET['action'])?$_GET['action']:"";
//Add to cart
if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {

    $product = $products[$id_product];

    $currentQty = $_SESSION['products'][$_POST['$id_product']]['qty']+1; //Incrementing the product qty in cart
    $_SESSION['products'][$_POST['$id_product']] =array('qty'=>$currentQty,'name'=>$product['name'],'price'=>$product['price']);
    $product='';
    header("Location:index.php");
}
//Empty All
if($action=='emptyall') {
    $_SESSION['products'] =array();
    header("Location:index.php");
}
//Empty one by one
if($action=='empty') {
    $id_product = $_GET['id'];
//    $products = $_SESSION['products'];
    unset($products[$id_product]);
    $_SESSION['products']= $products;
    var_dump($_SESSION);die;
    header("Location:index.php");
};
