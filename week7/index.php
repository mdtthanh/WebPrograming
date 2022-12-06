<?php

class Page {

    private $page;
    private $title;
    private $year;
    private $copyright;

    public function get(){
          echo $this->page;
    }

    public function setYear($year){
        $this->year = $year;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setCopyright($copyright){
        $this->copyright = $copyright;
    }

    private function addHeader(){
        $this->page = $this->page . "<h1 > Title: $this->title </h1>";
    }

    private function addFooter(){
        $this->page = $this->page . "<br> <h2>Copyright by</h2> " . $this->copyright ." - ". $this->year. " <br>";
    }
    public function addContent($content){
        $this->addHeader();
        $this->page = $this->page . $content. "<br>";
        $this->addFooter();
    }
}

$page = new Page();
$page->setTitle("Welcome to this website");
$page->setYear("2022");
$page->setCopyright("Mai Dao Tuan Thanh");
$page->addContent("Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.<br>");
$page->get();
