<?php
/*
 1.Choose a computer system, such as an online store, an application on
 your desktop or laptop, or an app on your phone or tablet. Think about
 some of the classes of objects that system might be using. Choose one
 class of object and write a list of the pieces of data it might store, as well
 as some of the methods it might need in order to work on that data.
*/
//  Solution*
/* If i want to make a online store where i can sell a product like computer then there are 
 many products and product have id name description rating stock category also and it has some methods
*/

/* 
 2.Thinking again of the classes from Exercise 1, try to identify one data
  property that you would want to restrict access to, so that it could be
  changed only through a method that would log the change.
*/

class Product {
    public string $id;
    public int $price;
    private string $name;
    public string $descripton;
    public float $rating;
    public int $stock; 


/**
 * This product details method
 */
   public function get_products_details():string
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
    public function set_stock (int $stock)
    {
        $this->stock = $stock;
    }

/**
 * @param{$price} set price
 */
    public function set_price(int $price)
    {
        $this->price = $price;
    }

/**
 * @param($name) as a string
 * This name property  only rename with this method
 */
    public function set_name(string $name)
    {
        $this->name = $name;
    }

/**
 * @return($name) as a string
 * WE can get name only from this method;
 */
    public function get_name():string
    {
        return $this->name;
    }

}

