<?php
class Wine  {
    private $id; 
    private $wine;
    private $description;
    private $year;
    private $temperature;
    private $type;
   
    
    public function __construct($d, $w, $d, $y, $te, $t) {
        $this->id = $i;
        $this->wine = $w;
        $this->description = $d;
        $this->year = $y;
        $this->temperature = $te;
        $this->type = $t;
       
    }
    public function getId() { return $this->id; }
    public function getWine() { return $this->wine; }
    public function getDescription() { return $this->description; }
    public function getYear() { return $this->year; }
    public function getTemperature() { return $this->temperature; }
    public function getType() { return $this->type; }
 
}

