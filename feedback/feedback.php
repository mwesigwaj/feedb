<?php
$servername = "localhost";  // Change this as per your server settings
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "student_feedback"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $student_email = $_POST['student_email'];
    $faculty = $_POST['faculty'];
    $course_code = $_POST['course_code'];
    $concern = $_POST['concern'];
    $study_time = $_POST['study_time'];

    // Validate if the student ID already exists
    $check_student_id = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = $conn->query($check_student_id);

    if ($result->num_rows > 0) {
        echo "Student ID already exists. Please use a unique ID.";
    } else {
        // Insert new record into the database
        $sql = "INSERT INTO students (student_id, full_name, student_email, faculty, course_code, concern, study_time) 
                VALUES ('$student_id', '$full_name', '$student_email', '$faculty', '$course_code', '$concern', '$study_time')";

        if ($conn->query($sql) === TRUE) {
            echo "Thanks for your suggestion. We look forward to implementing it at Jose Tech &#128512 &#128512 ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
/* if ($conn->query($sql) === TRUE) {
    header("Location: success.php");
    exit();
}else{
    echo "Error: ". $conn->error;
}
 */
$conn->close();
?>

