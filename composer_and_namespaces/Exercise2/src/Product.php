<?php
namespace Shiva;

class Product {
    private $id, $description, $price;

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

      public function setDescription($description)
    {
        $this->description = $description;
    }

      public function setprice($price)
    {
        $this->price = $price;
    }
}