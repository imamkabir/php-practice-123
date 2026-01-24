<?php

// 1. Wake up the Postman (Only 1 line needed for the whole app)
require 'vendor/autoload.php';

// 2. Import the classes and give them "Flight Signs" (Nicknames)
use App\Military\Jet as Raptor;
use App\Luxury\Jet as Gulfstream;

// 3. Launch them!
$f22 = new Raptor();
$g6 = new Gulfstream();

$f22->mission(); // Output: Engaging stealth mode...
$g6->mission();  // Output: Serving champagne...