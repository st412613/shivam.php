<?php
/*
 Choose a computer system, such as an online store, an application on
 your desktop or laptop, or an app on your phone or tablet. Think about
 some of the classes of objects that system might be using. Choose one
 class of object and write a list of the pieces of data it might store, as well
 as some of the methods it might need in order to work on that data.
*/

/* If i want to make a online store where i can sell a product like computer then there are 
 many products and product have id name description rating stock category also and it has some methods
*/

class Product {
    public string $id;
    public int $price;
    public string $name;
    public string $descripton;
    public float $rating;
    public int $stock;

    public function __construct(string $id,int $price, string $name, string $description, float $rating, int $stock)
    {
        $this->id = $id;
        $this->price = $price;
        $this->name = $name;
        $this->description = $description;
        $this->rating = $rating;
        $this->stock = $stock;
    }
/**
 * This product details method
 */
    function get_products_details():string
    {
        return "
          id =>  $this->id 
          name =>   $this->name;
          description =>  $this->description;
          rating =>   $this->rating;
          stock =>   $this->stock;
        ";
    }
/**
 * @param{$stock} set stock
 */
    function set_stock (int $stock)
    {
        $this->stock = $stock;
    }
/**
 * @param{$price} set price
 */
     function set_price(int $price)
    {
        $this->price = $price;
    }

}

