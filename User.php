<?php
require_once('Connection.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $other_names = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    if (empty($firstname) || empty($other_names) || empty($email) || empty($gender) || empty($password)) {
        echo 'Please fill in all the fields.';
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $query = "INSERT INTO `student_info` (firstname, lastname, email, gender, password) 
                  VALUES ('$firstname', '$other_names', '$email', '$gender', '$hashed_password')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            header('location: show.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="style-sheet" href="style.css"></link>
</head>
<body>
    
<h1>Hello, World! Welcome to my CRUD Application</h1>

<div class="container">

<form method="post">
  <div class="form-group">
    <label for="exampleInputFirstName1">Your First Name: </label>
    <input type="text" class="form-control" id="exampleInputFirstName1" aria-describedby="firstNameHelp" name="firstname" placeholder="Input your first name">
  </div>
  <div class="form-group">
    <label for="exampleInputLastName1">Other Names: </label>
    <input type="text" class="form-control" name="lastname" id="exampleInputLastName1" placeholder="Enter your other names">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email: </label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Gender: </label>
    <select class="form-control" id="exampleFormControlSelect2" name="gender">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password: </label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>

</body>
</html>
