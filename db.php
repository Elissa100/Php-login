<?php
require_once('Connection.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo 'Please fill in all the fields.';
    } else {
        $query = "SELECT * FROM student_info WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            $db_password = $row['password'];

            if (password_verify($password, $db_password)) {
                // Password is correct
                header("location: home.php");
            } else {
                echo "Incorrect password";
            
            }
        } else {
            echo "Please check the query.";
        }
    }
}
?>

