<?php

class ArrayManager {
    private $items = [];
    
    public function __construct(array $items = []) {
        $this->items = $items;
    }
    
    // Get the array
    public function getItems() {
        return $this->items;
    }
    
    // Get length of array
    public function count() {
        return count($this->items);
    }
    
    // Search array for specific item
    public function search($value) {
        return in_array($value, $this->items);
    }
    
    // Add to end of array
    public function add($value) {
        $this->items[] = $value;
        return $this;
    }
    
    // Add to end using push
    public function push($value) {
        array_push($this->items, $value);
        return $this;
    }
    
    // Add to beginning
    public function addToBeginning($value) {
        array_unshift($this->items, $value);
        return $this;
    }
    
    // Remove from end
    public function removeFromEnd() {
        array_pop($this->items);
        return $this;
    }
    
    // Remove from beginning
    public function removeFromBeginning() {
        array_shift($this->items);
        return $this;
    }
    
    // Remove specific element by index
    public function removeByIndex($index) {
        unset($this->items[$index]);
        return $this;
    }
    
    // Split into chunks
    public function chunk($size) {
        return array_chunk($this->items, $size);
    }
}

// ============================================
// USAGE
// ============================================

$fruits = new ArrayManager(['appee', 'orange', 'banaa']);

// Get length
echo $fruits->count();
echo "<br>";

// Search
var_dump($fruits->search('appee'));
echo "<br>";

// Add to array
$fruits->add('real apple');
print_r($fruits->getItems());
echo "<br>";

// Array push
$fruits->push('bana32');
print_r($fruits->getItems());
echo "<br>";

// Add to beginning
$fruits->addToBeginning('banaereeeeeeeeeee');
print_r($fruits->getItems());
echo "<br>";

// Remove from end
$fruits->removeFromEnd();
print_r($fruits->getItems());
echo "<br>";

// Remove from beginning
$fruits->removeFromBeginning();
print_r($fruits->getItems());
echo "<br>";

// Remove specific element
$fruits->removeByIndex(2);
print_r($fruits->getItems());
echo "<br>";

// Split into chunks
$chunked = $fruits->chunk(2);
print_r($chunked);
?>