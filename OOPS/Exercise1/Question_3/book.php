<?php

class Book extends Library{
    private $noOfPage, $genre;

    public function __construct($title,$authorOrCreator, $publicationYear, $itemId, $noOfPage, $genre)
    {
      parent::__construct($title,$authorOrCreator, $publicationYear, $itemId);
      $this->noOfPage = $noOfPage;
      $this->genre = $genre;
    }

    public function getDuration()
    {   $minut = $this->noOfPage * 2;
        return "{$minut} Min";
    }
}