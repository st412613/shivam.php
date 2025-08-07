<?php
class Library {
  protected $title, $authorOrCreator, $publicationYear, $itemId, $isAvailable = true;

  public function __construct($title,$authorOrCreator, $publicationYear, $itemId)
   {
    $this->title = $title;
    $this->authorOrCreator = $authorOrCreator;
    $this->publicationyear = $publicationYear;
    $this->itemid = $itemId;

   }

  public function generalDescription()
   {
     return "Title- $this->title Author Or Creator- 
     $this->authorOrCreator Item Id- $this->itemId Publication Year - $this->publicationYear AVailable- $this->isAvailable ";
   }
}
