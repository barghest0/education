<?php

use PHPUnit\Framework\TestCase;

final class CartTest extends TestCase
{

    public function testGetProducts()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        //количество продуктов
        $this->count(2, $products);
        //относится ли товары к массиву
        $this->assertInternalType('array', $products);
    }

    public function testHasProduct()
    {
        $cart = new Cart();
        $product = $cart->hasProduct(1);
        $this->assertTrue($product);
    }

    public function testAddProduct()
    {
        $cart = new Cart();
        $product = $cart->add(3, 1000, 20);
        $this->assertTrue($cart->hasProduct($product));
    }


    public function testTotalCost()
    {
        $cart = new Cart();
        $this->assertEquals(375, $cart->getTotalCost());
    }
}
