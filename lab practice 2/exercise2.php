<?php

// Step 1: Data to write
$data = [
    "employees" => [
        ["firstName" => "John", "lastName" => "Doe"],
        ["firstName" => "Anna", "lastName" => "Smith"],
        ["firstName" => "Peter", "lastName" => "Jones"]
    ]
];

// Step 2: Convert to JSON
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Step 3: Check JSON encoding error
if ($jsonData === false) {
    die("Error: JSON encoding failed - " . json_last_error_msg());
}

// Step 4: Write to file
$result = file_put_contents("employees.json", $jsonData);

// Step 5: Check writing result
if ($result === false) {
    die("Error: Failed to write to file. Check permissions.");
}

// Step 6: Success message
echo "Data successfully written to employees.json";

?>