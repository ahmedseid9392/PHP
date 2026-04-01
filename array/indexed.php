<?php 
// Creation methods
$colors = ["Red", "Green", "Blue", "Yellow"];  // Short syntax
// or
$colors = array("Red", "Green", "Blue", "Yellow");

// Properties demonstrated:
echo $colors[0];        // Output: Red (starts at index 0)
echo $colors[2];        // Output: Blue

// Adding elements
$colors[] = "Purple";   // Auto-increments to index 4
$colors[10] = "Orange"; // Sparse array - index 10

// Looping
foreach ($colors as $index => $value) {
    echo "Index $index: $value\n";
}

// Count elements
echo count($colors);    // Output: 6 (indices 0,1,2,3,4,10)
?>