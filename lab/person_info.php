<?php


$person = [
    'name' => 'Ahmed Seid',
    'age' => 21,
    'email' => 'Ahmed.asd@example.com'
];

//  sentence
$sentence = "{$person['name']} is {$person['age']} years old and can be reached at {$person['email']}.";

// Output
echo '<h3>Lab Exercise #4</h3>';
echo $sentence . '<br>';
