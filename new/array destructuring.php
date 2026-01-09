<?php

// This array represents a user 
$user = ['Hussaini', 'hussaini@mail.com', 25, 'Nigeria'];

// Array destructuring
// The first value goes into $name
// The second value goes into $email
// The third value goes into $age
// The fourth value goes into $country
[$name, $email, $age, $country] = $user;

// Now each variable holds a specific piece of data
echo $name;     // Hussaini
echo $email;    // hussaini@mail.com
echo $age;      // 25
echo $country;  // Nigeria

// Without destructuring, you would write;
$name    = $user[0];
$email   = $user[1];
$age     = $user[2];
$country = $user[3];


?>
<?php

$user = [
    'name'    => 'Hussaini',
    'email'   => 'hussaini@mail.com',
    'role'    => 'admin',
    'active'  => true
];

// Destructuring by keys, not by position
['name' => $name, 'email' => $email] = $user;

echo $name;   // Hussaini
echo $email;  // hussaini@mail.com

