<?php
namespace Shivam;

class ProductController extends Controller
{

public function productList()
{
    $product1 = new Product('Hammer', 9.99);
    $product2 = new Product('Bag of nails', 6.00);
    $product3 = new Product('Bucket', 2.00);
    $products = [$product1, $product2, $product3];
    $template = 'productList.html.twig';
    $args = [
    'products' => $products
];
    $html = $this->twig->render($template, $args);
    print $html;
}
}