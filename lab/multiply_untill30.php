<?php
// LAB EXERCISE #5
// Multiply a number by 2 and print each result
// until the value is >= 30. Loop executes at least once.

$startValue = 2;
$currentValue = $startValue;
$sequence = [];

// do...while ensures the loop runs at least once
do {
    $sequence[] = $currentValue;
    $currentValue *= 2;
} while ($currentValue <= 30);

// Output
echo '<h3>Lab Exercise #5</h3>';
echo "Start value: {$startValue}<br>";
echo 'Sequence: ' . implode(', ', $sequence) . '<br>';
