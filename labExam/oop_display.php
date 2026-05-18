<?php

class Student {

    public $projectCode;
    public $projectName;
    public $year;
    public $student;
    public $department;
    public $hourlyRate;

    function setData($pc, $pn, $y, $s, $d, $hr) {

        $this->projectCode = $pc;
        $this->projectName = $pn;
        $this->year = $y;
        $this->student = $s;
        $this->department = $d;
        $this->hourlyRate = $hr;
    }

    function display() {

        echo "<tr>

        <td>$this->projectCode</td>
        <td>$this->projectName</td>
        <td>$this->year</td>
        <td>$this->student</td>
        <td>$this->department</td>
        <td>$this->hourlyRate</td>

        </tr>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>OOP Display</title>
</head>
<body>

<h2>Sample Output from Project_student Table</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Project Code</th>
    <th>Project Name</th>
    <th>Year</th>
    <th>Student</th>
    <th>Department</th>
    <th>Hourly Rate</th>
</tr>

<?php

$s1 = new Student();

$s1->setData(
    "PC01",
    "Inventory",
    "2025",
    "Kalkidan",
    "SE",
    "2025-12-23 08:30"
);

$s1->display();

?>

</table>

</body>
</html>