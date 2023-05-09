<?php
require_once('conn.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$sql = "INSERT INTO student_info (firstname, lastname, email, gender, password) VALUES ('$firstname', '$lastname', '$email', '$gender', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
