<?php
    require "Polygon.php";

    class Rectangle extends Polygon
    {
        public $width;
        public $height;

        public function getArea(){
            return($this->width * $this->height);
        }

        public function getNumberOfSides()
        {
            // TODO: Implement getNumberOfSides() method.
            return(4);
        }
    }