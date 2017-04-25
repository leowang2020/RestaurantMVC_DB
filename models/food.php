<?php

class Food {
    private $id, $imgID, $name, $price, $category;
    
    public function __construct($imgID, $name, $price, $category) {
        $this->imgID = $imgID;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    public function getID() {
        return $this->id;
    }
    public function setIMGID($imgID) {
        $this->imgID = $imgID;
    }
    public function getIMGID() {
        return $this->imgID;
    }
    public function setName($name) {
        $this->name = $name;
    }   
    public function getName() {
        return $this->name;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
    
    public function setCategory($category) {
        $this->category = $category;
    }
    
    public function getCategory() {
        return $this->category;
    }
    
    public function getFormattedPrice() {
        $formatted_price = number_format($this->price, 2);
        return $formatted_price;
    }
    public function getDiscountedPercentage() {
        $discount_percent = 10;
        return $discount_percent;
    }
    public function getDiscountAmount() {
        $discount_percent = $this->getDiscountedPercentage() / 100;
        $discount_amount = $this->price * $discount_percent;
        $discount_amount = round($discount_amount, 2);
        $discount_amount = number_format($discount_amount, 2);
        return $discount_amount;
    }
    public function getDiscountPrice() {
        $discount_price = $this->price - $this->getDiscountAmount();
        $discount_price = number_format($discount_price, 2);
        return $discount_price;
    }
    public function getImageFilename() {
        $image_filename = $this->imgID.'.jpg';
        return $image_filename;
    }
    public function getImagePath() {
        $image_path = 'img/'.$this->getImageFilename();
        return $image_path;
    }
    public function getImageAltText() {
        $image_alt = 'Image: '.$this->getImageFilename();
        return $image_alt;
    }
}

?>
