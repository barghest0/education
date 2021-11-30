<?php
class Cart
{
    private $products;

    public function __construct()
    {
        $this->initData();
    }

    private function initData()
    {
        $res = [];
        $tmp['product_id'] = 1;
        $tmp['price'] = 175;
        $tmp['count'] = 1;
        $res[] = $tmp;
        $tmp['product_id'] = 2;
        $tmp['price'] = 20;
        $tmp['count'] = 10;
        $res[] = $tmp;
        $this->products = $res;
    }

    public function hasProduct($id)
    {
        foreach ($this->products as $product) {
            if ($product['product_id'] == $id) {
                return true;
            }
        }
    }

    public function add($id, $price, $count)
    {
        $res['product_id'] = $id;
        $res['price'] = $price;
        $res['count'] = $count;
        $this->products[] = $res;
        return $res['product_id'];
    }

    public function getTotalCost()
    {
        $res = 0;
        foreach ($this->products as $product) {
            $res += ($product['count'] * $product['price']);
        }
        return $res;
    }
    public function getProducts()
    {
        return $this->products;
    }
}
