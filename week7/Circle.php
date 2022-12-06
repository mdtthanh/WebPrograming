<?php

    class Circle extends Shape
    {
        public $radius;
        public function getArea()
        {
            // TODO: Implement getArea() method.
            return(pi() * $this->radius * $this->radius);
        }
    }
?>