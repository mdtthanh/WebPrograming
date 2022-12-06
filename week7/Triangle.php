<?php
    require "Polygon.php";
    class Triangle extends Polygon {
        public $base;
        public $height;

        public function getArea()
        {
            // TODO: Implement getArea() method.
            return(($this->base * $this->height)/2);
        }

        function getNumberOfSides()
        {
            // TODO: Implement getNumberOfSides() method.
            return(3);
        }
    }
