<?php
$servername = "localhost";  // Change this as per your server settings
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "student_feedback"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student_id, full_name, faculty, course_code, concern, study_time FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Summarized Student Data</h2>";
    echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Faculty</th>
                <th>Course Code</th>
                <th>Concern</th>
                <th>Study Time</th>
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['student_id'] . "</td>
                <td>" . $row['full_name'] . "</td>
                <td>" . $row['faculty'] . "</td>
                <td>" . $row['course_code'] . "</td>
                <td>" . $row['concern'] . "</td>
                <td>" . $row['study_time'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>