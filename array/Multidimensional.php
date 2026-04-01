<?php
// 2D Array - Matrix
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

// Accessing elements
echo $matrix[0][1];     // Output: 2 (row 0, column 1)
echo $matrix[2][2];     // Output: 9

// Mixed associative and indexed
$students = [
    [
        "id" => 1,
        "name" => "Alice",
        "grades" => [85, 90, 88]
    ],
    [
        "id" => 2,
        "name" => "Bob",
        "grades" => [78, 82, 91]
    ]
];

// Properties demonstrated:
echo $students[0]["name"];           // Output: Alice
echo $students[0]["grades"][1];      // Output: 90
echo $students[1]["grades"][2];      // Output: 91

// Adding new student
$students[] = [
    "id" => 3,
    "name" => "Charlie",
    "grades" => [95, 93, 94]
];

// Looping through multidimensional array
foreach ($students as $student) {
    echo $student["name"] . "'s grades: ";
    foreach ($student["grades"] as $grade) {
        echo $grade . " ";
    }
    echo "\n";
}

// 3D Array example
$cuboid = [
    [  // Layer 1
        [1, 2],
        [3, 4]
    ],
    [  // Layer 2
        [5, 6],
        [7, 8]
    ]
];

echo $cuboid[1][0][1];  // Output: 6 (layer 1, row 0, column 1)
?>