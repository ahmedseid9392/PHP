<?php


$numbers = [12, 5, 100, -3, 42];

// Initialize min and max with the first element
$minValue = $numbers[0];
$maxValue = $numbers[0];

// Find min and max using a loop
foreach ($numbers as $value) {
    if ($value < $minValue) {
        $minValue = $value;
    }

    if ($value > $maxValue) {
        $maxValue = $value;
    }
}

// Output
echo '<h3>Lab Exercise #3</h3>';
echo 'Array: [' . implode(', ', $numbers) . ']<br>';
echo "Minimum: {$minValue}<br>";
echo "Maximum: {$maxValue}<br>";

?>
