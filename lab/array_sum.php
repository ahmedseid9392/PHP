<?php
// LAB EXERCISE #2
// Write a PHP script to display the sum of array elements.

// Sample input array
$numbers = [13, 5, 7, 2];

// Calculate sum
$sum = array_sum($numbers);

// Output
echo '<h3>Lab Exercise #2</h3>';
echo 'Array: [' . implode(', ', $numbers) . ']<br>';
echo "Sum: {$sum}<br>";

?>