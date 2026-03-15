<?php


$students = [
    ['name' => 'Abel', 'scores' => [70, 80, 90]],
    ['name' => 'Ahmed', 'scores' => [55, 60, 58]],
    ['name' => 'Seid', 'scores' => [95, 92, 88]],
];

echo '<h3>Lab Exercise #6</h3>';

foreach ($students as $student) {
    $name = $student['name'];
    $scores = $student['scores'];

    
    $average = count($scores) > 0 ? array_sum($scores) / count($scores) : 0;
    $status = $average >= 60 ? 'Pass' : 'Fail';

    echo "Name: {$name}<br>";
    echo 'Scores: [' . implode(', ', $scores) . ']<br>';
    echo 'Average: ' . number_format($average, 2) . '<br>';
    echo "Status: {$status}<br><br>";
}
