<?php 
class Production {
    private $id;
    private $category_id;
    private $created_id;
    private $name;
    private $title;
    private $image_url;
    private $quantity;
    private $price;
    private $description;
    private $thumbnail_url;
    private $status;
    private $created_at;
    private $views;

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getCategoryID() {
        return $this->category_id;
    }

    public function getCreatedID() {
        return $this->created_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getImageURL() {
        return $this->image_url;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getThumbnailURL() {
        return $this->thumbnail_url;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getViews() {
        return $this->views;
    }

    // Setter methods
    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoryID($category_id) {
        $this->category_id = $category_id;
    }

    public function setCreatedID($created_id) {
        $this->created_id = $created_id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setImageURL($image_url) {
        $this->image_url = $image_url;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setThumbnailURL($thumbnail_url) {
        $this->thumbnail_url = $thumbnail_url;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setViews($views) {
        $this->views = $views;
    }
}


?>