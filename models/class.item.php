<?php
class Item {
    protected $id, $name, $os, $description, $image, $cost;
    
    public function __construct($dbrow) {
        $this->id = $dbrow['item_id'];
        $this->name = $dbrow['name'];
        $this->os = $dbrow['os'];
        $this->description = $dbrow['description'];
        $this->image = $dbrow['image'];   
        $this->cost = $dbrow['cost'];
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getOS() {
        return $this->os;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getImage() {
        return $this->image;
    }
    public function getCost() {
        return $this->cost;
    }
}
?>
