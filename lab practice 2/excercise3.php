
<!-- <?php
//1. Write Mode ("w") — Overwrites File
$data = [
    "id" => 1,
    "name" => "Aster",
    "role" => "Developer"
];

$jsonData = json_encode($data, JSON_PRETTY_PRINT);

$file = fopen("user.json", "w"); // overwrite
if (!$file) die("Error opening file");

fwrite($file, $jsonData);
fclose($file);

echo "Data written using 'w' mode (overwrite).";
//✔ If file exists → deleted and rewritten
//✔ If not exists → created
?> -->




<!-- <?php
//2. Append Mode ("a") — Add Data
$data = [
    "id" => 2,
    "name" => "Abel",
    "role" => "Engineer"
];

$jsonData = json_encode($data) . "\n";

$file = fopen("user.json", "a"); // append
if (!$file) die("Error opening file");

fwrite($file, $jsonData);
fclose($file);

echo "Data appended using 'a' mode.";
//✔ Keeps old data
 //May break JSON structure (not valid single JSON object anymore)
?> -->



 
<!-- <?php
//3. Exclusive Mode ("x") — Create Only
$data = ["id" => 3, "name" => "Sara"];

$jsonData = json_encode($data);

$file = fopen("user.json", "x"); // create only
if (!$file) die("Error: File already exists");

fwrite($file, $jsonData);
fclose($file);

echo "File created using 'x' mode.";

//✔ Fails if file exists
//✔ Safe for avoiding overwrite
?> -->



<?php
// 4. Read + Write Mode ("r+")
$file = fopen("user.json", "r+"); // read + write

if (!$file) die("Error opening file");

// Read existing content
$content = fread($file, filesize("user.json"));

// Move pointer to end
fseek($file, 0, SEEK_END);

// Append new data
$newData = json_encode(["id"=>4,"name"=>"Helen"]) . "\n";
fwrite($file, $newData);

fclose($file);

echo "Read and appended using 'r+' mode.";
//✔ Does NOT overwrite
//✔ Can read + write
?>

