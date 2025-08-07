<?php

class Dvd extends Library{
    private $duration, $language;

    public function __construct($title,$authorOrCreator, $publicationYear, $itemId, $duration, $language)
    {
      parent::__construct($title,$authorOrCreator, $publicationYear, $itemId);
      $this->duration = $duration;
      $this->language = $language;
    }

    public function getDuration()
    {   $hours = floor($this->duration / 60);
        $minut = $this->duration -  $hours * 60;
        return "{$hours} H and {$minut} M";
    }
}