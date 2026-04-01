<?php
// Creation methods
$person = [
    "name" => "John Doe",
    "age" => 30,
    "email" => "john@example.com",
    "is_active" => true
];
// or
$person = array("name" => "John Doe", "age" => 30);

// Properties demonstrated:
echo $person["name"];    // Output: John Doe
echo $person["email"];   // Output: john@example.com

// Adding/Modifying
$person["city"] = "New York";        // Add new key-value pair
$person["age"] = 31;                 // Modify existing

// Checking existence
if (isset($person["email"])) {
    echo "Email exists\n";
}

// Looping
foreach ($person as $key => $value) {
    echo "$key: $value\n";
}

// Get all keys
$keys = array_keys($person);  // Returns ["name", "age", "email", "is_active", "city"]
?>