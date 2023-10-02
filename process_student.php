<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$class = mysqli_real_escape_string($conn, $_POST['class']);

$sql = "INSERT INTO students (name, email, phone, class) VALUES ('$name', '$email', '$phone', '$class')";

if ($conn->query($sql) === TRUE) {
    echo "Student information added successfully. <a href='view_students.html'>View Students</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
