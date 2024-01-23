<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Card</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student data from the database
$sql = "select * from student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display marks card in a table
    echo "<table>";
    echo "<tr><th>Roll Number</th><th>Name</th><th>Subject</th><th>Marks</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["rollno"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["marks"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();
?>

</body>
</html>