<?php

// Step 1: Check if file exists
if (!file_exists("data.json")) {
    die("Error: JSON file not found.");
}

// Step 2: Read the JSON file
$jsonData = file_get_contents("data.json");

// Step 3: Check if file is empty or unreadable
if ($jsonData === false || empty($jsonData)) {
    die("Error: Unable to read JSON file.");
}

// Step 4: Decode JSON into associative array
$dataArray = json_decode($jsonData, true);

// Step 5: Check for JSON decoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error: Invalid JSON format - " . json_last_error_msg());
}

// Step 6: Access data safely
echo "Name: " . ($dataArray['name'] ?? 'N/A') . "<br>";
echo "Age: " . ($dataArray['age'] ?? 'N/A') . "<br>";
echo "City: " . ($dataArray['city'] ?? 'N/A') . "<br>";

?>