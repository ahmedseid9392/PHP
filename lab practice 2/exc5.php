<?php

// DB connection
$conn = mysqli_connect("localhost", "root", "", "smart_farm");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Insert dynamic data (simulate sensor input)
$plot = "P1";
$temp = 26.3;
$hum  = 55;
$soil = 42;

$sql = "INSERT INTO sensor_data (plot_id, temperature, humidity, soil_moisture)
        VALUES ('$plot', $temp, $hum, $soil)";

mysqli_query($conn, $sql);

// ============================
// 1. Display latest 10 readings
// ============================
$result = mysqli_query($conn, 
    "SELECT * FROM sensor_data ORDER BY created_at DESC LIMIT 10"
);

echo "<h2>Latest Sensor Readings</h2>";
echo "<table border='1'>
<tr>
<th>ID</th><th>Plot</th><th>Temp</th><th>Humidity</th><th>Soil</th><th>Time</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['plot_id']}</td>
    <td>{$row['temperature']}</td>
    <td>{$row['humidity']}</td>
    <td>{$row['soil_moisture']}</td>
    <td>{$row['created_at']}</td>
    </tr>";
}

echo "</table>";

// ============================
// 2. Average per plot
// ============================
$avgQuery = mysqli_query($conn, "
    SELECT plot_id,
           AVG(temperature) AS avg_temp,
           AVG(humidity) AS avg_hum,
           AVG(soil_moisture) AS avg_soil
    FROM sensor_data
    GROUP BY plot_id
");

echo "<h2>Average Values per Plot</h2>";
echo "<table border='1'>
<tr><th>Plot</th><th>Avg Temp</th><th>Avg Humidity</th><th>Avg Soil</th></tr>";

while ($row = mysqli_fetch_assoc($avgQuery)) {
    echo "<tr>
    <td>{$row['plot_id']}</td>
    <td>{$row['avg_temp']}</td>
    <td>{$row['avg_hum']}</td>
    <td>{$row['avg_soil']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($conn);

?>

<?php

$mysqli = new mysqli("localhost", "root", "", "smart_farm");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert data
$stmt = $mysqli->prepare("
    INSERT INTO sensor_data (plot_id, temperature, humidity, soil_moisture)
    VALUES (?, ?, ?, ?)
");

$plot = "P2";
$temp = 24.8;
$hum  = 65;
$soil = 38;

$stmt->bind_param("sddd", $plot, $temp, $hum, $soil);
$stmt->execute();

// Latest 10
$result = $mysqli->query("
    SELECT * FROM sensor_data ORDER BY created_at DESC LIMIT 10
");

echo "<h2>Latest Readings (OOP)</h2>";

while ($row = $result->fetch_assoc()) {
    echo $row['plot_id'] . " - " . $row['temperature'] . "<br>";
}

// Averages
$avg = $mysqli->query("
    SELECT plot_id,
           AVG(temperature) avg_temp,
           AVG(humidity) avg_hum,
           AVG(soil_moisture) avg_soil
    FROM sensor_data
    GROUP BY plot_id
");

echo "<h2>Averages (OOP)</h2>";

while ($row = $avg->fetch_assoc()) {
    echo "Plot: {$row['plot_id']} | Temp: {$row['avg_temp']} | Hum: {$row['avg_hum']} | Soil: {$row['avg_soil']}<br>";
}

$mysqli->close();

?>

 
 