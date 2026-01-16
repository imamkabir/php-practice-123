<?php

class MyClass {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
} 
class MyClass2 {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}
class MyClass3 {
    private $product;
    private $price;

    public function __construct($product, $price) {
        $this->product = $product;
        $this->price = $price;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getPrice() {
        return $this->price;
    }
}
class MyClass4 {
    private $city;
    private $country;

    public function __construct($city, $country) {
        $this->city = $city;
        $this->country = $country;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCountry() {
        return $this->country;
    }
}
class MyClass5 {
    private $make;
    private $model;     
    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }
    public function getMake() {
        return $this->make;
    }
    public function getModel() {
        return $this->model;
    }
}
?><?php
class MyClass6 {
    private $firstName;
    private $lastName;          
    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }   
    public function getFirstName() {
        return $this->firstName;
    }           
    public function getLastName() {
        return $this->lastName;
    }
}?><?php
class MyClass7 {        
    private $width;
    private $height;          
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }   
    public function getWidth() {
        return $this->width;
    }           
    public function getHeight() {
        return $this->height;
    }
}?><?php
class MyClass8 {        
    private $username;
    private $email;          
    public function __construct($username, $email) {    
        $this->username = $username;
        $this->email = $email;
    }   
    public function getUsername() {
        return $this->username;
    }   
    public function getEmail() {
        return $this->email;
    }
}?><?php